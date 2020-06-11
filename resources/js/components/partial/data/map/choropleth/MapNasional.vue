<template>
  <div class="w-full p-3">
    <!--Table Card-->
    <div class="bg-white">
      <div class="flex flex-wrap justify-center max-w-md mx-auto text-center">
        <div class="flex items-center mr-4">
          <input
            id="positif"
            type="radio"
            name="data_covid"
            value="Positif"
            class="hidden"
            checked
            v-on:change="createChoropleth('Positif', positiveDataset, positiveColor)"
          />
          <label for="positif" class="flex items-center cursor-pointer">
            <span class="inline-block w-4 h-4 mr-1 border rounded-full border-grey"></span>
            Positif
          </label>
        </div>

        <div class="flex items-center mr-4">
          <input
            id="sembuh"
            type="radio"
            name="data_covid"
            value="Sembuh"
            class="hidden"
            v-on:change="createChoropleth('Sembuh', recoveredDataset, recoveredColor)"
          />
          <label for="sembuh" class="flex items-center cursor-pointer">
            <span class="inline-block w-4 h-4 mr-1 border rounded-full border-grey"></span>
            Sembuh
          </label>
        </div>

        <div class="flex items-center mr-4">
          <input
            id="meninggal"
            type="radio"
            name="data_covid"
            value="Meninggal"
            class="hidden"
            v-on:change="createChoropleth('Meninggal', deathDataset, deathColor)"
          />
          <label for="meninggal" class="flex items-center cursor-pointer">
            <span class="inline-block w-4 h-4 mr-1 border rounded-full border-grey"></span>
            Meninggal
          </label>
        </div>
      </div>
      <div ref="map_nasional_case" class="w-full mt-2 rounded-lg" style="height: 500px;"></div>
    </div>
    <!--/table Card-->
  </div>
</template>
<script>
import Anychart from "anychart";
var map = anychart.map();
export default {
  data() {
    return {
      today: new Date(),
      positiveDataset: [],
      positiveColor: [
        "#418a47",
        "#689849",
        "#8da64e",
        "#b1b356",
        "#d6bf63",
        "#facb75",
        "#f6b063",
        "#f19557",
        "#ea7951",
        "#e15c4f",
        "#d43d51",
        "#CD0000"
      ],
      recoveredDataset: [],
      recoveredColor: [
        "#DEEDCF",
        "#BFE1B0",
        "#99D492",
        "#74C67A",
        "#56B870",
        "#39A96B",
        "#198C75",
        "#188977",
        "#137177",
        "#0E4D64",
        "#0A2F51",
        "#1D9A6C"
      ],
      deathDataset: [],
      deathColor: [
        "#FFF3BA",
        "#FFEB9B",
        "#FFE07C",
        "#FFD45D",
        "#FFC63E",
        "#FFB61F",
        "#F89C07",
        "#F0930F",
        "#E98C16",
        "#E1851E",
        "#DA7F25",
        "#FFA500"
      ]
    };
  },
  methods: {
    loadGeoJson: function() {
      axios
        .get("/corona/public/assets/geojson/indonesia.json")
        .then(response => {
          map.geoData(response.data);
        });
    },
    createChoropleth: function(name, data, color) {
      map.removeAllSeries();
      var series = map.choropleth(data);
      series.colorScale(
        anychart.scales.ordinalColor([
          { less: 100, color: color[0] },
          { from: 100, to: 200, color: color[1] },
          { from: 200, to: 300, color: color[2] },
          { from: 300, to: 400, color: color[3] },
          { from: 400, to: 500, color: color[4] },
          { from: 500, to: 600, color: color[5] },
          { from: 600, to: 700, color: color[6] },
          { from: 700, to: 800, color: color[7] },
          { from: 800, to: 900, color: color[8] },
          { from: 900, to: 1000, color: color[9] },
          { greater: 1000, color: color[10] }
        ])
      );
      series.tooltip().format(function(e) {
        var positif =
          e.getData("positif") == null
            ? e.getData("value")
            : e.getData("positif");
        var sembuh =
          e.getData("sembuh") == null
            ? e.getData("value")
            : e.getData("sembuh");
        var meninggal =
          e.getData("meninggal") == null
            ? e.getData("value")
            : e.getData("meninggal");
        var underTreatment = positif - (sembuh + meninggal);
        return (
          "Positif: " +
          positif +
          "\n" +
          "Dirawat: " +
          underTreatment +
          "\n" +
          "Sembuh: " +
          sembuh +
          "\n" +
          "Meninggal: " +
          meninggal
        );
      });
      series.tooltip().hideDelay(5000);
      var mapTitle = map.title();
      mapTitle.enabled(true);
      mapTitle.text("Choropleth Map kasus " + name + " COVID-19 di Indonesia");
      series.name(name + "(Choropleth)");
      series.labels(true);
      series.labels().format("{%value}");
      series.labels().fontWeight(600);
      series.hovered().fill(color[11]);
      map
        .colorRange()
        .enabled(true)
        .length(10000);
      series.selectionMode("none");
    },
    getAllProvinces: function() {
      axios.get("/corona/api/provinsi").then(response => {
        if (this.positiveDataset.length > 0) {
          this.positiveDataset = [];
          this.recoveredDataset = [];
          this.deathDataset = [];
        }
        var data = response.data.data;
        data.forEach(province => {
          this.positiveDataset.push({
            id: province.map_id,
            value: province.positif,
            sembuh: province.sembuh,
            meninggal: province.meninggal
          });
          this.recoveredDataset.push({
            id: province.map_id,
            value: province.sembuh,
            positif: province.positif,
            meninggal: province.meninggal
          });
          this.deathDataset.push({
            id: province.map_id,
            value: province.meninggal,
            positif: province.positif,
            sembuh: province.sembuh
          });
        });
      });
    }
  },

  mounted() {
    if (map.geoData() == null) {
      this.loadGeoJson();
    }
    this.getAllProvinces();
    var zoomController = anychart.ui.zoom();
    zoomController.target(map);
    zoomController.render();
    var container = this.$refs["map_nasional_case"];
    var lastUpdate =
      this.today.getDate() +
      "-" +
      (this.today.getMonth() + 1) +
      "-" +
      this.today.getFullYear();
    var file = "Data COVID-19 Nasional_" + lastUpdate;
    map.exports().filename(file);
    map.container(container);
    map.draw(true);
  }
};
</script>