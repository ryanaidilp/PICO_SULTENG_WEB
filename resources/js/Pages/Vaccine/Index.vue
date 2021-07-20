<template>
  <layout>
    <div class="w-full leading-normal xl:px-0 xl:mt-8">
      <section class="px-4">
        <h2 class="text-2xl text-left md:text-3xl">
          <b>Situasi Vaksinasi COVID-19</b>
        </h2>
        <vaccine-data
          :province-vaccine="provinceVaccine"
          :national-vaccine="nationalVaccine"
          show-target-card
        />
      </section>
      <section class="px-4 my-16">
        <h2 class="text-2xl text-left md:text-3xl">
          <b>Progress Vaksinasi COVID-19</b>
        </h2>
        <vaccine-progress
          :province-vaccine="provinceVaccine"
          :national-vaccine="nationalVaccine"
        />
      </section>
      <partner-footer :partners="partners" class="mt-8" />
    </div>
  </layout>
</template>
<script>
import Layout from "@/layout/Layout";
import PartnerFooter from "@/Shared/PartnerFooter";
import VaccineData from "@/components/_pages/home/VaccineData";
import VaccineProgress from "@/components/_pages/vaccine/VaccineProgress";
export default {
  props: {
    partners: {
      type: Array,
    },
    provinceVaccine: {
      type: Object,
    },
    nationalVaccine: {
      type: Object,
    },
  },
  components: {
    Layout,
    VaccineData,
    PartnerFooter,
    VaccineProgress,
  },
  methods: {
    reloadData() {
      setInterval(() => {
        this.$inertia.reload({ only: ["localVaccine", "nationalVaccine"] });
      }, 5 * 60 * 1000);
    },
  },
  mounted() {
    this.reloadData();
  },
};
</script>