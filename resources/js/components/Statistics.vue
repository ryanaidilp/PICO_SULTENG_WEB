<template>
  <div class="w-full">
    <div
      class="flex flex-col flex-wrap items-center justify-center w-full md:flex-row"
    >
      <div class="container p-4 mx-auto">
        <div
          class="grid gap-5 md:grid-cols-2 md:grid-rows-2 xl:grid-cols-4 xl:grid-rows-1"
        >
          <card-case
            title="Positif"
            :cumulative_local.sync="local.cumulative_positive"
            :new_local.sync="local.positive"
            :cumulative_national.sync="national.cumulative_positive"
            :new_national.sync="national.daily_positive_case"
            bg_color="bg-red-800"
            text_color="text-red-800"
          />
          <card-case
            title="Dirawat"
            :cumulative_local.sync="local.under_treatment"
            :new_local.sync="local.new_under_treatment"
            :cumulative_national.sync="national.cumulative_under_treatment"
            :new_national.sync="national.daily_under_treatment_case"
            bg_color="bg-blue-600"
            text_color="text-blue-600"
          />
          <card-case
            title="Sembuh"
            :cumulative_local.sync="local.cumulative_recovered"
            :new_local.sync="local.recovered"
            :cumulative_national.sync="national.cumulative_recovered"
            :new_national.sync="national.daily_recovered_case"
            bg_color="bg-green-500"
            text_color="text-green-500"
          />
          <card-case
            title="Meninggal"
            :cumulative_local.sync="local.cumulative_death"
            :new_local.sync="local.death"
            :cumulative_national.sync="national.cumulative_deceased"
            :new_national.sync="national.daily_deceased_case"
            bg_color="bg-orange-500"
            text_color="text-orange-500"
          />
        </div>
      </div>

      <card-suspect
        title="Pasien Dalam Pengawasan (PDP)"
        :new_case.sync="local.new_PDP"
        :new_finished_case.sync="local.finished_PDP"
        :active_case.sync="local.active_PDP"
        :total_case.sync="local.cumulative_PDP"
        :total_finished_case.sync="local.cumulative_finished_PDP"
        status="Pengawasan"
      />
      <card-suspect
        title="Orang Dalam Pemantauan (ODP)"
        :new_case.sync="local.new_ODP"
        :new_finished_case.sync="local.finished_ODP"
        :active_case.sync="local.active_ODP"
        :total_case.sync="local.cumulative_ODP"
        :total_finished_case.sync="local.cumulative_finished_ODP"
        status="Pemantauan"
      />
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