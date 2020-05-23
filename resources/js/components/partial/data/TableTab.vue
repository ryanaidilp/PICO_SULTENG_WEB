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
                <positif-tab></positif-tab>
              </keep-alive>
            </div>
            <div v-bind:class="{'hidden': openTab !== 2, 'block': openTab === 2}">
              <keep-alive>
                  <odp-pdp-tab></odp-pdp-tab>
              </keep-alive>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
const PositifTab = () => import('./table/TablePositif')
const OdpPdpTab = () => import('./table/TableODP')
export default {
  components: {
    PositifTab,
    OdpPdpTab
  },
  data() {
    return {
      openTab: 1
    };
  },
  methods: {
    toggleTabs: function(tabNumber) {
      this.openTab = tabNumber;
    }
  }
};
</script>