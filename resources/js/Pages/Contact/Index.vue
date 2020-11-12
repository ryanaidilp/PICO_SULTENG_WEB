<template>
  <layout>
    <div class="text-gray-800">
      <h5 class="mt-8 ml-6 text-lg font-bold md:text-3xl md:text-left md:ml-6">
        Kontak Rumah Sakit dan Hotline Gugus Tugas di Kabupaten
      </h5>
      <p class="ml-6 text-xs md:text-lg md:text-left md:ml-6">
        Informasi nomor telpon dan alamat rumah sakit yang menjadi rujukan
        pemeriksaan pasien COVID-19
      </p>
      <hospital :hospitals="hospitals" class="md:mt-16"></hospital>
      <task-force :districts="task_forces" class="mt-16"></task-force>
      <Partner :partners="partners" class="mt-16" />
    </div>
  </layout>
</template>

<script>
import Partner from "@/Shared/PartnerFooter";
import Layout from "@/layout/Layout";
import Hospital from "@/components/_pages/contact/Hospitals";
import TaskForce from "@/components/_pages/contact/TaskForce";
export default {
  props: ["partners", "hospitals", "task_forces"],
  components: {
    Layout,
    Partner,
    Hospital,
    TaskForce,
  },
};
</script>

<style>
</style>