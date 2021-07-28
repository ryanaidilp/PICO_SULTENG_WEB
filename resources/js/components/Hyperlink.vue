<template>
  <a
    :href="href"
    target="_blank"
    :class="textColor"
    class="italic hover:text-blue-800 hover:cursor-pointer hover:underline"
    >{{ label }}</a
  >
</template>

<script>
export default {
  props: {
    href: {
      type: String,
      required: true,
    },
    label: {
      type: String,
      required: true,
    },
    textColor: {
      type: String,
      default: "text-blue-500",
    },
  },
};
</script>