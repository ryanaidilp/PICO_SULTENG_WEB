<template>
  <div class="overflow-hidden bg-white rounded-lg shadow-md">
    <div class="flex flex-wrap">
      <h4 class="p-5 text-xl md:w-1/2">
        <b>Umur dan Jenis Kelamin</b>
      </h4>
      <div class="flex flex-wrap items-stretch pb-2 mb-4 md:w-1/2" style="margin: auto;">
        <select
          v-model="optionSelected"
          class="mt-2 ml-4 select-option-selector"
          @change="changeGroupUsia($event.target.value)"
        >
          <option v-for="list in optionList" :key="list" :value="list">{{ list }}</option>
        </select>
      </div>
    </div>
    <hr />
    <section>
      <GChart
        class="p-5"
        type="BarChart"
        :data="barChartUmurJenisKelaminData"
        :options="barChartUmurJenisKelaminOptions"
      />
    </section>
  </div>
</template>

<script>
import { GChart } from "vue-google-charts";
export default {
  name: "BarStatUsia",
  components: {
    GChart
  },
  props: {
    propsDataRekapitulasiSulteng: {
      type: Object,
      default: () => ({
        hari_ke: "",
        pdp_total: 0,
        pdp_total_per_usia: {
          semua: {
            laki_laki: {
              "0_14": 0,
              "15_19": 0,
              "20_24": 0,
              "25_49": 0,
              "50_54": 0,
              atas_55: 0
            },
            perempuan: {
              "0_14": 0,
              "15_19": 0,
              "20_24": 0,
              "25_49": 0,
              "50_54": 0,
              atas_55: 0
            }
          }
        },
        positif: 0,
        positif_per_usia: {
          semua: {
            laki_laki: {
              "0_14": 0,
              "15_19": 0,
              "20_24": 0,
              "25_49": 0,
              "50_54": 0,
              atas_55: 0
            },
            perempuan: {
              "0_14": 0,
              "15_19": 0,
              "20_24": 0,
              "25_49": 0,
              "50_54": 0,
              atas_55: 0
            }
          }
        }
      })
    }
  },
  data() {
    return {
      optionList: ["PDP", "Positif"],
      optionSelected: "Positif",
      jsonDataRekapitulasiSulteng: {
        hari_ke: "",
        pdp_total: 0,
        pdp_total_per_usia: {
          "0_14": 0,
          "15_19": 0,
          "20_24": 0,
          "25_49": 0,
          "50_54": 0,
          atas_55: 0
        },
        positif: 0,
        positif_per_usia: {
          "0_14": 0,
          "15_19": 0,
          "20_24": 0,
          "25_49": 0,
          "50_54": 0,
          atas_55: 0
        }
      },
      barChartUmurJenisKelaminData: {
        cols: [
          { id: "Umur", label: "Umur", type: "string" },
          { id: "Pria", label: "Pria", type: "number" },
          { id: "Wanita", label: "Wanita", type: "number" }
        ],
        rows: [
          {
            c: [
              { v: 100, f: ">55" },
              { v: 0, f: "0" },
              { v: 0, f: "0" }
            ]
          },
          {
            c: [
              { v: 80, f: "49-54" },
              { v: 0, f: "0" },
              { v: 0, f: "0" }
            ]
          },
          {
            c: [
              { v: 60, f: "25-49" },
              { v: 0, f: "0" },
              { v: 0, f: "0" }
            ]
          },
          {
            c: [
              { v: 40, f: "20-24" },
              { v: 0, f: "0" },
              { v: 0, f: "0" }
            ]
          },
          {
            c: [
              { v: 20, f: "15-19" },
              { v: 0, f: "0" },
              { v: 0, f: "0" }
            ]
          },
          {
            c: [
              { v: 10, f: "0-14" },
              { v: 0, f: "0" },
              { v: 0, f: "0" }
            ]
          }
        ]
      },
      barChartUmurJenisKelaminOptions: {
        height: 350,
        marginRight: -100,
        series: {
          0: { color: "#74B9FF" },
          1: { color: "#2F363F" },
          2: { color: "#47535E" }
        },
        legend: {
          position: "bottom"
        },
        isStacked: true,
        vAxis: {
          format: "##;##"
        },
        hAxis: {
          format: ";",
          title: "Umur",
          viewWindowMode: "explicit",
          viewWindow: {
            min: -150,
            max: 150
          },
          ticks: [
            { v: -10, f: "10" },
            { v: -25, f: "25" },
            { v: -50, f: "50" },
            { v: -100, f: "100" },
            { v: -200, f: "200" },
            { v: -300, f: "300" },
            { v: -400, f: "400" },
            { v: -500, f: "500" },
            0,
            10,
            25,
            50,
            100,
            200,
            300,
            400,
            500
          ]
        },
        chartArea: { width: "80%" }
      }
    };
  },
  watch: {
    propsDataRekapitulasiSulteng() {
      this.jsonDataRekapitulasiSulteng = this.propsDataRekapitulasiSulteng;
      this.jsonDataRekapitulasiSulteng.positif_per_usia.semua.laki_laki[
        "0_14"
      ] = this.ifNegatifReturnZero(
        this.jsonDataRekapitulasiSulteng.positif_per_usia.semua.laki_laki[
          "0_14"
        ]
      );
      this.jsonDataRekapitulasiSulteng.positif_per_usia.semua.laki_laki[
        "15_19"
      ] = this.ifNegatifReturnZero(
        this.jsonDataRekapitulasiSulteng.positif_per_usia.semua.laki_laki[
          "15_19"
        ]
      );
      this.jsonDataRekapitulasiSulteng.positif_per_usia.semua.laki_laki[
        "20_24"
      ] = this.ifNegatifReturnZero(
        this.jsonDataRekapitulasiSulteng.positif_per_usia.semua.laki_laki[
          "20_24"
        ]
      );
      this.jsonDataRekapitulasiSulteng.positif_per_usia.semua.laki_laki[
        "25_49"
      ] = this.ifNegatifReturnZero(
        this.jsonDataRekapitulasiSulteng.positif_per_usia.semua.laki_laki[
          "25_49"
        ]
      );
      this.jsonDataRekapitulasiSulteng.positif_per_usia.semua.laki_laki[
        "50_54"
      ] = this.ifNegatifReturnZero(
        this.jsonDataRekapitulasiSulteng.positif_per_usia.semua.laki_laki[
          "50_54"
        ]
      );
      this.jsonDataRekapitulasiSulteng.positif_per_usia.semua.laki_laki.atas_55 = this.ifNegatifReturnZero(
        this.jsonDataRekapitulasiSulteng.positif_per_usia.semua.laki_laki
          .atas_55
      );
      this.jsonDataRekapitulasiSulteng.positif_per_usia.semua.perempuan[
        "0_14"
      ] = this.ifNegatifReturnZero(
        this.jsonDataRekapitulasiSulteng.positif_per_usia.semua.perempuan[
          "0_14"
        ]
      );
      this.jsonDataRekapitulasiSulteng.positif_per_usia.semua.perempuan[
        "15_19"
      ] = this.ifNegatifReturnZero(
        this.jsonDataRekapitulasiSulteng.positif_per_usia.semua.perempuan[
          "15_19"
        ]
      );
      this.jsonDataRekapitulasiSulteng.positif_per_usia.semua.perempuan[
        "20_24"
      ] = this.ifNegatifReturnZero(
        this.jsonDataRekapitulasiSulteng.positif_per_usia.semua.perempuan[
          "20_24"
        ]
      );
      this.jsonDataRekapitulasiSulteng.positif_per_usia.semua.perempuan[
        "25_49"
      ] = this.ifNegatifReturnZero(
        this.jsonDataRekapitulasiSulteng.positif_per_usia.semua.perempuan[
          "25_49"
        ]
      );
      this.jsonDataRekapitulasiSulteng.positif_per_usia.semua.perempuan[
        "50_54"
      ] = this.ifNegatifReturnZero(
        this.jsonDataRekapitulasiSulteng.positif_per_usia.semua.perempuan[
          "50_54"
        ]
      );
      this.jsonDataRekapitulasiSulteng.positif_per_usia.semua.perempuan.atas_55 = this.ifNegatifReturnZero(
        this.jsonDataRekapitulasiSulteng.positif_per_usia.semua.perempuan
          .atas_55
      );
      this.changeGroupUsia("Positif");
    }
  },
  methods: {
    ifNullReturnZero(str) {
      if (str === null) {
        return 0;
      } else {
        return str;
      }
    },
    ifNegatifReturnZero(number) {
      if (number < 0) {
        return 0;
      } else {
        return number;
      }
    },
    formatDate(date) {
      const d = new Date(date);
      const year = d.getFullYear();
      let month = "" + (d.getMonth() + 1);
      let day = "" + d.getDate();
      if (month.length < 2) {
        month = "0" + month;
      }
      if (day.length < 2) {
        day = "0" + day;
      }
      return [day, month, year].join("-");
    },
    resetBarChartUmurJenisKelaminData() {
      this.barChartUmurJenisKelaminData = {
        cols: [
          { id: "Umur", label: "Umur", type: "string" },
          { id: "Pria", label: "Pria", type: "number" },
          { id: "Wanita", label: "Wanita", type: "number" }
        ],
        rows: [
          {
            c: [
              { v: 100, f: ">55" },
              { v: 0, f: "0" },
              { v: 0, f: "0" }
            ]
          },
          {
            c: [
              { v: 80, f: "49-54" },
              { v: 0, f: "0" },
              { v: 0, f: "0" }
            ]
          },
          {
            c: [
              { v: 60, f: "25-49" },
              { v: 0, f: "0" },
              { v: 0, f: "0" }
            ]
          },
          {
            c: [
              { v: 40, f: "20-24" },
              { v: 0, f: "0" },
              { v: 0, f: "0" }
            ]
          },
          {
            c: [
              { v: 20, f: "15-19" },
              { v: 0, f: "0" },
              { v: 0, f: "0" }
            ]
          },
          {
            c: [
              { v: 10, f: "0-14" },
              { v: 0, f: "0" },
              { v: 0, f: "0" }
            ]
          }
        ]
      };
    },
    changeGroupUsia(stat) {
      const self = this;
      let filter = "positif_per_usia";
      this.resetBarChartUmurJenisKelaminData();
      if (stat === "PDP") {
        filter = "pdp_total_per_usia";
      } else if (stat === "Positif") {
        filter = "positif_per_usia";
      }
      // Semua Umur
      this.barChartUmurJenisKelaminData = {
        cols: [
          { id: "Umur", label: "Umur", type: "string" },
          { id: "Pria", label: "Pria", type: "number" },
          { id: "Wanita", label: "Wanita", type: "number" }
        ],
        rows: [
          {
            c: [
              { v: 100, f: ">55" },
              {
                v:
                  parseInt(
                    this.jsonDataRekapitulasiSulteng[filter].semua.laki_laki
                      .atas_55
                  ) * -1,
                f: parseInt(
                  this.jsonDataRekapitulasiSulteng[filter].semua.laki_laki
                    .atas_55
                ).toString()
              },
              {
                v: parseInt(
                  this.jsonDataRekapitulasiSulteng[filter].semua.perempuan
                    .atas_55
                ),
                f: parseInt(
                  this.jsonDataRekapitulasiSulteng[filter].semua.perempuan
                    .atas_55
                ).toString()
              }
            ]
          },
          {
            c: [
              { v: 80, f: "49-54" },
              {
                v:
                  parseInt(
                    this.jsonDataRekapitulasiSulteng[filter].semua.laki_laki[
                      "50_54"
                    ]
                  ) * -1,
                f: parseInt(
                  this.jsonDataRekapitulasiSulteng[filter].semua.laki_laki[
                    "50_54"
                  ]
                ).toString()
              },
              {
                v: parseInt(
                  this.jsonDataRekapitulasiSulteng[filter].semua.perempuan[
                    "50_54"
                  ]
                ),
                f: parseInt(
                  this.jsonDataRekapitulasiSulteng[filter].semua.perempuan[
                    "50_54"
                  ]
                ).toString()
              }
            ]
          },
          {
            c: [
              { v: 60, f: "25-49" },
              {
                v:
                  parseInt(
                    this.jsonDataRekapitulasiSulteng[filter].semua.laki_laki[
                      "25_49"
                    ]
                  ) * -1,
                f: parseInt(
                  this.jsonDataRekapitulasiSulteng[filter].semua.laki_laki[
                    "25_49"
                  ]
                ).toString()
              },
              {
                v: parseInt(
                  this.jsonDataRekapitulasiSulteng[filter].semua.perempuan[
                    "25_49"
                  ]
                ),
                f: parseInt(
                  this.jsonDataRekapitulasiSulteng[filter].semua.perempuan[
                    "25_49"
                  ]
                ).toString()
              }
            ]
          },
          {
            c: [
              { v: 40, f: "20-24" },
              {
                v:
                  parseInt(
                    this.jsonDataRekapitulasiSulteng[filter].semua.laki_laki[
                      "20_24"
                    ]
                  ) * -1,
                f: parseInt(
                  this.jsonDataRekapitulasiSulteng[filter].semua.laki_laki[
                    "20_24"
                  ]
                ).toString()
              },
              {
                v: parseInt(
                  this.jsonDataRekapitulasiSulteng[filter].semua.perempuan[
                    "20_24"
                  ]
                ),
                f: parseInt(
                  this.jsonDataRekapitulasiSulteng[filter].semua.perempuan[
                    "20_24"
                  ]
                ).toString()
              }
            ]
          },
          {
            c: [
              { v: 20, f: "15-19" },
              {
                v:
                  parseInt(
                    this.jsonDataRekapitulasiSulteng[filter].semua.laki_laki[
                      "15_19"
                    ]
                  ) * -1,
                f: parseInt(
                  this.jsonDataRekapitulasiSulteng[filter].semua.laki_laki[
                    "15_19"
                  ]
                ).toString()
              },
              {
                v: parseInt(
                  this.jsonDataRekapitulasiSulteng[filter].semua.perempuan[
                    "15_19"
                  ]
                ),
                f: parseInt(
                  this.jsonDataRekapitulasiSulteng[filter].semua.perempuan[
                    "15_19"
                  ]
                ).toString()
              }
            ]
          },
          {
            c: [
              { v: 10, f: "0-14" },
              {
                v:
                  parseInt(
                    this.jsonDataRekapitulasiSulteng[filter].semua.laki_laki[
                      "0_14"
                    ]
                  ) * -1,
                f: parseInt(
                  this.jsonDataRekapitulasiSulteng[filter].semua.laki_laki[
                    "0_14"
                  ]
                ).toString()
              },
              {
                v: parseInt(
                  this.jsonDataRekapitulasiSulteng[filter].semua.perempuan[
                    "0_14"
                  ]
                ),
                f: parseInt(
                  this.jsonDataRekapitulasiSulteng[filter].semua.perempuan[
                    "0_14"
                  ]
                ).toString()
              }
            ]
          }
        ]
      };
      let max = 0;
      let asc = 0;
      // find max count for scala
      for (let j = 0; j < self.barChartUmurJenisKelaminData.rows.length; j++) {
        if (self.barChartUmurJenisKelaminData.rows[j].c[2].v > max) {
          max = self.barChartUmurJenisKelaminData.rows[j].c[2].v;
        }
        if (self.barChartUmurJenisKelaminData.rows[j].c[1].v * -1 > max) {
          max = self.barChartUmurJenisKelaminData.rows[j].c[1].v * -1;
        }
        asc = Math.ceil(max / 10);
        self.barChartUmurJenisKelaminOptions.hAxis.viewWindow.min =
          (max + asc) * -1;
        self.barChartUmurJenisKelaminOptions.hAxis.viewWindow.max = max + asc;
      }
      // set number of scala
      self.barChartUmurJenisKelaminOptions.hAxis.ticks = [];
      if (max > 0) {
        asc = Math.ceil(max / 10);
        for (let k = 0; k <= max + asc; k = k + asc) {
          self.barChartUmurJenisKelaminOptions.hAxis.ticks.push({
            v: k * -1,
            f: k.toString()
          });
        }
        for (let k = 0; k <= max + asc; k = k + asc) {
          self.barChartUmurJenisKelaminOptions.hAxis.ticks.push(k);
        }
      } else {
        self.barChartUmurJenisKelaminOptions.hAxis.ticks.push({ v: 0, f: "0" });
        self.barChartUmurJenisKelaminOptions.hAxis.ticks.push(0);
      }
    }
  }
};
</script>

<style lang="scss" scoped>
.button-selector {
  @apply px-6 py-2 rounded-md border border-solid border-blue-500
  text-blue-500 bg-white;
  &[active] {
    @apply text-white bg-blue-500;
  }
}
.select-option-selector {
  border-radius: 0.2rem;
  border-width: 1px;
  border-style: solid;
  border-color: #555;
  color: #555;
  background-color: #fff;
  height: 30px;
  width: 160px;
  padding: 0px;
  margin-right: 20px;
}

</style>