<template>
  <div class="w-full p-3 text-xs bg-white rounded-lg shadow-lg md:text-base">
    <!--Table Card-->
    <div>
      <div class="flex flex-wrap justify-center max-w-md mx-auto text-center">
        <div class="flex items-center mr-4">
          <input
            id="regency-positif-bubble"
            type="radio"
            name="data_covid_lokal_bubble"
            value="Positif"
            class="hidden"
            checked
            v-on:change="
              createClusterLocal(
                'Positif',
                regencyPositiveDataset,
                regencyPositiveColor
              )
            "
          />
          <label
            for="regency-positif-bubble"
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
            id="regency-sembuh-bubble"
            type="radio"
            name="data_covid_lokal_bubble"
            value="Sembuh"
            class="hidden"
            v-on:change="
              createClusterLocal(
                'Sembuh',
                regencyRecoveredDataset,
                regencyRecoveredColor
              )
            "
          />
          <label
            for="regency-sembuh-bubble"
            class="flex items-center cursor-pointer"
          >
            <span
              class="inline-block w-4 h-4 mr-1 border rounded-full border-grey"
            ></span>
            Sembuh
          </label>
        </div>

        <div class="flex items-center mr-4">
          <input
            id="regency-meninggal-bubble"
            type="radio"
            name="data_covid_lokal_bubble"
            value="Meninggal"
            class="hidden"
            v-on:change="
              createClusterLocal(
                'Meninggal',
                regencyDeathDataset,
                regencyDeathColor
              )
            "
          />
          <label
            for="regency-meninggal-bubble"
            class="flex items-center cursor-pointer"
          >
            <span
              class="inline-block w-4 h-4 mr-1 border rounded-full border-grey"
            ></span>
            Meninggal
          </label>
        </div>

        <div class="flex items-center mr-4">
          <input
            id="regency-odp-bubble"
            type="radio"
            name="data_covid_lokal_bubble"
            value="ODP"
            class="hidden"
            v-on:change="
              createClusterLocal('ODP', regencyODPDataset, regencyODPColor)
            "
          />
          <label
            for="regency-odp-bubble"
            class="flex items-center cursor-pointer"
          >
            <span
              class="inline-block w-4 h-4 mr-1 border rounded-full border-grey"
            ></span>
            ODP
          </label>
        </div>

        <div class="flex items-center mr-4">
          <input
            id="regency-pdp-bubble"
            type="radio"
            name="data_covid_lokal_bubble"
            value="PDP"
            class="hidden"
            v-on:change="
              createClusterLocal('PDP', regencyPDPDataset, regencyPDPColor)
            "
          />
          <label
            for="regency-pdp-bubble"
            class="flex items-center cursor-pointer"
          >
            <span
              class="inline-block w-4 h-4 mr-1 border rounded-full border-grey"
            ></span>
            PDP
          </label>
        </div>
      </div>
      <div
        ref="map_kabupaten_case"
        class="w-full mt-2 rounded-b"
        style="height: 500px"
      ></div>
    </div>
    <!--/table Card-->
  </div>
</template>

