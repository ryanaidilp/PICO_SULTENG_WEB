<template>
  <div class="w-full p-3">
    <!--Graph Card-->
    <div class="bg-white rounded-lg shadow-lg">
      <div class="p-2 text-gray-800 border-b-2 rounded-tl-lg rounded-tr-lg">
        <h5 class="text-sm font-bold md:text-xl">Perbandingan</h5>
      </div>
      <div class="absolute flex justify-center w-full">
        <loading
          :active.sync="isLoading"
          :opacity="0.8"
          :height="200"
          :width="128"
          loader="spinner"
          color="#59F"
        ></loading>
      </div>
      <div style="height:400px" class="p-5">
        <keep-alive>
          <canvas id="pie-chart"></canvas>
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
    labels: ["Sedang Dirawat", "Meninggal", "Sembuh"],
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
  props: ["kasus", "wilayah"],
  data() {
    return {
      isLoading: false,
      chart: null
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
      this.isLoading = true;
      axios.get("/corona/api/statistik/terkini").then(response => {
        var data = response.data.data;
        var positif = data.kumulatif.positif;
        var sembuh = data.kumulatif.sembuh;
        var meninggal = data.kumulatif.meninggal;
        var dirawat = positif - (sembuh + meninggal);
        dataChart.data.datasets[0].data = [dirawat, meninggal, sembuh];
        this.chart.update();
        this.isLoading = false;
      });
    },
    updater: function() {
      setInterval(() => {
        this.createChart("pie-chart", dataChart);
        this.getStatistic();
      }, 5 * 60 * 1000);
    }
  },

  mounted() {
    this.createChart("pie-chart", dataChart);
    this.getStatistic();
    this.updater();
  }
};
</script>