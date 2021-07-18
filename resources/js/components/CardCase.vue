<template>
  <div class="w-full p-4 bg-white rounded-lg shadow-lg" :class="text_color">
    <h4 class="text-2xl font-bold text-center uppercase">{{ title }}</h4>
    <div class="flex flex-row mt-3 font-bold text-center">
      <div class="w-1/2">
        <b class="text-sm font-semibold text-gray-800">Sulawesi Tengah</b>
        <div class="text-2xl">
          {{ totalLocal }}
        </div>
        <div>
          <span class="px-2 pb-1 mr-1 rounded-full" :class="bg_color">
            <i class="text-xs text-white fas" :class="icon(new_local)"></i>
          </span>
          {{ newLocal }}
        </div>
      </div>
      <div class="w-1/2">
        <b class="text-sm font-semibold text-gray-800">Indonesia</b>
        <div class="text-2xl">
          {{ totalNational }}
        </div>
        <div>
          <span class="px-2 pb-1 mr-1 rounded-full" :class="bg_color">
            <i class="text-xs text-white fas" :class="icon(new_national)"></i>
          </span>
          {{ newNational }}
        </div>
      </div>
    </div>
  </div>
</template>
<script>
const NumberFormat = new Intl.NumberFormat("id");
export default {
  props: [
    "title",
    "cumulative_local",
    "new_local",
    "cumulative_national",
    "new_national",
    "bg_color",
    "text_color",
  ],
  methods: {
    icon(value) {
      if (value >= 0) {
        return "fa-angle-double-up";
      }
      return "fa-angle-double-down";
    },
  },
  computed: {
    totalLocal() {
      return NumberFormat.format(this.cumulative_local);
    },
    newLocal() {
      return NumberFormat.format(this.new_local);
    },
    totalNational() {
      return NumberFormat.format(this.cumulative_national);
    },
    newNational() {
      return NumberFormat.format(this.new_national);
    },
  },
};
</script>