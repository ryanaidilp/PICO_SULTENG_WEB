<template>
  <div class="w-full leading-normal text-gray-800 xl:px-0 xl:mt-8">
    <div class="flex flex-wrap justify-center md:ml-4">
      <carousel-component class="rounded-lg shadow-lg w-96 h-96 sm:w-screen xl:max-w-lg xl:w-1/2" />
      <div class="flex flex-col flex-wrap w-full mt-4 xl:w-1/2 xl:ml-12 xl:-mt-3">
        <call-center-component class="flex flex-wrap justify-center w-full" />
        <Donation />
      </div>
    </div>
    <keep-alive>
      <data-covid class="mt-8"></data-covid>
    </keep-alive>
    <InfoCovid class="mt-16 md:ml-10" />
    <div class="flex flex-row w-full text-xl text-blue-600 hover:text-blue-400">
      <router-link class="mx-auto" to="/corona/wiki">
        Lihat Selengkapnya
        <i class="fas fa-angle-right" aria-hidden="true"></i>
      </router-link>
    </div>
    <section class="m-4 mt-4 md:mt-8">
      <div class="flex flex-col items-stretch p-5 my-4 bg-white rounded-lg shadow-md">
        <h3 class="text-lg lg:text-2xl">
          <strong>Daftar Rumah Sakit Rujukan di Sulawesi Tengah</strong>
        </h3>
        <br />
        <p class="opacity-75">
          Berikut ini adalah rumah sakit yang menjadi rujukan untuk pasien dengan status Pasien dalam Pengawasan.
          Anda harus mengunjungi fasilitas kesehatan terdekat terlebih dahulu seperti klinik/rumah sakit umum sebelum akhirnya dapat dirujuk ke rumah sakit khusus di bawah ini.
        </p>
        <br />
        <br />
        <ul class="mt-8 hospital-list">
          <li v-for="(h, index) in jsonDataRumahSakit" :key="index">
            <ContactListItem
              :nama="h.nama"
              :alamat="h.alamat"
              :email="h.email"
              :telepon="h.telepon"
            />
          </li>
        </ul>
        <br />
        <router-link
          tag="a"
          to="/corona/kontak"
          class="px-4 py-2 text-center text-blue-700 border-2 border-blue-500 border-solid rounded-lg md:self-center hover:bg-blue-200"
        >Lihat Rumah Sakit Lainnya</router-link>
      </div>
    </section>
    <section class="m-4 mt-8 md:mt-16">
      <div class="bg-white rounded-lg shadow-md">
        <div class="flex flex-col flex-wrap p-5 items-left md:p-8">
          <h2 class="text-2xl text-left md:text-3xl">
            <b>Info Praktikal</b>
          </h2>
          <p class="opacity-75">
            Berikut ini adalah beberapa infografis seputar COVID-19.
            <br />Sumber :
            <a
              target="_blank"
              href="https://instagram.com/sultenglawancovid"
              class="hover:underline hover:opacity-100"
            >Sulteng Lawan COVID</a>.
          </p>
        </div>
        <ShareableItems :items="shareableInfographics" />
        <div class="pb-5 text-center md:pb-8">
          <router-link
            class="inline-block px-4 py-2 mt-8 text-center text-blue-800 border-2 border-blue-500 border-solid rounded-lg md:self-center hover:bg-blue-200"
            to="/corona/infografis"
          >Lihat Selengkapnya</router-link>
        </div>
      </div>
    </section>
    <Partner class="mt-16" />
  </div>
</template>
<script>
import DataCovid from "../partial/home/DataCovid";
export default {
  components: {
    ShareableItems: () =>
      import("../partial/infographics/ShareableItems/index"),
    ContactListItem: () => import("../partial/ContactListItem/index"),
    CarouselComponent: () => import("../partial/home/CarouselComponent"),
    CallCenterComponent: () => import("../partial/home/CardCallCenter"),
    Donation: () => import("../partial/home/DonationCard"),
    DataCovid,
    InfoCovid: () => import("../partial/home/InfoCovid"),
    Partner: () => import("../partial/PartnerFooter")
  },
  data() {
    return {
      shareableInfographics: [],
      jsonDataRumahSakit: []
    };
  },
  methods: {
    fetchDataRumahSakit() {
      axios.get("/corona/api/rumahsakit").then(response => {
        let data = response.data.data;
        for (let i = 0; i < 3; i++) {
          const element = data[i];
          this.jsonDataRumahSakit.push(element);
        }
      });
    },
    fetchDataInfografis() {
      axios.get("/corona/api/infografis").then(response => {
        let data = response.data.data;
        let infographics = [];
        for (let i = 0; i < 10; i++) {
          const element = data[i];
          infographics.push(element);
        }
        this.shareableInfographics = infographics;
      });
    }
  },
  created() {
    this.fetchDataRumahSakit();
    this.fetchDataInfografis();
  }
};
</script>

<style lang="scss" scoped>
.hospital-list {
  display: block;
  @screen lg {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    align-items: stretch;
  }
}
</style>