<template>
  <div class="w-full p-3">
    <!--Table Card-->
    <div class="bg-white">
      <div class="flex flex-wrap justify-center max-w-md mx-auto text-center">
        <div class="flex items-center mr-4">
          <input
            id="positif_nasional"
            type="radio"
            name="data_covid_nasional"
            value="Positif"
            class="hidden"
            checked
            v-on:change="
              createCluster('Positif', positiveDataset, positiveColor)
            "
          />
          <label
            for="positif_nasional"
            class="flex items-center cursor-pointer"
          >
            <span
              class="inline-block w-4 h-4 mr-1 border rounded-full border-grey"
            ></span>
            Positif
          </label>
        </div>

        <div class="flex items-center mr-4">
          <input
            id="sembuh_nasional"
            type="radio"
            name="data_covid_nasional"
            value="Sembuh"
            class="hidden"
            v-on:change="
              createCluster('Sembuh', recoveredDataset, recoveredColor)
            "
          />
          <label for="sembuh_nasional" class="flex items-center cursor-pointer">
            <span
              class="inline-block w-4 h-4 mr-1 border rounded-full border-grey"
            ></span>
            Sembuh
          </label>
        </div>

        <div class="flex items-center mr-4">
          <input
            id="meninggal_nasional"
            type="radio"
            name="data_covid_nasional"
            value="Meninggal"
            class="hidden"
            v-on:change="createCluster('Meninggal', deathDataset, deathColor)"
          />
          <label
            for="meninggal_nasional"
            class="flex items-center cursor-pointer"
          >
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
var map = Anychart.map();
export default {
  props: {
    provinces: {
      type: Array,
      required: true,
    },
  },
  data() {
    return {
      today: new Date(),
      positiveDataset: [],
      positiveColor: [
        "#F9CACD",
        "#F4A8AC",
        "#EE868B",
        "#E76569",
        "#DF4346",
        "#D12E2A",
        "#BB000E",
        "#A90019",
        "#960022",
        "#820029",
        "#6E002C",
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
      axios.get(this.asset("geojson/indonesia.json")).then((response) => {
        map.geoData(response.data);
      });
    },
    createCluster: function (name, data, color) {
      map.colorRange().enabled(false);
      map.removeAllSeries();
      data = anychart.data.set(data).mapAs({ size: "value" });
      var series = map.bubble(data);
      series.name(name + "(Cluster)");
      series.selectionMode("none");
      series.labels(true);
      series.labels().format("{%value}");
      series.labels().fontWeight(600);
      series.labels().fontColor("Black");
      series
        .legendItem()
        .enabled(true)
        .iconType("circle")
        .iconFill(color[5])
        .iconStroke("2 #E1E1E1");
      series.fill(color[5], 0.35);
      series.hovered().fill(color[5], 0.7);
      // chae the stroke and hoverStroke colors of series_1
      series.stroke(color[5]);
      series.tooltip().format(name + " : {%value}");
      series.tooltip().hideDelay(5000);
      series.hovered().stroke(color[5]);
      var mapTitle = map.title();
      map.maxBubbleSize(35);
      map.minBubbleSize(9);
      mapTitle.enabled(true);
      mapTitle.text("Bubble Map kasus " + name + " COVID-19 di Indonesia");
    },
    getAllProvinces: function () {
      if (this.positiveDataset.length > 0) {
        this.positiveDataset = [];
        this.recoveredDataset = [];
        this.deathDataset = [];
      }

      var data = this.provinces;

      data.forEach((province) => {
        this.positiveDataset.push({
          id: province.map_id,
          value: province.positive,
          sembuh: province.recovered,
          meninggal: province.deceased,
        });
        this.recoveredDataset.push({
          id: province.map_id,
          value: province.recovered,
          positif: province.positive,
          meninggal: province.deceased,
        });
        this.deathDataset.push({
          id: province.map_id,
          value: province.deceased,
          positif: province.positive,
          sembuh: province.recovered,
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