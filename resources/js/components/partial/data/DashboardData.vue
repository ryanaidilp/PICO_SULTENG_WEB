<template>
  <div>
    <h3
      class="w-full mt-8 text-lg font-bold text-center md:text-left md:ml-4 md:text-3xl"
    >Dashboard COVID-19 Sulawesi Tengah</h3>
    <div class="h-10" v-if="!lastUpdate">
      <content-loader
        :speed="2"
        :height="400"
        :width="900"
        :animate="true"
        primaryColor="#ddd"
        secondaryColor="#fff"
      >
        <rect x="10" y="0" rx="3" ry="3" width="400" height="15" />
      </content-loader>
    </div>
    <p v-else class="w-full h-10 text-xs text-center md:text-left md:ml-4 text-muted md:text-lg">
      Pembaruan Terakhir :
      {{ lastUpdate}}
      WITA
      <br />
      <i class="text-xs text-center text-gray-600">
        Sumber data :
        <a
          href="https://dinkes.sultengprov.go.id"
          class="no-underline hover:no-underline hover:text-blue-200"
        >https://dinkes.sultengprov.go.id</a>
      </i>
    </p>
    <content-loader
      v-if="!statistics && !this.positifNasional"
      :height="400"
      :width="900"
      :speed="1"
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
      class="flex flex-col flex-wrap items-center justify-center block w-full mt-8 text-gray-800 md:flex-row"
    >
      <div class="container px-4 mx-auto md:pl-4 md:pr-0">
        <div>
          <section class="flex flex-col lg:flex-row lg:flex-no-wrap">
            <card-case
              title="Positif"
              :cumulative_local.sync="totalPositif"
              :new_local.sync="positifBaru"
              :cumulative_national.sync="positifNasional"
              :new_national.sync="positifBaruNasional"
              bg_card="bg-red-300"
              bg_new="bg-red-700"
            />
            <card-case
              title="Dirawat"
              :cumulative_local.sync="totalDirawat"
              :new_local.sync="dirawatBaru"
              :cumulative_national.sync="dirawatNasional"
              :new_national.sync="dirawatBaruNasional"
              bg_card="bg-blue-300"
              bg_new="bg-blue-700"
            />
            <card-case
              title="Sembuh"
              :cumulative_local.sync="totalSembuh"
              :new_local.sync="sembuhBaru"
              :cumulative_national.sync="sembuhNasional"
              :new_national.sync="sembuhBaruNasional"
              bg_card="bg-green-300"
              bg_new="bg-green-700"
            />
            <card-case
              title="Meninggal"
              :cumulative_local.sync="totalMeninggal"
              :new_local.sync="meninggalBaru"
              :cumulative_national.sync="meninggalNasional"
              :new_national.sync="meninggalBaruNasional"
              bg_card="bg-orange-300"
              bg_new="bg-orange-700"
            />
          </section>
        </div>
      </div>

      <card-suspect
        title="Pasien Dalam Pengawasan (PDP)"
        :new_case.sync="PDPBaru"
        :new_finished_case.sync="selesaiPDPBaru"
        :active_case.sync="PDPAktif"
        :total_case.sync="totalPDP"
        :total_finished_case.sync="selesaiPDP"
        status="Pengawasan"
      />
      <card-suspect
        title="Orang Dalam Pemantauan (ODP)"
        :new_case.sync="ODPBaru"
        :new_finished_case.sync="selesaiODPBaru"
        :active_case.sync="ODPAktif"
        :total_case.sync="totalODP"
        :total_finished_case.sync="selesaiODP"
        status="Pemantauan"
      />
    </div>
  </div>
