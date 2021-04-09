<template>
  <layout>
    <div class="container mx-auto text-gray-800">
      <section class="m-4 mb-8 md:m-8">
        <div class="w-full">
          <dashboard
            :national.sync="national"
            :local.sync="local"
            :lastUpdate="lastUpdate"
          ></dashboard>
        </div>
      </section>
      <section class="px-4 m-4 mb-8 md:m-8">
        <div class="w-full">
          <dataRDT :props-data-rekapitulasi-sulteng.sync="tests[1]" />
        </div>
      </section>
      <section class="px-4 m-4 mb-8 md:m-8">
        <div class="w-full">
          <dataPCR :props-data-rekapitulasi-sulteng.sync="tests[0]" />
        </div>
      </section>
      <section class="m-4 mb-8 md:m-8">
        <div class="w-full">
          <h3
            class="w-full mt-16 text-lg font-bold text-center md:text-left md:ml-6 md:text-3xl"
          >
            Peta Penyebaran Kasus
          </h3>
          <map-tab
            :districts="districts"
            :provinces="provinces"
            class="mt-4"
          ></map-tab>
        </div>
      </section>
      <section class="m-4 mb-8 md:m-8">
        <div class="w-full">
          <h3
            class="w-full text-lg font-bold text-center md:text-left md:ml-6 md:text-3xl"
          >
            Tabel Penyebaran Kasus
          </h3>
          <table-tab
            :props-data-provinsi-nasional.sync="provinces"
            :props-data-sulteng-kabupaten.sync="districts"
            class="mt-4"
          ></table-tab>
        </div>
      </section>
      <section class="m-4 mb-8 md:m-8">
        <div class="w-full">
          <h3
            class="w-full text-lg font-bold text-center md:text-left md:ml-6 md:text-3xl"
          >
            Visualisasi Data Kasus COVID-19
          </h3>
          <chart-tab
            :props-data-rekapitulasi-prov.sync="recapLocal"
            :props-data-rekapitulasi-nasional.sync="recapNational"
            class="mt-4"
          ></chart-tab>
        </div>
      </section>
      <section class="m-4 mb-8 md:m-8">
        <div class="w-full">
          <rt-chart :props-data-rekapitulasi-prov.sync="recapLocal"></rt-chart>
        </div>
      </section>
      <section class="m-4 mb-8">
        <div class="w-full">
          <div class="flex flex-col w-full mt-4 lg:flex-row">
            <keep-alive>
              <new-case
                :props-data-provinsi.sync="recapLocal[recapLocal.length - 1]"
                class="w-full lg:w-1/2"
              ></new-case>
            </keep-alive>
            <keep-alive>
              <pie-chart
                :props-data-provinsi.sync="recapLocal[recapLocal.length - 1]"
                class="w-full mt-4 lg:w-1/2 lg:mt-0"
              ></pie-chart>
            </keep-alive>
          </div>
        </div>
      </section>
      <section class="m-4 mb-8 md:m-8">
        <div class="w-full chart-container">
          <BarStatGender :props-data-rekapitulasi-sulteng.sync="genders" />
          <BarStatAge :props-data-rekapitulasi-sulteng.sync="genders" />
        </div>
      </section>
      <section class="m-4 mb-8">
        <div class="grid w-full grid-cols-1 gap-6 md:grid-cols-2">
          <div
            class="flex-col p-6 mx-4 text-center bg-white rounded-lg shadow-lg md:flex-row hover:text-blue-400"
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
            class="flex-col p-6 mx-4 text-center bg-white rounded-lg shadow-lg md:flex-row hover:text-blue-400"
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
      <section class="m-4 mb-8">
        <div class="w-full">
          <partner :partners="partners" class="mt-16"></partner>
        </div>
      </section>
    </div>
  </layout>
</template>

<script>
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
  props: [
    "partners",
    "local",
    "national",
    "lastUpdate",
    "tests",
    "districts",
    "provinces",
    "recapNational",
    "genders",
  ],
  data() {
    return {
      recapLocal: [],
    };
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
  methods: {
    loadStatistics() {
      axios.get(route("home") + "api/statistics").then((response) => {
        this.recapLocal = response.data.data;
      });
    },
    reloadData() {
      setInterval(() => {
        this.loadStatistics();
        Inertia.reload({
          only: [
            "local",
            "national",
            "lastUpdate",
            "districts",
            "provinces",
            "recapNational",
          ],
        });
      }, 5 * 60 * 1000);
    },
  },
  mounted() {
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