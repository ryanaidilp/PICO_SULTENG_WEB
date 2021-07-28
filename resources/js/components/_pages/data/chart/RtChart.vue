<template>
  <div class="w-full p-3 pb-8">
    <!--Graph Card-->
    <div class="bg-white rounded-lg shadow-lg vld-parent">
      <button
        @click="resetZoom"
        class="float-right px-4 py-2 mx-4 mt-4 text-blue-500 transition-all duration-300 bg-gray-200 rounded-md  hover:bg-gray-300"
      >
        Reset Zoom
      </button>

      <div v-if="isLoading()" class="vld-icon" style="height: 400px">
        <loading
          :active="isLoading()"
          :is-full-page="false"
          :opacity="0.8"
          :height="400"
          color="#59F"
        >
        </loading>
      </div>
      <div v-show="!isLoading()" style="height: 400px" class="p-5 mt-4">
        <keep-alive>
          <canvas
            id="rt-chart"
            aria-label="Chart Angka Reproduksi"
            role="img"
          ></canvas>
        </keep-alive>
      </div>

      <div class="mt-4 text-center">
        <span class="m-4 text-xs md:text-base">
          <i class="mr-2 text-lg text-blue-600 fas fa-minus"></i>Rt (Angka
          Reproduksi Efektif)
          <i class="ml-4 mr-2 text-lg text-gray-200 fas fa-square-full"></i
          >Selang Kepercayaan (95%)
        </span>
        <hr />
        <p class="mx-8 mt-8 text-sm text-justify">
          *Keterangan :
          <br />
          <b>Rt</b> merupakan
          <b>rata-rata orang yang bisa terinfeksi dari satu pasien positif</b>
          usai intervensi pemerintah. Sebagai contoh, Rt = 2 berarti
          <b
            >satu orang yang terinfeksi bisa menulari rata-rata dua orang
            lainnya</b
          >. Rt adalah indikator yang digunakan untuk mengukur besar penularan
          disuatu wilayah. Sesuai ketetapan Badan Perencanaan Pembangunan
          Nasional (Bappenas), angka Rt di sebuah wilayah harus di bawah 1
          selama 14 hari berturut-turut sebelum relaksasi PSBB diberi lampu
          hijau.
        </p>
        <p class="pb-8 mx-8 mt-4 text-sm text-justify text-gray-500">
          Referensi :
          <a
            href="https://www.datacamp.com/community/tutorials/replicating-in-r-covid19"
            class="hover:text-gray-800 font-italic"
            target="_blank"
          >
            Estimating COVID-19's
            <i>Rt</i> in Real-Time
          </a>
        </p>
      </div>
    </div>
    <!--/Graph Card-->
  </div>
