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
      <canvas id="chart-container" aria-label="Chart Harian COVID-19" role="img"></canvas>
    </keep-alive>
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
        label: "Kumulatif",
        type: "line",
        data: [],
        fill: false,
        pointRadius: 1,
        yAxisID: "kumulatif",
        pointBackgroundColor: "rgba(118, 93, 105, 1)",
        borderColor: "rgba(118, 93, 105, 1)"
      },
      {
        label: "Kasus Baru",
        data: [],
        yAxisID: "kasus-baru",
        backgroundColor: "",
        borderColor: ""
      },
      {
        label: "Selesai",
        data: [],
        backgroundColor: "",
        borderColor: ""
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
          type: "linear",
          id: "kasus-baru",
          display: true,
          scaleLabel: { display: true, labelString: "Kasus Baru/Selesai" }
        },
        {
          type: "linear",
          id: "kumulatif",
          display: true,
          position: "right",
          stacked: true,
          scaleLabel: { display: true, labelString: "Kumulatif" },
          gridLines: { drawOnChartArea: true }
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
      chart: null,
      positiveBgColor: "rgba(246, 71, 71, 1)",
      positiveBorderColor: "rgba(246, 71, 71, 0.8)",
      recoveredBgColor: "rgba(42, 187, 155, 1)",
      recoveredBorderColor: "rgba(42, 187, 155, 0.8)",
      deceasedBgColor: "rgba(245, 171, 53, 1)",
      deceasedBorderColor: "rgba(245, 171, 53, 0.8)",
      odpBgColor: "rgba(65, 131, 215, 1)",
      odpBorderColor: "rgba(65, 131, 215, 0.8)",
      finishedOdpBgColor: "rgba(58, 83, 155, 1)",
      finishedOdpBorderColor: "rgba(58, 83, 155, 0.8)",
      pdpBgColor: "rgba(83, 51, 237, 1)",
      pdpBorderColor: "rgba(83, 51, 237, 0.8)",
      finishedPdpBgColor: "rgba(102, 51, 153, 1)",
      finishedPdpBorderColor: "rgba(102, 51, 153, 0.8)"
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
      var baseurl = null;
      if (this.$props.wilayah == "Sulawesi Tengah") {
        baseurl = "statistik";
      } else if (this.$props.wilayah == "Indonesia") {
        baseurl = "nasional";
      } else {
        baseurl = "statistik/" + this.$props.wilayah;
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
          recovered.push(data[i].kasus_baru.sembuh);
          cumulativeRecovered.push(data[i].kumulatif.sembuh);
          deceased.push(data[i].kasus_baru.meninggal);
          cumulativeDeceased.push(data[i].kumulatif.meninggal);
          if (this.$props.wilayah != "Indonesia") {
            ODP.push(data[i].kasus_baru.ODP);
            finishedODP.push(data[i].selesai.ODP);
            cumulativeODP.push(data[i].kumulatif.ODP);
            PDP.push(data[i].kasus_baru.PDP);
            finishedPDP.push(data[i].selesai.PDP);
            cumulativePDP.push(data[i].kumulatif.PDP);
          }
        }
        switch (this.$props.kasus) {
          case "Positif":
            dataChart.data.datasets[1].data = positive;
            dataChart.data.datasets[1].backgroundColor = this.positiveBgColor;
            dataChart.data.datasets[1].borderColor = this.positiveBorderColor;
            dataChart.data.datasets[2].data = [];
            dataChart.data.datasets[0].data = cumulativePositive;
            break;
          case "Sembuh":
            dataChart.data.datasets[1].data = recovered;
            dataChart.data.datasets[1].backgroundColor = this.recoveredBgColor;
            dataChart.data.datasets[1].borderColor = this.recoveredBorderColor;
            dataChart.data.datasets[2].data = [];
            dataChart.data.datasets[0].data = cumulativeRecovered;
            break;
          case "Meninggal":
            dataChart.data.datasets[1].data = deceased;
            dataChart.data.datasets[1].backgroundColor = this.deceasedBgColor;
            dataChart.data.datasets[1].borderColor = this.deceasedBorderColor;
            dataChart.data.datasets[2].data = [];
            dataChart.data.datasets[0].data = cumulativeDeceased;
            break;
          case "ODP":
            dataChart.data.datasets[1].data = ODP;
            dataChart.data.datasets[1].backgroundColor = this.odpBgColor;
            dataChart.data.datasets[1].borderColor = this.odpBorderColor;
            dataChart.data.datasets[2].data = finishedODP;
            dataChart.data.datasets[2].backgroundColor = this.finishedOdpBgColor;
            dataChart.data.datasets[2].borderColor = this.finishedOdpBorderColor;
            dataChart.data.datasets[0].data = cumulativeODP;
            break;
          case "PDP":
            dataChart.data.datasets[1].data = PDP;
            dataChart.data.datasets[1].backgroundColor = this.pdpBgColor;
            dataChart.data.datasets[1].borderColor = this.pdpBorderColor;
            dataChart.data.datasets[2].data = finishedPDP;
            dataChart.data.datasets[2].backgroundColor = this.finishedPdpBgColor;
            dataChart.data.datasets[2].borderColor = this.finishedPdpBorderColor;
            dataChart.data.datasets[0].data = cumulativePDP;
            break;
        }
        dataChart.data.labels = label;
        this.chart.update();
        this.isLoading = false;
      });
    },
    updater: function() {
      setInterval(() => {
        this.createChart("chart-container", dataChart);
        this.getStatistic();
      }, 5 * 60 * 1000);
    }
  },
  watch: {
    wilayah: function() {
      this.createChart("chart-container", dataChart);
      this.getStatistic();
    },
    kasus: function() {
      this.createChart("chart-container", dataChart);
      this.getStatistic();
    }
  },
  mounted() {
    this.createChart("chart-container", dataChart);
    this.getStatistic();
    this.updater();
  }
};
</script>