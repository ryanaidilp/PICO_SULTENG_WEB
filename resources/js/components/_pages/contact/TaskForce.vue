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
      <div v-else>
        <div class="hidden w-full mx-auto mt-8 md:flex md:flex-col">
          <div class="flex flex-row">
            <div
              class="
                w-1/12
                p-2
                text-xl
                font-semibold
                text-center
                border border-gray-500
                rounded-tl-lg
              "
            >
              No
            </div>
            <div
              class="
                w-4/12
                p-2
                text-xl
                font-semibold
                text-center
                border border-gray-500
              "
            >
              Kabupaten
            </div>
            <div
              class="
                w-7/12
                p-2
                text-xl
                font-semibold
                text-center
                border border-gray-500
                rounded-tr-lg
              "
            >
              Hotline/Call Center
            </div>
          </div>
          <div
            class="flex flex-row"
            v-for="(taskForce, index) in taskForces"
            :key="index"
          >
            <div
              class="
                flex
                items-center
                justify-center
                w-1/12
                p-2
                font-semibold
                text-center
                border border-gray-500
              "
              :class="index == 12 ? 'rounded-bl-lg' : ''"
            >
              {{ index + 1 }}
            </div>
            <div
              class="
                flex
                items-center
                justify-center
                w-4/12
                p-2
                text-center
                border border-gray-500
              "
            >
              {{ taskForce.regency }}
            </div>
            <div
              class="
                grid
                w-7/12
                gap-4
                p-2
                border border-gray-500
                lg:grid-cols-3
                xl:grid-cols-5
                md:grid-cols-2
              "
              :class="index == 12 ? 'rounded-br-lg' : ''"
            >
              <contact-button
                v-for="contact in taskForce.contacts"
                :key="contact.id"
                :contact="contact"
                is-task-force
              />
            </div>
          </div>
        </div>
        <div class="items-stretch block mt-8 md:hidden">
          <div v-for="(taskForce, index) in taskForces" :key="index">
            <ContactListItem
              :regency="taskForce.regency"
              :label="`Call Center & Hotline Gugus Tugas COVID-19 ${taskForce.regency}`"
              :contacts="taskForce.contacts"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { ContentLoader } from "vue-content-loader";
import ContactButton from "@/components/ContactButton";
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
    ContactButton,
    ContactListItem,
  },
};
</script>