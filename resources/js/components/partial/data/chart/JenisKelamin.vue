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
            valueDescriptionFormat: "{index}. Usia {xDescription}, {value}%."
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
          labels: {
            formatter: function() {
              return Math.abs(this.value) + "%";
            }
          },
          accessibility: {
            description: "Persentase",
            rangeDescription: "Range: 0 to 100%"
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
              "Persentase: " +
              Highcharts.numberFormat(Math.abs(this.point.y), 1) +
              "%"
            );
          }
        },

        series: [
          {
            name: "Laki-Laki (93 Orang)",
            data: [-5.38, -5.38, -6.45, -55.92, -8.60, -18.27]
          },
          {
            name: "Perempuan (33 Orang)",
            data: [6.06, 6.06, 6.06, 54.55, 9.09, 18.18]
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