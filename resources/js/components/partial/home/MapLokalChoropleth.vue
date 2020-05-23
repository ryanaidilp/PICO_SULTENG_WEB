<template>
  <div class="w-full p-3 text-xs bg-white rounded-lg shadow-lg md:text-base">
    <!--Table Card-->
    <div>
      <div class="flex flex-wrap justify-center max-w-md mx-auto text-center">
        <div class="flex items-center mr-4">
          <input
            id="district-positif"
            type="radio"
            name="data_covid"
            value="Positif"
            class="hidden"
            checked
            v-on:change="createChoroplethMapLocal('Positif', districtPositiveDataset, districtPositiveColor)"
          />
          <label for="district-positif" class="flex items-center cursor-pointer">
            <span class="inline-block w-4 h-4 mr-1 border rounded-full border-grey"></span>
            Positif
          </label>
        </div>

        <div class="flex items-center mr-4">
          <input
            id="district-sembuh"
            type="radio"
            name="data_covid"
            value="Sembuh"
            class="hidden"
            v-on:change="createChoroplethMapLocal('Sembuh', districtRecoveredDataset, districtRecoveredColor)"
          />
          <label for="district-sembuh" class="flex items-center cursor-pointer">
            <span class="inline-block w-4 h-4 mr-1 border rounded-full border-grey"></span>
            Sembuh
          </label>
        </div>

        <div class="flex items-center mr-4">
          <input
            id="district-meninggal"
            type="radio"
            name="data_covid"
            value="Meninggal"
            class="hidden"
            v-on:change="createChoroplethMapLocal('Meninggal', districtDeathDataset, districtDeathColor)"
          />
          <label for="district-meninggal" class="flex items-center cursor-pointer">
            <span class="inline-block w-4 h-4 mr-1 border rounded-full border-grey"></span>
            Meninggal
          </label>
        </div>

        <div class="flex items-center mr-4">
          <input
            id="district-odp"
            type="radio"
            name="data_covid"
            value="ODP"
            class="hidden"
            v-on:change="createChoroplethMapLocal('ODP', districtODPDataset, districtODPColor)"
          />
          <label for="district-odp" class="flex items-center cursor-pointer">
            <span class="inline-block w-4 h-4 mr-1 border rounded-full border-grey"></span>
            ODP
          </label>
        </div>

        <div class="flex items-center mr-4">
          <input
            id="district-pdp"
            type="radio"
            name="data_covid"
            value="PDP"
            class="hidden"
            v-on:change="createChoroplethMapLocal('PDP', districtPDPDataset, districtPDPColor)"
          />
          <label for="district-pdp" class="flex items-center cursor-pointer">
            <span class="inline-block w-4 h-4 mr-1 border rounded-full border-grey"></span>
            PDP
          </label>
        </div>
      </div>
      <div ref="map_kabupaten_case" class="w-full mt-2 rounded-b" style="height: 500px;"></div>
    </div>
    <!--/table Card-->
  </div>
</template>

