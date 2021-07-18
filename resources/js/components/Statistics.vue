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
            :cumulative_local.sync="local.cumulative_positive"
            :new_local.sync="local.positive"
            :cumulative_national.sync="national.cumulative_positive"
            :new_national.sync="national.positive"
            bg_color="bg-red-800"
            text_color="text-red-800"
          />
          <card-case
            title="Dirawat"
            :cumulative_local.sync="local.cumulative_under_treatment"
            :new_local.sync="local.under_treatment"
            :cumulative_national.sync="national.cumulative_under_treatment"
            :new_national.sync="national.under_treatment"
            bg_color="bg-blue-600"
            text_color="text-blue-600"
          />
          <card-case
            title="Sembuh"
            :cumulative_local.sync="local.cumulative_recovered"
            :new_local.sync="local.recovered"
            :cumulative_national.sync="national.cumulative_recovered"
            :new_national.sync="national.recovered"
            bg_color="bg-green-500"
            text_color="text-green-500"
          />
          <card-case
            title="Meninggal"
            :cumulative_local.sync="local.cumulative_deceased"
            :new_local.sync="local.deceased"
            :cumulative_national.sync="national.cumulative_deceased"
            :new_national.sync="national.deceased"
            bg_color="bg-orange-500"
            text_color="text-orange-500"
          />
        </div>
      </div>

      <div
        class="container grid grid-cols-1 gap-5 p-4 mx-auto  lg:py-4 lg:px-0 md:grid-cols-2"
      >
        <card-suspect
          title="Pasien Dalam Pengawasan (PDP)"
          :new_case.sync="local.person_under_supervision"
          :new_finished_case.sync="local.finished_person_under_supervision"
          :active_case.sync="local.active_person_under_supervision"
          :total_case.sync="local.cumulative_person_under_supervision"
          :total_finished_case.sync="
            local.cumulative_finished_person_under_supervision
          "
          status="Pengawasan"
        />
        <card-suspect
          title="Orang Dalam Pemantauan (ODP)"
          :new_case.sync="local.person_under_observation"
          :new_finished_case.sync="local.finished_person_under_observation"
          :active_case.sync="local.active_person_under_observation"
          :total_case.sync="local.cumulative_person_under_observation"
          :total_finished_case.sync="
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
  props: ["local", "national"],
  components: {
    CardCase,
    CardSuspect,
  },
};
</script>