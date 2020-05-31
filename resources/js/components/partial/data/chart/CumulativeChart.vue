<template>
  <div style="height:400px">
    <div class="absolute flex justify-center w-full">
      <loading
        :active.sync="isLoading"
        :opacity="0.8"
        :height="300"
        :width="128"
        loader="spinner"
        color="#59F"
      ></loading>
    </div>
    <keep-alive>
      <canvas id="chart-cumulative" aria-label="Chart Kumulatif COVID-19" role="img"></canvas>
    </keep-alive>
  </div>
</template>
<script>
import Loading from "vue-loading-overlay";
import Chart from "chart.js";
import "chart.js/dist/Chart.min";
import { id } from "date-fns/locale";
const { format } = require("date-fns");
var dataCumulativeChart = {
  type: "bar",
  data: {
    labels: [],
    datasets: [
      {
        label: "",
        data: [],
        type: "line",
        fill: false,
        pointRadius: 1,
        backgroundColor: "rgba(255, 99, 132, 0.2)",
        borderColor: "rgba(255, 99, 132, 0.6)"
      },
      {
        label: "",
        data: [],
        type: "line",
        fill: false,
        pointRadius: 1,
        backgroundColor: "rgba(75, 192, 192, 0.2)",
        borderColor: "rgba(75, 192, 192, 0.6)"
      },
      {
        label: "",
        data: [],
        type: "line",
        fill: false,
        pointRadius: 1,
        backgroundColor: "rgba(255, 159, 64, 0.2)",
        borderColor: "rgba(255, 159, 64, 0.6)"
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
          ticks: {
            beginAtZero: true
          }
        }
      ],
      xAxes: [
        {
          ticks: {
            callback: function(value, index, values) {
              var data = value.split(" ");
              return data[0] + data[1];
            }
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
      mode: "label",
      intersect: false,
      backgroundColor: "rgba(255,255,255,1)",
      titleFontColor: "#000",
      bodyFontColor: "#000",
      borderColor: "#222",
      borderWidth: 1
    },
    hover: { mode: "nearest", intersect: true },
    legend: { position: "bottom", usePointStyle: true }
  }
};
export default {
  components: {
    Loading
  },
  props: ["kejadian", "lokasi"],
  data() {
    return {
      isLoading: false,
      chartCumulative: null,
      positiveBgColor: "rgba(246, 71, 71, 1)",
      positiveBorderColor: "rgba(246, 71, 71, 0.8)",
      recoveredBgColor: "rgba(42, 187, 155, 1)",
      recoveredBorderColor: "rgba(42, 187, 155, 0.8)",
      deceasedBgColor: "rgba(245, 171, 53, 1)",
      deceasedBorderColor: "rgba(245, 171, 53, 0.8)",
      odpBgColor: "rgba(103, 65, 114, 1)",
      odpBorderColor: "rgba(103, 65, 114, 0.8)",
      finishedOdpBgColor: "rgba(36, 37, 42, 1)",
      finishedOdpBorderColor: "rgba(36, 37, 42, 0.8)",
      activeOdpBgColor: "rgba(65, 131, 215, 1)",
      activeOdpBorderColor: "rgba(65, 131, 215, 0.8)",
      pdpBgColor: "rgba(247, 202, 24, 1)",
      pdpBorderColor: "rgba(247, 202, 24, 0.8)",
      finishedPdpBgColor: "rgba(242, 217, 132, 1)",
      finishedPdpBorderColor: "rgba(242, 217, 132, 0.8)",
      activePdpBgColor: "rgba(211, 84, 0, 1)",
      activePdpBorderColor: "rgba(211, 84, 0, 0.8)"
    };
  },
  methods: {
    createCumulativeChart(chartId, chartData) {
      const ctx = document.getElementById(chartId);
      if (this.chartCumulative != null) {
        this.chartCumulative.destroy();
      }
      this.chartCumulative = new Chart(ctx, {
        type: chartData.type,
        data: chartData.data,
        options: chartData.options
      });
    },
    loadData: function() {
      this.isLoading = true;
      var baseurl = null;
      if (this.$props.lokasi == "Sulawesi Tengah") {
        baseurl = "statistik";
      } else if (this.$props.lokasi == "Indonesia") {
        baseurl = "nasional";
      } else {
        baseurl = "statistik/" + this.$props.lokasi;
      }
      axios.get("/corona/api/" + baseurl).then(response => {
        var data = response.data.data;
        var label = [];
        var positive = [];
        var cumulativePositive = [];
        var recovered = [];
        var cumulativeRecovered = [];
        var deceased = [];
        var cumulativeDeceased = [];
        var cumulativeUnderTreatment = [];
        var ODP = [];
        var finishedODP = [];
        var cumulativeODP = [];
        var PDP = [];
        var finishedPDP = [];
        var cumulativePDP = [];

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
          positive.push(data[i].kasus_baru.positif);
          cumulativePositive.push(data[i].kumulatif.positif);
          cumulativeUnderTreatment.push(
            data[i].kumulatif.positif -
              (data[i].kumulatif.meninggal + data[i].kumulatif.sembuh)
          );
          recovered.push(data[i].kasus_baru.sembuh);
          cumulativeRecovered.push(data[i].kumulatif.sembuh);
          deceased.push(data[i].kasus_baru.meninggal);
          cumulativeDeceased.push(data[i].kumulatif.meninggal);
          if (this.$props.lokasi != "Indonesia") {
            ODP.push(data[i].aktif.ODP);
            finishedODP.push(data[i].kumulatif.selesai_ODP);
            cumulativeODP.push(data[i].kumulatif.ODP);
            PDP.push(data[i].aktif.PDP);
            finishedPDP.push(data[i].kumulatif.selesai_PDP);
            cumulativePDP.push(data[i].kumulatif.PDP);
          }
        }
        if (dataCumulativeChart.data.datasets.length > 3) {
          dataCumulativeChart.data.datasets.pop();
        }
        switch (this.$props.kejadian) {
          case "Positif":
            dataCumulativeChart.data.datasets[1].backgroundColor = this.deceasedBgColor;
            dataCumulativeChart.data.datasets[1].borderColor = this.deceasedBorderColor;
            dataCumulativeChart.data.datasets[1].label = "Positif - Meninggal";
            dataCumulativeChart.data.datasets[1].data = cumulativeDeceased;
            dataCumulativeChart.data.datasets[2].backgroundColor = this.recoveredBgColor;
            dataCumulativeChart.data.datasets[2].borderColor = this.recoveredBorderColor;
            dataCumulativeChart.data.datasets[2].label = "Positif - Sembuh";
            dataCumulativeChart.data.datasets[2].data = cumulativeRecovered;
            var datasetUnderTreatment = {
              label: "Positif - Dirawat",
              data: cumulativeUnderTreatment,
              type: "line",
              fill: false,
              pointRadius: 1,
              backgroundColor: this.activeOdpBgColor,
              borderColor: this.activeOdpBorderColor
            };
            dataCumulativeChart.data.datasets.push(datasetUnderTreatment);
            dataCumulativeChart.data.datasets[0].backgroundColor = this.positiveBgColor;
            dataCumulativeChart.data.datasets[0].borderColor = this.positiveBorderColor;
            dataCumulativeChart.data.datasets[0].label = "Positif - Total";
            dataCumulativeChart.data.datasets[0].data = cumulativePositive;
            break;
          case "PDP":
            dataCumulativeChart.data.datasets[1].backgroundColor = this.finishedPdpBgColor;
            dataCumulativeChart.data.datasets[1].borderColor = this.finishedPdpBorderColor;
            dataCumulativeChart.data.datasets[1].label = "Selesai";
            dataCumulativeChart.data.datasets[1].data = finishedPDP;
            dataCumulativeChart.data.datasets[2].backgroundColor = this.activePdpBgColor;
            dataCumulativeChart.data.datasets[2].borderColor = this.activePdpBorderColor;
            dataCumulativeChart.data.datasets[2].label = "Aktif";
            dataCumulativeChart.data.datasets[2].data = PDP;
            dataCumulativeChart.data.datasets[0].backgroundColor = this.pdpBgColor;
            dataCumulativeChart.data.datasets[0].borderColor = this.pdpBorderColor;
            dataCumulativeChart.data.datasets[0].label = "Total PDP";
            dataCumulativeChart.data.datasets[0].data = cumulativePDP;
            break;
          case "ODP":
            dataCumulativeChart.data.datasets[1].backgroundColor = this.finishedOdpBgColor;
            dataCumulativeChart.data.datasets[1].borderColor = this.finishedOdpBorderColor;
            dataCumulativeChart.data.datasets[1].label = "Selesai";
            dataCumulativeChart.data.datasets[1].data = finishedODP;
            dataCumulativeChart.data.datasets[2].backgroundColor = this.activeOdpBgColor;
            dataCumulativeChart.data.datasets[2].borderColor = this.activeOdpBorderColor;
            dataCumulativeChart.data.datasets[2].label = "Aktif";
            dataCumulativeChart.data.datasets[2].data = ODP;
            dataCumulativeChart.data.datasets[0].backgroundColor = this.odpBgColor;
            dataCumulativeChart.data.datasets[0].borderColor = this.odpBorderColor;
            dataCumulativeChart.data.datasets[0].label = "Total ODP";
            dataCumulativeChart.data.datasets[0].data = cumulativeODP;
            break;
        }
        dataCumulativeChart.data.labels = label;
        this.chartCumulative.update();
        this.isLoading = false;
      });
    },
    updater: function() {
      setInterval(() => {
        this.loadData();
        this.chartCumulative();
      }, 5 * 60 * 1000);
    }
  },
  watch: {
    lokasi: function() {
      this.createCumulativeChart("chart-cumulative", dataCumulativeChart);
      this.loadData();
    },
    kejadian: function() {
      this.createCumulativeChart("chart-cumulative", dataCumulativeChart);
      this.loadData();
    }
  },
  mounted() {
    this.createCumulativeChart("chart-cumulative", dataCumulativeChart);
    this.loadData();
    this.updater();
  }
};
</script>