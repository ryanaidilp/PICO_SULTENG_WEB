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
import geostat from "geostats";
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
      positiveRanges: [],
      recoveredRanges: [],
      deceasedRanges: [],
      underTreatmentRanges: [],
      underTreatmentDataset: [],
      underTreatmentColor: [
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
    };
  },
  methods: {
    loadGeoJson: function () {
      axios.get(this.asset("geojson/indonesia.json")).then((response) => {
        map.geoData(response.data);
      });
    },
    createChoropleth: function (name, data, color) {
      map.removeAllSeries();
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
          value: province.positive,
          sembuh: province.recovered,
          meninggal: province.deceased,
          dirawat: province.under_treatment,
        });
        this.underTreatmentDataset.push({
          id: province.map_id,
          positif: province.positive,
          sembuh: province.recovered,
          meninggal: province.deceased,
          value: province.under_treatment,
        });
        this.recoveredDataset.push({
          id: province.map_id,
          value: province.recovered,
          positif: province.positive,
          meninggal: province.deceased,
          dirawat: province.under_treatment,
        });
        this.deathDataset.push({
          id: province.map_id,
          value: province.deceased,
          positif: province.positive,
          sembuh: province.recovered,
          dirawat: province.under_treatment,
        });
      });
      var seriesPositive = new geostat(_.map(data, "positive"));
      var seriesRecovered = new geostat(_.map(data, "recovered"));
      var seriesDeath = new geostat(_.map(data, "deceased"));
      var seriesUnderTreatment = new geostat(_.map(data, "under_treatment"));

      seriesPositive.getClassQuantile(9);
      seriesRecovered.getClassQuantile(9);
      seriesDeath.getClassQuantile(9);
      seriesUnderTreatment.getClassQuantile(9);

      var classPositive = seriesPositive.getRanges();
      var classRecovered = seriesRecovered.getRanges();
      var classDeceased = seriesDeath.getRanges();
      var classUnderTreatment = seriesUnderTreatment.getRanges();

      classPositive.forEach((range, i) => {
        var temp = range.split(" - ");
        var min = parseInt(temp[0]);
        var max = parseInt(temp[1]);
        if (i == 0) {
          this.positiveRanges.push({ less: min, color: this.positiveColor[0] });
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
      classDeceased.forEach((range, i) => {
        var temp = range.split(" - ");
        var min = parseInt(temp[0]);
        var max = parseInt(temp[1]);
        if (i == 0) {
          this.deceasedRanges.push({ less: min, color: this.deathColor[0] });
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
