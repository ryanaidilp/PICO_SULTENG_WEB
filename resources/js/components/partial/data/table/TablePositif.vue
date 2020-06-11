<template>
  <div class="w-full text-gray-800 bg-white rounded-lg shadow-lg">
    <p class="pt-4 ml-8 font-semibold">Pilih Wilayah</p>
    <v-select
      :options="options"
      class="w-1/2 mx-8 mt-4 text-sm md:text-base md:w-1/4"
      v-model="selected"
      :value="selected"
      :clearable="false"
    ></v-select>
    <vue-good-table
      :fixed-header="true"
      class="mt-4"
      v-if="selected == 'Sulawesi Tengah'"
      :columns="columnsDistrict"
      :rows="rows"
      :search-options="{
            enabled: true,
            trigger: 'enter',
            placeholder: 'Cari..'
        }"
      max-height="400px"
      :line-numbers="true"
      theme="black-rhino"
    ></vue-good-table>
    <vue-good-table
      :fixed-header="true"
      theme="black-rhino"
      class="mt-4"
      v-else-if="selected == 'Indonesia'"
      :columns="columnsProvince"
      :rows="rows"
      :search-options="{
            enabled: true,
            trigger: 'enter',
            placeholder: 'Cari..'
        }"
      max-height="400px"
      :line-numbers="true"
    ></vue-good-table>
    <div
      v-else
      class="pb-8 my-8 text-lg font-bold text-center bg-white rounded-lg"
    >Tidak Ada wilayah yang dipilih</div>
  </div>
</template>
<script>
import "vue-good-table/dist/vue-good-table.css";
import { VueGoodTable } from "vue-good-table";
import VSelect from "vue-select";
import "vue-select/dist/vue-select.css";
export default {
  props: {
    propsDataSultengKabupaten: {
      type: Array,
      default: () => []
    },
    propsDataProvinsiNasional: {
      type: Array,
      default: () => []
    }
  },
  components: {
    VSelect,
    VueGoodTable
  },
  data() {
    return {
      columnsDistrict: [
        {
          label: "Nama",
          field: "kabupaten",
          type: "text",
          thClass: "text-center",
          tdClass: "text-left font-bold",
          sortable: false
        },
        {
          label: "Positif",
          field: "positif",
          thClass: "text-center",
          tdClass: "text-center",
          type: "number"
        },
        {
          label: "Negatif",
          field: "negatif",
          thClass: "text-center",
          tdClass: "text-center",
          type: "number"
        },
        {
          label: "Sembuh",
          field: "sembuh",
          thClass: "text-center",
          tdClass: "text-center",
          type: "number"
        },
        {
          label: "Meninggal",
          field: "meninggal",
          thClass: "text-center",
          tdClass: "text-center",
          type: "number"
        },
        {
          label: "% Kematian",
          field: "rasio_kematian",
          thClass: "text-center",
          tdClass: "text-center",
          type: "number"
        }
      ],
      columnsProvince: [
        {
          label: "Nama",
          field: "provinsi",
          type: "text",
          thClass: "text-center",
          tdClass: "text-left font-bold",
          sortable: false
        },
        {
          label: "Positif",
          field: "positif",
          thClass: "text-center",
          tdClass: "text-center",
          type: "number"
        },
        {
          label: "Dalam Perawatan",
          field: "dalam_perawatan",
          thClass: "text-center",
          tdClass: "text-center",
          type: "number"
        },
        {
          label: "Sembuh",
          field: "sembuh",
          thClass: "text-center",
          tdClass: "text-center",
          type: "number"
        },
        {
          label: "Meninggal",
          field: "meninggal",
          thClass: "text-center",
          tdClass: "text-center",
          type: "number"
        },
        {
          label: "% Kematian",
          field: "persentase_kematian",
          thClass: "text-center",
          tdClass: "text-center",
          type: "number"
        }
      ],
      rows: [],
      jsonDataKabupaten: [],
      jsonDataProvinsi: [],
      selected: "Sulawesi Tengah",
      options: ["Sulawesi Tengah", "Indonesia"]
    };
  },
  methods: {
    fetchData() {
      if (this.selected == "Indonesia") {
        this.getAllProvinces();
      } else {
        this.getAllDistricts();
      }
    },
    getAllDistricts: function() {
      this.rows = this.jsonDataKabupaten;
    },
    getAllProvinces: function() {
      this.rows = this.jsonDataProvinsi;
    }
  },
  watch: {
    propsDataSultengKabupaten() {
      this.jsonDataKabupaten = this.propsDataSultengKabupaten;
      this.fetchData();
    },
    propsDataProvinsiNasional() {
      this.jsonDataProvinsi = this.propsDataProvinsiNasional;
      this.fetchData();
    },
    selected: function() {
      this.fetchData();
    }
  },
  mounted() {
    this.fetchData();
  }
};
</script>

