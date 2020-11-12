<template>
  <div style="height:400px">
    <keep-alive>
      <canvas id="chart-container" aria-label="Chart Harian COVID-19" role="img"></canvas>
    </keep-alive>
  </div>
</template>
<script>
import Chart from "chart.js";
import "chart.js/dist/Chart.min";
import { id } from "date-fns/locale";
const { format } = require("date-fns");
export default {
  props: {
    kasus: {
      type: String,
      default: () => "Positif"
    },
    wilayah: {
      type: String,
      default: () => "Sulawesi Tengah"
    },
    propsDataRekapitulasiProv: {
      type: Array,
      default: () => []
    },
    propsDataRekapitulasiNasional: {
      type: Array,
      default: () => []
    }
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
      jsonDataKabupaten: [
        {
          no: 1,
          nama: "Banggai",
          dataHarian: []
        },
        {
          no: 2,
          nama: "Banggai Kepulauan",
          dataHarian: []
        },
        {
          no: 3,
          nama: "Banggai Laut",
          dataHarian: []
        },
        {
          no: 4,
          nama: "Buol",
          dataHarian: []
        },
        {
          no: 5,
          nama: "Donggala",
          dataHarian: []
        },
        {
          no: 6,
          nama: "Morowali",
          dataHarian: []
        },
        {
          no: 7,
          nama: "Morowali Utara",
          dataHarian: []
        },
        {
          no: 8,
          nama: "Parigi Moutong",
          dataHarian: []
        },
        {
          no: 9,
          nama: "Poso",
          dataHarian: []
        },
        {
          no: 10,
          nama: "Sigi",
          dataHarian: []
        },
        {
          no: 11,
          nama: "Tojo Una-Una",
          dataHarian: []
        },
        {
          no: 12,
          nama: "Toli-Toli",
          dataHarian: []
        },
        {
          no: 13,
          nama: "Kota Palu",
          dataHarian: []
        }
      ],
      chartHarianOption: {
        type: "bar",
        data: {
          labels: [],
          datasets: [
            {
              label: "Rata-Rata Mingguan",
              type: "line",
              data: [],
              fill: false,
              pointRadius: 1,
              pointBackgroundColor: "rgba(106, 113, 118, 1)",
              borderColor: "rgba(106, 113, 118, 1)"
            },
            {
              label: "Kasus Baru",
              data: [],
              yAxisID: "kasus-baru",
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
                position: "right",
                display: true,
                scaleLabel: { display: true, labelString: "Kasus Baru" }
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
            mode: "index",
            intersect: false,
            backgroundColor: "rgba(255,255,255,1)",
            titleFontColor: "#000",
            bodyFontColor: "#000",
            borderColor: "#222",
            borderWidth: 1
          },
          hover: { mode: "index", intersect: false },
          legend: { position: "bottom", usePointStyle: true, display: true }
        }
      },
      chartOdpOption: {
        type: "bar",
        data: {
          labels: [],
          datasets: [
            {
              label: "Rata-Rata Mingguan",
              type: "line",
              data: [],
              fill: false,
              pointRadius: 1,
              pointBackgroundColor: "rgba(106, 113, 118, 1)",
              borderColor: "rgba(106, 113, 118, 1)"
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
                position: "right",
                display: true,
                scaleLabel: { display: true, labelString: "Kasus Baru/Selesai" }
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
            mode: "index",
            intersect: false,
            backgroundColor: "rgba(255,255,255,1)",
            titleFontColor: "#000",
            bodyFontColor: "#000",
            borderColor: "#222",
            borderWidth: 1
          },
          hover: { mode: "index", intersect: false },
          legend: { position: "bottom", usePointStyle: true, display: true }
        }
      }
    };
  },
  methods: {
    movingAvg(array, count, qualifier) {
      // calculate average for subarray
      var avg = function(array, qualifier) {
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
      this.chart = new Chart(ctx, {
        type: chartData.type,
        data: chartData.data,
        options: chartData.options
      });
    },
    dateFormat(date) {
      var tanggal = format(Date.parse(date), "dd MMM yyyy", {
        locale: id
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
      this.jsonDataHarianProvinsi.forEach(element => {
        label.push(self.dateFormat(element.tanggal));
        if (this.kasus === "Positif") {
          rataRata.push(element.rekap.rata_rata.positif_weekly);
          kasusBaru.push(element.kasus_baru.positif);
          bgColor = this.positiveBgColor;
          borderColor = this.positiveBorderColor;
        } else if (this.kasus === "Sembuh") {
          rataRata.push(element.rekap.rata_rata.sembuh_weekly);
          kasusBaru.push(element.kasus_baru.sembuh);
          bgColor = this.recoveredBgColor;
          borderColor = this.recoveredBorderColor;
        } else if (this.kasus === "Meninggal") {
          rataRata.push(element.rekap.rata_rata.meninggal_weekly);
          kasusBaru.push(element.kasus_baru.meninggal);
          bgColor = this.deceasedBgColor;
          borderColor = this.deceasedBorderColor;
        } else if (this.kasus === "ODP") {
          rataRata.push(element.rekap.rata_rata.ODP_weekly);
          kasusBaru.push(element.kasus_baru.ODP);
          kasusSelesai.push(element.selesai.ODP);
          bgColor = this.odpBgColor;
          borderColor = this.odpBorderColor;
          bgColor2 = this.finishedOdpBgColor;
          borderColor2 = this.finishedOdpBorderColor;
        } else if (this.kasus === "PDP") {
          rataRata.push(element.rekap.rata_rata.PDP_weekly);
          kasusBaru.push(element.kasus_baru.PDP);
          kasusSelesai.push(element.selesai.PDP);
          bgColor = this.pdpBgColor;
          borderColor = this.pdpBorderColor;
          bgColor2 = this.finishedPdpBgColor;
          borderColor2 = this.finishedPdpBorderColor;
        }
      });
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
      this.jsonDataKabupaten.forEach(kabupaten => {
        if (kabupaten.no === kode) {
          kabupaten.dataHarian.forEach(element => {
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
      this.jsonDataHarianNasional.forEach(element => {
        label.push(self.dateFormat(element.tanggal));
        switch (self.kasus) {
          case "Positif":
            rataRata.push(element.rekap.rata_rata.positif_weekly);
            kasusBaru.push(element.kasus_baru.positif);
            bgColor = self.positiveBgColor;
            borderColor = self.positiveBorderColor;
            break;
          case "Sembuh":
            rataRata.push(element.rekap.rata_rata.sembuh_weekly);
            kasusBaru.push(element.kasus_baru.sembuh);
            bgColor = self.recoveredBgColor;
            borderColor = self.recoveredBorderColor;
            break;
          case "Meninggal":
            rataRata.push(element.rekap.rata_rata.meninggal_weekly);
            kasusBaru.push(element.kasus_baru.meninggal);
            bgColor = self.deceasedBgColor;
            borderColor = self.deceasedBorderColor;
            break;
          default:
            rataRata.push(element.rekap.rata_rata.positif_weekly);
            kasusBaru.push(element.kasus_baru.positif);
            bgColor = self.positiveBgColor;
            borderColor = self.positiveBorderColor;
            break;
        }
      });
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
    groupDataKab() {
      this.jsonDataHarianProvinsi.forEach(element => {
        const temp1 = {
          hari_ke: element.hari_ke,
          tanggal: element.tanggal
        };
        const temp2 = {
          kasus_baru: {
            positif: 0,
            sembuh: 0,
            meninggal: 0,
            ODP: 0,
            PDP: 0
          },
          selesai: {
            ODP: 0,
            PDP: 0
          },
          kumulatif: {
            positif: 0,
            sembuh: 0,
            meninggal: 0,
            ODP: 0,
            PDP: 0,
            selesai_PDP: 0,
            selesai_ODP: 0
          }
        };

        this.jsonDataKabupaten.forEach(kabupaten => {
          let temp4 = { ...temp1, ...temp2 };
          element.daftar_kabupaten.forEach(kab => {
            if (kabupaten.no === kab.no) {
              const temp5 = {
                kasus_baru: { ...kab.kasus_baru },
                selesai: { ...kab.selesai },
                kumulatif: { ...kab.kumulatif }
              };
              temp4 = {
                ...temp1,
                ...temp5
              };
            }
          });
          kabupaten.dataHarian.push(temp4);
        });
      });
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
    }
  },
  watch: {
    propsDataRekapitulasiProv() {
      this.jsonDataKabupaten.forEach(element => {
        element.dataHarian = [];
      });
      this.jsonDataHarianProvinsi = this.propsDataRekapitulasiProv;
      this.groupDataKab();
      this.fetchData();
    },
    propsDataRekapitulasiNasional() {
      if (this.jsonDataHarianNasional.length > 0) {
        this.jsonDataHarianNasional = [];
      }
      this.jsonDataHarianNasional = this.propsDataRekapitulasiNasional;
      this.fetchData();
    },
    wilayah: function() {
      this.fetchData();
    },
    kasus: function() {
      this.fetchData();
    }
  },
  mounted() {
    this.fetchData();
  }
};
</script>