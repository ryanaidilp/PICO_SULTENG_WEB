<template>
  <a
    class="inline-block px-4 py-1 text-white transition-all duration-300 rounded  hover:opacity-50"
    :href="setHref(contact)"
    target="_blank"
    :title="setLinkTitle(contact)"
    :class="setBgColor(contact)"
  >
    <i class="mr-1 -ml-2" :class="setIcon(contact)" />
    <span class="font-semibold">{{ contact.contact }}</span>
  </a>
</template>

<script>
export default {
  props: {
    contact: {
      type: Object,
      required: true,
    },
    textSize: {
      type: String,
      required: false,
      default: "text-xs",
    },
    marginRight: {
      type: String,
      required: false,
      default: "",
    },
    isTaskForce: {
      type: Boolean,
      required: false,
      default: false,
    },
  },
  methods: {
    setHref(contact) {
      return `${contact.prefix}${contact.contact}`;
    },
    setLinkTitle(contact) {
      let title = contact.contact;

      if (this.isTaskForce) {
        title = contact.name;
      }

      return `${contact.label} ${title}`;
    },
    setIcon(contact) {
      return contact.icon;
    },
    setBgColor(contact) {
      return `${contact.bg_color} ${this.textSize} ${this.marginRight}`;
    },
  },
};
</script>