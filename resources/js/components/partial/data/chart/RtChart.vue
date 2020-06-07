<template>
  <div class="w-full p-3 pb-8">
    <!--Graph Card-->
    <div class="relative bg-white rounded-lg shadow-lg">
      <div class="absolute flex justify-center w-full">
      <loading
        :active.sync="isLoading"
        :opacity="0.8"
        :height="400"
        :width="50"
        loader="spinner"
        color="#59F"
      ></loading>
    </div>
      <div style="height:400px" class="p-5">
        <keep-alive>
          <canvas id="rt-chart" aria-label="Chart Angka Reproduksi" role="img"></canvas>
        </keep-alive>
      </div>
      <div class="pb-8 mb-8 text-center">
        <span class="mx-4 text-xs md:text-base">
          <i class="mr-2 text-lg text-blue-600 fas fa-minus"></i>Rt (Angka Reproduksi Efektif)
          <i class="ml-4 mr-2 text-lg fas fa-square-full"></i>Selang Kepercayaan (95%)
        </span>
        <p class="mx-8 mt-8 text-sm text-left text-justify border-t-2">
          *Keterangan :
          <br />Rt merupakan rata-rata orang yang bisa terinfeksi dari satu pasien positif usai intervensi pemerintah.
          Sebagai contoh, Rt = 2 berarti satu orang yang terinfeksi bisa menulari rata-rata dua orang lainnya.
          Rt dipergunakan sebagai syarat mutlak pelonggaran PSBB di Indonesia. Sesuai ketetapan Badan Perencanaan Pembangunan Nasional (Bappenas), angka Rt di sebuah wilayah harus di bawah 1 selama 14 hari berturut-turut sebelum relaksasi PSBB diberi lampu hijau.
        </p>
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
  data: {
    labels: [],
    datasets: [
      {
        label: "Rt",
        type: "line",
        data: [],
        fill: false,
        pointRadius: 1,
        pointBackgroundColor: "rgba(65, 131, 215, 1)",
        borderColor: "rgba(65, 131, 215, 1)"
      },
      {
        data: [],
        type: "line",
        fill: true,
        pointRadius: 1,
        yAxisID: "rt-axis",
        backgroundColor: "rgba(255, 255, 255, 1)",
        borderColor: "rgba(118, 93, 105, 0.2)"
      },
      {
        data: [],
        type: "line",
        fill: true,
        pointRadius: 1,
        backgroundColor: "rgba(118, 93, 105, 0.2)",
        borderColor: "rgba(118, 93, 105, 0.2)"
      }
    ]
  },
  options: {
    title: {
      display: true,
      fontSize: 16,
      text: [
        "Angka Reproduksi (Rt) COVID-19 di Sulawesi Tengah",
        "Dihitung dengan metode Time-Dependent (Wallinga & Teunis)."
      ]
    },
    plugins: {
      datalabels: {
        display: false
      }
    },
    scales: {
      yAxes: [
        {
          id: "rt-axis",
          position: "right",
          display: true,
          scaleLabel: {
            display: true,
            labelString: "Angka Reproduksi Efektif (Rt)"
          }
        }
      ],
      xAxes: [
        {
          ticks: {
            callback: function(value, index, values) {
              var data = value.split(" ");
              return data[0] + data[1];
            },
            maxRotation: 90,
            minRotation: 90
          },
          display: true,
          stacked: true,
          scaleLabel: { display: true, labelString: "Tanggal" }
        }
      ]
    },
    maintainAspectRatio: false,
    responsive: true,
    tooltips: {
      filter: function(tooltipItem) {
        if (tooltipItem.datasetIndex == 0) {
          return true;
        } else {
          return false;
        }
      },
      mode: "nearest",
      intersect: false,
      backgroundColor: "rgba(255,255,255,1)",
      titleFontColor: "#000",
      bodyFontColor: "#000",
      borderColor: "#222",
      borderWidth: 1
    },
    hover: { mode: "nearest", intersect: false },
    legend: { position: "bottom", usePointStyle: true, display: false }
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
      var baseurl = "statistik";
      axios.get("/corona/api/" + baseurl).then(response => {
        var data = response.data.data;
        var label = [];
        var rt_value = [];
        var rt_upper = [];
        var rt_lower = [];

        for (let i = 0; i < data.length; i++) {
          var abs = data[i].tanggal.split("/");
          var tanggal = null;
          if (abs.length >= 3) {
            var date = abs[2].split(" ");
            date = date[0];
            var month = abs[1];
            var year = abs[0];
            tanggal = year + "-" + month + "-" + date;
          } else {
            tanggal = data[i].tanggal;
          }
          var tanggal = format(Date.parse(tanggal), "dd MMM yyyy", {
            locale: id
          });
          label.push(tanggal);
          rt_value.push(data[i].rekap.Rt);
          rt_upper.push(data[i].rekap.Rt_upper);
          rt_lower.push(data[i].rekap.Rt_lower);
        }
        dataChart.data.datasets[0].data = rt_value;
        dataChart.data.datasets[1].data = rt_lower;
        dataChart.data.datasets[2].data = rt_upper;
        dataChart.data.labels = label;
        this.chart.update();
        this.isLoading = false;
      });
    },
    updater: function() {
      setInterval(() => {
        this.createChart("rt-chart", dataChart);
        this.getStatistic();
      }, 5 * 60 * 1000);
    }
  },
  mounted() {
    this.createChart("rt-chart", dataChart);
    this.getStatistic();
    this.updater();
  }
};
</script>