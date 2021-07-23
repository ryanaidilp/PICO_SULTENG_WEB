<template>
  <div class="relative pl-5 mb-8">
    <div class="absolute top-0 bottom-0 left-0 w-1 bg-blue-300" />
    <h5 class="inline-block text-lg font-bold leading-loose">{{ nama }}</h5>
    <p class="opacity-75 text-md">{{ alamat }}</p>
    <div class="text-sm">
      <a
        class="inline-block px-4 py-1 mt-2 mr-2 text-xs text-white rounded  hover:opacity-50"
        v-for="contact in contacts"
        :key="contact.id"
        :href="setHref(contact)"
        target="_blank"
        :title="setLinkTitle(contact)"
        :class="setBgColor(contact)"
      >
        <i class="mr-1 -ml-2" :class="setIcon(contact)" />
        <span>{{ contact.contact }}</span>
      </a>
    </div>
  </div>
</template>

<script>
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
  methods: {
    setHref(contact) {
      return `${contact.prefix}${contact.contact}`;
    },
    setLinkTitle(contact) {
      return `${contact.label} ${contact.contact}`;
    },
    setIcon(contact) {
      return contact.icon;
    },
    setBgColor(contact) {
      return contact.bg_color;
    },
  },
};
</script>

<style>
</style>
