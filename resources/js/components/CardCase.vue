<template>
  <div class="w-full p-4 bg-white rounded-lg shadow-lg" :class="textColor">
    <h4 class="text-2xl font-bold text-center uppercase">{{ title }}</h4>
    <div class="flex flex-row mt-3 font-bold text-center">
      <div class="w-1/2">
        <b class="text-sm font-semibold text-gray-800">Sulawesi Tengah</b>
        <div class="text-2xl">
          {{ formatNumber(cumulativeLocal) }}
        </div>
        <div>
          <span class="px-2 pb-1 mr-1 rounded-full" :class="bgColor">
            <i class="text-xs text-white fas" :class="icon(newLocal)"></i>
          </span>
          {{ formatNumber(newLocal) }}
        </div>
      </div>
      <div class="w-1/2">
        <b class="text-sm font-semibold text-gray-800">Indonesia</b>
        <div class="text-2xl">
          {{ formatNumber(cumulativeNational) }}
        </div>
        <div>
          <span class="px-2 pb-1 mr-1 rounded-full" :class="bgColor">
            <i class="text-xs text-white fas" :class="icon(newNational)"></i>
          </span>
          {{ formatNumber(newNational) }}
        </div>
      </div>
    </div>
  </div>
</template>
<script>
const NumberFormat = new Intl.NumberFormat("id");
export default {
  props: {
    title: {
      type: String,
      required: true,
      default: () => "",
    },
    cumulativeLocal: {
      type: Number,
      required: true,
      default: () => 0,
    },
    cumulativeNational: {
      type: Number,
      required: true,
      default: () => 0,
    },
    newLocal: {
      type: Number,
      required: true,
      default: () => 0,
    },
    newNational: {
      type: Number,
      required: true,
      default: () => 0,
    },
    bgColor: {
      type: String,
      required: true,
      default: () => "",
    },
    textColor: {
      type: String,
      required: true,
      default: () => "",
    },
  },
  methods: {
    icon(value) {
      if (value >= 0) {
        return "fa-angle-double-up";
      }
      return "fa-angle-double-down";
    },
    formatNumber(value) {
      return NumberFormat.format(value);
    },
  },
};
</script>