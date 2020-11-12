<template>
  <div class="overflow-hidden bg-white rounded-lg shadow-md">
    <div class="flex flex-wrap">
      <h4 class="p-5 text-xl md:w-1/2">
        <b>Jenis Kelamin</b>
      </h4>
      <select
        v-model="optionSelected"
        class="select-option-selector md:w-1/2"
        @change="changeGroupJenisKelamin($event.target.value)"
      >
        <option v-for="list in optionList" :key="list" :value="list">
          {{ list }}
        </option>
      </select>
    </div>
    <hr />
    <GChart
      class="p-5"
      type="PieChart"
      :data="pieChartJenisKelaminData"
      :options="pieChartJenisKelaminOptions"
    />
  </div>
</template>

<script>
import { GChart } from "vue-google-charts";
export default {
  name: "BarStatGender",
  components: {
    GChart,
  },
  props: {
    propsDataRekapitulasiSulteng: {
      type: Object,
      default: () => ({
        hari_ke: "",
        pdp_total: 0,
        pdp_total_per_gender: {
          laki_laki: 0,
          perempuan: 0,
        },
        positif: 0,
        positif_per_gender: {
          laki_laki: 0,
          perempuan: 0,
        },
      }),
    },
  },
  data() {
    return {
      optionList: ["PDP", "Positif"],
      optionSelected: "Positif",
      jsonDataRekapitulasiSulteng: {
        hari_ke: "",
        pdp_total: 0,
        pdp_total_per_gender: {
          laki_laki: 0,
          perempuan: 0,
        },
        positif: 0,
        positif_per_gender: {
          laki_laki: 0,
          perempuan: 0,
        },
      },
      pieChartJenisKelaminData: [
        ["Jenis Kelamin", "Data"],
        ["Pria", 0],
        ["Wanita", 0],
        ["N/A", 0],
      ],
      pieChartJenisKelaminOptions: {
        height: 350,
        widht: 350,
        slices: {
          0: { color: "#74B9FF" },
          1: { color: "#2F363F" },
          2: { color: "#47535E" },
        },
        legend: {
          position: "bottom",
        },
        pieHole: 0.4,
        chartArea: { width: "80%" },
      },
    };
  },
  watch: {
    propsDataRekapitulasiSulteng() {
      this.jsonDataRekapitulasiSulteng = this.propsDataRekapitulasiSulteng;
      this.changeGroupJenisKelamin("Positif");
    },
  },
  methods: {
    ifNullReturnZero(str) {
      if (str === null) {
        return 0;
      } else {
        return str;
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
    resetPieChartJenisKelaminData() {
      this.pieChartJenisKelaminData = [
        ["Jenis Kelamin", "Data"],
        ["Pria", 0],
        ["Wanita", 0],
        ["N/A", 0],
      ];
    },
    changeGroupJenisKelamin(stat) {
      const self = this;
      this.resetPieChartJenisKelaminData();
      let tempJenisKelaminPria = 0;
      let tempJenisKelaminWanita = 0;
      let tempJenisKelaminNull = 0;
      if (stat === "PDP") {
        tempJenisKelaminPria = parseInt(
          this.jsonDataRekapitulasiSulteng.pdp_total_per_gender.laki_laki
        );
        tempJenisKelaminWanita = parseInt(
          this.jsonDataRekapitulasiSulteng.pdp_total_per_gender.perempuan
        );
        tempJenisKelaminNull =
          parseInt(this.jsonDataRekapitulasiSulteng.pdp_total) -
          parseInt(tempJenisKelaminPria + tempJenisKelaminWanita);
        if (tempJenisKelaminNull < 0) {
          tempJenisKelaminNull = 0;
        }
      } else if (stat === "Positif") {
        tempJenisKelaminPria = parseInt(
          this.jsonDataRekapitulasiSulteng.positif_per_gender.laki_laki
        );
        tempJenisKelaminWanita = parseInt(
          this.jsonDataRekapitulasiSulteng.positif_per_gender.perempuan
        );
        tempJenisKelaminNull =
          parseInt(tempJenisKelaminPria) -
          parseInt(tempJenisKelaminPria + tempJenisKelaminWanita);
        if (tempJenisKelaminNull < 0) {
          tempJenisKelaminNull = 0;
        }
      }
      self.pieChartJenisKelaminData = [
        ["Jenis Kelamin", "Data"],
        ["Pria", tempJenisKelaminPria],
        ["Wanita", tempJenisKelaminWanita],
        ["N/A", tempJenisKelaminNull],
      ];
    },
  },
  mounted() {
    this.jsonDataRekapitulasiSulteng = this.propsDataRekapitulasiSulteng;
    this.changeGroupJenisKelamin("Positif");
  },
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
  margin: auto;
  padding: 0px;
}
</style>