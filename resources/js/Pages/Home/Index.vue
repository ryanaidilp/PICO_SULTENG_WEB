<template>
  <layout>
    <div class="w-full leading-normal xl:px-0 xl:mt-8">
      <div class="flex flex-wrap justify-center md:ml-4">
        <banner
          :banners="donations"
          class="rounded-lg shadow-lg w-96 h-96 sm:w-screen xl:max-w-lg xl:w-1/2"
        />
        <div
          class="flex flex-col flex-wrap w-full mt-4 xl:w-1/2 xl:ml-12 xl:-mt-3"
        >
          <call-center class="flex flex-wrap justify-center w-full" />
          <donation />
        </div>
      </div>
      <data-covid
        :national.sync="national"
        :local.sync="local"
        :lastUpdate="lastUpdate"
        :districts.sync="districts"
        class="mt-8"
      />
      <covid-info class="mt-16 md:mx-auto" />
      <see-more-link :linkUrl="route('wiki')" />
      <section class="m-4 mt-4 md:mt-8">
        <div
          class="flex flex-col items-stretch p-5 my-4 bg-white rounded-lg shadow-md"
        >
          <h3 class="text-lg lg:text-2xl">
            <strong>Daftar Rumah Sakit Rujukan di Sulawesi Tengah</strong>
          </h3>
          <br />
          <p class="text-sm opacity-75 md:text-base">
            Berikut ini adalah rumah sakit yang menjadi rujukan untuk pasien
            dengan status <b>Pasien Dalam Pengawasan</b> atau
            <b class="italic">Suspect</b>. Anda harus mengunjungi fasilitas
            kesehatan terdekat terlebih dahulu seperti klinik/rumah sakit umum
            sebelum akhirnya dapat dirujuk ke rumah sakit khusus di bawah ini.
          </p>
          <br />
          <br />
          <ul class="mt-8 hospital-list">
            <li v-for="(h, index) in hospitals" :key="index">
              <ContactListItem
                :nama="h.nama"
                :alamat="h.alamat"
                :email="h.email"
                :telepon="h.telepon"
              />
            </li>
          </ul>
          <br />
          <inertia-link
            :href="route('contact')"
            class="px-4 py-2 text-center text-blue-700 border-2 border-blue-500 border-solid rounded-lg md:self-center hover:bg-blue-200"
            >Lihat Rumah Sakit Lainnya</inertia-link
          >
        </div>
      </section>
      <section class="m-4 mt-8 md:mt-16">
        <div class="bg-white rounded-lg shadow-md">
          <div class="flex flex-col flex-wrap p-5 items-left md:p-8">
            <h2 class="text-2xl text-left md:text-3xl">
              <b>Info Praktikal</b>
            </h2>
            <p class="text-sm opacity-75 md:text-base">
              Berikut ini adalah beberapa infografis seputar COVID-19.
              <br />Sumber :
              <a
                target="_blank"
                href="https://instagram.com/sultenglawancovid"
                class="hover:underline hover:opacity-100"
                >Sulteng Lawan COVID</a
              >.
            </p>
          </div>
          <ShareableItems :items="infographics" />
          <div class="pb-5 text-center md:pb-8">
            <inertia-link
              class="inline-block px-4 py-2 mt-8 text-center text-blue-800 border-2 border-blue-500 border-solid rounded-lg md:self-center hover:bg-blue-200"
              :href="route('infographic')"
              >Lihat Selengkapnya</inertia-link
            >
          </div>
        </div>
      </section>
      <partner-footer :partners="partners" class="mt-16" />
    </div>
  </layout>
</template>

<script>
import DataCovid from "@/components/_pages/home/HomeData";
import CallCenter from "@/components/CardCallCenter";
import Donation from "@/components/DonationSection";
import Banner from "@/components/Banner";
import Layout from "@/layout/Layout";
import CovidInfo from "@/components/_pages/home/CovidInfo";
import SeeMoreLink from "@/components/SeeMoreLink";
import ContactListItem from "@/components/ContactListItem";
import ShareableItems from "@/components/ShareableItems/Index";
import PartnerFooter from "@/Shared/PartnerFooter";
import { Inertia } from "@inertiajs/inertia";

export default {
  props: [
    "donations",
    "lastUpdate",
    "national",
    "local",
    "districts",
    "hospitals",
    "infographics",
    "partners",
  ],
  components: {
    Layout,
    Donation,
    Banner,
    CallCenter,
    DataCovid,
    CovidInfo,
    SeeMoreLink,
    ContactListItem,
    ShareableItems,
    PartnerFooter,
  },
  methods: {
    reloadData() {
      setInterval(() => {
        Inertia.reload({
          only: [
            "donations",
            "lastUpdate",
            "districts",
            "local",
            "national",
            "infographics",
          ],
        });
      },5 * 60 * 1000);
    },
  },
  mounted() {
    this.reloadData();
  },
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