<template>
  <div class="w-full text-gray-800 bg-white rounded-lg shadow-lg">
    <p class="pt-4 font-semibold text-center lg:ml-8">Tabel kasus ODP dan PDP di Sulawesi Tengah</p>
    <vue-good-table
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
  data() {
    return {
      columns: [
        {
          label: "Nama",
          field: "kabupaten"
        },
        {
          label: "ODP Aktif",
          field: "dalam_pemantauan",
          type: "number"
        },
        {
          label: "Selesai ODP",
          field: "selesai_pemantauan",
          type: "number"
        },
        {
          label: "Total ODP",
          field: "ODP",
          type: "number"
        },
        {
          label: "PDP Aktif",
          field: "dalam_pengawasan",
          type: "number"
        },
        {
          label: "Selesai PDP",
          field: "selesai_pengawasan",
          type: "number"
        },
        {
          label: "Total PDP",
          field: "PDP",
          type: "number"
        }
      ],
      rows: []
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

    updater: function() {
      setInterval(() => {
        this.getAllDistricts();
      }, 5 * 60 * 1000);
    }
  },
  mounted() {
    this.getAllDistricts();
    this.updater();
  }
};
</script>