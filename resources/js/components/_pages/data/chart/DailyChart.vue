<template>
  <div class="w-full h-full">
    <div style="height: 400px">
      <keep-alive>
        <canvas
          id="chart-container"
          aria-label="Chart Harian COVID-19"
          role="img"
        ></canvas>
      </keep-alive>
    </div>
    <button
      @click="resetZoom"
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
    kasus: {
      type: String,
      default: () => "Positif",
    },
    wilayah: {
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
      pdpBgColor: "rgba(84, 55, 122, 1)",
      pdpBorderColor: "rgba(84, 55, 122, 0.8)",
      finishedPdpBgColor: "rgba(48, 23, 79, 1)",
      finishedPdpBorderColor: "rgba(48, 23, 79, 0.8)",
      jsonDataHarianProvinsi: [],
      jsonDataHarianNasional: [],
      jsonDataKabupaten: [],
      chartHarianOption: {
        type: "bar",
        data: {
          labels: [],
          datasets: [
            {
              label: "Rataan 7 Hari",
              type: "line",
              data: [],
              fill: false,
              pointRadius: 1,
              pointBackgroundColor: "rgba(106, 113, 118, 1)",
              borderColor: "rgba(106, 113, 118, 1)",
            },
            {
              label: "Kasus Baru",
              data: [],
              backgroundColor: "",
              borderColor: "",
            },
          ],
        },
        options: {
          locale: "id-ID",
          spanGaps: true,
          plugins: {
            datalabels: {
              display: false,
            },
            title: {
              display: true,
              fontSize: 16,
              text: [""],
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
            legend: { position: "bottom", usePointStyle: true, display: true },
          },
          scales: {
            yAxis: {
              type: "linear",
              id: "kasus-baru",
              position: "right",
              display: true,
              title: { display: true, text: "Kasus Baru" },
              ticks: {
                step: 1,
              },
            },

            xAxis: {
              ticks: {
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
      },
      chartOdpOption: {
        type: "bar",
        data: {
          labels: [],
          datasets: [
            {
              label: "Rataan 7 Hari",
              type: "line",
              data: [],
              fill: false,
              pointRadius: 1,
              pointBackgroundColor: "rgba(106, 113, 118, 1)",
              borderColor: "rgba(106, 113, 118, 1)",
            },
            {
              label: "Kasus Baru",
              data: [],
              backgroundColor: "",
              borderColor: "",
            },
            {
              label: "Selesai",
              data: [],
              backgroundColor: "",
              borderColor: "",
            },
          ],
        },
        options: {
          locale: "id-ID",
          spanGaps: true,
          plugins: {
            datalabels: {
              display: false,
            },
            title: {
              display: true,
              fontSize: 16,
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
            legend: { position: "bottom", usePointStyle: true, display: true },
          },
          scales: {
            yAxis: {
              type: "linear",
              id: "kasus-baru",
              position: "right",
              display: true,
              title: {
                display: true,
                text: "Kasus Baru/Selesai",
              },
              ticks: {
                step: 1,
              },
            },
            xAxis: {
              ticks: {
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
      },
    };
  },
  methods: {
    movingAvg(array, count, qualifier) {
      // calculate average for subarray
      var avg = function (array, qualifier) {
        var sum = 0,
          count = 0,
          val;
        for (var i in array) {
          val = array[i];
          if (!qualifier || qualifier(val)) {
            sum += val;
            count++;
          }
        }

        return sum / count;
      };

      var result = [],
        val;

      // pad beginning of result with null values
      for (var i = 0; i < count - 1; i++) {
        if (i === 0) {
          result.push(array[i]);
        } else {
          result.push(avg(array.slice(0, i)));
        }
      }

      // calculate average for each subarray and add to result
      for (var i = 0, len = array.length - count; i <= len; i++) {
        val = avg(array.slice(i, i + count), qualifier);
        if (isNaN(val)) result.push(0);
        else result.push(val.toFixed(2));
      }

      return result;
    },
    createChart(chartId, chartData) {
      const ctx = document.getElementById(chartId);
      if (this.chart != null) {
        this.chart.destroy();
      }
      chartData.options.plugins.title.text = [
        `Tren Harian Kasus ${this.kasus} COVID-19 di ${this.wilayah}`,
      ];
      this.chart = new Chart(ctx, {
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
      let rataRata = [];
      let kasusBaru = [];
      let kasusSelesai = [];
      let label = [];
      let bgColor = "";
      let borderColor = "";
      let bgColor2 = "";
      let borderColor2 = "";
      this.jsonDataHarianProvinsi.forEach((element) => {
        label.push(self.dateFormat(element.tanggal));
        if (this.kasus === "Positif") {
          kasusBaru.push(element.kasus_baru.positif);
          bgColor = this.positiveBgColor;
          borderColor = this.positiveBorderColor;
        } else if (this.kasus === "Sembuh") {
          kasusBaru.push(element.kasus_baru.sembuh);
          bgColor = this.recoveredBgColor;
          borderColor = this.recoveredBorderColor;
        } else if (this.kasus === "Meninggal") {
          kasusBaru.push(element.kasus_baru.meninggal);
          bgColor = this.deceasedBgColor;
          borderColor = this.deceasedBorderColor;
        } else if (this.kasus === "ODP") {
          kasusBaru.push(element.kasus_baru.ODP);
          kasusSelesai.push(element.selesai.ODP);
          bgColor = this.odpBgColor;
          borderColor = this.odpBorderColor;
          bgColor2 = this.finishedOdpBgColor;
          borderColor2 = this.finishedOdpBorderColor;
        } else if (this.kasus === "PDP") {
          kasusBaru.push(element.kasus_baru.PDP);
          kasusSelesai.push(element.selesai.PDP);
          bgColor = this.pdpBgColor;
          borderColor = this.pdpBorderColor;
          bgColor2 = this.finishedPdpBgColor;
          borderColor2 = this.finishedPdpBorderColor;
        }
      });
      rataRata = this.movingAvg(kasusBaru, 7);
      if (self.kasus === "PDP" || self.kasus === "ODP") {
        self.drawChartOdp(
          label,
          rataRata,
          kasusBaru,
          kasusSelesai,
          bgColor,
          borderColor,
          bgColor2,
          borderColor2
        );
      } else {
        self.drawChartHarian(label, rataRata, kasusBaru, bgColor, borderColor);
      }
    },
    fetchDataKab(kode) {
      const self = this;
      let rataRata = [];
      let kasusBaru = [];
      let kasusSelesai = [];
      let label = [];
      let bgColor = "";
      let borderColor = "";
      let bgColor2 = "";
      let borderColor2 = "";
      this.jsonDataKabupaten.forEach((kabupaten) => {
        if (_.isEqual(kabupaten.name, kode)) {
          kabupaten.daily.forEach((element) => {
            label.push(self.dateFormat(element.tanggal));
            switch (self.kasus) {
              case "Positif":
                kasusBaru.push(element.kasus_baru.positif);
                bgColor = self.positiveBgColor;
                borderColor = self.positiveBorderColor;
                break;
              case "Sembuh":
                kasusBaru.push(element.kasus_baru.sembuh);
                bgColor = self.recoveredBgColor;
                borderColor = self.recoveredBorderColor;
                break;
              case "Meninggal":
                kasusBaru.push(element.kasus_baru.meninggal);
                bgColor = self.deceasedBgColor;
                borderColor = self.deceasedBorderColor;
                break;
              case "ODP":
                kasusBaru.push(element.kasus_baru.ODP);
                kasusSelesai.push(element.selesai.ODP);
                bgColor = self.odpBgColor;
                borderColor = self.odpBorderColor;
                bgColor2 = self.finishedOdpBgColor;
                borderColor2 = self.finishedOdpBorderColor;
                break;
              case "PDP":
                kasusBaru.push(element.kasus_baru.PDP);
                kasusSelesai.push(element.selesai.PDP);
                bgColor = self.pdpBgColor;
                borderColor = self.pdpBorderColor;
                bgColor2 = self.finishedPdpBgColor;
                borderColor2 = self.finishedPdpBorderColor;
                break;
              default:
                kasusBaru.push(element.kasus_baru.positif);
                bgColor = self.positiveBgColor;
                borderColor = self.positiveBorderColor;
                break;
            }
          });
        }
      });
      rataRata = this.movingAvg(kasusBaru, 7);
      if (self.kasus === "PDP" || self.kasus === "ODP") {
        self.drawChartOdp(
          label,
          rataRata,
          kasusBaru,
          kasusSelesai,
          bgColor,
          borderColor,
          bgColor2,
          borderColor2
        );
      } else {
        self.drawChartHarian(label, rataRata, kasusBaru, bgColor, borderColor);
      }
    },
    fetchDataNasional() {
      const self = this;
      let rataRata = [];
      let kasusBaru = [];
      let label = [];
      let bgColor = "";
      let borderColor = "";
      this.jsonDataHarianNasional.forEach((element) => {
        label.push(self.dateFormat(element.tanggal));
        switch (self.kasus) {
          case "Positif":
            kasusBaru.push(element.kasus_baru.positif);
            bgColor = self.positiveBgColor;
            borderColor = self.positiveBorderColor;
            break;
          case "Sembuh":
            kasusBaru.push(element.kasus_baru.sembuh);
            bgColor = self.recoveredBgColor;
            borderColor = self.recoveredBorderColor;
            break;
          case "Meninggal":
            kasusBaru.push(element.kasus_baru.meninggal);
            bgColor = self.deceasedBgColor;
            borderColor = self.deceasedBorderColor;
            break;
          default:
            kasusBaru.push(element.kasus_baru.positif);
            bgColor = self.positiveBgColor;
            borderColor = self.positiveBorderColor;
            break;
        }
      });
      rataRata = this.movingAvg(kasusBaru, 7);
      self.drawChartHarian(label, rataRata, kasusBaru, bgColor, borderColor);
    },
    fetchData() {
      const self = this;
      if (self.wilayah === "Sulawesi Tengah") {
        self.fetchDataProvinsi();
      } else if (self.wilayah === "Indonesia") {
        self.fetchDataNasional();
      } else {
        self.fetchDataKab(self.wilayah);
      }
    },
    drawChartHarian(label, rataRata, kasusBaru, bgColor, borderColor) {
      const self = this;
      self.chartHarianOption.data.labels = label;
      self.chartHarianOption.data.datasets[0].data = rataRata;
      self.chartHarianOption.data.datasets[1].data = kasusBaru;
      self.chartHarianOption.data.datasets[1].backgroundColor = bgColor;
      self.chartHarianOption.data.datasets[1].borderColor = borderColor;
      self.createChart("chart-container", self.chartHarianOption);
      self.chart.update();
      self.chart.render();
    },
    resetZoom() {
      if (this.chart) {
        this.chart.resetZoom();
      }
    },

    drawChartOdp(
      label,
      rataRata,
      kasusBaru,
      kasusSelesai,
      bgColor,
      borderColor,
      bgColor2,
      borderColor2
    ) {
      const self = this;
      self.chartOdpOption.data.labels = label;
      self.chartOdpOption.data.datasets[0].data = rataRata;
      self.chartOdpOption.data.datasets[1].data = kasusBaru;
      self.chartOdpOption.data.datasets[1].backgroundColor = bgColor;
      self.chartOdpOption.data.datasets[1].borderColor = borderColor;
      self.chartOdpOption.data.datasets[2].data = kasusSelesai;
      self.chartOdpOption.data.datasets[2].backgroundColor = bgColor2;
      self.chartOdpOption.data.datasets[2].borderColor = borderColor2;
      self.createChart("chart-container", self.chartOdpOption);
      self.chart.update();
      self.chart.render();
    },
  },
  watch: {
    propsDataRekapitulasiKabupaten(newValue, oldValue) {
      this.jsonDataKabupaten = newValue;
      this.fetchData();
    },
    propsDataRekapitulasiProv() {
      this.jsonDataHarianProvinsi = this.propsDataRekapitulasiProv;
      this.fetchData();
    },
    propsDataRekapitulasiNasional() {
      this.jsonDataHarianNasional = this.propsDataRekapitulasiNasional;
      this.fetchData();
    },
    wilayah: function () {
      this.fetchData();
    },
    kasus: function () {
      this.fetchData();
    },
  },
  mounted() {
    this.fetchData();
  },
};
</script>