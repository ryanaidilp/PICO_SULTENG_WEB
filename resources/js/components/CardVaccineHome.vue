<template>
  <div class="w-full p-4 text-gray-800 bg-white rounded-lg shadow-lg">
    <h4 class="mb-2 text-2xl font-semibold">
      {{ title }}
    </h4>
    <p class="font-semibold text-green-700">
      {{ new_vaccinated }}
      <span class="text-xs">
        ( <i class="fas" :class="icon(growthRate)"></i> {{ growth }} )</span
      >
    </p>
    <p class="my-4 font-semibold text-center text-green-700 text-8xl">
      {{ total_vaccinated }}
    </p>
    <p class="text-right text-gray-500">Dosis telah diberikan</p>
    <div class="flex flex-row justify-between my-4">
      <div class="flex flex-row w-5/6 h-8 bg-gray-300 rounded-md">
        <div
          class="h-full bg-orange-500 rounded-l-md"
          :style="progress(healthWorkerTotal, target)"
        ></div>
        <div
          class="h-full bg-blue-500"
          :style="progress(elderlyTotal, target)"
        ></div>
        <div
          class="h-full bg-purple-500 rounded-r-md"
          :style="progress(publicWorkerTotal, target)"
        ></div>
      </div>
      <p
        class="w-1/6 my-auto text-xl font-semibold text-center text-green-700  lg:text-2xl"
      >
        {{ percentage(total, target) }}
      </p>
    </div>
    <p class="text-gray-500">
      <b class="text-gray-800">{{ percentage(total, target) }}</b> dari
      <b class="text-gray-800">{{ target_vaccinated }}</b> telah divaksin
    </p>
    <div
      class="flex flex-row justify-between mt-3 text-2xl font-semibold text-orange-500 "
    >
      <p>Tenaga Kesehatan</p>
      <p>{{ percentage(healthWorkerTotal, healthWorkerTarget) }}</p>
    </div>
    <div
      class="flex flex-row justify-between text-2xl font-semibold text-blue-500"
    >
      <p>Lansia</p>
      <p>{{ percentage(elderlyTotal, elderlyTarget) }}</p>
    </div>
    <div
      class="flex flex-row justify-between text-2xl font-semibold text-purple-500 "
    >
      <p>Petugas Publik</p>
      <p>{{ percentage(publicWorkerTotal, publicWorkerTarget) }}</p>
    </div>
  </div>
</template>
<script>
const NumberFormat = new Intl.NumberFormat("id-ID", {
  maximumFractionDigits: 2,
});
export default {
  props: {
    title: {
      type: String,
      required: true,
    },
    total: {
      type: Number,
      required: true,
    },
    addition: {
      type: Number,
      required: true,
    },
    growthRate: {
      type: Number,
      required: true,
    },
    target: {
      type: Number,
      required: true,
    },
    healthWorkerTotal: {
      type: Number,
      required: true,
    },
    healthWorkerTarget: {
      type: Number,
      required: true,
    },
    elderlyTotal: {
      type: Number,
      required: true,
    },
    elderlyTarget: {
      type: Number,
      required: true,
    },
    publicWorkerTotal: {
      type: Number,
      required: true,
    },
    publicWorkerTarget: {
      type: Number,
      required: true,
    },
  },
  computed: {
    target_vaccinated() {
      return NumberFormat.format(this.target);
    },
    total_vaccinated() {
      return NumberFormat.format(this.total);
    },
    health_worker_vaccinated() {
      return NumberFormat.format(this.healthWorkerTotal);
    },
    elderly_vaccinated() {
      return NumberFormat.format(this.elderlyTotal);
    },
    public_worker_vaccinated() {
      return NumberFormat.format(this.publicWorkerTotal);
    },
    new_vaccinated() {
      let prefix = this.addition >= 0 ? "+" : "";
      return `${prefix}${NumberFormat.format(this.addition)}`;
    },
    growth() {
      return `${NumberFormat.format(Math.abs(this.growthRate))}%`;
    },
  },
  methods: {
    progress(value, total) {
      return `width: ${Math.min(100, (value / total) * 100)}%`;
    },
    percentage(value, total) {
      return `${NumberFormat.format(Math.min(100, (value / total) * 100))}%`;
    },
    icon(value) {
      if (value === 0) {
        return "";
      }
      return value > 0 ? "fa-angle-double-up" : "fa-angle-double-down";
    },
  },
};
</script>