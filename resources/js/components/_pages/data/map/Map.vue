<template>
  <div class="w-full p-3 text-xs bg-white rounded-lg shadow-lg md:text-base">
    <!--Table Card-->
    <div>
      <div
        ref="map_case"
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
var map = Anychart.map();
export default {
  props: {
    data: {
      type: Array,
      required: true,
    },
    location: {
      type: String,
      required: true,
    },
    case: {
      type: String,
      required: true,
    },
    mapType: {
      type: String,
      required: true,
    },
  },
  data() {
    return {
      today: new Date(),
      positiveRanges: [],
      recoveredRanges: [],
      deceasedRanges: [],
      underTreatmentRanges: [],
      recoveredDataset: [],
      positiveDataset: [],
      underTreatmentDataset: [],
      deathDataset: [],
      underTreatmentColor: [
        "#418a47",
        "#689849",
        "#8da64e",
        "#b1b356",
        "#d6bf63",
        "#facb75",
        "#f6b063",
        "#f19557",
        "#a12a26",
        "#991915",
        "#900000",
        "#CD0000",
      ],
      positiveColor: [
        "#e38e5d",
        "#da8266",
        "#d17567",
        "#c96962",
        "#c15d5a",
        "#ba5150",
        "#b24443",
        "#aa3735",
        "#a12a26",
        "#991915",
        "#900000",
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
      positiveKey: "",
      recoveredKey: "",
      deceasedKey: "",
      underTreatmentKey: "",
    };
  },
  watch: {
    location() {
      this.getData();
      this.initiateMap();
    },
    case() {
      this.getData();
      this.createMap();
    },
    mapType() {
      this.getData();
      this.createMap();
    },
  },
  methods: {
    resetDataset() {
      this.positiveDataset = [];
      this.recoveredDataset = [];
      this.deathDataset = [];
      this.underTreatmentDataset = [];
      this.underTreatmentRanges = [];
      this.positiveRanges = [];
      this.recoveredRanges = [];
      this.deceasedRanges = [];
    },
    getData() {
      this.resetDataset();
      var data = this.data;

      if (data && data.length > 0) {
        data.forEach((item) => {
          var identifier = "";
          let positive = 0;
          let recovered = 0;
          let deceased = 0;
          let underTreatment = 0;

          switch (this.location) {
            case "Indonesia":
              identifier = item.map_id;
              positive = item.positive;
              recovered = item.recovered;
              deceased = item.deceased;
              underTreatment = item.under_treatment;
              break;
            case "Sulawesi Tengah":
              identifier = item.kabupaten;
              positive = item.positif;
              recovered = item.sembuh;
              deceased = item.meninggal;
              underTreatment = item.dalam_perawatan;
              break;
            case "Kecamatan Balaesang":
              identifier = item.id;
              positive = item.positive;
              recovered = item.recovered;
              deceased = item.deceased;
              underTreatment = item.under_treatment;
              break;
          }

          this.positiveDataset.push({
            id: identifier,
            value: positive,
            sembuh: recovered,
            meninggal: deceased,
            dirawat: underTreatment,
          });
          this.underTreatmentDataset.push({
            id: identifier,
            positif: positive,
            sembuh: recovered,
            meninggal: deceased,
            value: underTreatment,
          });
          this.recoveredDataset.push({
            id: identifier,
            value: recovered,
            positif: positive,
            meninggal: deceased,
            dirawat: underTreatment,
          });
          this.deathDataset.push({
            id: identifier,
            value: deceased,
            positif: positive,
            sembuh: recovered,
            dirawat: underTreatment,
          });
        });
        var seriesPositive = new geostat(_.map(data, this.positiveKey));
        var seriesRecovered = new geostat(_.map(data, this.recoveredKey));
        var seriesDeath = new geostat(_.map(data, this.deceasedKey));
        var seriesUnderTreatment = new geostat(
          _.map(data, this.underTreatmentKey)
        );

        if (seriesPositive) {
          seriesPositive.getClassQuantile(9);
          var classPositive = seriesPositive.getRanges();
          classPositive.forEach((range, i) => {
            var temp = range.split(" - ");
            var min = parseInt(temp[0]);
            var max = parseInt(temp[1]);
            if (i == 0) {
              this.positiveRanges.push({
                less: min,
                color: this.positiveColor[0],
              });
              this.positiveRanges.push({
                from: min,
                to: max,
                color: this.positiveColor[i + 1],
              });
            } else if (i == classPositive.length - 1) {
              this.positiveRanges.push({
                from: min,
                to: max,
                color: this.positiveColor[i + 1],
              });
              this.positiveRanges.push({
                greater: max,
                color: this.positiveColor[i + 2],
              });
            } else {
              this.positiveRanges.push({
                from: min,
                to: max,
                color: this.positiveColor[i + 1],
              });
            }
          });
        }

        if (seriesRecovered) {
          seriesRecovered.getClassQuantile(9);
          var classRecovered = seriesRecovered.getRanges();
          classRecovered.forEach((range, i) => {
            var temp = range.split(" - ");
            var min = parseInt(temp[0]);
            var max = parseInt(temp[1]);
            if (i == 0) {
              this.recoveredRanges.push({
                less: min,
                color: this.recoveredColor[0],
              });
              this.recoveredRanges.push({
                from: min,
                to: max,
                color: this.recoveredColor[i + 1],
              });
            } else if (i == classRecovered.length - 1) {
              this.recoveredRanges.push({
                from: min,
                to: max,
                color: this.recoveredColor[i + 1],
              });
              this.recoveredRanges.push({
                greater: max,
                color: this.recoveredColor[i + 2],
              });
            } else {
              this.recoveredRanges.push({
                from: min,
                to: max,
                color: this.recoveredColor[i + 1],
              });
            }
          });
        }

        if (seriesDeath) {
          seriesDeath.getClassQuantile(9);
          var classDeceased = seriesDeath.getRanges();
          classDeceased.forEach((range, i) => {
            var temp = range.split(" - ");
            var min = parseInt(temp[0]);
            var max = parseInt(temp[1]);
            if (i == 0) {
              this.deceasedRanges.push({
                less: min,
                color: this.deathColor[0],
              });
              this.deceasedRanges.push({
                from: min,
                to: max,
                color: this.deathColor[i + 1],
              });
            } else if (i == classDeceased.length - 1) {
              this.deceasedRanges.push({
                from: min,
                to: max,
                color: this.deathColor[i + 1],
              });
              this.deceasedRanges.push({
                greater: max,
                color: this.deathColor[i + 2],
              });
            } else {
              this.deceasedRanges.push({
                from: min,
                to: max,
                color: this.deathColor[i + 1],
              });
            }
          });
        }

        if (seriesUnderTreatment) {
          seriesUnderTreatment.getClassQuantile(9);
          var classUnderTreatment = seriesUnderTreatment.getRanges();
          classUnderTreatment.forEach((range, i) => {
            var temp = range.split(" - ");
            var min = parseInt(temp[0]);
            var max = parseInt(temp[1]);
            if (i == 0) {
              this.underTreatmentRanges.push({
                less: min,
                color: this.underTreatmentColor[0],
              });
              this.underTreatmentRanges.push({
                from: min,
                to: max,
                color: this.underTreatmentColor[i + 1],
              });
            } else if (i == classUnderTreatment.length - 1) {
              this.underTreatmentRanges.push({
                from: min,
                to: max,
                color: this.underTreatmentColor[i + 1],
              });
              this.underTreatmentRanges.push({
                greater: max,
                color: this.underTreatmentColor[i + 2],
              });
            } else {
              this.underTreatmentRanges.push({
                from: min,
                to: max,
                color: this.underTreatmentColor[i + 1],
              });
            }
          });
        }
      }
    },
    renderDataToMap(name, data, color) {
      map.removeAllSeries();
      if (this.mapType == "Sebaran") {
        this.createChoropleth(name, data, color);
      } else {
        this.createBubble(name, data, color);
      }
    },
    createChoropleth(name, data, color) {
      var series = map.choropleth(data);
      if (name == "Sembuh") {
        series.colorScale(anychart.scales.ordinalColor(this.recoveredRanges));
      } else if (name == "Positif") {
        series.colorScale(anychart.scales.ordinalColor(this.positiveRanges));
      } else if (name == "Meninggal") {
        series.colorScale(anychart.scales.ordinalColor(this.deceasedRanges));
      } else {
        series.colorScale(
          anychart.scales.ordinalColor(this.underTreatmentRanges)
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
          "</tbody>" +
          "</table>"
        );
      });
      var mapTitle = map.title();
      mapTitle.enabled(true);
      mapTitle.text(
        `Peta Sebaran kasus ${this.case} COVID-19 di ${this.location}`
      );
      series.name(name + "(Choropleth)");
      series.labels(true);
      series.labels().format("{%value}");
      series.labels().fontWeight(600);
      series.hovered().fill(color[11]);
      map.colorRange().enabled(true).length(10000);
      series.selectionMode("none");
    },
    createBubble(name, data, color) {
      map.colorRange().enabled(false);
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
      mapTitle.text(
        `Peta titik kasus ${this.case} COVID-19 di ${this.location}`
      );
    },
    loadMap() {
      let file = "";
      switch (this.location) {
        case "Sulawesi Tengah":
          file = "sulteng";
          break;
        case "Indonesia":
          file = "indonesia";
          break;
        case "Kecamatan Balaesang":
          file = "balaesang";
          break;
      }

      axios.get(this.asset(`geojson/${file}.json`)).then((response) => {
        map.geoData(response.data);
      });
    },
    createMap() {
      if (this.data && this.data.length > 0) {
        switch (this.case) {
          case "Positif":
            this.renderDataToMap(
              this.case,
              this.positiveDataset,
              this.positiveColor
            );
            break;
          case "Sembuh":
            this.renderDataToMap(
              this.case,
              this.recoveredDataset,
              this.recoveredColor
            );
            break;
          case "Meninggal":
            this.renderDataToMap(this.case, this.deathDataset, this.deathColor);
            break;
          case "Dalam Perawatan":
            this.renderDataToMap(
              this.case,
              this.underTreatmentDataset,
              this.underTreatmentColor
            );
            break;
        }
      }
    },
    initiateMap() {
      var container = this.$refs["map_case"];
      this.loadMap();

      var lastUpdate =
        this.today.getDate() +
        "-" +
        (this.today.getMonth() + 1) +
        "-" +
        this.today.getFullYear();

      this.positiveKey =
        this.location == "Sulawesi Tengah" ? "positif" : "positive";
      this.recoveredKey =
        this.location == "Sulawesi Tengah" ? "sembuh" : "recovered";
      this.deceasedKey =
        this.location == "Sulawesi Tengah" ? "meninggal" : "deceased";
      this.underTreatmentKey =
        this.location == "Sulawesi Tengah"
          ? "dalam_perawatan"
          : "under_treatment";

      var dataFile = `Data COVID-19 ${this.location}_` + lastUpdate;
      map.exports().filename(dataFile);
      var mapZoom = anychart.ui.zoom();
      mapZoom.target(map);
      mapZoom.render();
      map.container(container);
      map.draw(true);
      this.createMap();
    },
  },

  mounted() {
    this.getData();
    this.initiateMap();
  },
};
</script>
