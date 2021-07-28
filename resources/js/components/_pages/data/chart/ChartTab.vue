<template>
  <div class="flex flex-wrap mx-4">
    <div class="w-full">
      <ul
        class="flex flex-row flex-wrap w-full pt-3 pb-4 mb-0 list-none md:w-1/2"
      >
        <li class="flex-auto mr-2 -mb-px text-center last:mr-0">
          <a
            class="block px-5 py-3 text-xs font-bold leading-normal uppercase rounded shadow-lg "
            v-on:click="toggleTabs(1)"
            v-bind:class="{
              'text-blue-600 bg-white': openTab !== 1,
              'text-white bg-blue-600': openTab === 1,
            }"
          >
            <i class="fas fa-chart-bar"></i> Kasus Harian
          </a>
        </li>
        <li class="flex-auto mr-2 -mb-px text-center last:mr-0">
          <a
            class="block px-5 py-3 text-xs font-bold leading-normal uppercase rounded shadow-lg "
            v-on:click="toggleTabs(2)"
            v-bind:class="{
              'text-blue-600 bg-white': openTab !== 2,
              'text-white bg-blue-600': openTab === 2,
            }"
          >
            <i class="fas fa-chart-line"></i> Kasus Kumulatif
          </a>
        </li>
      </ul>
      <div class="relative flex flex-col w-full min-w-0 mb-6 break-words">
        <div class="flex-auto pt-5 bg-white rounded-lg shadow-lg">
          <div class="tab-content tab-space">
            <div v-bind:class="{ hidden: openTab !== 1, block: openTab === 1 }">
              <keep-alive>
                <chart-daily
                  :props-data-rekapitulasi-prov="propsDataRekapitulasiProv"
                  :props-data-rekapitulasi-nasional="
                    propsDataRekapitulasiNasional
                  "
                  :props-data-rekapitulasi-kab.sync="
                    propsDataRekapitulasiKabupaten
                  "
                ></chart-daily>
              </keep-alive>
            </div>
            <div v-bind:class="{ hidden: openTab !== 2, block: openTab === 2 }">
              <keep-alive>
                <chart-total
                  :props-data-rekapitulasi-prov="propsDataRekapitulasiProv"
                  :props-data-rekapitulasi-nasional="
                    propsDataRekapitulasiNasional
                  "
                  :props-data-rekapitulasi-kab.sync="
                    propsDataRekapitulasiKabupaten
                  "
                ></chart-total>
              </keep-alive>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import ChartDaily from "@/components/_pages/data/chart/DailyTab";
import ChartTotal from "@/components/_pages/data/chart/CumulativeTab";
export default {
  props: {
    propsDataRekapitulasiKabupaten: {
      type: Array,
    },
    propsDataRekapitulasiProv: {
      type: Array,
    },
    propsDataRekapitulasiNasional: {
      type: Array,
    },
  },
  components: {
    ChartDaily,
    ChartTotal,
  },
  data() {
    return {
      openTab: 1,
    };
  },
  methods: {
    toggleTabs: function (tabNumber) {
      this.openTab = tabNumber;
    },
  },
};
</script>

<style lang="scss" scoped>
</style>