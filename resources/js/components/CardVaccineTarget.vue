<template>
  <div
    class="w-full p-4 text-center text-gray-800 bg-white rounded-lg shadow-lg"
  >
    <p class="text-5xl font-semibold md:text-7xl" :class="textColor">
      {{ target_formatted }}
    </p>
    <p class="mt-4 text-gray-800">{{ label }}</p>
  </div>
</template>
<script>
const NumberFormat = new Intl.NumberFormat("id-ID", {
  maximumFractionDigits: 2,
});
export default {
  props: {
    target: {
      type: Number,
    },
    label: {
      type: String,
    },
    textColor: {
      type: String,
    },
  },
  computed: {
    target_formatted() {
      return NumberFormat.format(this.target);
    },
  },
};
</script>