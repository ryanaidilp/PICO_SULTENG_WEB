<template>
  <div class="w-full">
    <ul class="flex flex-row flex-wrap max-w-xl pt-3 mb-0 list-none">
      <li class="flex-1">
        <a
          class="block py-2 text-xs font-semibold cursor-pointer md:text-xl"
          @click="toggleTabs(1)"
          :class="activeTab(1)"
          >Statistik</a
        >
      </li>
      <li class="flex-1">
        <a
          class="block py-2 text-xs font-semibold cursor-pointer md:text-xl"
          @click="toggleTabs(2)"
          :class="activeTab(2)"
        >
          <span>Vaksinasi</span>
        </a>
      </li>
    </ul>
    <content-loader
      v-if="!national && !this.local"
      :height="400"
      :width="900"
      :speed="2"
      primaryColor="#ddd"
      secondaryColor="#fff"
    >
      <rect x="5" y="20" rx="10" ry="10" width="210" height="110" />
      <rect x="230" y="20" rx="10" ry="10" width="210" height="110" />
      <rect x="460" y="20" rx="10" ry="10" width="210" height="110" />
      <rect x="690" y="20" rx="10" ry="10" width="210" height="110" />
      <rect x="0" y="150" rx="10" ry="10" width="450" height="210" />
      <rect x="480" y="150" rx="10" ry="10" width="450" height="210" />
    </content-loader>
    <div
      v-else
      class="relative flex flex-col w-full min-w-0 mb-6 break-words border-t-2 border-gray-300 "
    >
      <div class="flex-1 py-5">
        <div class="tab-content tab-space">
          <transition name="slide-fade" mode="out-in">
            <statistics
              :local.sync="local"
              :national.sync="national"
              v-if="openTab === 1"
            />
            <vaccine-data
              :national-vaccine="nationalVaccine"
              :province-vaccine="provinceVaccine"
              v-if="openTab === 2"
            />
          </transition>
        </div>
      </div>
    </div>
    <see-more-link :linkUrl="route('data')" />
  </div>
</template>

<script>
import { ContentLoader } from "vue-content-loader";
import Statistics from "@/components/Statistics";
import VaccineData from "@/components/_pages/home/VaccineData";
import SeeMoreLink from "@/components/SeeMoreLink";
export default {
  props: ["national", "local", "nationalVaccine", "provinceVaccine"],
  components: {
    ContentLoader,
    Statistics,
    VaccineData,
    SeeMoreLink,
  },
  data() {
    return {
      openTab: 1,
    };
  },
  methods: {
    toggleTabs: function (tabNumber) {
      this.openTab = tabNumber;
    },
    activeTab(tabNumber) {
      if (this.openTab === tabNumber) {
        return "text-blue-600 border-blue-600 border-b-2";
      }
      return "text-gray-400";
    },
  },
};
</script>

<style scoped>
.slide-fade-enter-active {
  transition: all 0.3s ease;
}
.slide-fade-leave-active {
  transition: all 0.5s ease-out;
}

.slide-fade-enter-to,
.slide-leave {
  opacity: 1;
}

.slide-fade-enter
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateY(-10px);
  opacity: 0;
}

.slide-fade-leave-to {
  transform: translateY(10px);
  opacity: 0;
}
</style>