<script>
/* eslint-disable */
import Anychart from "anychart";
var districtMap = anychart.map();
export default {
  data() {
    return {
      today: new Date(),
      districtRecoveredDataset: [],
      districtPositiveDataset: [],
      districtDeathDataset: [],
      districtODPDataset: [],
      districtPDPDataset: [],
      districtPositiveColor: [
        "#F9CACD",
        "#F4A8AC",
        "#EE868B",
        "#E76569",
        "#DF4346",
        "#820029",
        "#6E002C",
        "#CD0000"
      ],
      districtRecoveredColor: [
        "#DEEDCF",
        "#BFE1B0",
        "#99D492",
        "#74C67A",
        "#56B870",
        "#0E4D64",
        "#0A2F51",
        "#1D9A6C"
      ],
      districtDeathColor: [
        "#FFF3BA",
        "#FFEB9B",
        "#FFE07C",
        "#FFD45D",
        "#FFC63E",
        "#E1851E",
        "#DA7F25",
        "#FFA500"
      ],
      districtODPColor: [
        "#DFE4F8",
        "#BECCF1",
        "#9FB5E8",
        "#80A2DF",
        "#6190D5",
        "#174689",
        "#0E2C63",
        "#2773BF"
      ],
      districtPDPColor: [
        "#DEADD0",
        "#D291C3",
        "#C574B6",
        "#B757AB",
        "#A93AA1",
        "#720060",
        "#65004C",
        "#88008B"
      ]
    };
  },
  methods: {
    getDistrictData: function() {
      axios.get("/corona/api/kabupaten").then(response => {
        if (this.districtPositiveDataset.length > 0) {
          this.districts = null;
          this.districtPositiveDataset = [];
          this.districtRecoveredDataset = [];
          this.districtDeathDataset = [];
          this.districtODPDataset = [];
          this.districtPDPDataset = [];
        }
        this.districts = response.data.data;

        this.districts.forEach(district => {
          this.districtPositiveDataset.push({
            id: district.kabupaten,
            value: district.positif,
            sembuh: district.sembuh,
            meninggal: district.meninggal,
            ODP: district.dalam_pemantauan,
            PDP: district.dalam_pengawasan
          });
          this.districtRecoveredDataset.push({
            id: district.kabupaten,
            value: district.sembuh,
            positif: district.positif,
            meninggal: district.meninggal,
            ODP: district.dalam_pemantauan,
            PDP: district.dalam_pengawasan
          });
          this.districtDeathDataset.push({
            id: district.kabupaten,
            value: district.meninggal,
            positif: district.positif,
            sembuh: district.sembuh,
            ODP: district.dalam_pemantauan,
            PDP: district.dalam_pengawasan
          });
          this.districtODPDataset.push({
            id: district.kabupaten,
            value: district.dalam_pemantauan,
            positif: district.positif,
            sembuh: district.sembuh,
            meninggal: district.meninggal,
            PDP: district.dalam_pengawasan
          });
          this.districtPDPDataset.push({
            id: district.kabupaten,
            value: district.dalam_pengawasan,
            positif: district.positif,
            sembuh: district.sembuh,
            meninggal: district.meninggal,
            ODP: district.dalam_pemantauan
          });
        });
      });
    },
    createChoroplethMapLocal: function(name, data, color) {
      districtMap.removeAllSeries();
      var districtSeries = districtMap.choropleth(data);
      districtSeries.labels(true);
      districtSeries.labels().format("{%value}");
      districtSeries.labels().fontWeight(600);
      districtSeries.labels().fontColor("Black");
      districtSeries.colorScale(
        anychart.scales.ordinalColor([
          { less: 0, color: color[0] },
          { from: 0, to: 10, color: color[1] },
          { from: 10, to: 20, color: color[2] },
          { from: 20, to: 30, color: color[3] },
          { from: 30, to: 40, color: color[4] },
          { from: 40, to: 50, color: color[5] },
          { greater: 50, color: color[6] }
        ])
      );
      districtSeries.tooltip().titleFormat(function(e) {
        return e.getData("id");
      });
      districtSeries.tooltip().hideDelay(5000);
      districtSeries.tooltip().format(function(e) {
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
        var ODP =
          e.getData("ODP") == null ? e.getData("value") : e.getData("ODP");
        var PDP =
          e.getData("PDP") == null ? e.getData("value") : e.getData("PDP");
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
          meninggal +
          "\n" +
          "ODP Aktif: " +
          ODP +
          "\n" +
          "PDP Aktif: " +
          PDP
        );
      });
      districtSeries.name(name + "(Choropleth)");
      districtSeries.hovered().fill(color[7]);
      districtMap.colorRange(true);
      districtMap.colorRange().length(1000);
      districtSeries.selectionMode("none");
      var districtTitle = districtMap.title();
      districtTitle.enabled(true);
      districtTitle.text(
        "Choropleth Map kasus " + name + " COVID-19 di Sulawesi Tengah"
      );
    },
    loadMap: function() {
      axios.get("/corona/public/assets/geojson/sulteng.json").then(response => {
        districtMap.geoData(response.data);
      });
    },
    intervalUpdater: function() {
      setInterval(() => {
        this.getDistrictData();
      }, 5 * 60 * 1000);
    }
  },

  mounted() {
    var container = this.$refs["map_kabupaten_case"];
    this.getDistrictData();
    if (districtMap.geoData() == null) {
      this.loadMap();
    }
    this.intervalUpdater();
    var lastUpdate =
      this.today.getDate() +
      "-" +
      (this.today.getMonth() + 1) +
      "-" +
      this.today.getFullYear();
    var fileDistrict = "Data COVID-19 Sulawesi Tengah_" + lastUpdate;
    districtMap.exports().filename(fileDistrict);
    districtMap.maxBubbleSize(35);
    districtMap.minBubbleSize(9);
    var districtZoom = anychart.ui.zoom();
    districtZoom.target(districtMap);
    districtZoom.render();
    districtMap.container(container);
    districtMap.draw(true);
  }
};
</script>