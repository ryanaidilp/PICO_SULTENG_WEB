<template>
  <div class="text-gray-800 bg-white">
    <div class="grid grid-cols-1 gap-5 mx-8 lg:grid-cols-4">
      <div class="flex flex-col">
        <p class="font-semibold">Pilih Wilayah</p>
        <v-select
          :options="options"
          class="mt-4 text-sm md:text-base"
          v-model="selected"
          :value="selected"
          :clearable="false"
        ></v-select>
      </div>
      <div class="flex flex-col">
        <p class="font-semibold">Pilih Kasus</p>
        <v-select
          :options="caseOptions"
          class="mt-4 text-sm md:text-base"
          v-model="selectedCase"
          :value="selectedCase"
          :clearable="false"
        ></v-select>
      </div>
      <div class="flex flex-col">
        <p class="font-semibold">Pilih Jenis Peta</p>
        <v-select
          :options="typeOptions"
          class="mt-4 text-sm md:text-base"
          v-model="selectedType"
          :value="selectedType"
          :clearable="false"
        ></v-select>
      </div>
    </div>
    <map-choropleth
      class="mt-8 border-t-2"
      :data="data"
      :location="selected"
      :case="selectedCase"
      :map-type="selectedType"
    >
    </map-choropleth>
  </div>
</template>
<script>
import VSelect from "vue-select";
import "vue-select/dist/vue-select.css";
import MapChoropleth from "@/components/_pages/data/map/Map";
export default {
  props: {
    regencies: {
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
      options: ["Sulawesi Tengah", "Indonesia"],
      selected: "Sulawesi Tengah",
      caseOptions: ["Positif", "Dalam Perawatan", "Sembuh", "Meninggal"],
      selectedCase: "Positif",
      typeOptions: ["Sebaran", "Titik"],
      selectedType: "Sebaran",
      data: [],
    };
  },
  watch: {
    selected() {
      switch (this.selected) {
        case "Sulawesi Tengah":
          this.data = this.regencies;
          break;
        case "Indonesia":
          this.data = this.provinces;
          break;
        case "Balaesang":
          this.data = this.regencies;
          break;
      }
    },
  },
  methods: {
    setSelected(value) {
      this.selected = value;
    },
  },
  components: {
    VSelect,
    MapChoropleth,
  },
  mounted() {
    this.data = this.regencies;
  },
};
</script>