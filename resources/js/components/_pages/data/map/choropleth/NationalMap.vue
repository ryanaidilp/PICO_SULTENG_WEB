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
            v-on:change="
              createChoropleth('Positif', positiveDataset, positiveColor)
            "
          />
          <label for="positif" class="flex items-center cursor-pointer">
            <span
              class="inline-block w-4 h-4 mr-1 border rounded-full border-grey"
            ></span>
            Positif
          </label>
        </div>

        <div class="flex items-center mr-4">
          <input
            id="dirawat"
            type="radio"
            name="data_covid"
            value="Dirawat"
            class="hidden"
            v-on:change="
              createChoropleth('Dirawat', underTreatmentDataset, positiveColor)
            "
          />
          <label for="dirawat" class="flex items-center cursor-pointer">
            <span
              class="inline-block w-4 h-4 mr-1 border rounded-full border-grey"
            ></span>
            Dirawat
          </label>
        </div>

        <div class="flex items-center mr-4">
          <input
            id="sembuh"
            type="radio"
            name="data_covid"
            value="Sembuh"
            class="hidden"
            v-on:change="
              createChoropleth('Sembuh', recoveredDataset, recoveredColor)
            "
          />
          <label for="sembuh" class="flex items-center cursor-pointer">
            <span
              class="inline-block w-4 h-4 mr-1 border rounded-full border-grey"
            ></span>
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
            v-on:change="
              createChoropleth('Meninggal', deathDataset, deathColor)
            "
          />
          <label for="meninggal" class="flex items-center cursor-pointer">
            <span
              class="inline-block w-4 h-4 mr-1 border rounded-full border-grey"
            ></span>
            Meninggal
          </label>
        </div>
      </div>
      <div
        ref="map_nasional_case"
        class="w-full mt-2 rounded-lg"
        style="height: 500px"
      ></div>
    </div>
    <!--/table Card-->
  </div>
</template>
<script>
import Anychart from "anychart";
var map = anychart.map();
export default {
  props: ["provinces"],
  data() {
    return {
      today: new Date(),
      positiveDataset: [],
      underTreatmentDataset: [],
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
        "#CD0000",
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
        "#1D9A6C",
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
        "#FFA500",
      ],
    };
  },
  methods: {
    loadGeoJson: function () {
      axios
        .get(route("home") + "assets/geojson/indonesia.json")
        .then((response) => {
          map.geoData(response.data);
        });
    },
    createChoropleth: function (name, data, color) {
      map.removeAllSeries();
      var series = map.choropleth(data);
      if (name == "Sembuh") {
        series.colorScale(
          anychart.scales.ordinalColor([
            { less: 2500, color: color[0] },
            { from: 2500, to: 5000, color: color[1] },
            { from: 5000, to: 7500, color: color[2] },
            { from: 7500, to: 10000, color: color[3] },
            { from: 10000, to: 12500, color: color[4] },
            { from: 12500, to: 15000, color: color[5] },
            { from: 15000, to: 17500, color: color[6] },
            { from: 17500, to: 20000, color: color[7] },
            { from: 20000, to: 22500, color: color[8] },
            { from: 22500, to: 25000, color: color[9] },
            { greater: 25000, color: color[10] },
          ])
        );
      } else if (name == "Positif") {
        series.colorScale(
          anychart.scales.ordinalColor([
            { less: 10000, color: color[0] },
            { from: 10000, to: 20000, color: color[1] },
            { from: 20000, to: 30000, color: color[2] },
            { from: 30000, to: 40000, color: color[3] },
            { from: 40000, to: 50000, color: color[4] },
            { from: 50000, to: 60000, color: color[5] },
            { from: 60000, to: 70000, color: color[6] },
            { from: 70000, to: 80000, color: color[7] },
            { from: 80000, to: 90000, color: color[8] },
            { from: 90000, to: 100000, color: color[9] },
            { greater: 100000, color: color[10] },
          ])
        );
      } else {
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
            { greater: 1000, color: color[10] },
          ])
        );
      }
      series.tooltip().useHtml(true);
      series.tooltip().format(function (e) {
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
        var underTreatment =
          e.getData("dirawat") == null
            ? e.getData("value")
            : e.getData("dirawat");
        return (
          '<table class="flex text-xs text-left text-gray-800 table-auto justify-left">' +
          "<tbody>" +
          "<tr>" +
          '<td class="px-1">' +
          "Positif</td>" +
          '<td class="px-1 font-bold">' +
          positif +
          "</td>" +
          "</tr>" +
          "<tr>" +
          '<td class="px-1">' +
          "Dirawat</td>" +
          '<td class="px-1 font-bold">' +
          underTreatment +
          "</td>" +
          "</tr>" +
          "<tr>" +
          '<td class="px-1">' +
          "Sembuh</td>" +
          '<td class="px-1 font-bold">' +
          sembuh +
          "</td>" +
          "</tr>" +
          "<tr>" +
          '<td class="px-1">' +
          "Meninggal</td>" +
          '<td class="px-1 font-bold">' +
          meninggal +
          "</td>" +
          "</tr>" +
          "<tr>" +
          "</tbody>" +
          "</table>"
        );
      });
      var mapTitle = map.title();
      mapTitle.enabled(true);
      mapTitle.text("Choropleth Map kasus " + name + " COVID-19 di Indonesia");
      series.name(name + "(Choropleth)");
      series.labels(true);
      series.labels().format("{%value}");
      series.labels().fontWeight(600);
      series.hovered().fill(color[11]);
      map.colorRange().enabled(true).length(10000);
      series.selectionMode("none");
    },
    getAllProvinces() {
      if (this.positiveDataset.length > 0) {
        this.positiveDataset = [];
        this.recoveredDataset = [];
        this.deathDataset = [];
      }
      var data = this.provinces;
      data.forEach((province) => {
        this.positiveDataset.push({
          id: province.map_id,
          value: province.positif,
          sembuh: province.sembuh,
          meninggal: province.meninggal,
          dirawat: province.positif - (province.sembuh + province.meninggal),
        });
        this.underTreatmentDataset.push({
          id: province.map_id,
          positif: province.positif,
          sembuh: province.sembuh,
          meninggal: province.meninggal,
          value: province.positif - (province.sembuh + province.meninggal),
        });
        this.recoveredDataset.push({
          id: province.map_id,
          value: province.sembuh,
          positif: province.positif,
          meninggal: province.meninggal,
          dirawat: province.positif - (province.sembuh + province.meninggal),
        });
        this.deathDataset.push({
          id: province.map_id,
          value: province.meninggal,
          positif: province.positif,
          sembuh: province.sembuh,
          dirawat: province.positif - (province.sembuh + province.meninggal),
        });
      });
    },
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
  },
};
</script>
<style>
.anychart-tooltip {
  justify-content: center;
  border-radius: 0.5rem;
  padding: 0.5rem;
  z-index: 100;
  background: rgb(250, 250, 250);
  color: #2d3748;
  box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
}

.anychart-tooltip-separator {
  height: 1px;
  background-color: rgba(136, 136, 136, 0.7);
}

.anychart-tooltip-title {
  font-size: 0.875rem;
  text-align: left;
  font-weight: 700;
}
</style>