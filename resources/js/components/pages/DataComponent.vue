<template>
  <div class="text-gray-800">
    <dashboard></dashboard>
    <div class="flex flex-col w-full mt-4 lg:flex-row">
      <keep-alive>
        <new-case class="w-full lg:w-1/2"></new-case>
      </keep-alive>
      <keep-alive>
        <pie-chart class="w-full mt-4 lg:w-1/2 lg:mt-0"></pie-chart>
      </keep-alive>
    </div>
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
    <chart-sex class="mt-12"></chart-sex>
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
import { ContentLoader } from "vue-content-loader";
import Dashboard from "../partial/data/DashboardData";
import Partner from "../partial/PartnerFooter";
import MapTab from "../partial/data/MapTab";
import ChartTab from "../partial/data/ChartTab";
import TableTab from "../partial/data/TableTab";
import ChartSex from "../partial/data/chart/JenisKelamin";
import NewCase from "../partial/data/chart/NewCase";
import PieChart from "../partial/data/chart/PieChart";
export default {
  components: {
    PieChart,
    NewCase,
    ChartSex,
    ContentLoader,
    Dashboard,
    MapTab,
    TableTab,
    ChartTab,
    Partner
  }
};
</script>