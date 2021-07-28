<template>
  <div class="flex flex-wrap mx-6">
    <div class="w-full">
      <ul class="flex flex-row flex-wrap pt-3 pb-4 mb-0 list-none">
        <li class="flex-auto mr-2 -mb-px text-center last:mr-0">
          <a
            class="block px-5 py-3 text-xs font-bold leading-normal uppercase rounded shadow-lg "
            v-on:click="toggleTabs(1)"
            v-bind:class="{
              'text-blue-600 bg-white': openTab !== 1,
              'text-white bg-blue-600': openTab === 1,
            }"
          >
            Peta Poligon
          </a>
        </li>
        <li class="flex-auto mr-2 -mb-px text-center last:mr-0">
          <a
            class="block px-5 py-3 text-xs font-bold leading-normal uppercase rounded shadow-lg "
            v-on:click="toggleTabs(2)"
            v-bind:class="{
              'text-blue-600 bg-white': openTab !== 2,
              'text-white bg-blue-600': openTab === 2,
            }"
          >
            Sebaran Titik
          </a>
        </li>
      </ul>
      <div class="relative flex flex-col w-full min-w-0 mb-6 break-words">
        <div class="flex-auto pt-5 bg-white rounded-lg shadow-lg">
          <div class="tab-content tab-space">
            <div v-bind:class="{ hidden: openTab !== 1, block: openTab === 1 }">
              <keep-alive>
                <map-choropleth
                  :regencies="regencies"
                  :provinces="provinces"
                ></map-choropleth>
              </keep-alive>
            </div>
            <div v-bind:class="{ hidden: openTab !== 2, block: openTab === 2 }">
              <keep-alive>
                <map-bubble
                  :regencies="regencies"
                  :provinces="provinces"
                ></map-bubble>
              </keep-alive>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import MapChoropleth from "@/components/_pages/data/map/choropleth/MapChoropleth";
import MapBubble from "@/components/_pages/data/map/bubble/MapBubble";

export default {
  props: {
    regencies: {
      type: Array,
      required: true,
    },
    provinces: {
      type: Array,
      required: true,
    },
  },
  components: {
    MapChoropleth,
    MapBubble,
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