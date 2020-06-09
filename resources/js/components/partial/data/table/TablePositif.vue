<template>
  <div class="w-full text-gray-800 bg-white rounded-lg shadow-lg">
    <p class="pt-4 ml-8 font-semibold">Pilih Wilayah</p>
    <v-select
      :options="options"
      class="w-1/2 mx-8 mt-4 text-sm md:text-base md:w-1/4"
      v-model="selected"
      :value="selected"
    ></v-select>
    <vue-good-table
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
  components: {
    VSelect,
    VueGoodTable
  },
  data() {
    return {
      columnsDistrict: [
        {
          label: "Nama",
          field: "kabupaten"
        },
        {
          label: "Positif",
          field: "positif",
          type: "number"
        },
        {
          label: "Negatif",
          field: "negatif",
          type: "number"
        },
        {
          label: "Sembuh",
          field: "sembuh",
          type: "number"
        },
        {
          label: "Meninggal",
          field: "meninggal",
          type: "number"
        }
      ],
      columnsProvince: [
        {
          label: "Nama",
          field: "provinsi"
        },
        {
          label: "Positif",
          field: "positif",
          type: "number"
        },
        {
          label: "Dalam Perawatan",
          field: "dalam_perawatan",
          type: "number"
        },
        {
          label: "Sembuh",
          field: "sembuh",
          type: "number"
        },
        {
          label: "Meninggal",
          field: "meninggal",
          type: "number"
        },
        {
          label: "% Kematian",
          field: "persentase_kematian",
          type: "number"
        }
      ],
      rows: [],
      selected: "Sulawesi Tengah",
      options: ["Sulawesi Tengah", "Indonesia"]
    };
  },
  methods: {
    getAllDistricts: function() {
      axios
        .get("/corona/api/kabupaten")
        .then(result => {
          this.rows = result.data.data;
        })
        .catch(err => {
          console.log(err);
        });
    },
    getAllProvinces: function() {
      axios
        .get("/corona/api/provinsi")
        .then(result => {
          this.rows = result.data.data;
        })
        .catch(err => {
          console.log(err);
        });
    },
    updater: function() {
      setInterval(() => {
        if (this.selected == "Indonesia") {
          this.getAllProvinces();
        } else {
          this.getAllDistricts();
        }
      }, 5 * 60 * 1000);
    }
  },
  watch: {
    selected: function() {
      if (this.selected == "Indonesia") {
        this.getAllProvinces();
      } else {
        this.getAllDistricts();
      }
    }
  },
  mounted() {
    this.getAllDistricts();
    this.updater();
  }
};
</script>