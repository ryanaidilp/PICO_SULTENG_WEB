<template>
  <div
    class="px-4 py-2 text-gray-800 transition-all duration-300 border border-gray-600 rounded-lg  hover:shadow-lg hover:border-gray-400"
  >
    <h2 class="text-lg font-semibold">
      {{ name }}
      <span class="text-sm italic text-gray-600">
        ({{ isFree ? "Gratis" : "Berbayar" }})
      </span>
    </h2>
    <hr class="my-2" />
    <div class="space-y-2">
      <contact-button
        v-for="contact in contacts"
        :key="contact.id"
        :contact="contact"
        text-size="text-sm"
        margin-right="mr-2"
      />
    </div>
    <hr class="my-2" />
    <p>Jadwal</p>
    <div class="grid grid-cols-2 gap-2 text-xs">
      <div
        v-for="schedule in schedules"
        :key="schedule.id"
        class="flex flex-col"
      >
        <div>
          <i class="text-gray-600 fas fa-calendar"></i>
          {{ schedule.operational_day }}
        </div>
        <div>
          <i class="text-gray-600 fas fa-clock"></i>
          {{ `${schedule.operational_time} ${schedule.timezone}` }}
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import ContactButton from "@/components/ContactButton";
export default {
  props: {
    name: {
      type: String,
      required: true,
    },
    isFree: {
      type: Boolean,
      required: true,
    },
    contacts: {
      type: Array,
      required: true,
    },
    schedules: {
      type: Array,
      required: true,
    },
  },
  components: {
    ContactButton,
  },
};
</script>