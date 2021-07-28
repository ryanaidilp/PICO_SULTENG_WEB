<template>
  <div class="w-full p-4 text-gray-800 bg-white rounded-lg shadow-lg">
    <h4 class="mb-2 text-sm font-semibold md:text-2xl">
      {{ title }}
    </h4>
    <p class="font-semibold text-green-700">
      {{ new_vaccinated }}
      <span class="text-sm">
        ( <i class="text-xs fas" :class="icon(addition)"></i>
        {{ growth }} )</span
      >
    </p>
    <p
      class="my-4 text-5xl font-semibold text-center text-green-700 md:text-8xl"
    >
      {{ total_vaccinated }}
    </p>
    <p class="text-xs text-right text-gray-500 md:text-base">
      Dosis telah diberikan
    </p>
    <div class="flex flex-row justify-between my-4 text-sm md:text-base">
      <div class="flex flex-row w-5/6 h-8 bg-gray-200 rounded-md">
        <div
          class="h-full bg-blue-500 rounded-l-md"
          :style="progress(elderlyTotal, target)"
        ></div>
        <div
          class="h-full bg-purple-500"
          :style="progress(publicWorkerTotal, target)"
        ></div>
        <div
          class="h-full bg-orange-500"
          :style="progress(healthWorkerTotal, target)"
        ></div>
        <div
          class="h-full bg-pink-500 rounded-r-md"
          :style="
            progress(
              total - (healthWorkerTotal + elderlyTotal + publicWorkerTotal),
              target
            )
          "
        ></div>
      </div>
      <p
        class="w-1/6 mx-auto my-auto text-xs font-semibold text-center text-green-700  md:text-xl lg:text-2xl"
      >
        {{ percentage(total, target) }}
      </p>
    </div>
    <p class="text-xs text-gray-500 md:text-base">
      <b class="text-gray-800">{{ percentage(total, target) }}</b> dari
      <b class="text-gray-800">{{ target_vaccinated }}</b> telah divaksin
    </p>
    <div
      class="flex flex-row justify-between mt-3 text-xl font-semibold text-blue-500 "
    >
      <p>Lansia</p>
      <p>{{ percentage(elderlyTotal, elderlyTarget) }}</p>
    </div>
    <div
      class="flex flex-row justify-between text-xl font-semibold text-purple-500 "
    >
      <p>Petugas Publik</p>
      <p>{{ percentage(publicWorkerTotal, publicWorkerTarget) }}</p>
    </div>
    <div
      class="flex flex-row justify-between text-xl font-semibold text-orange-500 "
    >
      <p>Tenaga Kesehatan</p>
      <p>{{ percentage(healthWorkerTotal, healthWorkerTarget) }}</p>
    </div>
    <div
      class="flex flex-row justify-between text-xl font-semibold text-pink-500"
    >
      <p>Masyarakat Umum</p>
      <p>
        {{
          percentage(
            total - (healthWorkerTotal + publicWorkerTotal + elderlyTotal),
            target - (healthWorkerTarget + elderlyTarget + publicWorkerTarget)
          )
        }}
      </p>
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
      return `${NumberFormat.format(Math.abs(this.growthRate))} %`;
    },
  },
  methods: {
    progress(value, total) {
      return `width: ${Math.min(100, (value / total) * 100)}%`;
    },
    percentage(value, total) {
      return `${NumberFormat.format(Math.min(100, (value / total) * 100))} %`;
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