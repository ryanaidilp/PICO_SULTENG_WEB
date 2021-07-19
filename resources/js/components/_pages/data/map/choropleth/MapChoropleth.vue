<template>
  <div class="text-gray-800 bg-white">
    <p class="ml-8 font-semibold">Pilih Wilayah</p>
    <v-select
      :options="options"
      class="w-1/2 mx-8 mt-4 text-sm md:text-base md:w-1/4"
      v-model="selected"
      :value="selected"
      :clearable="false"
    ></v-select>
    <local-map
      :districts="districts"
      v-if="selected == 'Sulawesi Tengah'"
      class="mt-8 border-t-2"
    ></local-map>
    <national-map
      :provinces="provinces"
      v-else-if="selected == 'Indonesia'"
      class="mt-8 border-t-2"
    ></national-map>
    <div v-else class="my-8 text-lg font-bold text-center bg-white rounded-lg">
      Tidak Ada wilayah yang dipilih
    </div>
  </div>
</template>
<script>
import VSelect from "vue-select";
import "vue-select/dist/vue-select.css";
import LocalMap from "@/components/_pages/data/map/choropleth/LocalMap";
import NationalMap from "@/components/_pages/data/map/choropleth/NationalMap";
export default {
  props: {
    districts: {
      type: Array,
      required: true,
    },
    provinces: {
      type: Array,
      required: true,
    },
  },
  data() {
    return {
      selected: "Sulawesi Tengah",
      options: ["Sulawesi Tengah", "Indonesia"],
    };
  },
  methods: {
    setSelected(value) {
      this.selected = value;
    },
  },
  components: {
    LocalMap,
    NationalMap,
    VSelect,
  },
};
</script>