<template>
  <div>
    <div id="sex-chart" class="mx-4 rounded-lg shadow-lg"></div>
  </div>
</template>
<script>
import Highcharts from "highcharts";
export default {
  data() {
    return {
      chartOptions: {
        credits: {
          enabled: false
        },
        chart: {
          type: "bar"
        },
        title: {
          text:
            "Distribusi pasien Positif COVID-19 berdasarkan Jenis Kelamin dan Usia."
        },
        subtitle: {
          text:
            'Sumber: <a href="http://dinkes.sultengprov.go.id">Dinas kesehatan Provinsi Sulawesi Tengah.</a>'
        },
        accessibility: {
          point: {
            valueDescriptionFormat: "{index}. Usia {xDescription}, {value} orang."
          }
        },
        xAxis: [
          {
            categories: ["0-14", "15-19", "20-24", "25-49", "50-54", ">55"],
            reversed: false,
            labels: {
              step: 1
            },
            accessibility: {
              description: "Usia (Laki-Laki)"
            }
          },
          {
            // mirror axis on right side
            opposite: true,
            reversed: false,
            categories: ["0-14", "15-19", "20-24", "25-49", "50-54", ">55"],
            linkedTo: 0,
            labels: {
              step: 1
            },
            accessibility: {
              description: "Usia (Perempuan)"
            }
          }
        ],
        yAxis: {
          title: {
            text: null
          },
          min: -100,
          max: 100,
          labels: {
            formatter: function() {
              return Math.abs(this.value);
            }
          },
          accessibility: {
            description: "Persentase",
            rangeDescription: "Range: 0 to 100"
          }
        },

        plotOptions: {
          series: {
            stacking: "normal"
          }
        },

        tooltip: {
          formatter: function() {
            return (
              "<b>" +
              this.series.name +
              ", usia " +
              this.point.category +
              "</b><br/>" +
              "Jumlah: " +
              Highcharts.numberFormat(Math.abs(this.point.y), 1) +
              " orang"
            );
          }
        },

        series: [
          {
            name: "Laki-Laki (116 Orang)",
            data: [-8, -7, -9, -65, -9, -18]
          },
          {
            name: "Perempuan (43 Orang)",
            data: [3, 2, 3, 24, 4, 7]
          }
        ]
      }
    };
  },
  methods: {
    createChart() {
      var ctx = document.getElementById("sex-chart");
      Highcharts.chart(ctx, this.chartOptions);
    }
  },
  mounted() {
    this.createChart();
  }
};
</script>