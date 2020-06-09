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
    <Partner class="mt-16" />
  </div>
</template>
<script>
import DataCovid from "../partial/home/DataCovid"
export default {
  components: {
    CarouselComponent: () => import("../partial/home/CarouselComponent"),
    CallCenterComponent: () => import("../partial/home/CardCallCenter"),
    Donation: () => import("../partial/home/DonationCard"),
    DataCovid,
    InfoCovid: () => import("../partial/home/InfoCovid"),
    Partner: () => import("../partial/PartnerFooter")
  }
};
</script>