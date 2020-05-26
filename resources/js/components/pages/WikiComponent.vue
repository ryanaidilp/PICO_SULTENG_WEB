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
import Partner from "../partial/PartnerFooter";
import CardLindungi from "../partial/wiki/CardLindungi";
import CardPhysical from "../partial/wiki/CardPhysical";
const WhatIsCovid = () => import("../partial/wiki/WhatIsCovid");
const HowInfected = () => import("../partial/wiki/Infected");
const Symptomps = () => import("../partial/wiki/GejalaUmum");
const WhatIfInfected = () => import("../partial/wiki/WhatIfInfected");
const Mythbuster = () => import("../partial/wiki/Mythbuster");
const Istilah = () => import("../partial/wiki/Istilah");
import { ContentLoader } from "vue-content-loader";
export default {
  components: {
    Istilah,
    ContentLoader,
    CardLindungi,
    CardPhysical,
    WhatIsCovid,
    HowInfected,
    Mythbuster,
    WhatIfInfected,
    Symptomps,
    Partner
  }
};
</script>