<template>
  <div class="text-gray-800">
    <h5
      class="mt-8 ml-6 text-sm font-bold md:text-4xl md:text-left md:ml-6"
    >Kontak Rumah Sakit dan Hotline Gugus Tugas di Kabupaten</h5>
    <p
      class="ml-6 text-xs md:text-xl md:text-left md:ml-6"
    >Informasi nomor telpon dan alamat rumah sakit yang menjadi rujukan pemeriksaan pasien COVID-19</p>
    <hospital class="md:mt-16"></hospital>
    <task-force class="mt-16"></task-force>
    <Partner class="mt-16" />
  </div>
</template>

<script>
import Partner from "../partial/PartnerFooter";
import TaskForce from "../partial/contact/TaskForce";
import Hospital from "../partial/contact/Hospital";
import { ContentLoader } from "vue-content-loader";
export default {
  components: {
    Partner,
    Hospital,
    TaskForce
  }
};
</script>