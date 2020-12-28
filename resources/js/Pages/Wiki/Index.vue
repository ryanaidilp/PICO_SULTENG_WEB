<template>
  <layout>
    <div class="w-full mt-8 text-gray-800">
      <h5
        class="text-xl font-bold text-center md:text-4xl md:text-left md:ml-6"
      >
        Pusat Informasi COVID-19
      </h5>
      <p class="text-xs text-center md:text-lg md:text-left md:ml-6">
        Kumpulan informasi penting seputar COVID-19.
      </p>
      <what-is-covid class="mt-8 md:mt-16"></what-is-covid>
      <how-to-prevent-covid class="mt-16"/>
      <how-it-spread class="mt-16"></how-it-spread>
      <symptomp class="mt-16"></symptomp>
      <important-term class="mt-16" />
      <what-if-infected class="mt-16"></what-if-infected>
      <card-lindungi class="mt-16"></card-lindungi>
      <card-physical class="mt-16"></card-physical>
      <mythbuster class="mt-16"></mythbuster>
      <Partner :partners="partners" class="mt-16" />
    </div>
  </layout>
</template>

<script>
import Layout from "@/layout/Layout";
import HowItSpread from "@/components/_pages/wiki/HowItSpread";
import WhatIsCovid from "@/components/_pages/wiki/WhatIsCovid";
import Symptomp from "@/components/_pages/wiki/Symptomp";
import CardLindungi from "@/components/CardLindungi";
import CardPhysical from "@/components/_pages/wiki/CardPhysical";
import ImportantTerm from "@/components/_pages/wiki/ImportantTerm";
import Mythbuster from "@/components/_pages/wiki/Mythbuster";
import Partner from "@/Shared/PartnerFooter";
import HowToPreventCovid from '@/components/_pages/wiki/HowToPreventCovid'
export default {
  props: ["partners"],
  components: {
    Layout,
    WhatIsCovid,
    HowItSpread,
    Symptomp,
    CardLindungi,
    CardPhysical,
    ImportantTerm,
    Mythbuster,
    Partner,
    HowToPreventCovid
  },
};
</script>

<style>
</style>