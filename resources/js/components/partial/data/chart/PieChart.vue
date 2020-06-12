<template>
  <div class="w-full p-3">
    <!--Graph Card-->
    <div class="bg-white rounded-lg shadow-lg vld-parent">
      <div class="flex justify-center w-full">
        <loading
          :active.sync="isLoading"
          :is-full-page="false"
          :opacity="0.8"
          :width="120"
          height="400px"
          loader="bars"
          color="#59F"
        >
        </loading>
      </div>
      <div v-show="!isLoading" style="height:400px" class="p-5">
        <keep-alive>
          <canvas id="pie-chart" aria-label="Pie Chart Konfirmasi COVID-19" role="img"></canvas>
        </keep-alive>
      </div>
    </div>
    <!--/Graph Card-->
  </div>
</template>
<script>
import Loading from "vue-loading-overlay";
import Chart from "chart.js";
import "chartjs-plugin-datalabels";
import "chart.js/dist/Chart.min";
import { id } from "date-fns/locale";
const { format } = require("date-fns");
var dataChart = {
  type: "pie",
  data: {
    labels: ["Positif - Dirawat", "Positif - Meninggal", "Positif - Sembuh"],
    datasets: [
      {
        data: [],
        backgroundColor: [
          "rgb(54, 162, 235)",
          "rgb(255, 159, 64)",
          "rgb(75, 192, 192)"
        ]
      }
    ]
  },
  options: {
    title: {
      display: true,
      fontSize: 16,
      text: "Persentase Kasus Positif COVID-19 di Sulawesi Tengah"
    },
    tooltips: {
      enabled: true
    },
    plugins: {
      datalabels: {
        formatter: (value, ctx) => {
          let sum = 0;
          let dataArr = ctx.chart.data.datasets[0].data;
          dataArr.map(data => {
            sum += data;
          });
          let percentage = ((value * 100) / sum).toFixed(2) + "%";
          return percentage;
        },
        color: "#fff"
      }
    },
    maintainAspectRatio: false,
    responsive: true,
    legend: { position: "bottom", usePointStyle: false, display: true }
  }
};
export default {
  components: {
    Loading
  },
  props: {
    propsDataProvinsi: {
      type: Object,
      default: () => {}
    }
  },
  data() {
    return {
      isLoading: true,
      chart: null,
      jsonDataProvinsi: {}
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
        options: chartData.options
      });
    },
    getStatistic: function() {
      let data = this.jsonDataProvinsi;
      let positif = data.kumulatif.positif;
      let sembuh = data.kumulatif.sembuh;
      let meninggal = data.kumulatif.meninggal;
      let dirawat = positif - (sembuh + meninggal);
      dataChart.data.datasets[0].data = [dirawat, meninggal, sembuh];
      this.chart.update();
      this.isLoading = false;
    }
  },
  watch: {
    propsDataProvinsi() {
      this.jsonDataProvinsi = this.propsDataProvinsi;
      this.getStatistic();
    }
  },
  mounted() {
    this.createChart("pie-chart", dataChart);
  }
};
</script>