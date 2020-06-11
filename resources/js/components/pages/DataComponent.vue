<template>
  <div class="container mx-auto text-gray-800">
    <section class="m-4 mb-8 md:m-8">
      <div class="w-full">
        <dashboard
          :props-data-provinsi.sync="jsonDataHarianProvinsi"
          :props-data-nasional.sync="jsonDataHarianNasional"
        ></dashboard>
      </div>
    </section>
    <section class="px-4 m-4 mb-8 md:m-8">
      <div class="w-full">
        <dataRDT :props-data-rekapitulasi-sulteng.sync="jsonDataTesProvinsi[1]" />
      </div>
    </section>
    <section class="px-4 m-4 mb-8 md:m-8">
      <div class="w-full">
        <DataPCR :props-data-rekapitulasi-sulteng.sync="jsonDataTesProvinsi[0]" />
      </div>
    </section>
    <section class="m-4 mb-8 md:m-8">
      <div class="w-full">
        <h3
          class="w-full mt-16 text-lg font-bold text-center md:text-left md:ml-6 md:text-3xl"
        >Peta Penyebaran Kasus</h3>
        <map-tab class="mt-4"></map-tab>
      </div>
    </section>
    <section class="m-4 mb-8 md:m-8">
      <div class="w-full">
        <h3
          class="w-full text-lg font-bold text-center md:text-left md:ml-6 md:text-3xl"
        >Tabel Penyebaran Kasus</h3>
        <table-tab
          :props-data-provinsi-nasional.sync="jsonDataProvinsi"
          :props-data-sulteng-kabupaten.sync="jsonDataKabupaten"
          class="mt-4"
        ></table-tab>
      </div>
    </section>
    <section class="m-4 mb-8 md:m-8">
      <div class="w-full">
        <h3
          class="w-full text-lg font-bold text-center md:text-left md:ml-6 md:text-3xl"
        >Visualisasi Data Kasus COVID-19</h3>
        <chart-tab
          :props-data-rekapitulasi-prov.sync="jsonDataRekapitulasiProv"
          :props-data-rekapitulasi-nasional.sync="jsonDataRekapitulasiNasional"
          class="mt-4"
        ></chart-tab>
      </div>
    </section>
    <section class="m-4 mb-8 md:m-8">
      <div class="w-full">
        <rt-chart :props-data-rekapitulasi-prov.sync="jsonDataRekapitulasiProv"></rt-chart>
      </div>
    </section>
    <section class="m-4 mb-8">
      <div class="w-full">
        <div class="flex flex-col w-full mt-4 lg:flex-row">
          <keep-alive>
            <new-case :props-data-provinsi.sync="jsonDataHarianProvinsi" class="w-full lg:w-1/2"></new-case>
          </keep-alive>
          <keep-alive>
            <pie-chart
              :props-data-provinsi.sync="jsonDataHarianProvinsi"
              class="w-full mt-4 lg:w-1/2 lg:mt-0"
            ></pie-chart>
          </keep-alive>
        </div>
      </div>
    </section>
    <section class="m-4 mb-8 md:m-8">
      <div class="w-full chart-container">
        <BarStatJenisKelamin :props-data-rekapitulasi-sulteng.sync="jsonDataGenderProvinsi" />
        <BarStatUsia :props-data-rekapitulasi-sulteng.sync="jsonDataGenderProvinsi" />
      </div>
    </section>
    <section class="m-4 mb-8">
      <div class="w-full">
        <div
          class="flex-col p-6 mx-4 mt-16 text-center bg-white rounded-lg shadow-lg md:flex-row hover:text-blue-400"
        >
          <router-link
            to="/corona/table-data"
            target="_blank"
            class="mx-auto text-sm font-bold lg:text-xl"
          >
            Akses DATA publik - Data PICO SulTeng disini
            <i class="fas fa-angle-right"></i>
          </router-link>
        </div>
        <div
          class="flex-col p-6 mx-4 mt-16 text-center bg-white rounded-lg shadow-lg md:flex-row hover:text-blue-400"
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
        <partner class="mt-16"></partner>
      </div>
    </section>
  </div>
</template>
<script>
import Dashboard from "../partial/data/DashboardData";
import { ContentLoader } from "vue-content-loader";
export default {
  data() {
    return {
      jsonDataRekapitulasiProv: [],
      jsonDataRekapitulasiNasional: [],
      jsonDataTesProvinsi: [],
      jsonDataProvinsi: [],
      jsonDataKabupaten: [],
      jsonDataGenderProvinsi: {},
      jsonDataHarianProvinsi: {},
      jsonDataHarianNasional: {}
    };
  },
  methods: {
    fetchDataProvinsi() {
      axios
        .get("/corona/api/provinsi")
        .then(response => {
          this.jsonDataProvinsi = response.data.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    fetchDataKabupaten() {
      axios
        .get("/corona/api/kabupaten")
        .then(response => {
          this.jsonDataKabupaten = response.data.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    fetchDataHarianProvinsi() {
      const data = this.jsonDataRekapitulasiProv;
      this.jsonDataHarianProvinsi = data[data.length - 1];
    },
    fetchDataHarianNasional() {
      const data = this.jsonDataRekapitulasiNasional;
      this.jsonDataHarianNasional = data[data.length - 1];
    },
    fetchDataRekapitulasiNasional() {
      axios
        .get("/corona/api/nasional")
        .then(response => {
          this.jsonDataRekapitulasiNasional = response.data.data;
          this.fetchDataHarianNasional();
        })
        .catch(error => {
          console.log(error);
        });
    },
    fetchDataRekapitulasiProvinsi() {
      axios
        .get("/corona/api/statistik")
        .then(response => {
          this.jsonDataRekapitulasiProv = response.data.data;
          this.fetchDataHarianProvinsi();
        })
        .catch(error => {
          console.log(error);
        });
    },
    fetchDataTes() {
      axios
        .get("/corona/api/test")
        .then(response => {
          this.jsonDataTesProvinsi = response.data.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    fetchDataGenderProvinsi() {
      axios
        .get("/corona/api/gender")
        .then(response => {
          this.jsonDataGenderProvinsi = response.data.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    updater() {
      setInterval(() => {
        this.fetchDataKabupaten();
        this.fetchDataProvinsi();
        this.fetchDataRekapitulasiProvinsi();
        this.fetchDataRekapitulasiNasional();
        this.fetchDataTes();
        this.fetchDataGenderProvinsi();
      }, 60 * 1000 * 5);
    }
  },
  created() {
    this.fetchDataKabupaten();
    this.fetchDataProvinsi();
    this.fetchDataRekapitulasiProvinsi();
    this.fetchDataRekapitulasiNasional();
    this.fetchDataTes();
    this.fetchDataGenderProvinsi();
    this.updater();
  },
  components: {
    DataPCR: () => import("../partial/data/DataPCR/index"),
    DataRDT: () => import("../partial/data/DataRDT/index"),
    RtChart: () => import("../partial/data/chart/RtChart"),
    PieChart: () => import("../partial/data/chart/PieChart"),
    NewCase: () => import("../partial/data/chart/NewCase"),
    ContentLoader,
    Dashboard,
    BarStatUsia: () => import("../partial/data/BarStatUsia/index"),
    BarStatJenisKelamin: () =>
      import("../partial/data/BarStatJenisKelamin/index"),
    MapTab: () => import("../partial/data/MapTab"),
    TableTab: () => import("../partial/data/TableTab"),
    ChartTab: () => import("../partial/data/ChartTab"),
    Partner: () => import("../partial/PartnerFooter")
  }
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