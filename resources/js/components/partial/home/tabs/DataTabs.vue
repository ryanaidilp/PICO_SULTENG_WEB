<template>
  <div class="w-full">
    <ul class="flex flex-row flex-wrap pt-3 mb-0 list-none border-b-2">
      <li class="flex-1 mr-2 -mb-px last:mr-0">
        <a
          class="block px-5 py-3 text-xs font-bold md:text-sm"
          v-on:click="toggleTabs(1)"
          v-bind:class="{'text-black': openTab !== 1, 'text-blue-600 border-blue-600 border-b-2': openTab === 1}"
        >Statistik</a>
      </li>
      <li class="flex-1 mr-2 -mb-px last:mr-0">
        <a
          class="block px-5 py-3 text-xs font-bold md:text-sm"
          v-on:click="toggleTabs(2)"
          v-bind:class="{'text-black': openTab !== 2, 'text-blue-600 border-blue-600 border-b-2': openTab === 2}"
        >
          <span class="hidden sm:block">Peta Sebaran Kab./Kota</span>
          <span class="block sm:hidden">Heat Map</span>
        </a>
      </li>
      <li class="flex-1 mr-2 -mb-px last:mr-0">
        <a
          class="block px-5 py-3 text-xs font-bold md:text-sm"
          v-on:click="toggleTabs(3)"
          v-bind:class="{'text-black': openTab !== 3, 'text-blue-600 border-blue-600 border-b-2': openTab === 3}"
        >
          <span class="hidden sm:block">Peta Titik Sebaran Kasus</span>
          <span class="block sm:hidden">Bubble Map</span>
        </a>
      </li>
    </ul>
    <content-loader
      v-if="!statistics && !this.positifNasional"
      :height="400"
      :width="900"
      :speed="1"
      primaryColor="#ddd"
      secondaryColor="#fff"
    >
      <rect x="0" y="20" rx="3" ry="3" width="290" height="110" />
      <rect x="320" y="20" rx="3" ry="3" width="290" height="110" />
      <rect x="640" y="20" rx="3" ry="3" width="290" height="110" />
      <rect x="0" y="150" rx="3" ry="3" width="450" height="210" />
      <rect x="480" y="150" rx="3" ry="3" width="450" height="210" />
    </content-loader>
    <div v-else class="relative flex flex-col w-full min-w-0 mb-6 break-words">
      <div class="flex-1 py-5">
        <div class="tab-content tab-space">
          <div
            v-bind:class="{'hidden': openTab !== 1, 'block items-center justify-center flex flex-wrap flex-col md:flex-row w-full': openTab === 1}"
          >
            <card-case
              title="Positif"
              :cumulative_local="totalPositif"
              :new_local="positifBaru"
              :cumulative_national="positifNasional"
              :new_national="positifBaruNasional"
              bg_card="bg-red-300"
              bg_new="bg-red-400"
              text_color="text-red-300"
            />
            <card-case
              title="Sembuh"
              :cumulative_local="totalSembuh"
              :new_local="sembuhBaru"
              :cumulative_national="sembuhNasional"
              :new_national="sembuhBaruNasional"
              bg_card="bg-green-300"
              bg_new="bg-green-400"
              text_color="text-green-300"
            />
            <card-case
              title="Meninggal"
              :cumulative_local="totalMeninggal"
              :new_local="meninggalBaru"
              :cumulative_national="meninggalNasional"
              :new_national="meninggalBaruNasional"
              bg_card="bg-orange-300"
              bg_new="bg-orange-400"
              text_color="text-orange-300"
            />

            <card-suspect
              title="Pasien Dalam Pengawasan (PDP)"
              :new_case="PDPBaru"
              :new_finished_case="selesaiPDPBaru"
              :active_case="PDPAktif"
              :total_case="totalPDP"
              :total_finished_case="selesaiPDP"
              status="Pengawasan"
            />
            <card-suspect
              title="Orang Dalam Pemantauan (ODP)"
              :new_case="ODPBaru"
              :new_finished_case="selesaiODPBaru"
              :active_case="ODPAktif"
              :total_case="totalODP"
              :total_finished_case="selesaiODP"
              status="Pemantauan"
            />
          </div>
          <div
            v-bind:class="{'hidden': openTab !== 2, 'block mx-6 text-center bg-white rounded-lg shadow-lg': openTab === 2}"
          >
            <keep-alive>
              <map-choropleth />
            </keep-alive>
          </div>
          <div
            v-bind:class="{'hidden': openTab !== 3, 'block mx-6 text-center bg-white rounded-lg shadow-lg': openTab === 3}"
          >
            <keep-alive>
              <map-bubble />
            </keep-alive>
          </div>
        </div>
      </div>
    </div>
    <div class="flex flex-row w-full text-xl text-blue-600 hover:text-blue-400">
      <router-link class="mx-auto" to="/corona/data">
        Lihat Selengkapnya
        <i class="fas fa-angle-right" aria-hidden="true"></i>
      </router-link>
    </div>
  </div>