</template>
<script>
import Loading from "vue-loading-overlay";
import "vue-loading-overlay/dist/vue-loading.css";
import Chart from "chart.js/auto";
import zoomPlugin from "chartjs-plugin-zoom";
Chart.register({ zoomPlugin });
import { id } from "date-fns/locale";
const { format } = require("date-fns");
var dataChart = {
  data: {
    labels: [],
    datasets: [
      {
        label: "Rt mean",
        type: "line",
        data: [],
        fill: false,
        pointRadius: 1,
        yAxisId: "rt-axis",
        pointBackgroundColor: "rgba(65, 131, 215, 1)",
        borderColor: "rgba(65, 131, 215, 1)",
        backgroundColor: "rgba(65, 131, 215, 1)",
      },
      {
        data: [],
        label: "Rt upper (95%)",
        type: "line",
        fill: 0,
        pointRadius: 0,
        yAxisId: "rt-axis",
        backgroundColor: "rgba(118, 93, 105, 0.2)",
        borderColor: "transparent",
      },
      {
        data: [],
        label: "Rt lower (95%)",
        type: "line",
        fill: 0,
        pointRadius: 0,
        yAxisId: "rt-axis",
        backgroundColor: "rgba(118, 93, 105, 0.2)",
        borderColor: "transparent",
      },
    ],
  },
  options: {
    locale: "id-ID",
    spanGaps: true,
    plugins: {
      title: {
        display: true,
        fontSize: 24,
        text: [
          "Angka Reproduksi (Rt) COVID-19 di Sulawesi Tengah",
          "Dihitung dengan metode Sequential-Bayes.",
        ],
      },
      datalabels: {
        display: false,
      },
      tooltips: {
        //   filter: function (tooltipItem) {
        //     if (tooltipItem.datasetIndex == 0) {
        //       return true;
        //     } else {
        //       return false;
        //     }
        //   },
        mode: "index",
        intersect: false,
        backgroundColor: "rgba(255,255,255,1)",
        titleFontColor: "#000",
        bodyFontColor: "#000",
        borderColor: "#222",
        borderWidth: 1,
      },

      zoom: {
        limits: {
          y: { min: 0 },
        },
        pan: {
          enabled: true,
          mode: "xy",
        },
        zoom: {
          wheel: {
            enabled: true,
          },

          pinch: {
            enabled: true,
          },
          mode: "xy",
        },
      },
      legend: {
        position: "bottom",
        usePointStyle: true,
        display: true,
      },
    },
    scales: {
      y: {
        id: "rt-axis",
        position: "right",
        display: true,
        type: "linear",
        title: {
          display: true,
          text: "Angka Reproduksi Efektif (Rt)",
        },
      },

      x: {
        ticks: {
          // callback: function (value, index, values) {
          //   var data = value.split(" ");
          //   return data[0] + data[1];
          // },
          maxRotation: 90,
          minRotation: 90,
        },
        display: true,
        stacked: true,
        title: { display: true, text: "Tanggal" },
      },
    },
    maintainAspectRatio: false,
    responsive: true,
    interaction: { mode: "index", intersect: false },
  },
};
export default {
  props: {
    propsDataRekapitulasiProv: {
      type: Array,
      default: () => [],
    },
  },
  components: {
    Loading,
  },
  data() {
    return {
      jsonDataRekapitulasiSulteng: [],
      chart: null,
    };
  },
  watch: {
    propsDataRekapitulasiProv() {
      this.jsonDataRekapitulasiSulteng = this.propsDataRekapitulasiProv;
      this.fetchDataStatistic();
    },
  },
  methods: {
    isLoading() {
      return this.jsonDataRekapitulasiSulteng.length == 0 ? true : false;
    },
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
    fetchDataStatistic() {
      let label = [];
      let rt_value = [];
      let rt_upper = [];
      let rt_lower = [];

      for (let i = 0; i < this.jsonDataRekapitulasiSulteng.length; i++) {
        const temp = this.jsonDataRekapitulasiSulteng[i];
        var abs = temp.tanggal.split("/");
        var tanggal = null;
        if (abs.length >= 3) {
          var date = abs[2].split(" ");
          date = date[0];
          var month = abs[1];
          var year = abs[0];
          tanggal = year + "-" + month + "-" + date;
        } else {
          tanggal = temp.tanggal;
        }
        var tanggal = format(Date.parse(tanggal), "dd MMM yyyy", {
          locale: id,
        });
        label.push(tanggal);
        rt_value.push(temp.rekap.Rt);
        rt_upper.push(temp.rekap.Rt_upper);
        rt_lower.push(temp.rekap.Rt_lower);
      }
      dataChart.data.datasets[0].data = rt_value;
      dataChart.data.datasets[2].data = rt_lower;
      dataChart.data.datasets[1].data = rt_upper;
      dataChart.data.labels = label;
      this.chart.update();
      this.chart.render();
    },
    resetZoom() {
      if (this.chart) {
        this.chart.resetZoom();
      }
    },
  },
  mounted() {
    this.jsonDataRekapitulasiSulteng = this.propsDataRekapitulasiProv;
    this.createChart("rt-chart", dataChart);
    this.fetchDataStatistic();
  },
};
</script>

<style scoped>
.vld-icon {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}
</style>