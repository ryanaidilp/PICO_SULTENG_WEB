<template>
  <layout>
    <div class="w-full leading-normal xl:px-0 xl:mt-8">
      <div
        class="grid grid-cols-1 px-8 mx-auto mt-4  xl:mt-0 xl:gap-x-8 gap-y-8 xl:grid-cols-2"
      >
        <banner :banners="banners" class="w-full rounded-lg shadow-lg h-96" />
        <div class="grid w-full grid-cols-1 gap-y-2">
          <call-center class="flex flex-wrap justify-center w-full" />
          <donation />
        </div>
      </div>
      <data-covid
        :national.sync="national"
        :local.sync="local"
        :last-update="formatDate(updated_at)"
        :national-vaccine="national_vaccine"
        :province-vaccine="province_vaccine"
        class="mt-8"
      />
      <covid-info class="mb-16 md:mx-auto" />
      <see-more-link :linkUrl="route('wiki')" />
      <section class="m-4 mt-4 md:mt-8">
        <div
          class="flex flex-col items-stretch p-5 my-4 bg-white rounded-lg shadow-md "
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
          <ul class="items-stretch block gap-5 mt-8 lg:grid lg:grid-cols-3">
            <li v-for="(h, index) in hospitals" :key="index">
              <ContactListItem
                :nama="h.name"
                :alamat="h.address"
                :contacts="h.contacts"
              />
            </li>
          </ul>
          <br />
          <inertia-link
            :href="route('contact')"
            class="px-4 py-2 text-center text-blue-700 border-2 border-blue-500 border-solid rounded-lg  md:self-center hover:bg-blue-200"
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
              class="inline-block px-4 py-2 mt-8 text-center text-blue-800 border-2 border-blue-500 border-solid rounded-lg  md:self-center hover:bg-blue-200"
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
import { mapState } from "vuex";

export default {
  props: {
    banners: {
      type: Array,
      required: true,
    },
    hospitals: {
      type: Array,
    },
    infographics: {
      type: Array,
    },
    partners: {
      type: Array,
    },
  },

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
  computed: {
    ...mapState(["national_vaccine", "province_vaccine", "local", "national"]),
    updated_at() {
      if (_.isEmpty(this.local)) {
        return new Date();
      }
      return this.local.tanggal;
    },
  },
  methods: {
    reloadData() {
      setInterval(() => {
        Inertia.reload({
          only: ["banners", "donations", "infographics"],
        });
      }, 5 * 60 * 1000);
    },
  },
  mounted() {
    this.reloadData();
  },
};
</script>

<style lang="scss" scoped>
</style>