<script>
/* eslint-disable */
import Anychart from "anychart";
var regencyMap = Anychart.map();
export default {
  props: {
    regencies: {
      type: Array,
      required: true,
    },
  },
  data() {
    return {
      today: new Date(),
      regencyRecoveredDataset: [],
      regencyPositiveDataset: [],
      regencyDeathDataset: [],
      regencyODPDataset: [],
      regencyPDPDataset: [],
      regencyPositiveColor: [
        "#F9CACD",
        "#F4A8AC",
        "#EE868B",
        "#E76569",
        "#DF4346",
        "#820029",
        "#6E002C",
        "#CD0000",
      ],
      regencyRecoveredColor: [
        "#DEEDCF",
        "#BFE1B0",
        "#99D492",
        "#74C67A",
        "#56B870",
        "#0E4D64",
        "#0A2F51",
        "#1D9A6C",
      ],
      regencyDeathColor: [
        "#FFF3BA",
        "#FFEB9B",
        "#FFE07C",
        "#FFD45D",
        "#FFC63E",
        "#E1851E",
        "#DA7F25",
        "#FFA500",
      ],
      regencyODPColor: [
        "#DFE4F8",
        "#BECCF1",
        "#9FB5E8",
        "#80A2DF",
        "#6190D5",
        "#174689",
        "#0E2C63",
        "#2773BF",
      ],
      regencyPDPColor: [
        "#DEADD0",
        "#D291C3",
        "#C574B6",
        "#B757AB",
        "#A93AA1",
        "#720060",
        "#65004C",
        "#88008B",
      ],
    };
  },
  methods: {
    getDistrictData: function () {
      if (this.regencyPositiveDataset.length > 0) {
        this.regencyPositiveDataset = [];
        this.regencyRecoveredDataset = [];
        this.regencyDeathDataset = [];
        this.regencyODPDataset = [];
        this.regencyPDPDataset = [];
      }
      var data = this.regencies;
      data.forEach((regency) => {
        this.regencyPositiveDataset.push({
          id: regency.kabupaten,
          value: regency.positif,
          sembuh: regency.sembuh,
          meninggal: regency.meninggal,
          ODP: regency.dalam_pemantauan,
          PDP: regency.dalam_pengawasan,
        });
        this.regencyRecoveredDataset.push({
          id: regency.kabupaten,
          value: regency.sembuh,
          positif: regency.positif,
          meninggal: regency.meninggal,
          ODP: regency.dalam_pemantauan,
          PDP: regency.dalam_pengawasan,
        });
        this.regencyDeathDataset.push({
          id: regency.kabupaten,
          value: regency.meninggal,
          positif: regency.positif,
          sembuh: regency.sembuh,
          ODP: regency.dalam_pemantauan,
          PDP: regency.dalam_pengawasan,
        });
        this.regencyODPDataset.push({
          id: regency.kabupaten,
          value: regency.dalam_pemantauan,
          positif: regency.positif,
          sembuh: regency.sembuh,
          meninggal: regency.meninggal,
          PDP: regency.dalam_pengawasan,
        });
        this.regencyPDPDataset.push({
          id: regency.kabupaten,
          value: regency.dalam_pengawasan,
          positif: regency.positif,
          sembuh: regency.sembuh,
          meninggal: regency.meninggal,
          ODP: regency.dalam_pemantauan,
        });
      });
    },
    createClusterLocal: function (name, data, color) {
      regencyMap.colorRange().enabled(false);
      regencyMap.removeAllSeries();
      data = anychart.data.set(data).mapAs({ size: "value" });
      var regencySeries = regencyMap.bubble(data);
      regencySeries.name(name + "(Cluster)");
      regencySeries.selectionMode("none");
      regencySeries.labels(true);
      regencySeries.labels().format("{%value}");
      regencySeries.labels().fontWeight(600);
      regencySeries.labels().fontColor("Black");
      regencySeries.fill(color[3], 0.35);
      regencySeries.hovered().fill(color[5], 0.7);
      // chae the stroke and hoverStroke colors of series_1
      regencySeries.stroke(color[3]);
      regencySeries.tooltip().titleFormat(function (e) {
        return e.getData("id");
      });
      regencySeries.tooltip().hideDelay(5000);
      regencySeries.tooltip().format(name + " : {%value}");
      regencySeries.hovered().stroke(color[5]);
      var regencyTitle = regencyMap.title();
      regencyTitle.enabled(true);
      regencyTitle.text(
        "Bubble Map kasus " + name + " COVID-19 di Sulawesi Tengah"
      );
    },
    loadMap: function () {
      axios.get(this.asset("geojson/sulteng.json")).then((response) => {
        regencyMap.geoData(response.data);
      });
    },
  },

  mounted() {
    var container = this.$refs["map_kabupaten_case"];
    this.getDistrictData();
    if (regencyMap.geoData() == null) {
      this.loadMap();
    }
    var lastUpdate =
      this.today.getDate() +
      "-" +
      (this.today.getMonth() + 1) +
      "-" +
      this.today.getFullYear();
    var fileDistrict = "Data COVID-19 Sulawesi Tengah_" + lastUpdate;
    regencyMap.exports().filename(fileDistrict);
    regencyMap.maxBubbleSize(35);
    regencyMap.minBubbleSize(9);
    var regencyZoom = anychart.ui.zoom();
    regencyZoom.target(regencyMap);
    regencyZoom.render();
    regencyMap.container(container);
    regencyMap.draw(true);
  },
};
</script>