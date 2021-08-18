<template>
  <div class="flex flex-wrap mx-6">
    <div class="w-full">
      <div class="relative flex flex-col w-full min-w-0 mb-6 break-words">
        <div class="flex-auto pt-5 bg-white rounded-lg shadow-lg">
          <div class="tab-content tab-space">
            <keep-alive>
              <map-card
                :regencies="regencies"
                :provinces="provinces"
              ></map-card>
            </keep-alive>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import MapCard from "@/components/_pages/data/map/MapCard";

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
    MapCard,
  },
};
</script>