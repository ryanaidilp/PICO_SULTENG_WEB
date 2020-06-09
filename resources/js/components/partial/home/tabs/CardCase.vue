<template>
  <div class="p-6 mb-8 rounded-lg shadow-lg lg:mr-5 lg:w-1/4" :class="bg_card">
    <h4 class="text-3xl font-bold">{{ title }}</h4>
    <div class="flex items-center justify-between text-base">
      <p>Sulawesi Tengah</p>
      <span class="text-3xl font-bold">
        {{ cumulative_local }}
          <span
            class="px-1 py-0 ml-2 text-xl text-white align-middle rounded"
            :class="bg_new"
          >{{ new_local >=0 ? "+" + new_local : new_local }}</span>
      </span>
    </div>
    <div class="flex items-center justify-between text-sm">
      <p>Indonesia</p>
      <span class="text-lg font-bold">
        {{ cumulative_national }}
        <span
          class="px-1 py-0 ml-2 text-white align-middle rounded text-md"
          :class="bg_new"
        >{{ new_national >= 0 ? "+" + new_national : new_national }}</span>
      </span>
    </div>
  </div>
</template>
<script>
export default {
  props: [
    "title",
    "cumulative_local",
    "new_local",
    "cumulative_national",
    "new_national",
    "bg_card",
    "bg_new"
  ]
};
</script>