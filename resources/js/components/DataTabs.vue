<template>
  <div class="w-full">
    <ul class="flex flex-row flex-wrap pt-3 mb-0 list-none border-b-2">
      <li class="flex-1 mr-2 -mb-px last:mr-0">
        <a
          class="block px-5 py-3 text-xs font-bold md:text-sm"
          v-on:click="toggleTabs(1)"
          v-bind:class="{
            'text-black': openTab !== 1,
            'text-blue-600 border-blue-600 border-b-2': openTab === 1,
          }"
          >Statistik</a
        >
      </li>
      <li class="flex-1 mr-2 -mb-px last:mr-0">
        <a
          class="block px-5 py-3 text-xs font-bold md:text-sm"
          v-on:click="toggleTabs(2)"
          v-bind:class="{
            'text-black': openTab !== 2,
            'text-blue-600 border-blue-600 border-b-2': openTab === 2,
          }"
        >
          <span class="hidden sm:block">Peta Sebaran Kab./Kota</span>
          <span class="block sm:hidden">Heat Map</span>
        </a>
      </li>
      <li class="flex-1 mr-2 -mb-px last:mr-0">
        <a
          class="block px-5 py-3 text-xs font-bold md:text-sm"
          v-on:click="toggleTabs(3)"
          v-bind:class="{
            'text-black': openTab !== 3,
            'text-blue-600 border-blue-600 border-b-2': openTab === 3,
          }"
        >
          <span class="hidden sm:block">Peta Titik Sebaran Kasus</span>
          <span class="block sm:hidden">Bubble Map</span>
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
    <div v-else class="relative flex flex-col w-full min-w-0 mb-6 break-words">
      <div class="flex-1 py-5">
        <div class="tab-content tab-space">
          <statistics
            :local.sync="local"
            :national.sync="national"
            v-show="openTab === 1"
          />
          <div
            class="block mx-6 text-center bg-white rounded-lg shadow-lg"
            v-show="openTab === 2"
          >
            <map-choropleth :districts.sync="districts" />
          </div>
          <div
            class="block mx-6 text-center bg-white rounded-lg shadow-lg"
            v-show="openTab === 3"
          >
            <map-bubble :districts="districts" />
          </div>
        </div>
      </div>
    </div>
    <see-more-link :linkUrl="route('data')" />
  </div>
</template>

<script>
import { ContentLoader } from "vue-content-loader";
import Statistics from "@/components/Statistics";
import MapChoropleth from "@/components/MapLokalChoropleth";
import MapBubble from "@/components/MapLokalBubble";
import SeeMoreLink from "@/components/SeeMoreLink";
export default {
  props: ["national", "local", "districts"],
  components: {
    ContentLoader,
    Statistics,
    MapChoropleth,
    MapBubble,
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
  },
};
</script>