</template>
<script>
const { format } = require("date-fns");
const { formatToTimeZone } = require("date-fns-timezone");
import { id } from "date-fns/locale";
import { ContentLoader } from "vue-content-loader";
const NumberFormat = new Intl.NumberFormat("id");
export default {
  components: {
    ContentLoader,
    CardCase: () => import("../home/tabs/CardCase"),
    CardSuspect: () => import("../home/tabs/CardSuspect")
  },
  props: {
    propsDataProvinsi: {
      type: Object,
      default: () => {}
    },
    propsDataNasional: {
      type: Object,
      default: () => {}
    }
  },
  data() {
    return {
      lastUpdate: null,
      statistics: null,
      totalPositif: 0,
      totalDirawat: 0,
      totalSembuh: 0,
      totalMeninggal: 0,
      positifBaru: 0,
      dirawatBaru: 0,
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
      dirawatNasional: 0,
      sembuhNasional: 0,
      meninggalNasional: 0,
      positifBaruNasional: 0,
      dirawatBaruNasional: 0,
      sembuhBaruNasional: 0,
      meninggalBaruNasional: 0,
      jsonDataNasional: {},
      jsonDataProvinsi: {}
    };
  },
  methods: {
    getStatistics: function() {
      var formatter = new Intl.NumberFormat("id-ID");
      this.statistics = this.jsonDataProvinsi;
      this.totalPositif = NumberFormat.format(
        this.statistics.kumulatif.positif
      );
      this.totalDirawat = NumberFormat.format(
        this.statistics.aktif.dalam_perawatan
      );
      this.totalSembuh = NumberFormat.format(this.statistics.kumulatif.sembuh);
      this.totalMeninggal = NumberFormat.format(
        this.statistics.kumulatif.meninggal
      );

      this.positifBaru = NumberFormat.format(
        this.statistics.kasus_baru.positif
      );
      this.dirawatBaru = NumberFormat.format(
        this.statistics.kasus_baru.dalam_perawatan
      );
      this.sembuhBaru = NumberFormat.format(this.statistics.kasus_baru.sembuh);
      this.meninggalBaru = NumberFormat.format(
        this.statistics.kasus_baru.meninggal
      );

      this.totalODP = NumberFormat.format(this.statistics.kumulatif.ODP);
      this.selesaiODP = NumberFormat.format(
        this.statistics.kumulatif.selesai_ODP
      );
      this.ODPAktif = NumberFormat.format(this.statistics.aktif.ODP);
      this.ODPBaru = NumberFormat.format(this.statistics.kasus_baru.ODP);
      this.selesaiODPBaru = NumberFormat.format(this.statistics.selesai.ODP);

      this.totalPDP = NumberFormat.format(this.statistics.kumulatif.PDP);
      this.selesaiPDP = NumberFormat.format(
        this.statistics.kumulatif.selesai_PDP
      );
      this.PDPAktif = NumberFormat.format(this.statistics.aktif.PDP);
      this.PDPBaru = NumberFormat.format(this.statistics.kasus_baru.PDP);
      this.selesaiPDPBaru = NumberFormat.format(this.statistics.selesai.PDP);
    },
    getNationalData: function() {
      var data = this.jsonDataNasional;
      var jam = formatToTimeZone(new Date(data.tanggal), "HH:mm:ss", {
        timeZone: "Asia/Makassar"
      });
      this.lastUpdate = format(new Date(data.tanggal), "EEEE, dd MMMM yyyy", {
        locale: id
      });
      this.lastUpdate += " " + jam;
      this.positifNasional = NumberFormat.format(data.kumulatif.positif);
      this.dirawatNasional = NumberFormat.format(
        data.kumulatif.dalam_perawatan
      );
      this.sembuhNasional = NumberFormat.format(data.kumulatif.sembuh);
      this.meninggalNasional = NumberFormat.format(data.kumulatif.meninggal);
      this.positifBaruNasional = NumberFormat.format(data.kasus_baru.positif);
      this.dirawatBaruNasional = NumberFormat.format(
        data.kasus_baru.dalam_perawatan
      );
      this.sembuhBaruNasional = NumberFormat.format(data.kasus_baru.sembuh);
      this.meninggalBaruNasional = NumberFormat.format(
        data.kasus_baru.meninggal
      );
    }
  },
  watch: {
    propsDataProvinsi() {
      this.jsonDataProvinsi = this.propsDataProvinsi;
      this.getStatistics();
    },
    propsDataNasional() {
      this.jsonDataNasional = this.propsDataNasional;
      this.getNationalData();
    }
  }
};
</script>