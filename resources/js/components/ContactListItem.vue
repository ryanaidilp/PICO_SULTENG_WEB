<template>
  <div class="relative pl-5 mb-8">
    <div class="absolute top-0 bottom-0 left-0 w-1 bg-blue-300" />
    <h5 class="inline-block text-lg font-bold leading-loose">{{ nama }}</h5>
    <p class="opacity-75 text-md">{{ alamat }}</p>
    <div class="space-y-2 text-sm">
      <contact-button
        v-for="contact in contacts"
        :key="contact.id"
        :contact="contact"
        margin-right="mr-2"
      />
    </div>
  </div>
</template>

<script>
import ContactButton from "@/components/ContactButton";
export default {
  props: {
    contacts: {
      type: Array,
      required: true,
    },
    nama: {
      type: String,
      default: "",
    },
    alamat: {
      type: String,
      default: "",
    },
  },
  components: {
    ContactButton,
  },
};
</script>

<style>
</style>
