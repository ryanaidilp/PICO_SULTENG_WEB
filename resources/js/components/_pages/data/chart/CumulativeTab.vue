<template>
  <div class="text-gray-800 bg-white rounded-lg">
    <p class="ml-8 font-semibold md:text-xl">
      Kasus kumulatif {{ selectedCase }} di {{ name }}
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
      <keep-alive>
        <chart-local-cumulative
          :lokasi="selected"
          :kejadian="selectedCase"
          :props-data-rekapitulasi-prov="jsonDataRekapitulasiProv"
          :props-data-rekapitulasi-nasional="jsonDataRekapitulasiNasional"
          class="mt-4"
        ></chart-local-cumulative>
      </keep-alive>
    </div>
    <div v-else class="my-8 text-lg font-bold text-center bg-white rounded-lg">
      Tidak Ada wilayah/kasus yang dipilih
    </div>
  </div>
</template>
<script>
import VSelect from "vue-select";
import "vue-select/dist/vue-select.css";
import ChartLocalCumulative from "@/components/_pages/data/chart/CumulativeChart";
export default {
  components: {
    VSelect,
    ChartLocalCumulative,
  },
  data() {
    return {
      name: "Sulawesi Tengah",
      selected: "Sulawesi Tengah",
      options: [
        { name: "Sulawesi Tengah", code: "Sulawesi Tengah" },
        { name: "Indonesia", code: "Indonesia" },
        { name: "Banggai", code: 1 },
        { name: "Banggai Kepulauan", code: 2 },
        { name: "Banggai Laut", code: 3 },
        { name: "Buol", code: 4 },
        { name: "Donggala", code: 5 },
        { name: "Morowali", code: 6 },
        { name: "Morowali Utara", code: 7 },
        { name: "Parigi Moutong", code: 8 },
        { name: "Poso", code: 9 },
        { name: "Sigi", code: 10 },
        { name: "Tojo Una-Una", code: 11 },
        { name: "Toli-Toli", code: 12 },
        { name: "Kota Palu", code: 13 },
      ],
      optionLocale: [
        { name: "Sulawesi Tengah", code: "Sulawesi Tengah" },
        { name: "Banggai", code: 1 },
        { name: "Banggai Kepulauan", code: 2 },
        { name: "Banggai Laut", code: 3 },
        { name: "Buol", code: 4 },
        { name: "Donggala", code: 5 },
        { name: "Morowali", code: 6 },
        { name: "Morowali Utara", code: 7 },
        { name: "Parigi Moutong", code: 8 },
        { name: "Poso", code: 9 },
        { name: "Sigi", code: 10 },
        { name: "Tojo Una-Una", code: 11 },
        { name: "Toli-Toli", code: 12 },
        { name: "Kota Palu", code: 13 },
      ],
      selectedCase: "Positif",
      optionCasesLocal: ["Positif", "ODP", "PDP"],
      optionCases: ["Positif"],
      jsonDataRekapitulasiProv: [],
      jsonDataRekapitulasiNasional: [],
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
  watch: {
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
    },
  },
  mounted() {
    this.jsonDataRekapitulasiProv = this.propsDataRekapitulasiProv;
    this.jsonDataRekapitulasiNasional = this.propsDataRekapitulasiNasional;
  },
};
</script>