<template>
  <div class="w-full">
    <div
      class="flex flex-col flex-wrap items-center justify-center w-full  md:flex-row"
    >
      <div class="container p-4 mx-auto lg:py-4 lg:px-0">
        <div
          class="grid gap-5  md:grid-cols-2 md:grid-rows-2 xl:grid-cols-4 xl:grid-rows-1"
        >
          <card-case
            title="Positif"
            :cumulative-local="loadValue(local, 'kumulatif', 'positif')"
            :new-local="loadValue(local, 'kasus_baru', 'positif')"
            :cumulative-national="loadValue(national, 'kumulatif', 'positif')"
            :new-national="loadValue(national, 'kasus_baru', 'positif')"
            bg-color="bg-red-800"
            text-color="text-red-800"
          />
          <card-case
            title="Dirawat"
            :cumulative-local="loadValue(local, 'aktif', 'dalam_perawatan')"
            :new-local="loadValue(local, 'kasus_baru', 'dalam_perawatan')"
            :cumulative-national="
              loadValue(national, 'kumulatif', 'dalam_perawatan')
            "
            :new-national="loadValue(national, 'kasus_baru', 'dalam_perawatan')"
            bg-color="bg-blue-600"
            text-color="text-blue-600"
          />
          <card-case
            title="Sembuh"
            :cumulative-local="loadValue(local, 'kumulatif', 'sembuh')"
            :new-local="loadValue(local, 'kasus_baru', 'sembuh')"
            :cumulative-national="loadValue(national, 'kumulatif', 'sembuh')"
            :new-national="loadValue(national, 'kasus_baru', 'sembuh')"
            bg-color="bg-green-500"
            text-color="text-green-500"
          />
          <card-case
            title="Meninggal"
            :cumulative-local="loadValue(local, 'kumulatif', 'meninggal')"
            :new-local="loadValue(local, 'kasus_baru', 'meninggal')"
            :cumulative-national="loadValue(national, 'kumulatif', 'meninggal')"
            :new-national="loadValue(national, 'kasus_baru', 'meninggal')"
            bg-color="bg-orange-500"
            text-color="text-orange-500"
          />
        </div>
      </div>

      <div
        class="container grid grid-cols-1 gap-5 p-4 mx-auto  lg:py-4 lg:px-0 md:grid-cols-2"
      >
        <card-suspect
          title="Pasien Dalam Pengawasan (PDP)"
          :new-case="local.kasus_baru.PDP"
          :new-finished-case="local.selesai.PDP"
          :active-case="local.aktif.PDP"
          :total-case="local.kumulatif.PDP"
          :total-finished-case="local.kumulatif.selesai_PDP"
          status="Pengawasan"
        />
        <card-suspect
          title="Orang Dalam Pemantauan (ODP)"
          :new-case="local.ODP"
          :new-finished-case="local.selesai.ODP"
          :active-case="local.aktif.ODP"
          :total-case="local.kumulatif.ODP"
          :total-finished-case="local.kumulatif.selesai_ODP"
          status="Pemantauan"
        />
      </div>
    </div>
  </div>
</template>
<script>
import CardCase from "@/components/CardCase";
import CardSuspect from "@/components/CardSuspect";
export default {
  props: {
    local: {
      type: Object,
      required: true,
    },
    national: {
      type: Object,
      required: true,
    },
  },
  components: {
    CardCase,
    CardSuspect,
  },
  methods: {
    loadValue(data, key, scndKey = null) {
      if (data[key]) {
        return scndKey !== null ? data[key][scndKey] : data[key];
      }
      return 0;
    },
  },
};
</script>