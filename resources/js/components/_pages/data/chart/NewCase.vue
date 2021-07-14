<template>
  <div class="w-full p-3">
    <!--Graph Card-->
    <div class="bg-white rounded-lg shadow-lg vld-parent">
      <div class="flex justify-center w-full">
        <loading
          :active="isLoading()"
          :is-full-page="false"
          :opacity="0.8"
          :width="120"
          :height="400"
          loader="bars"
          color="#59F"
        >
        </loading>
      </div>
      <div v-show="!isLoading()" style="height: 400px" class="p-5">
        <keep-alive>
          <canvas
            id="chart-bar"
            aria-label="Chart Kasus Baru"
            role="img"
          ></canvas>
        </keep-alive>
      </div>
    </div>
    <!--/Graph Card-->
  </div>
</template>
<script>
import Loading from "vue-loading-overlay";
import {
  Chart,
  BarController,
  DatasetController,
  BarElement,
  PointElement,
  LinearScale,
  Title,
  scales,
  Tooltip,
} from "chart.js";
Chart.register(
  BarController,
  DatasetController,
  BarElement,
  PointElement,
  LinearScale,
  Title,
  scales,
  Tooltip
);
import "chart.js/dist/Chart.min";
import { id } from "date-fns/locale";
const { format } = require("date-fns");
var dataChart = {
  type: "bar",
  data: {
    labels: [],
    datasets: [
      {
        data: [],
        label: "Positif",
        borderColor: "rgba(246, 71, 71, 0.8)",
        backgroundColor: "rgba(246, 71, 71, 1)",
      },
      {
        data: [],
        label: "Sembuh",
        borderColor: "rgba(42, 187, 155, 0.8)",
        backgroundColor: "rgba(42, 187, 155, 1)",
      },
      {
        data: [],
        label: "Meninggal",
        borderColor: "rgba(245, 171, 53, 0.8)",
        backgroundColor: "rgba(245, 171, 53, 1)",
      },
      // {
      //   data: [],
      //   label: "Negatif",
      //   borderColor: "rgba(118, 93, 105, 0.8)",
      //   backgroundColor: "rgba(118, 93, 105, 1)",
      // },
      // {
      //   data: [],
      //   label: "ODP Baru",
      //   borderColor: "rgba(65, 131, 215, 0.8)",
      //   backgroundColor: "rgba(65, 131, 215, 1)",
      // },
      // {
      //   data: [],
      //   label: "ODP Selesai",
      //   borderColor: "rgba(58, 83, 155, 0.8)",
      //   backgroundColor: "rgba(58, 83, 155, 1)",
      // },
      // {
      //   data: [],
      //   label: "PDP Baru",
      //   borderColor: "rgba(83, 51, 237, 0.8)",
      //   backgroundColor: "rgba(83, 51, 237, 1)",
      // },
      // {
      //   data: [],
      //   label: "PDP Selesai",
      //   borderColor: "rgba(102, 51, 153, 0.8)",
      //   backgroundColor: "rgba(102, 51, 153, 1)",
      // },
    ],
  },
  options: {
    title: {
      display: true,
      fontSize: 16,
      text: "Perubahan Data di Kabupaten/Kota",
    },
    plugins: {
      datalabels: {
        display: false,
      },
    },
    scales: {
      yAxes: [
        {
          stacked: true,
          gridLines: {
            display: false,
            color: "#fff",
            zeroLineColor: "#fff",
            zeroLineWidth: 0,
          },
        },
      ],
      xAxes: [
        {
          stacked: true,
          ticks: {
            beginAtZero: true,
          },
          scaleLabel: {
            display: false,
          },
          gridLines: {},
        },
      ],
    },
    maintainAspectRatio: false,
    responsive: true,
    tooltips: {
      mode: "label",
      intersect: false,
      backgroundColor: "rgba(255,255,255,1)",
      titleFontColor: "#000",
      bodyFontColor: "#000",
      borderColor: "#222",
      borderWidth: 1,
    },
    hover: { mode: "nearest", intersect: true },
    legend: { position: "bottom", usePointStyle: false, display: true },
  },
};
export default {
  components: {
    Loading,
  },
  props: {
    propsDataProvinsi: {
      type: Object,
      default: () => {},
    },
  },
  data() {
    return {
      chart: null,
      jsonDataProvinsi: {},
    };
  },
  methods: {
    createChart(chartId, chartData) {
      const ctx = document.getElementById(chartId);
      if (this.chart != null) {
        this.chart.destroy();
      }
      this.chart = new Chart(ctx, {
        type: chartData.type,
        data: chartData.data,
        options: chartData.options,
      });
    },
    isLoading() {
      return this.jsonDataProvinsi === undefined ? true : false;
    },
    getStatistic: function () {
      var data = this.isLoading() ? [] : this.jsonDataProvinsi.daftar_kabupaten;
      var districtList = [];
      var districtPositive = [];
      var districtRecovered = [];
      var districtDeath = [];
      // var districtNegative = [];
      // var districtODP = [];
      // var districtFinishedODP = [];
      // var districtPDP = [];
      // var districtFinishedPDP = [];
      for (let i = 0; i < data.length; i++) {
        districtList.push(data[i].nama);
        districtPositive.push(data[i].kasus_baru.positif);
        districtRecovered.push(data[i].kasus_baru.sembuh);
        districtDeath.push(data[i].kasus_baru.meninggal);
        // districtNegative.push(data[i].kasus_baru.negatif);
        // districtODP.push(data[i].kasus_baru.ODP);
        // districtFinishedODP.push(data[i].selesai.ODP);
        // districtPDP.push(data[i].kasus_baru.PDP);
        // districtFinishedPDP.push(data[i].selesai.PDP);
      }
      dataChart.data.labels = districtList;
      dataChart.data.datasets[0].data = districtPositive;
      dataChart.data.datasets[1].data = districtRecovered;
      dataChart.data.datasets[2].data = districtDeath;
      // dataChart.data.datasets[3].data = districtNegative;
      // dataChart.data.datasets[4].data = districtODP;
      // dataChart.data.datasets[5].data = districtFinishedODP;
      // dataChart.data.datasets[6].data = districtPDP;
      // dataChart.data.datasets[7].data = districtFinishedPDP;
      this.chart.update();
      this.chart.render();
    },
  },
  watch: {
    propsDataProvinsi() {
      this.jsonDataProvinsi = this.propsDataProvinsi;
      this.getStatistic();
    },
  },
  mounted() {
    this.jsonDataProvinsi = this.propsDataProvinsi;
    this.createChart("chart-bar", dataChart);
    this.getStatistic();
  },
};
</script>