<template>
  <div class="w-full text-gray-800 bg-white rounded-lg shadow-lg">
    <p class="pt-4 font-semibold text-center lg:ml-8">
      Tabel kasus ODP dan PDP di Sulawesi Tengah
    </p>
    <data-table class="mt-4" :header-fields="columns" :data="rows">
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
import DataTable from "@/components/DataTable";
import Hyperlink from "@/components/Hyperlink";
export default {
  components: {
    DataTable,
    Hyperlink,
  },
  props: {
    propsDataSultengKabupaten: {
      type: Array,
      default: () => [],
    },
  },
  watch: {
    propsDataSultengKabupaten() {
      this.getStatistic();
    },
  },
  data() {
    return {
      columns: [
        {
          label: "Kabupaten",
          name: "kabupaten",
          type: "text",
          sortable: true,
        },
        {
          label: "ODP Aktif",
          name: "dalam_pemantauan",
          sortable: true,
          format: this.formatDecimal,
        },
        {
          label: "Selesai ODP",
          name: "selesai_pemantauan",
          sortable: true,
          format: this.formatDecimal,
        },
        {
          label: "Total ODP",
          name: "ODP",
          sortable: true,
          format: this.formatDecimal,
        },
        {
          label: "PDP Aktif",
          name: "dalam_pengawasan",
          sortable: true,
          format: this.formatDecimal,
        },
        {
          label: "Selesai PDP",
          name: "selesai_pengawasan",
          sortable: true,
          format: this.formatDecimal,
        },
        {
          label: "Total PDP",
          name: "PDP",
          sortable: true,
          format: this.formatDecimal,
        },
      ],
      rows: [],
    };
  },
  methods: {
    getStatistic() {
      this.rows = this.propsDataSultengKabupaten;
    },
  },
  mounted() {
    this.getStatistic();
  },
};
</script>