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
    <data-table
      class="mt-4"
      v-show="selected == 'Indonesia'"
      :header-fields="columnsProvince"
      :data="rowsProvinsi"
    >
      <template #notes>
        Data diolah dari
        <hyperlink href="https://covid19.go.id" label="https://covid19.go.id" />
      </template>
    </data-table>
    <data-table
      class="mt-4"
      v-show="selected == 'Sulawesi Tengah'"
      :header-fields="columnsDistrict"
      :data="rowsKabupaten"
    >
      <template #notes>
        Data diolah dari
        <hyperlink
          href="https://dinkes.sultengprov.go.id"
          label="https://dinkes.sultengprov.go.id"
        />
      </template>
    </data-table>
  </div>
</template>
<script>
import VSelect from "vue-select";
import DataTable from "@/components/DataTable";
import Hyperlink from "@/components/Hyperlink";
import "vue-select/dist/vue-select.css";
export default {
  props: {
    propsDataSultengKabupaten: {
      type: Array,
      default: () => [],
    },
    propsDataProvinsiNasional: {
      type: Array,
      default: () => [],
    },
  },
  components: {
    VSelect,
    Hyperlink,
    DataTable,
  },
  data() {
    return {
      columnsDistrict: [
        {
          label: "Kabupaten",
          name: "kabupaten",
          sortable: true,
        },
        {
          label: "Positif",
          name: "positif",
          sortable: true,
          format: this.formatDecimal,
        },
        {
          label: "Dirawat",
          name: "dalam_perawatan",
          sortable: true,
          format: this.formatDecimal,
        },
        {
          label: "Sembuh",
          name: "sembuh",
          sortable: true,
          format: this.formatDecimal,
        },
        {
          label: "Meninggal",
          name: "meninggal",
          sortable: true,
          format: this.formatDecimal,
        },
        {
          label: "% Kematian",
          name: "rasio_kematian",
          sortable: true,
        },
      ],
      columnsProvince: [
        {
          label: "Provinsi",
          name: "name",
          sortable: true,
        },
        {
          label: "Positif",
          name: "positive",
          sortable: true,
          format: this.formatDecimal,
        },
        {
          label: "Dirawat",
          name: "under_treatment",
          sortable: true,
          format: this.formatDecimal,
        },
        {
          label: "Sembuh",
          name: "recovered",
          sortable: true,
          format: this.formatDecimal,
        },
        {
          label: "Meninggal",
          name: "deceased",
          sortable: true,
          format: this.formatDecimal,
        },
        {
          label: "% Kematian",
          name: "death_ratio",
          sortable: true,
        },
      ],
      rowsProvinsi: [],
      rowsKabupaten: [],
      jsonDataKabupaten: [],
      jsonDataProvinsi: [],
      selected: "Sulawesi Tengah",
      options: ["Sulawesi Tengah", "Indonesia"],
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
    getAllDistricts: function () {
      this.rowsKabupaten = this.jsonDataKabupaten;
    },
    getAllProvinces: function () {
      this.rowsProvinsi = this.jsonDataProvinsi;
    },
  },
  watch: {
    selected: function () {
      this.fetchData();
    },
  },
  mounted() {
    this.jsonDataProvinsi = this.propsDataProvinsiNasional;
    this.jsonDataKabupaten = this.propsDataSultengKabupaten;
    this.fetchData();
  },
};
</script>

