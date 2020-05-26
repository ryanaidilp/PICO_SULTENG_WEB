<template>
  <div class="text-gray-800 bg-white">
    <p class="ml-8 font-semibold">Pilih Wilayah</p>
    <v-select
      :options="options"
      class="w-1/2 mx-8 mt-4 text-sm md:text-base md:w-1/4"
      v-model="selected"
      :value="selected"
    ></v-select>
    <map-lokal v-if="selected == 'Sulawesi Tengah'" class="mt-8 border-t-2"></map-lokal>
    <map-nasional v-else-if="selected =='Indonesia'" class="mt-8 border-t-2"></map-nasional>
    <div
      v-else
      class="my-8 text-lg font-bold text-center bg-white rounded-lg"
    >Tidak Ada wilayah yang dipilih</div>
  </div>
</template>
<script>
import MapLokal from "./MapLokal";
import MapNasional from "./MapNasional";
import VSelect from "vue-select";
import "vue-select/dist/vue-select.css";
export default {
  data() {
    return {
      selected: "Sulawesi Tengah",
      options: ["Sulawesi Tengah", "Indonesia"]
    };
  },
  methods: {
    setSelected(value) {
      this.selected = value;
    }
  },
  components: {
    MapLokal,
    MapNasional,
    VSelect
  }
};
</script>