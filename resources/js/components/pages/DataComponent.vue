<template>
  <div class="text-gray-800">
    <dashboard></dashboard>
    <section class="m-8">
        <dataRDT :props-data-rekapitulasi-sulteng.sync="dataRekapitulasiSulteng[1]"/>
    </section>
    <section class="m-8">
        <DataPCR :props-data-rekapitulasi-sulteng.sync="dataRekapitulasiSulteng[0]"/>
    </section>
    <h3
      class="w-full mt-16 text-lg font-bold text-center md:text-left md:ml-6 md:text-3xl"
    >Peta Penyebaran Kasus</h3>
    <keep-alive>
      <map-tab class="mt-4"></map-tab>
    </keep-alive>
    <h3
      class="w-full mt-16 text-lg font-bold text-center md:text-left md:ml-6 md:text-3xl"
    >Tabel Penyebaran Kasus</h3>
    <table-tab class="mt-4"></table-tab>
    <h3
      class="w-full mt-16 text-lg font-bold text-center md:text-left md:ml-6 md:text-3xl"
    >Visualisasi Data Kasus COVID-19</h3>
    <chart-tab class="mt-4"></chart-tab>
    <keep-alive>
      <rt-chart class="mt-12"></rt-chart>
    </keep-alive>
    <div class="flex flex-col w-full mt-4 lg:flex-row">
      <keep-alive>
        <new-case class="w-full lg:w-1/2"></new-case>
      </keep-alive>
      <keep-alive>
        <pie-chart class="w-full mt-4 lg:w-1/2 lg:mt-0"></pie-chart>
      </keep-alive>
    </div>
    <chart-sex class="mt-8"></chart-sex>
    <div class="p-6 mx-4 mt-16 text-center bg-white rounded-lg shadow-lg hover:text-blue-400">
      <a
        href="https://banuacoders.com/api/pico"
        target="_blank"
        class="mx-auto text-sm font-bold lg:text-3xl"
      >
        Akses API publik - Data PICO SulTeng disini
        <i class="fas fa-angle-right"></i>
      </a>
    </div>
    <partner class="mt-16"></partner>
  </div>
</template>
<script>
import Dashboard from "../partial/data/DashboardData"
import { ContentLoader } from "vue-content-loader";
export default {
  data() {
    return {
      dataRekapitulasiSulteng: []
    };
  },
  methods: {
    fetchDataPCR() {
      axios
        .get("/corona/api/test")
        .then(response => {
          this.dataRekapitulasiSulteng = response.data.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    updater() {
      setInterval(() => {
        this.fetchDataPCR()
      }, 60 * 1000 * 5)
    }
  },
  created() {
    this.fetchDataPCR();
    this.updater();
  },
  components: {
    DataPCR: () => import('../partial/data/DataPCR/index'),
    DataRDT: () => import('../partial/data/DataRDT/index'),
    RtChart: () => import("../partial/data/chart/RtChart"),
    PieChart: () => import("../partial/data/chart/PieChart"),
    NewCase: () => import("../partial/data/chart/NewCase"),
    ChartSex: () => import("../partial/data/chart/JenisKelamin"),
    ContentLoader,
    Dashboard,
    MapTab: () => import("../partial/data/MapTab"),
    TableTab: () => import("../partial/data/TableTab"),
    ChartTab: () => import("../partial/data/ChartTab"),
    Partner: () => import("../partial/PartnerFooter")
  }
};
</script>