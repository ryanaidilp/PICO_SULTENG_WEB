<template>
  <div class="w-full mt-8 text-gray-800">
    <h5
      class="text-xl font-bold text-center md:text-4xl md:text-left md:ml-6"
    >Pusat Informasi COVID-19</h5>
    <p
      class="text-xs text-center md:text-xl md:text-left md:ml-6"
    >Kumpulan informasi penting seputar COVID-19.</p>
    <what-is-covid class="mt-8 md:mt-16"></what-is-covid>
    <how-infected class="mt-16"></how-infected>
    <symptomps class="mt-16"></symptomps>
    <istilah class="mt-16"></istilah>
    <what-if-infected class="mt-16"></what-if-infected>
    <card-lindungi class="mt-16"></card-lindungi>
    <card-physical class="mt-16"></card-physical>
    <mythbuster class="mt-16"></mythbuster>
    <Partner class="mt-16" />
  </div>
</template>
<script>
import { ContentLoader } from "vue-content-loader";
export default {
  components: {
    Istilah: () => import("../partial/wiki/Istilah"),
    ContentLoader,
    CardLindungi: () => import("../partial/wiki/CardLindungi"),
    CardPhysical: () => import("../partial/wiki/CardPhysical"),
    WhatIsCovid: () => import("../partial/wiki/WhatIsCovid"),
    HowInfected: () => import("../partial/wiki/Infected"),
    Mythbuster: () => import("../partial/wiki/Mythbuster"),
    WhatIfInfected: () => import("../partial/wiki/WhatIfInfected"),
    Symptomps: () => import("../partial/wiki/GejalaUmum"),
    Partner: () => import("../partial/PartnerFooter")
  }
};
</script>