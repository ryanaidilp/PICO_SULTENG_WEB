<template>
  <div class="w-full text-gray-800 bg-white rounded-lg shadow-lg">
    <p class="pt-4 font-semibold text-center lg:ml-8">Tabel kasus ODP dan PDP di Sulawesi Tengah</p>
    <vue-good-table
      :fixed-header="true"
      theme="black-rhino"
      class="mt-4"
      :columns="columns"
      :rows="rows"
      :search-options="{
            enabled: true,
            trigger: 'enter',
            placeholder: 'Cari..'
        }"
      max-height="400px"
      :line-numbers="true"
    ></vue-good-table>
  </div>
</template>
<script>
import "vue-good-table/dist/vue-good-table.css";
import { VueGoodTable } from "vue-good-table";
export default {
  components: {
    VueGoodTable
  },
  props: {
    propsDataSultengKabupaten: {
      type: Array,
      default: () => []
    }
  },
  watch: {
    propsDataSultengKabupaten() {
      this.getStatistic();
    }
  },
  data() {
    return {
      columns: [
        {
          label: "Kabupaten",
          field: "kabupaten",
          type: "text",
          thClass: "text-center",
          tdClass: "text-left font-bold",
          sortable: false
        },
        {
          label: "ODP Aktif",
          field: "dalam_pemantauan",
          thClass: "text-center",
          tdClass: "text-center",
          type: "number"
        },
        {
          label: "Selesai ODP",
          field: "selesai_pemantauan",
          thClass: "text-center",
          tdClass: "text-center",
          type: "number"
        },
        {
          label: "Total ODP",
          field: "ODP",
          thClass: "text-center",
          tdClass: "text-center",
          type: "number"
        },
        {
          label: "PDP Aktif",
          field: "dalam_pengawasan",
          thClass: "text-center",
          tdClass: "text-center",
          type: "number"
        },
        {
          label: "Selesai PDP",
          field: "selesai_pengawasan",
          thClass: "text-center",
          tdClass: "text-center",
          type: "number"
        },
        {
          label: "Total PDP",
          field: "PDP",
          thClass: "text-center",
          tdClass: "text-center",
          type: "number"
        }
      ],
      rows: []
    };
  },
  methods: {
    getStatistic() {
      this.rows = this.propsDataSultengKabupaten;
    }
  },
  mounted() {
    let grid = document.querySelector("div.vgt-responsive");

    grid.classList.add("overlay");
    grid.classList.add("custom");
    this.getStatistic();
  }
};
</script>