</template>

<script>
import { ContentLoader } from "vue-content-loader";
const CardCase = () => import("./CardCase");
const CardSuspect = () => import("./CardSuspect");
const MapChoropleth = () => import("../MapLokalChoropleth");
const MapBubble = () => import("../MapLokalBubble");
const NumberFormat = new Intl.NumberFormat("id");
export default {
  components: {
    ContentLoader,
    CardCase,
    CardSuspect,
    MapChoropleth,
    MapBubble
  },
  data() {
    return {
      openTab: 1,
      statistics: null,
      totalPositif: 0,
      totalSembuh: 0,
      totalMeninggal: 0,
      positifBaru: 0,
      sembuhBaru: 0,
      meninggalBaru: 0,
      ODPBaru: 0,
      ODPAktif: 0,
      PDPBaru: 0,
      PDPAktif: 0,
      selesaiODP: 0,
      selesaiODPBaru: 0,
      selesaiPDP: 0,
      selesaiPDPBaru: 0,
      totalODP: 0,
      totalPDP: 0,
      positifNasional: 0,
      sembuhNasional: 0,
      meninggalNasional: 0,
      positifBaruNasional: 0,
      sembuhBaruNasional: 0,
      meninggalBaruNasional: 0
    };
  },
  methods: {
    toggleTabs: function(tabNumber) {
      this.openTab = tabNumber;
    },
    getStatistics: function() {
      axios
        .get("/corona/api/statistik/terkini")
        .then(response => {
          var formatter = new Intl.NumberFormat("id-ID");
          this.statistics = response.data.data;
          this.totalPositif = NumberFormat.format(
            this.statistics.kumulatif.positif
          );
          this.totalSembuh = NumberFormat.format(
            this.statistics.kumulatif.sembuh
          );
          this.totalMeninggal = NumberFormat.format(
            this.statistics.kumulatif.meninggal
          );

          this.positifBaru = NumberFormat.format(
            this.statistics.kasus_baru.positif
          );
          this.sembuhBaru = NumberFormat.format(
            this.statistics.kasus_baru.sembuh
          );
          this.meninggalBaru = NumberFormat.format(
            this.statistics.kasus_baru.meninggal
          );

          this.totalODP = NumberFormat.format(this.statistics.kumulatif.ODP);
          this.selesaiODP = NumberFormat.format(
            this.statistics.kumulatif.selesai_ODP
          );
          this.ODPAktif = NumberFormat.format(this.statistics.aktif.ODP);
          this.ODPBaru = NumberFormat.format(this.statistics.kasus_baru.ODP);
          this.selesaiODPBaru = NumberFormat.format(
            this.statistics.selesai.ODP
          );

          this.totalPDP = NumberFormat.format(this.statistics.kumulatif.PDP);
          this.selesaiPDP = NumberFormat.format(
            this.statistics.kumulatif.selesai_PDP
          );
          this.PDPAktif = NumberFormat.format(this.statistics.aktif.PDP);
          this.PDPBaru = NumberFormat.format(this.statistics.kasus_baru.PDP);
          this.selesaiPDPBaru = NumberFormat.format(
            this.statistics.selesai.PDP
          );
        })
        .catch(error => console.log(error));
    },
    getNationalData: function() {
      axios.get("/corona/api/nasional/terkini").then(response => {
        var data = response.data.data;
        this.positifNasional = NumberFormat.format(data.kumulatif.positif);
        this.sembuhNasional = NumberFormat.format(data.kumulatif.sembuh);
        this.meninggalNasional = NumberFormat.format(data.kumulatif.meninggal);
        this.positifBaruNasional = NumberFormat.format(data.kasus_baru.positif);
        this.sembuhBaruNasional = NumberFormat.format(data.kasus_baru.sembuh);
        this.meninggalBaruNasional = NumberFormat.format(
          data.kasus_baru.meninggal
        );
      });
    }
  },
  mounted() {
    this.getStatistics();
    this.getNationalData();
    setInterval(() => {
      this.getStatistics();
      this.getNationalData();
    }, 60 * 1000);
  }
};
</script>