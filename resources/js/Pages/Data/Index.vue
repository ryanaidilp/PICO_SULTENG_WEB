<template>
  <layout>
    <div class="container mx-auto text-gray-800">
      <section class="m-4 mb-8 md:m-8">
        <div class="w-full">
          <dashboard
            :national.sync="national"
            :local.sync="local"
            :lastUpdate="formatDate(updatedAt)"
          ></dashboard>
        </div>
      </section>
      <section class="px-4 m-4 mb-8">
        <div class="w-full">
          <dataRDT :props-data-rekapitulasi-sulteng.sync="tests[1]" />
        </div>
      </section>
      <section class="px-4 m-4 mb-8">
        <div class="w-full">
          <dataPCR :props-data-rekapitulasi-sulteng.sync="tests[0]" />
        </div>
      </section>
      <section class="m-4 mb-8 md:m-8">
        <div class="w-full">
          <h3
            class="w-full mt-16 text-lg font-bold text-center  md:text-left md:ml-6 md:text-3xl"
          >
            Peta Penyebaran Kasus
          </h3>
          <map-tab
            :regencies="regencies"
            :provinces="provinces"
            class="mt-4"
          ></map-tab>
        </div>
      </section>
      <section class="m-4 mb-8 md:m-8">
        <div class="w-full">
          <h3
            class="w-full text-lg font-bold text-center  md:text-left md:ml-6 md:text-3xl"
          >
            Tabel Penyebaran Kasus
          </h3>
          <table-tab
            :props-data-provinsi-nasional.sync="provinces"
            :props-data-sulteng-kabupaten.sync="regencies"
            class="mt-4"
          ></table-tab>
        </div>
      </section>
      <section class="m-4 mb-8 md:m-8">
        <div class="w-full">
          <h3
            class="w-full text-lg font-bold text-center  md:text-left md:ml-6 md:text-3xl"
          >
            Visualisasi Data Kasus COVID-19
          </h3>
          <chart-tab
            :props-data-rekapitulasi-prov.sync="province_data"
            :props-data-rekapitulasi-nasional.sync="national_data"
            :props-data-rekapitulasi-kabupaten.sync="regencies_daily"
            class="mt-4"
          ></chart-tab>
        </div>
      </section>
      <section class="m-4 mb-8 md:m-8">
        <div class="w-full">
          <rt-chart
            :props-data-rekapitulasi-prov.sync="province_data"
          ></rt-chart>
        </div>
      </section>
      <section class="m-4 mb-8 md:m-8">
        <div class="w-full">
          <div class="flex flex-col w-full lg:flex-row">
            <keep-alive>
              <new-case
                :props-data-provinsi.sync="regencyNewCase"
                class="w-full lg:w-2/3"
              ></new-case>
            </keep-alive>
            <keep-alive>
              <pie-chart
                :props-data-provinsi.sync="
                  province_data[province_data.length - 1]
                "
                class="w-full lg:w-1/3"
              ></pie-chart>
            </keep-alive>
          </div>
        </div>
      </section>
      <section class="m-4 mb-8 md:m-12">
        <div class="w-full chart-container">
          <BarStatGender :props-data-rekapitulasi-sulteng.sync="genders" />
          <BarStatAge :props-data-rekapitulasi-sulteng.sync="genders" />
        </div>
      </section>
      <section class="m-4 mb-8 md:m-8">
        <div class="grid w-full grid-cols-1 gap-6 md:grid-cols-2">
          <div
            class="flex-col p-6 mx-4 text-center bg-white rounded-lg shadow-lg  md:flex-row hover:text-blue-400"
          >
            <inertia-link
              :href="route('table')"
              target="_blank"
              class="mx-auto text-sm font-bold lg:text-xl"
            >
              Akses DATA publik - Data PICO SulTeng disini
              <i class="fas fa-angle-right"></i>
            </inertia-link>
          </div>
          <div
            class="flex-col p-6 mx-4 text-center bg-white rounded-lg shadow-lg  md:flex-row hover:text-blue-400"
          >
            <a
              href="https://banuacoders.com/api/pico"
              target="_blank"
              class="mx-auto text-sm font-bold lg:text-xl"
            >
              Akses API publik - Data PICO SulTeng disini
              <i class="fas fa-angle-right"></i>
            </a>
          </div>
        </div>
      </section>
      <section class="m-4 mb-8 md:m-8">
        <div class="w-full">
          <partner :partners="partners" class="mt-16"></partner>
        </div>
      </section>
    </div>
  </layout>
</template>

<script>
import { mapState, mapActions } from "vuex";
import Layout from "@/layout/Layout";
import Partner from "@/Shared/PartnerFooter";
import Dashboard from "@/components/_pages/data/Dashboard";
import DataRDT from "@/components/_pages/data/DataRDT";
import DataPCR from "@/components/_pages/data/DataPCR";
import MapTab from "@/components/_pages/data/map/MapTab";
import TableTab from "@/components/_pages/data/table/TableTab";
import ChartTab from "@/components/_pages/data/chart/ChartTab";
import { Inertia } from "@inertiajs/inertia";
import BarStatGender from "@/components/_pages/data/chart/BarStatGender";
import BarStatAge from "@/components/_pages/data/chart/BarStatAge";
import RtChart from "@/components/_pages/data/chart/RtChart";
import NewCase from "@/components/_pages/data/chart/NewCase";
import PieChart from "@/components/_pages/data/chart/PieChart";
export default {
  props: {
    partners: {
      type: Array,
      required: true,
    },
    regencyNewCase: {
      type: Array,
      required: true,
    },
    tests: {
      type: Array,
      required: true,
    },
    regencies: {
      type: Array,
      required: true,
    },
    provinces: {
      type: Array,
      required: true,
    },
    genders: {
      type: Object,
      required: true,
    },
  },
  components: {
    Layout,
    Partner,
    Dashboard,
    DataRDT,
    DataPCR,
    MapTab,
    TableTab,
    ChartTab,
    BarStatGender,
    BarStatAge,
    RtChart,
    NewCase,
    PieChart,
  },
  computed: {
    ...mapState([
      "local",
      "national",
      "province_data",
      "national_data",
      "regencies_daily",
    ]),
    updatedAt() {
      if (_.isEmpty(this.local)) {
        return new Date();
      }
      return this.local.tanggal;
    },
  },
  methods: {
    ...mapActions([
      "loadNationalData",
      "loadProvinceData",
      "loadRegenciesWithDaily",
    ]),
    reloadData() {
      setInterval(() => {
        Inertia.reload({
          only: ["lastUpdate", "regencies", "provinces"],
        });
      }, 5 * 60 * 1000);
      setInterval(() => {
        this.loadStatistics();
      }, 10 * 60 * 1000);
    },
    loadStatistics() {
      this.loadRegenciesWithDaily(72);
      this.loadProvinceData(72);
      this.loadNationalData();
    },
  },
  mounted() {
    if (this.province_data.length <= 0) {
      this.loadProvinceData(72);
    }
    if (this.national_data.length <= 0) {
      this.loadNationalData();
    }
    if (this.regencies_daily.length <= 0) {
      this.loadRegenciesWithDaily(72);
    }
    this.loadStatistics();
    this.reloadData();
  },
};
</script>

<style lang="scss" scoped>
.chart-container {
  display: grid;
  grid-template-columns: 1fr;
  column-gap: 1rem;
  row-gap: 1rem;
  @screen md {
    grid-template-columns: 2fr 4fr;
  }
}
</style>