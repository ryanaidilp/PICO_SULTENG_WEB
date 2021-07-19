<template>
  <div class="w-full">
    <div class="p-6 mx-4 mt-8 bg-white rounded-lg shadow-md">
      <h3 class="text-lg font-bold text-left lg:text-3xl">
        Daftar Rumah Sakit Rujukan
      </h3>
      <p class="mt-4 text-sm md:text-base">
        Berikut ini adalah rumah sakit yang menjadi rujukan untuk pasien dengan
        status Pasien dalam Pengawasan. Anda harus mengunjungi fasilitas
        kesehatan terdekat terlebih dahulu seperti klinik/rumah sakit umum
        sebelum akhirnya dapat dirujuk ke rumah sakit di bawah ini.
      </p>
      <content-loader v-if="hospitals.length <= 0"></content-loader>
      <div v-else class="grid grid-cols-1 gap-5 mt-8 md:grid-cols-2">
        <div
          v-for="hospital in hospitals"
          :key="hospital.no"
          class="flex flex-col flex-wrap w-full p-4 border-l-2 border-blue-400 rounded-lg shadow-lg  border-left"
        >
          <h4 class="font-bold text-left">{{ hospital.nama }}</h4>
          <p class="text-xs text-left md:text-sm">{{ hospital.alamat }}</p>
          <a
            :href="'tel:' + hospital.telepon"
            class="w-full p-2 mx-auto mt-2 text-sm text-left text-white bg-blue-400 rounded-md  hover:opacity-75 md:text-base"
          >
            <i class="fas fa-phone-alt"></i>
            {{ hospital.telepon }}
          </a>
          <a
            :href="'mailto:' + hospital.email"
            class="w-full p-2 mx-auto mt-2 text-sm text-left text-white bg-blue-600 rounded-md  hover:opacity-75 md:text-base"
          >
            <i class="fas fa-mail-bulk"></i>
            {{ hospital.email }}
          </a>
          <a
            :href="
              'https://maps.google.com/maps?q=' +
              hospital.latitude +
              ',' +
              hospital.longitude
            "
            class="w-full p-2 mx-auto mt-2 text-sm text-left text-white bg-gray-700 rounded-md  hover:opacity-75 md:text-base"
          >
            <i class="fas fa-map"></i> Lihat di Map
          </a>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { ContentLoader } from "vue-content-loader";
export default {
  props: {
    hospitals: {
      type: Array,
      required: true,
      default: () => [],
    },
  },
  components: {
    ContentLoader,
  },
};
</script>