<template>
  <div class="w-full p-3 text-xs bg-white rounded-lg shadow-lg md:text-base">
    <!--Table Card-->
    <div>
      <div class="flex flex-wrap justify-center max-w-lg mx-auto text-center">
        <div class="flex items-center mr-4">
          <input
            id="regency-positif"
            type="radio"
            name="data_covid"
            value="Positif"
            class="hidden"
            checked
            v-on:change="
              createChoroplethMapLocal(
                'Positif',
                regencyPositiveDataset,
                regencyPositiveColor,
                positiveRanges
              )
            "
          />
          <label for="regency-positif" class="flex items-center cursor-pointer">
            <span
              class="inline-block w-4 h-4 mr-1 border rounded-full border-grey"
            ></span>
            Positif
          </label>
        </div>

        <div class="flex items-center mr-4">
          <input
            id="regency-dirawat"
            type="radio"
            name="data_covid"
            value="Dirawat"
            class="hidden"
            v-on:change="
              createChoroplethMapLocal(
                'Dirawat',
                regencyUnderTreatmentDataset,
                regencyPositiveColor,
                underTreatmentRanges
              )
            "
          />
          <label for="regency-dirawat" class="flex items-center cursor-pointer">
            <span
              class="inline-block w-4 h-4 mr-1 border rounded-full border-grey"
            ></span>
            Dirawat
          </label>
        </div>

        <div class="flex items-center mr-4">
          <input
            id="regency-sembuh"
            type="radio"
            name="data_covid"
            value="Sembuh"
            class="hidden"
            v-on:change="
              createChoroplethMapLocal(
                'Sembuh',
                regencyRecoveredDataset,
                regencyRecoveredColor,
                recoveredRanges
              )
            "
          />
          <label for="regency-sembuh" class="flex items-center cursor-pointer">
            <span
              class="inline-block w-4 h-4 mr-1 border rounded-full border-grey"
            ></span>
            Sembuh
          </label>
        </div>

        <div class="flex items-center mr-4">
          <input
            id="regency-meninggal"
            type="radio"
            name="data_covid"
            value="Meninggal"
            class="hidden"
            v-on:change="
              createChoroplethMapLocal(
                'Meninggal',
                regencyDeathDataset,
                regencyDeathColor,
                deceasedRanges
              )
            "
          />
          <label
            for="regency-meninggal"
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
            id="regency-odp"
            type="radio"
            name="data_covid"
            value="ODP"
            class="hidden"
            v-on:change="
              createChoroplethMapLocal(
                'ODP',
                regencyODPDataset,
                regencyODPColor,
                odpRanges
              )
            "
          />
          <label for="regency-odp" class="flex items-center cursor-pointer">
            <span
              class="inline-block w-4 h-4 mr-1 border rounded-full border-grey"
            ></span>
            ODP
          </label>
        </div>

        <div class="flex items-center mr-4">
          <input
            id="regency-pdp"
            type="radio"
            name="data_covid"
            value="PDP"
            class="hidden"
            v-on:change="
              createChoroplethMapLocal(
                'PDP',
                regencyPDPDataset,
                regencyPDPColor,
                pdpRanges
              )
            "
          />
          <label for="regency-pdp" class="flex items-center cursor-pointer">
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
import geostat from "geostats";
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
      positiveRanges: [],
      recoveredRanges: [],
      deceasedRanges: [],
      pdpRanges: [],
      odpRanges: [],
      underTreatmentRanges: [],
      regencyRecoveredDataset: [],
      regencyPositiveDataset: [],
      regencyUnderTreatmentDataset: [],
      regencyDeathDataset: [],
      regencyODPDataset: [],
      regencyPDPDataset: [],
      regencyPositiveColor: [
        "#21912b",
        "#6ba73b",
        "#fffc9c",
        "#efca61",
        "#df962e",
        "#ce5e05",
        "#d60000",
        "#b80000",
        "#808080",
      ],
      regencyRecoveredColor: [
        "#d0eac8",
        "#b6d8ac",
        "#9cc590",
        "#82b376",
        "#69a25b",
        "#4e9041",
        "#317e26",
        "#006d02",
        "#808080",
      ],
      regencyDeathColor: [
        "#fcddbe",
        "#fcd3a7",
        "#fcc991",
        "#fbbf7a",
        "#f8b663",
        "#f5ac4b",
        "#f1a230",
        "#ed9900",
        "#808080",
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
        "#808080",
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
        "#808080",
      ],
    };
  },
  methods: {
    getDistrictData: function () {
      if (this.regencies != null) {
        if (this.regencyPositiveDataset.length > 0) {
          this.regencyPositiveDataset = [];
          this.regencyRecoveredDataset = [];
          this.regencyDeathDataset = [];
          this.regencyODPDataset = [];
          this.regencyPDPDataset = [];
        }

        this.regencies.forEach((regency) => {
          this.regencyPositiveDataset.push({
            id: regency.kabupaten,
            value: regency.positif,
            sembuh: regency.sembuh,
            meninggal: regency.meninggal,
            dirawat: regency.dalam_perawatan,
            ODP: regency.dalam_pemantauan,
            PDP: regency.dalam_pengawasan,
          });
          this.regencyUnderTreatmentDataset.push({
            id: regency.kabupaten,
            positif: regency.positif,
            sembuh: regency.sembuh,
            meninggal: regency.meninggal,
            value: regency.dalam_perawatan,
            ODP: regency.dalam_pemantauan,
            PDP: regency.dalam_pengawasan,
          });
          this.regencyRecoveredDataset.push({
            id: regency.kabupaten,
            value: regency.sembuh,
            positif: regency.positif,
            meninggal: regency.meninggal,
            dirawat: regency.dalam_perawatan,
            ODP: regency.dalam_pemantauan,
            PDP: regency.dalam_pengawasan,
          });
          this.regencyDeathDataset.push({
            id: regency.kabupaten,
            value: regency.meninggal,
            positif: regency.positif,
            sembuh: regency.sembuh,
            dirawat: regency.dalam_perawatan,
            ODP: regency.dalam_pemantauan,
            PDP: regency.dalam_pengawasan,
          });
          this.regencyODPDataset.push({
            id: regency.kabupaten,
            value: regency.dalam_pemantauan,
            positif: regency.positif,
            sembuh: regency.sembuh,
            meninggal: regency.meninggal,
            dirawat: regency.dalam_perawatan,
            PDP: regency.dalam_pengawasan,
          });
          this.regencyPDPDataset.push({
            id: regency.kabupaten,
            value: regency.dalam_pengawasan,
            positif: regency.positif,
            sembuh: regency.sembuh,
            meninggal: regency.meninggal,
            dirawat: regency.dalam_perawatan,
            ODP: regency.dalam_pemantauan,
          });
        });
        var seriesPositive = new geostat(_.map(this.regencies, "positif"));
        var seriesRecovered = new geostat(_.map(this.regencies, "sembuh"));
        var seriesDeath = new geostat(_.map(this.regencies, "meninggal"));
        var seriesUnderTreatment = new geostat(
          _.map(this.regencies, "dalam_perawatan")
        );
        var seriesODP = new geostat(_.map(this.regencies, "dalam_pemantauan"));
        var seriesPDP = new geostat(_.map(this.regencies, "dalam_pengawasan"));

        seriesPositive.getClassQuantile(6);
        seriesRecovered.getClassQuantile(6);
        seriesDeath.getClassQuantile(6);
        seriesUnderTreatment.getClassQuantile(6);
        seriesODP.getClassQuantile(6);
        seriesPDP.getClassQuantile(6);

        var classPositive = seriesPositive.getRanges();
        var classRecovered = seriesRecovered.getRanges();
        var classDeceased = seriesDeath.getRanges();
        var classUnderTreatment = seriesUnderTreatment.getRanges();
        var classODP = seriesODP.getRanges();
        var classPDP = seriesPDP.getRanges();

        classPositive.forEach((range, i) => {
          var temp = range.split(" - ");
          var min = parseInt(temp[0]);
          var max = parseInt(temp[1]);
          if (i == 0) {
            this.positiveRanges.push({
              less: min,
              color: this.regencyPositiveColor[0],
            });
            this.positiveRanges.push({
              from: min,
              to: max,
              color: this.regencyPositiveColor[i + 1],
            });
          } else if (i == classPositive.length - 1) {
            this.positiveRanges.push({
              from: min,
              to: max,
              color: this.regencyPositiveColor[i + 1],
            });
            this.positiveRanges.push({
              greater: max,
              color: this.regencyPositiveColor[i + 2],
            });
          } else {
            this.positiveRanges.push({
              from: min,
              to: max,
              color: this.regencyPositiveColor[i + 1],
            });
          }
        });
        classRecovered.forEach((range, i) => {
          var temp = range.split(" - ");
          var min = parseInt(temp[0]);
          var max = parseInt(temp[1]);
          if (i == 0) {
            this.recoveredRanges.push({
              less: min,
              color: this.regencyRecoveredColor[0],
            });
            this.recoveredRanges.push({
              from: min,
              to: max,
              color: this.regencyRecoveredColor[i + 1],
            });
          } else if (i == classRecovered.length - 1) {
            this.recoveredRanges.push({
              from: min,
              to: max,
              color: this.regencyRecoveredColor[i + 1],
            });
            this.recoveredRanges.push({
              greater: max,
              color: this.regencyRecoveredColor[i + 2],
            });
          } else {
            this.recoveredRanges.push({
              from: min,
              to: max,
              color: this.regencyRecoveredColor[i + 1],
            });
          }
        });
        classDeceased.forEach((range, i) => {
          var temp = range.split(" - ");
          var min = parseInt(temp[0]);
          var max = parseInt(temp[1]);
          if (i == 0) {
            this.deceasedRanges.push({
              less: min,
              color: this.regencyDeathColor[0],
            });
            this.deceasedRanges.push({
              from: min,
              to: max,
              color: this.regencyDeathColor[i + 1],
            });
          } else if (i == classDeceased.length - 1) {
            this.deceasedRanges.push({
              from: min,
              to: max,
              color: this.regencyDeathColor[i + 1],
            });
            this.deceasedRanges.push({
              greater: max,
              color: this.regencyDeathColor[i + 2],
            });
          } else {
            this.deceasedRanges.push({
              from: min,
              to: max,
              color: this.regencyDeathColor[i + 1],
            });
          }
        });
        classUnderTreatment.forEach((range, i) => {
          var temp = range.split(" - ");
          var min = parseInt(temp[0]);
          var max = parseInt(temp[1]);
          if (i == 0) {
            this.underTreatmentRanges.push({
              less: min,
              color: this.regencyPositiveColor[0],
            });
            this.underTreatmentRanges.push({
              from: min,
              to: max,
              color: this.regencyPositiveColor[1],
            });
          } else if (i == classUnderTreatment.length - 1) {
            this.underTreatmentRanges.push({
              from: min,
              to: max,
              color: this.regencyPositiveColor[i + 1],
            });
            this.underTreatmentRanges.push({
              greater: max,
              color: this.regencyPositiveColor[i + 2],
            });
          } else {
            this.underTreatmentRanges.push({
              from: min,
              to: max,
              color: this.regencyPositiveColor[i + 1],
            });
          }
        });
        classODP.forEach((range, i) => {
          var temp = range.split(" - ");
          var min = parseInt(temp[0]);
          var max = parseInt(temp[1]);
          if (i == 0) {
            this.odpRanges.push({
              less: min,
              color: this.regencyODPColor[0],
            });
            this.odpRanges.push({
              from: min,
              to: max,
              color: this.regencyODPColor[i + 1],
            });
          } else if (i == classODP.length - 1) {
            this.odpRanges.push({
              from: min,
              to: max,
              color: this.regencyODPColor[i + 1],
            });
            this.odpRanges.push({
              greater: max,
              color: this.regencyODPColor[i + 2],
            });
          } else {
            this.odpRanges.push({
              from: min,
              to: max,
              color: this.regencyODPColor[i + 1],
            });
          }
        });
        classPDP.forEach((range, i) => {
          var temp = range.split(" - ");
          var min = parseInt(temp[0]);
          var max = parseInt(temp[1]);
          if (i == 0) {
            this.pdpRanges.push({
              less: min,
              color: this.regencyPDPColor[0],
            });
            this.pdpRanges.push({
              from: min,
              to: max,
              color: this.regencyPDPColor[i + 1],
            });
          } else if (i == classPDP.length - 1) {
            this.pdpRanges.push({
              from: min,
              to: max,
              color: this.regencyPDPColor[i + 1],
            });
            this.pdpRanges.push({
              greater: max,
              color: this.regencyPDPColor[i + 2],
            });
          } else {
            this.pdpRanges.push({
              from: min,
              to: max,
              color: this.regencyPDPColor[i + 1],
            });
          }
        });
      }
    },
    createChoroplethMapLocal: function (name, data, color, range) {
      regencyMap.removeAllSeries();
      var regencySeries = regencyMap.choropleth(data);
      regencySeries.labels(true);
      regencySeries.labels().format("{%value}");
      regencySeries.labels().fontWeight(600);
      regencySeries.labels().fontColor("Black");
      regencySeries.colorScale(anychart.scales.ordinalColor(range));
      regencySeries.tooltip().titleFormat(function (e) {
        return (
          '<span class="font-bold text-left text-white">' +
          e.getData("id") +
          "</span>"
        );
      });
      regencySeries.tooltip().useHtml(true);
      regencySeries.tooltip().background().fill("#fff");
      regencySeries.tooltip().allowLeaveChart(true);
      regencySeries.tooltip().format(function (e) {
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
        var underTreatment =
          e.getData("dirawat") == null
            ? e.getData("value")
            : e.getData("dirawat");
        let tooltipHtml =
          '<table class="flex text-xs text-left text-white table-auto justify-left">' +
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
          '<td class="px-1">' +
          "ODP Aktif</td>" +
          '<td class="px-1 font-bold">' +
          ODP +
          "</td>" +
          "</tr>" +
          "<tr>" +
          '<td class="px-1">' +
          "PDP Aktif</td>" +
          '<td class="px-1 font-bold">' +
          PDP +
          "</td>" +
          "</tr>" +
          "</tbody>" +
          "</table>";
        return tooltipHtml;
      });
      regencySeries.name(name + "(Choropleth)");
      regencySeries.hovered().fill(color[8]);
      regencyMap.colorRange(true);
      regencyMap.colorRange().length(1000);
      regencySeries.selectionMode("none");
      var regencyTitle = regencyMap.title();
      regencyTitle.enabled(true);
      regencyTitle.text(
        "Choropleth Map kasus " + name + " COVID-19 di Sulawesi Tengah"
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
    var regencyZoom = anychart.ui.zoom();
    regencyZoom.target(regencyMap);
    regencyZoom.render();
    regencyMap.container(container);
    regencyMap.draw(true);
  },
};
</script>
