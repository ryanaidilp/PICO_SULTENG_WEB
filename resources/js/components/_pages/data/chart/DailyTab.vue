<template>
  <div class="flex flex-col text-gray-800 bg-white rounded-lg vld-parent">
    <p class="ml-8 font-semibold md:text-xl">
      Kasus harian {{ selectedCase }} di {{ name }}
    </p>
    <div class="flex flex-row flex-wrap">
      <v-select
        v-if="selectedCase == 'ODP' || selectedCase == 'PDP'"
        :options="optionLocale"
        :reduce="(optionLocale) => optionLocale.code"
        label="name"
        class="w-1/2 mx-8 mt-4 text-xs rounded-lg md:text-base md:w-1/4"
        v-model="selected"
        :value="selected"
        :clearable="false"
      />
      <v-select
        v-else
        :options="options"
        :reduce="(options) => options.code"
        label="name"
        class="w-1/2 mx-8 mt-4 text-xs rounded-lg md:text-base md:w-1/4"
        v-model="selected"
        :value="selected"
        :clearable="false"
      />
      <v-select
        v-if="selected != 'Indonesia'"
        :options="optionCasesLocal"
        class="w-1/2 mx-8 mt-4 text-xs rounded-lg md:text-base md:w-1/4"
        v-model="selectedCase"
        :value="selectedCase"
        :clearable="false"
      />
      <v-select
        v-else
        :options="optionCases"
        class="w-1/2 mx-8 mt-4 text-xs rounded-lg md:text-base md:w-1/4"
        v-model="selectedCase"
        :value="selectedCase"
        :clearable="false"
      />
    </div>
    <div v-if="selected && selectedCase" class="mt-8 border-t-2">
      <chart-local-positive
        v-show="!isLoading()"
        :wilayah="selected"
        :props-data-rekapitulasi-prov="jsonDataRekapitulasiProv"
        :props-data-rekapitulasi-nasional="jsonDataRekapitulasiNasional"
        :props-data-rekapitulasi-kabupaten="jsonDataRekapitulasiKabupaten"
        :kasus="selectedCase"
        class="mt-4"
      ></chart-local-positive>
    </div>
    <div v-if="isLoading()" class="vld-icon" style="height: 400px">
      <loading
        :active="isLoading()"
        :is-full-page="false"
        :opacity="0.8"
        :height="400"
        color="#59F"
      >
      </loading>
    </div>
  </div>
</template>
<script>
import Loading from "vue-loading-overlay";
import "vue-loading-overlay/dist/vue-loading.css";
import VSelect from "vue-select";
import "vue-select/dist/vue-select.css";
import ChartLocalPositive from "@/components/_pages/data/chart/DailyChart";
export default {
  components: {
    VSelect,
    Loading,
    ChartLocalPositive,
  },
  data() {
    return {
      isEmpty: false,
      name: "Sulawesi Tengah",
      selected: "Sulawesi Tengah",
      options: [
        { name: "Sulawesi Tengah", code: "Sulawesi Tengah" },
        { name: "Indonesia", code: "Indonesia" },
      ],
      optionLocale: [{ name: "Sulawesi Tengah", code: "Sulawesi Tengah" }],
      selectedCase: "Positif",
      optionCasesLocal: ["Positif", "Sembuh", "Meninggal", "ODP", "PDP"],
      optionCases: ["Positif", "Sembuh", "Meninggal"],
      jsonDataRekapitulasiProv: [],
      jsonDataRekapitulasiNasional: [],
      jsonDataRekapitulasiKabupaten: [],
    };
  },
  props: {
    propsDataRekapitulasiProv: {
      type: Array,
      default: () => [],
    },
    propsDataRekapitulasiKab: {
      type: Array,
      default: () => [],
    },
    propsDataRekapitulasiNasional: {
      type: Array,
      default: () => [],
    },
  },
  methods: {
    addOptions() {
      _.map(this.jsonDataRekapitulasiKabupaten, (item) => {
        var newOption = { name: item.name, code: item.name };
        if (!_.find(this.options, newOption)) {
          this.options.push(newOption);
        }
        if (!_.find(this.optionLocale, newOption)) {
          this.optionLocale.push(newOption);
        }
      });
    },
    isLoading() {
      return this.jsonDataRekapitulasiProv.length == 0 ||
        this.jsonDataRekapitulasiNasional.length == 0 ||
        this.jsonDataRekapitulasiKabupaten.length == 0
        ? true
        : false;
    },
    checkEmpty() {
      if (this.selected === "Sulawesi Tengah") {
        if (this.jsonDataRekapitulasiProv.length > 0) {
          this.isEmpty = false;
        } else {
          this.isEmpty = true;
        }
      } else if (this.selected === "Indonesia") {
        if (this.jsonDataRekapitulasiNasional.length > 0) {
          this.isEmpty = false;
        } else {
          this.isEmpty = true;
        }
      } else {
        if (this.jsonDataRekapitulasiKabupaten.length > 0) {
          this.isEmpty = false;
        } else {
          this.isEmpty = true;
        }
      }
    },
  },
  watch: {
    propsDataRekapitulasiKab() {
      this.jsonDataRekapitulasiKabupaten = this.propsDataRekapitulasiKab;
      this.addOptions();
    },
    propsDataRekapitulasiProv() {
      this.jsonDataRekapitulasiProv = this.propsDataRekapitulasiProv;
    },
    propsDataRekapitulasiNasional() {
      this.jsonDataRekapitulasiNasional = this.propsDataRekapitulasiNasional;
    },
    selected: function () {
      this.options.forEach((element) => {
        if (element.code == this.selected) {
          this.name = element.name;
        }
      });
      this.checkEmpty();
    },
  },
  mounted() {
    this.jsonDataRekapitulasiProv = this.propsDataRekapitulasiProv;
    this.jsonDataRekapitulasiNasional = this.propsDataRekapitulasiNasional;
    this.jsonDataRekapitulasiKabupaten = this.propsDataRekapitulasiKab;
    this.addOptions();
  },
};
</script>

<style scoped>
.vld-icon {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}
</style>