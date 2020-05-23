<template>
  <div class="flex flex-wrap justify-center mt-8 md:mt-16">
    <h3
      class="w-full font-bold text-center text-md lg:text-left md:ml-10 md:text-3xl"
    >Situasi Terkini COVID-19 di Sulawesi Tengah</h3>
    <div class="h-10" v-if="!lastUpdate">
      <content-loader
        :speed="2"
        :height="400"
        :width="900"
        :animate="true"
        primaryColor="#ddd"
        secondaryColor="#fff"
      >
        <rect x="30" y="0" rx="3" ry="3" width="400" height="15" />
      </content-loader>
    </div>
    <p v-else class="w-full h-10 text-xs text-center lg:text-left md:ml-10 text-muted md:text-lg">
      Pembaruan Terakhir :
      {{ lastUpdate}}
      WITA
      <br>
      <i
        class="text-xs text-gray-600"
      >
        Sumber data :
        <a
          href="https://dinkes.sultengprov.go.id"
          class="no-underline hover:no-underline hover:text-blue-200"
        >https://dinkes.sultengprov.go.id</a>
      </i>
    </p>
    <data-tabs class="md:ml-8" />
  </div>
</template>
<script>
import { ContentLoader } from "vue-content-loader";
const DataTabs = () => import("./tabs/DataTabs");
const { format } = require("date-fns");
const { formatToTimeZone } = require("date-fns-timezone");
import { id } from "date-fns/locale";
export default {
  components: {
    ContentLoader,
    DataTabs,
  },
  data() {
    return {
      stats: null,
      lastUpdate: null
    };
  },
  methods: {
    getDistricts() {
      axios
        .get("/corona/api/nasional/terkini")
        .then(response => {
          this.stats = response.data.data;
          var jam = formatToTimeZone(
            new Date(this.stats.tanggal),
            "HH:mm:ss",
            { timeZone: "Asia/Makassar" }
          );
          this.lastUpdate = format(
            new Date(this.stats.tanggal),
            "EEEE, dd MMMM yyyy",
            { locale: id }
          );
          this.lastUpdate += " " + jam;
        })
        .catch(error => console.log(error));
    }
  },
  mounted() {
    this.getDistricts();
    setInterval(() => {
      this.getDistricts
    })
  }
};
</script>