<template>
  <div class="flex flex-wrap mx-6">
    <div class="w-full">
      <ul
        class="flex flex-row flex-wrap w-full pt-3 pb-4 mb-0 list-none md:w-1/2"
      >
        <li class="flex-auto mr-2 -mb-px text-center last:mr-0">
          <a
            class="block px-5 py-3 text-xs font-bold leading-normal uppercase rounded shadow-lg"
            v-on:click="toggleTabs(1)"
            v-bind:class="{
              'text-blue-600 bg-white': openTab !== 1,
              'text-white bg-blue-600': openTab === 1,
            }"
          >
            Terkonfirmasi
          </a>
        </li>
        <li class="flex-auto mr-2 -mb-px text-center last:mr-0">
          <a
            class="block px-5 py-3 text-xs font-bold leading-normal uppercase rounded shadow-lg"
            v-on:click="toggleTabs(2)"
            v-bind:class="{
              'text-blue-600 bg-white': openTab !== 2,
              'text-white bg-blue-600': openTab === 2,
            }"
          >
             ODP-PDP
          </a>
        </li>
      </ul>
      <div class="w-full min-w-0 break-words">
        <div class="bg-white rounded-lg shadow-lg">
          <div class="tab-content tab-space">
            <div v-bind:class="{ hidden: openTab !== 1, block: openTab === 1 }">
              <keep-alive>
                <table-positive
                  :props-data-provinsi-nasional="propsDataProvinsiNasional"
                  :props-data-sulteng-kabupaten="propsDataSultengKabupaten"
                ></table-positive>
              </keep-alive>
            </div>
            <div v-bind:class="{ hidden: openTab !== 2, block: openTab === 2 }">
              <keep-alive>
                <table-suspect
                  :props-data-sulteng-kabupaten="propsDataSultengKabupaten"
                ></table-suspect>
              </keep-alive>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import TablePositive from "@/components/_pages/data/table/TablePositive";
import TableSuspect from "@/components/_pages/data/table/TableSuspect";
export default {
  components: {
    TablePositive,
    TableSuspect,
  },
  props: {
    propsDataSultengKabupaten: {
      type: Array,
    },
    propsDataProvinsiNasional: {
      type: Array,
    },
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