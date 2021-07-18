<template>
  <div class="relative pl-5 mb-8">
    <div class="absolute top-0 bottom-0 left-0 w-1 bg-blue-300" />
    <h5 class="inline-block text-lg font-bold leading-loose">{{ nama }}</h5>
    <p class="opacity-75 text-md">{{ alamat }}</p>
    <p class="text-sm">
      <a
        class="inline-block px-4 py-1 mt-2 mr-2 text-xs text-white rounded  hover:opacity-50"
        v-for="contact in contacts"
        :key="contact.id"
        :href="setHref(contact)"
        target="_blank"
        :title="setLinkTitle(contact)"
        :class="setBgColor(contact)"
      >
        <i class="mr-1 -ml-2 fas fa-sm" :class="setIcon(contact)" />
        <span>{{ contact.contact }}</span>
      </a>
    </p>
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
      let prefix = "";
      switch (contact.contact_type_id) {
        case 1:
          prefix = "mailto:";
          break;
        case 2:
          prefix = "tel:";
          break;
        case 3:
          prefix = "fax:";
          break;
        default:
          prefix = "https:";
      }

      return prefix.length > 0
        ? `${prefix}${contact.contact}`
        : contact.contact;
    },
    setLinkTitle(contact) {
      let prefix = "";

      switch (contact.contact_type_id) {
        case 1:
          prefix = "Kirim Email ke ";
          break;
        case 2:
          prefix = "Telpon ";
          break;
        case 3:
          prefix = "Fax ";
          break;
        default:
          prefix = "Kunjungi ";
      }

      return prefix.length > 0
        ? `${prefix}${contact.contact}`
        : contact.contact;
    },
    setIcon(contact) {
      switch (contact.contact_type_id) {
        case 1:
          return "fa-envelope";
        case 2:
          return "fa-phone";
        case 3:
          return "fa-fax";
        default:
          return "fa-globe";
      }
    },
    setBgColor(contact) {
      switch (contact.contact_type_id) {
        case 1:
          return "bg-green-500";
        case 2:
          return "bg-blue-500";
        case 3:
          return "bg-purple-500";
        default:
          return "bg-gray-500";
      }
    },
  },
};
</script>

<style>
</style>
