<template>
  <div class="w-full p-3">
    <!--Graph Card-->
    <div class="bg-white rounded-lg shadow-lg">
      <div class="p-2 text-gray-800 border-b-2 rounded-tl-lg rounded-tr-lg">
        <h5 class="text-sm font-bold md:text-xl">Perubahan Data Hari Ini</h5>
      </div>
      <div class="flex justify-center w-full">
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
          <canvas id="chart-bar" aria-label="Chart Kasus Baru" role="img"></canvas>
        </keep-alive>
      </div>
    </div>
    <!--/Graph Card-->
  </div>
</template>
<script>
import Loading from "vue-loading-overlay";
import Chart from "chart.js";
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
        backgroundColor: "rgba(246, 71, 71, 1)"
      },
      {
        data: [],
        label: "Sembuh",
        borderColor: "rgba(42, 187, 155, 0.8)",
        backgroundColor: "rgba(42, 187, 155, 1)"
      },
      {
        data: [],
        label: "Meninggal",
        borderColor: "rgba(245, 171, 53, 0.8)",
        backgroundColor: "rgba(245, 171, 53, 1)"
      },
      {
        data: [],
        label: "ODP Baru",
        borderColor: "rgba(65, 131, 215, 0.8)",
        backgroundColor: "rgba(65, 131, 215, 1)"
      },
      {
        data: [],
        label: "ODP Selesai",
        borderColor: "rgba(58, 83, 155, 0.8)",
        backgroundColor: "rgba(58, 83, 155, 1)"
      },
      {
        data: [],
        label: "PDP Baru",
        borderColor: "rgba(83, 51, 237, 0.8)",
        backgroundColor: "rgba(83, 51, 237, 1)"
      },
      {
        data: [],
        label: "PDP Selesai",
        borderColor: "rgba(102, 51, 153, 0.8)",
        backgroundColor: "rgba(102, 51, 153, 1)"
      }
    ]
  },
  options: {
    plugins: {
      datalabels: {
        display: false
      }
    },
    scales: {
      yAxes: [
        {
          stacked: true,
          gridLines: {
            display: false,
            color: "#fff",
            zeroLineColor: "#fff",
            zeroLineWidth: 0
          }
        }
      ],
      xAxes: [
        {
          stacked: true,
          ticks: {
            beginAtZero: true
          },
          scaleLabel: {
            display: false
          },
          gridLines: {}
        }
      ]
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
      borderWidth: 1
    },
    hover: { mode: "nearest", intersect: true },
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
        var data = response.data.data.daftar_kabupaten;
        var districtList = [];
        var districtPositive = [];
        var districtRecovered = [];
        var districtDeath = [];
        var districtODP = [];
        var districtFinishedODP = [];
        var districtPDP = [];
        var districtFinishedPDP = [];
        for (let i = 0; i < data.length; i++) {
          districtList.push(data[i].nama);
          districtPositive.push(data[i].kasus_baru.positif);
          districtRecovered.push(data[i].kasus_baru.sembuh);
          districtDeath.push(data[i].kasus_baru.meninggal);
          districtODP.push(data[i].kasus_baru.ODP);
          districtFinishedODP.push(data[i].selesai.ODP);
          districtPDP.push(data[i].kasus_baru.PDP);
          districtFinishedPDP.push(data[i].selesai.PDP);
        }
        dataChart.data.labels = districtList;
        dataChart.data.datasets[0].data = districtPositive;
        dataChart.data.datasets[1].data = districtRecovered;
        dataChart.data.datasets[2].data = districtDeath;
        dataChart.data.datasets[3].data = districtODP;
        dataChart.data.datasets[4].data = districtFinishedODP;
        dataChart.data.datasets[5].data = districtPDP;
        dataChart.data.datasets[6].data = districtFinishedPDP;
        this.chart.update();
        this.isLoading = false;
      });
    },
    updater: function() {
      setInterval(() => {
        this.createChart("chart-bar", dataChart);
        this.getStatistic();
      }, 5 * 60 * 1000);
    }
  },

  mounted() {
    this.createChart("chart-bar", dataChart);
    this.getStatistic();
    this.updater();
  }
};
</script>