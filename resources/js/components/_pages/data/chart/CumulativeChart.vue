<template>
  <div>
    <div style="height: 400px">
      <keep-alive>
        <canvas
          id="chart-cumulative"
          aria-label="Chart Kumulatif COVID-19"
          role="img"
        ></canvas>
      </keep-alive>
    </div>
    <button
      @click="resetZoom()"
      class="float-right px-4 py-2 mx-4 mb-4 text-blue-500 transition-all duration-300 bg-gray-200 rounded-md  hover:bg-gray-300"
    >
      Reset Zoom
    </button>
  </div>
</template>
<script>
import Chart from "chart.js/auto";
import zoomPlugin from "chartjs-plugin-zoom";
Chart.register({ zoomPlugin });
import { id } from "date-fns/locale";
const { format } = require("date-fns");
export default {
  props: {
    kejadian: {
      type: String,
      default: () => "Positif",
    },
    lokasi: {
      type: String,
      default: () => "Sulawesi Tengah",
    },
    propsDataRekapitulasiKabupaten: {
      type: Array,
      default: () => [],
    },
    propsDataRekapitulasiProv: {
      type: Array,
      default: () => [],
    },
    propsDataRekapitulasiNasional: {
      type: Array,
      default: () => [],
    },
  },
  data() {
    return {
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
      activePdpBorderColor: "rgba(211, 84, 0, 0.8)",
      jsonDataHarianProvinsi: [],
      jsonDataHarianNasional: [],
      jsonDataKabupaten: [],
      chartHarianOption: {
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
              backgroundColor: "",
              borderColor: "",
            },
            {
              label: "",
              data: [],
              type: "line",
              fill: false,
              pointRadius: 1,
              backgroundColor: "",
              borderColor: "",
            },
            {
              label: "",
              data: [],
              type: "line",
              fill: false,
              pointRadius: 1,
              backgroundColor: "",
              borderColor: "",
            },
            {
              label: "",
              data: [],
              type: "line",
              fill: false,
              pointRadius: 1,
              backgroundColor: "",
              borderColor: "",
            },
          ],
        },
        options: {
          locale: "id-ID",
          plugins: {
            datalabels: {
              display: false,
            },
            title: {
              display: true,
              fontSize: 24,
              text: [],
            },
            tooltips: {
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
                mode: "x",
              },
              zoom: {
                wheel: {
                  enabled: true,
                },

                pinch: {
                  enabled: true,
                },
                mode: "x",
              },
            },
            legend: { position: "bottom", usePointStyle: true },
          },
          scales: {
            yAxis: {
              position: "right",
              ticks: {
                beginAtZero: true,
              },
              title: {
                display: true,
                text: "Total Kejadian",
              },
            },
            xAxis: {
              ticks: {
                maxRotation: 90,
                minRotation: 90,
              },
              display: true,
              title: { display: true, text: "Tanggal" },
            },
          },
          maintainAspectRatio: false,
          responsive: true,
          interaction: { mode: "index", intersect: false },
        },
      },
      chartOdpOption: {
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
              backgroundColor: "",
              borderColor: "",
            },
            {
              label: "",
              data: [],
              type: "line",
              fill: false,
              pointRadius: 1,
              backgroundColor: "",
              borderColor: "",
            },
            {
              label: "",
              data: [],
              type: "line",
              fill: false,
              pointRadius: 1,
              backgroundColor: "",
              borderColor: "",
            },
          ],
        },
        options: {
          locale: "id-ID",
          plugins: {
            datalabels: {
              display: false,
            },
            title: {
              display: true,
              fontSize: 24,
              text: [],
            },
            tooltips: {
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
                mode: "x",
              },
              zoom: {
                wheel: {
                  enabled: true,
                },

                pinch: {
                  enabled: true,
                },
                mode: "x",
              },
            },
            legend: { position: "bottom", usePointStyle: true },
          },
          scales: {
            yAxis: {
              position: "right",
              ticks: {
                beginAtZero: true,
              },
              title: {
                display: true,
                text: "Total Kejadian",
              },
            },
            xAxis: {
              ticks: {
                maxRotation: 90,
                minRotation: 90,
              },
              display: true,
              title: { display: true, text: "Tanggal" },
            },
          },
          maintainAspectRatio: false,
          responsive: true,
          intersect: { mode: "index", intersect: false },
        },
      },
    };
  },
  methods: {
    createCumulativeChart(chartId, chartData) {
      const ctx = document.getElementById(chartId);
      if (this.chartCumulative != null) {
        this.chartCumulative.destroy();
      }
      chartData.options.plugins.title.text = [
        `Kumulatif Kasus ${this.kejadian} COVID-19 di ${this.lokasi}`,
      ];
      this.chartCumulative = new Chart(ctx, {
        type: chartData.type,
        data: chartData.data,
        options: chartData.options,
      });
    },
    dateFormat(date) {
      var tanggal = format(Date.parse(date), "dd MMM yyyy", {
        locale: id,
      });
      return tanggal;
    },
    fetchDataProvinsi() {
      const self = this;
      let total = [];
      let selesai = [];
      let meninggal = [];
      let aktif = [];
      let label = [];
      let bgColorTotal = "";
      let borderColorTotal = "";
      let bgColorAktif = "";
      let borderColorAktif = "";
      let bgColorSelesai = "";
      let borderColorSelesai = "";
      let bgColorMeninggal = "";
      let borderColorMeninggal = "";
      this.jsonDataHarianProvinsi.forEach((element) => {
        label.push(self.dateFormat(element.tanggal));
        if (this.kejadian === "Positif") {
          total.push(element.kumulatif.positif);
          selesai.push(element.kumulatif.sembuh);
          meninggal.push(element.kumulatif.meninggal);
          aktif.push(element.aktif.dalam_perawatan);
          bgColorTotal = this.positiveBgColor;
          borderColorTotal = this.positiveBorderColor;
          bgColorAktif = this.activeOdpBgColor;
          borderColorAktif = this.activeOdpBorderColor;
          bgColorMeninggal = this.deceasedBgColor;
          borderColorMeninggal = this.deceasedBorderColor;
          bgColorSelesai = this.recoveredBgColor;
          borderColorSelesai = this.recoveredBorderColor;
        } else if (this.kejadian === "PDP") {
          total.push(element.kumulatif.PDP);
          selesai.push(element.kumulatif.selesai_PDP);
          aktif.push(element.aktif.PDP);
          bgColorTotal = this.pdpBgColor;
          borderColorTotal = this.pdpBorderColor;
          bgColorAktif = this.activePdpBgColor;
          borderColorAktif = this.activePdpBorderColor;
          bgColorSelesai = this.finishedPdpBgColor;
          borderColorSelesai = this.finishedPdpBorderColor;
        } else if (this.kejadian === "ODP") {
          total.push(element.kumulatif.ODP);
          selesai.push(element.kumulatif.selesai_ODP);
          aktif.push(element.aktif.ODP);
          bgColorTotal = this.odpBgColor;
          borderColorTotal = this.odpBorderColor;
          bgColorAktif = this.activeOdpBgColor;
          borderColorAktif = this.activeOdpBorderColor;
          bgColorSelesai = this.finishedOdpBgColor;
          borderColorSelesai = this.finishedOdpBorderColor;
        }
      });
      if (self.kejadian === "PDP" || self.kejadian === "ODP") {
        self.drawChartOdp(
          label,
          total,
          aktif,
          selesai,
          bgColorTotal,
          borderColorTotal,
          bgColorAktif,
          borderColorAktif,
          bgColorSelesai,
          borderColorSelesai
        );
      } else {
        self.drawChartHarian(
          label,
          total,
          aktif,
          selesai,
          meninggal,
          bgColorTotal,
          borderColorTotal,
          bgColorAktif,
          borderColorAktif,
          bgColorSelesai,
          borderColorSelesai,
          bgColorMeninggal,
          borderColorMeninggal
        );
      }
    },
    fetchDataKab(kode) {
      const self = this;
      let total = [];
      let selesai = [];
      let meninggal = [];
      let aktif = [];
      let label = [];
      let bgColorTotal = "";
      let borderColorTotal = "";
      let bgColorAktif = "";
      let borderColorAktif = "";
      let bgColorSelesai = "";
      let borderColorSelesai = "";
      let bgColorMeninggal = "";
      let borderColorMeninggal = "";
      this.jsonDataKabupaten.forEach((kabupaten) => {
        if (_.isEqual(kabupaten.name, kode)) {
          kabupaten.daily.forEach((element) => {
            label.push(self.dateFormat(element.tanggal));
            if (this.kejadian === "Positif") {
              total.push(element.kasus_baru.positif);
              selesai.push(element.kasus_baru.sembuh);
              meninggal.push(element.kasus_baru.meninggal);
              let dirawat =
                element.kasus_baru.positif -
                (element.kasus_baru.sembuh + element.kasus_baru.meninggal);
              aktif.push(dirawat);
              bgColorTotal = this.positiveBgColor;
              borderColorTotal = this.positiveBorderColor;
              bgColorAktif = this.activeOdpBgColor;
              borderColorAktif = this.activeOdpBorderColor;
              bgColorMeninggal = this.deceasedBgColor;
              borderColorMeninggal = this.deceasedBorderColor;
              bgColorSelesai = this.recoveredBgColor;
              borderColorSelesai = this.recoveredBorderColor;
            } else if (this.kejadian === "PDP") {
              total.push(element.kasus_baru.PDP);
              selesai.push(element.selesai.PDP);
              let dirawat = element.kasus_baru.PDP - element.selesai.PDP;
              aktif.push(dirawat);
              bgColorTotal = this.pdpBgColor;
              borderColorTotal = this.pdpBorderColor;
              bgColorAktif = this.activePdpBgColor;
              borderColorAktif = this.activePdpBorderColor;
              bgColorSelesai = this.finishedPdpBgColor;
              borderColorSelesai = this.finishedPdpBorderColor;
            } else if (this.kejadian === "ODP") {
              total.push(element.kasus_baru.ODP);
              selesai.push(element.selesai.ODP);
              let dirawat = element.kasus_baru.ODP - element.selesai.ODP;
              aktif.push(dirawat);
              bgColorTotal = this.odpBgColor;
              borderColorTotal = this.odpBorderColor;
              bgColorAktif = this.activeOdpBgColor;
              borderColorAktif = this.activeOdpBorderColor;
              bgColorSelesai = this.finishedOdpBgColor;
              borderColorSelesai = this.finishedOdpBorderColor;
            }
          });
        }
      });
      let kumulatif = [];
      let dalam_perawatan = [];
      let sudah_sembuh = [];
      let tewas = [];
      total.reduce(function (a, b, i) {
        return (kumulatif[i] = a + b);
      }, 0);
      selesai.reduce(function (a, b, i) {
        return (sudah_sembuh[i] = a + b);
      }, 0);
      aktif.reduce(function (a, b, i) {
        return (dalam_perawatan[i] = a + b);
      }, 0);
      meninggal.reduce(function (a, b, i) {
        return (tewas[i] = a + b);
      }, 0);
      if (self.kejadian === "PDP" || self.kejadian === "ODP") {
        self.drawChartOdp(
          label,
          kumulatif,
          dalam_perawatan,
          sudah_sembuh,
          bgColorTotal,
          borderColorTotal,
          bgColorAktif,
          borderColorAktif,
          bgColorSelesai,
          borderColorSelesai
        );
      } else {
        self.drawChartHarian(
          label,
          kumulatif,
          dalam_perawatan,
          sudah_sembuh,
          tewas,
          bgColorTotal,
          borderColorTotal,
          bgColorAktif,
          borderColorAktif,
          bgColorSelesai,
          borderColorSelesai,
          bgColorMeninggal,
          borderColorMeninggal
        );
      }
    },
    fetchDataNasional() {
      const self = this;
      let total = [];
      let selesai = [];
      let meninggal = [];
      let aktif = [];
      let label = [];
      let bgColorTotal = "";
      let borderColorTotal = "";
      let bgColorAktif = "";
      let borderColorAktif = "";
      let bgColorSelesai = "";
      let borderColorSelesai = "";
      let bgColorMeninggal = "";
      let borderColorMeninggal = "";
      this.jsonDataHarianNasional.forEach((element) => {
        label.push(self.dateFormat(element.tanggal));
        total.push(element.kumulatif.positif);
        selesai.push(element.kumulatif.sembuh);
        meninggal.push(element.kumulatif.meninggal);
        aktif.push(element.kumulatif.dalam_perawatan);
        bgColorTotal = this.positiveBgColor;
        borderColorTotal = this.positiveBorderColor;
        bgColorAktif = this.activeOdpBgColor;
        borderColorAktif = this.activeOdpBorderColor;
        bgColorMeninggal = this.deceasedBgColor;
        borderColorMeninggal = this.deceasedBorderColor;
        bgColorSelesai = this.recoveredBgColor;
        borderColorSelesai = this.recoveredBorderColor;
      });
      self.drawChartHarian(
        label,
        total,
        aktif,
        selesai,
        meninggal,
        bgColorTotal,
        borderColorTotal,
        bgColorAktif,
        borderColorAktif,
        bgColorSelesai,
        borderColorSelesai,
        bgColorMeninggal,
        borderColorMeninggal
      );
    },
    fetchData() {
      const self = this;
      if (self.lokasi === "Sulawesi Tengah") {
        self.fetchDataProvinsi();
      } else if (self.lokasi === "Indonesia") {
        self.fetchDataNasional();
      } else {
        self.fetchDataKab(self.lokasi);
      }
    },
    drawChartHarian(
      label,
      total,
      aktif,
      selesai,
      meninggal,
      bgColorTotal,
      borderColorTotal,
      bgColorAktif,
      borderColorAktif,
      bgColorSelesai,
      borderColorSelesai,
      bgColorMeninggal,
      borderColorMeninggal
    ) {
      const self = this;
      self.chartHarianOption.data.labels = label;
      self.chartHarianOption.data.datasets[0].data = total;
      self.chartHarianOption.data.datasets[0].label = "POSITIF - TOTAL";
      self.chartHarianOption.data.datasets[0].backgroundColor = bgColorTotal;
      self.chartHarianOption.data.datasets[0].borderColor = borderColorTotal;
      self.chartHarianOption.data.datasets[1].data = meninggal;
      self.chartHarianOption.data.datasets[1].label = "POSITIF - MENINGGAL";
      self.chartHarianOption.data.datasets[1].backgroundColor =
        bgColorMeninggal;
      self.chartHarianOption.data.datasets[1].borderColor =
        borderColorMeninggal;
      self.chartHarianOption.data.datasets[2].data = selesai;
      self.chartHarianOption.data.datasets[2].label = "POSITIF - SEMBUH";
      self.chartHarianOption.data.datasets[2].backgroundColor = bgColorSelesai;
      self.chartHarianOption.data.datasets[2].borderColor = borderColorSelesai;
      self.chartHarianOption.data.datasets[3].data = aktif;
      self.chartHarianOption.data.datasets[3].label = "POSITIF - DIRAWAT";
      self.chartHarianOption.data.datasets[3].backgroundColor = bgColorAktif;
      self.chartHarianOption.data.datasets[3].borderColor = borderColorAktif;
      self.createCumulativeChart("chart-cumulative", self.chartHarianOption);
      self.chartCumulative.update();
      self.chartCumulative.render();
    },
    resetZoom() {
      console.log("reset");
      if (this.chartCumulative) {
        this.chartCumulative.resetZoom();
      }
    },
    drawChartOdp(
      label,
      total,
      aktif,
      selesai,
      bgColorTotal,
      borderColorTotal,
      bgColorAktif,
      borderColorAktif,
      bgColorSelesai,
      borderColorSelesai
    ) {
      const self = this;
      self.chartOdpOption.data.labels = label;
      self.chartOdpOption.data.datasets[0].data = total;
      self.chartOdpOption.data.datasets[0].label = "Total kejadian";
      self.chartOdpOption.data.datasets[0].backgroundColor = bgColorTotal;
      self.chartOdpOption.data.datasets[0].borderColor = borderColorTotal;
      self.chartOdpOption.data.datasets[1].data = selesai;
      self.chartOdpOption.data.datasets[1].label = "Selesai";
      self.chartOdpOption.data.datasets[1].backgroundColor = bgColorSelesai;
      self.chartOdpOption.data.datasets[1].borderColor = borderColorSelesai;
      self.chartOdpOption.data.datasets[2].data = aktif;
      self.chartOdpOption.data.datasets[2].label = "Aktif";
      self.chartOdpOption.data.datasets[2].backgroundColor = bgColorAktif;
      self.chartOdpOption.data.datasets[2].borderColor = borderColorAktif;
      self.createCumulativeChart("chart-cumulative", self.chartOdpOption);
      self.chartCumulative.update();
      self.chartCumulative.render();
    },
  },
  watch: {
    propsDataRekapitulasiKabupaten() {
      this.jsonDataKabupaten = this.propsDataRekapitulasiKabupaten;
    },
    propsDataRekapitulasiProv() {
      this.jsonDataHarianProvinsi = this.propsDataRekapitulasiProv;
      this.fetchData();
    },
    propsDataRekapitulasiNasional() {
      this.jsonDataHarianNasional = this.propsDataRekapitulasiNasional;
      this.fetchData();
    },
    lokasi: function () {
      this.fetchData();
    },
    kejadian: function () {
      this.fetchData();
    },
  },
  mounted() {
    this.fetchData();
  },
};
</script>