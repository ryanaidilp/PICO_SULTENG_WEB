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
            :cumulative-local.sync="local.cumulative_positive"
            :new-local.sync="local.positive"
            :cumulative-national.sync="national.cumulative_positive"
            :new-national.sync="national.positive"
            bg-color="bg-red-800"
            text-color="text-red-800"
          />
          <card-case
            title="Dirawat"
            :cumulative-local.sync="local.cumulative_under_treatment"
            :new-local.sync="local.under_treatment"
            :cumulative-national.sync="national.cumulative_under_treatment"
            :new-national.sync="national.under_treatment"
            bg-color="bg-blue-600"
            text-color="text-blue-600"
          />
          <card-case
            title="Sembuh"
            :cumulative-local.sync="local.cumulative_recovered"
            :new-local.sync="local.recovered"
            :cumulative-national.sync="national.cumulative_recovered"
            :new-national.sync="national.recovered"
            bg-color="bg-green-500"
            text-color="text-green-500"
          />
          <card-case
            title="Meninggal"
            :cumulative-local.sync="local.cumulative_deceased"
            :new-local.sync="local.deceased"
            :cumulative-national.sync="national.cumulative_deceased"
            :new-national.sync="national.deceased"
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
          :new-case.sync="local.person_under_supervision"
          :new-finished-case.sync="local.finished_person_under_supervision"
          :active-case.sync="local.active_person_under_supervision"
          :total-case.sync="local.cumulative_person_under_supervision"
          :total-finished-case.sync="
            local.cumulative_finished_person_under_supervision
          "
          status="Pengawasan"
        />
        <card-suspect
          title="Orang Dalam Pemantauan (ODP)"
          :new-case.sync="local.person_under_observation"
          :new-finished-case.sync="local.finished_person_under_observation"
          :active-case.sync="local.active_person_under_observation"
          :total-case.sync="local.cumulative_person_under_observation"
          :total-finished-case.sync="
            local.cumulative_finished_person_under_observation
          "
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
};
</script>