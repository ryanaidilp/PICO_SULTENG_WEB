<template>
  <div class="w-full p-3 pb-8">
    <!--Graph Card-->
    <div class="bg-white rounded-lg shadow-lg">
      <div style="height:400px" class="p-5">
        <keep-alive>
          <canvas id="rt-chart" aria-label="Chart Angka Reproduksi" role="img"></canvas>
        </keep-alive>
      </div>
      <div class="pb-8 text-center">
        <span class="mx-4 text-xs md:text-base">
          <i class="mr-2 text-lg text-blue-600 fas fa-minus"></i>Rt (Angka Reproduksi Efektif)
          <i class="ml-4 mr-2 text-lg fas fa-square-full"></i>Selang Kepercayaan (95%)
        </span>
        <p class="mx-8 mt-8 text-sm text-left text-justify border-t-2">
          *Keterangan :
          <br />
          <b>Rt</b> merupakan
          <b>rata-rata orang yang bisa terinfeksi dari satu pasien positif</b> usai intervensi pemerintah.
          Sebagai contoh, Rt = 2 berarti satu orang yang terinfeksi bisa menulari rata-rata dua orang lainnya.
          Rt dipergunakan sebagai
          <b>syarat mutlak pelonggaran PSBB</b> di Indonesia. Sesuai ketetapan Badan Perencanaan Pembangunan Nasional (Bappenas), angka Rt di sebuah wilayah harus di bawah 1 selama 14 hari berturut-turut sebelum relaksasi PSBB diberi lampu hijau.
        </p>
        <p class="mx-8 mt-4 text-sm text-left text-justify text-gray-500">
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
        "Dihitung dengan metode Sequential-Bayes."
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
            labelString:
              "Angka Reproduksi Efektif/Effective Infection Rate (Rt)"
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
  props: {
    propsDataRekapitulasiProv: {
      type: Array,
      default: () => []
    }
  },
  data() {
    return {
      jsonDataRekapitulasiSulteng: [],
      chart: null
    };
  },
  watch: {
    propsDataRekapitulasiProv() {
      this.jsonDataRekapitulasiSulteng = this.propsDataRekapitulasiProv;
      this.fetchDataStatistic();
    }
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
          locale: id
        });
        label.push(tanggal);
        rt_value.push(temp.rekap.Rt);
        rt_upper.push(temp.rekap.Rt_upper);
        rt_lower.push(temp.rekap.Rt_lower);
      }
      dataChart.data.datasets[0].data = rt_value;
      dataChart.data.datasets[1].data = rt_lower;
      dataChart.data.datasets[2].data = rt_upper;
      dataChart.data.labels = label;
      this.chart.update();
      this.chart.render();
    }
  },
  mounted() {
    this.createChart("rt-chart", dataChart);
  }
};
</script>