<template>
  <div class="flex flex-wrap mx-6">
    <div class="w-full">
      <ul class="flex flex-row flex-wrap w-full pt-3 pb-4 mb-0 list-none md:w-1/2">
        <li class="flex-auto mr-2 -mb-px text-center last:mr-0">
          <a
            class="block px-5 py-3 text-xs font-bold leading-normal uppercase rounded shadow-lg"
            v-on:click="toggleTabs(1)"
            v-bind:class="{'text-blue-600 bg-white': openTab !== 1, 'text-white bg-blue-600': openTab === 1}"
          >
            <i class="fas fa-virus"></i> Terkonfirmasi
          </a>
        </li>
        <li class="flex-auto mr-2 -mb-px text-center last:mr-0">
          <a
            class="block px-5 py-3 text-xs font-bold leading-normal uppercase rounded shadow-lg"
            v-on:click="toggleTabs(2)"
            v-bind:class="{'text-blue-600 bg-white': openTab !== 2, 'text-white bg-blue-600': openTab === 2}"
          >
            <i class="fas fa-virus"></i> ODP-PDP
          </a>
        </li>
      </ul>
      <div class="w-full min-w-0 break-words">
        <div class="bg-white rounded-lg shadow-lg">
          <div class="tab-content tab-space">
            <div v-bind:class="{'hidden': openTab !== 1, 'block': openTab === 1}">
              <keep-alive>
                <positif-tab
                  :props-data-provinsi-nasional.sync="jsonDataProvinsi"
                  :props-data-sulteng-kabupaten.sync="jsonDataKabupaten"
                ></positif-tab>
              </keep-alive>
            </div>
            <div v-bind:class="{'hidden': openTab !== 2, 'block': openTab === 2}">
              <keep-alive>
                <odp-pdp-tab :props-data-sulteng-kabupaten.sync="jsonDataKabupaten"></odp-pdp-tab>
              </keep-alive>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  components: {
    PositifTab: () => import("./table/TablePositif"),
    OdpPdpTab: () => import("./table/TableODP")
  },
  props: {
    propsDataSultengKabupaten: {
      type: Array,
      default: () => []
    },
    propsDataProvinsiNasional: {
      type: Array,
      default: () => []
    }
  },
  data() {
    return {
      openTab: 1,
      jsonDataKabupaten: [],
      jsonDataProvinsi: []
    };
  },
  methods: {
    toggleTabs: function(tabNumber) {
      this.openTab = tabNumber;
    }
  },
  watch: {
    propsDataSultengKabupaten() {
      this.jsonDataKabupaten = this.propsDataSultengKabupaten;
    },
    propsDataProvinsiNasional() {
      this.jsonDataProvinsi = this.propsDataProvinsiNasional;
    }
  }
};
</script>