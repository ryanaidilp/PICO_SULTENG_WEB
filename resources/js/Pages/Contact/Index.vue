<template>
  <layout>
    <div class="text-gray-800">
      <h5 class="mx-6 mt-8 text-lg font-bold md:text-3xl md:text-left">
        Kontak Rumah Sakit dan Hotline Gugus Tugas di Kabupaten
      </h5>
      <p class="mx-6 text-xs md:text-lg md:text-left">
        Informasi nomor telpon dan alamat rumah sakit yang menjadi rujukan
        pemeriksaan pasien COVID-19
      </p>
      <hospital :hospitals="hospitals" class="md:mt-16"></hospital>
      <task-force :task-forces="taskForces" class="mt-16"></task-force>
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
  props: {
    partners: {
      type: Array,
      required: true,
    },
    hospitals: {
      type: Array,
      required: true,
    },
    taskForces: {
      type: Array,
      required: true,
    },
  },
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