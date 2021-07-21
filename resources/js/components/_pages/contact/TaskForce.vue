<template>
  <div class="w-full">
    <div class="p-6 mx-4 mt-8 bg-white rounded-lg shadow-md">
      <h3 class="text-lg font-bold text-left lg:text-3xl">
        Hotline Gugus Tugas
      </h3>
      <p class="text-sm md:text-base">
        Berikut ini adalah nomor telpon tim gugus tugas COVID-19 di Kab/Kota se
        Sulawesi Tengah.
      </p>
      <content-loader v-if="taskForces.length <= 0"></content-loader>
      <ul v-else class="items-stretch block mt-8 lg:grid lg:grid-cols-3">
        <li v-for="(taskForce, index) in taskForces" :key="index">
          <ContactListItem
            :regency="taskForce.regency"
            :label="`Gugus Tugas COVID-19 ${taskForce.regency}`"
            :contacts="taskForce.contacts"
          />
        </li>
      </ul>
    </div>
  </div>
</template>
<script>
import { ContentLoader } from "vue-content-loader";
import ContactListItem from "@/components/TaskForceContactListItem";
export default {
  props: {
    taskForces: {
      type: Array,
      required: true,
      default: () => [],
    },
  },

  components: {
    ContentLoader,
    ContactListItem,
  },
};
</script>