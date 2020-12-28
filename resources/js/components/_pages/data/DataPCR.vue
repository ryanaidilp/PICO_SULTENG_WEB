<template>
  <div class="p-5 overflow-hidden text-white rounded-lg shadow-lg pcr-main">
    <b class="text-lg">PCR <i>(Polymerase Chain Reaction)</i></b>
    <div class="flex flex-col mt-2 mb-2 md:flex-row">
      <div class="w-full h-auto mt-2 mr-10 text-sm text-justify md:w-3/6 lg:w-3/6">
        <i>Polymerase Chain Reaction</i> atau PCR merupakan pemeriksaan
        diagnostik yang dianggap paling akurat untuk memastikan apakah seseorang
        menderita COVID-19 atau tidak. Jumlah tes PCR yang ditampilkan diolah
        dari data yang dipublikasikan Dinas Kesehatan Sulawesi Tengah.<br />
        <br /><b style="font-size: larger">
          Pembaruan Terakhir :
          <br />
          <p class="px-1 py-0 text-sm align-middle">{{ data.pcr.tanggal }}</p>
        </b>
        <br />
        <br />
      </div>
      <div class="w-full h-auto mr-10 text-sm md:w-3/6 lg:w-3/6 row">
        <div class="flex flex-col h-auto text-left md:flex-row">
          <div class="w-full h-auto pl-2 text-left md:w-1/3 lg:w-1/3">
            <div class="text-4xl font-bold">
              {{ Number(data.pcr.total).toLocaleString("id-ID") }}
            </div>
            <div class="text-sm">
              Jumlah PCR
              <div class="pl-1 tooltip">
                &#9432;
                <span class="text-xs tooltiptext"
                  >Jumlah Polymerase Chain Reaction (PCR) yang telah
                  dilakukan</span
                >
              </div>
            </div>
          </div>
        </div>
        <div class="flex flex-col h-auto text-left md:flex-row">
          <div class="w-full h-auto pl-2 text-left md:w-1/4 lg:w-1/4">
            <div class="h-20 pt-3">
              <div class="mb-1">
                <span class="text-2xl font-bold">{{
                  Number(data.pcr.positif).toLocaleString("id-ID")
                }}</span>
                <span class="text-sm"
                  >({{
                    Number(
                      data.pcr_persentase_by_total.positif.toFixed(2)
                    ).toLocaleString("id-ID")
                  }}%)</span
                >
              </div>
              <div class="text-sm">Positif</div>
            </div>
          </div>
          <div class="w-full h-auto pl-2 text-left md:w-1/4 lg:w-1/4">
            <div class="h-20 pt-3">
              <div class="mb-1">
                <span class="text-2xl font-bold">{{
                  Number(data.pcr.negatif).toLocaleString("id-ID")
                }}</span>
                <span class="text-sm"
                  >({{
                    Number(
                      data.pcr_persentase_by_total.negatif.toFixed(2)
                    ).toLocaleString("id-ID")
                  }}%)</span
                >
              </div>
              <div class="text-sm">Negatif</div>
            </div>
          </div>
          <div class="w-full h-auto pl-2 text-left md:w-1/4 lg:w-1/4">
            <div class="h-20 pt-3">
              <div class="mb-1">
                <span class="text-2xl font-bold">{{
                  Number(data.pcr.invalid).toLocaleString("id-ID")
                }}</span>
                <span class="text-sm"
                  >({{
                    Number(
                      data.pcr_persentase_by_total.invalid.toFixed(2)
                    ).toLocaleString("id-ID")
                  }}%)</span
                >
              </div>
              <div class="text-sm">Invalid</div>
            </div>
          </div>
          <div class="w-full h-auto pl-2 text-left md:w-1/4 lg:w-1/4">
            <div class="h-20 pt-3">
              <div class="mb-1">
                <span class="text-2xl font-bold">{{
                  Number(data.pcr.proses).toLocaleString("id-ID")
                }}</span>
                <span class="text-sm"
                  >({{
                    Number(
                      data.pcr_persentase_by_total.proses.toFixed(2)
                    ).toLocaleString("id-ID")
                  }}%)</span
                >
              </div>
              <div class="text-sm">Proses Lab</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "DataPCR",
  props: {
    propsDataRekapitulasiSulteng: {
      type: Object,
      default: () => ({
        pcr: {
          positif: 0,
          negatif: 0,
          invalid: 0,
          jumlah_sampling: 0,
          tanggal: 0,
        },
      }),
    },
  },
  data() {
    return {
      data: {
        pcr: {
          total: 0,
          positif: 0,
          negatif: 0,
          invalid: 0,
          jumlah_sampling: 0,
          proses: 0,
          tanggal: 0,
        },
        pcr_persentase_by_total: {
          positif: 0,
          negatif: 0,
          invalid: 0,
          proses: 0,
        },
      },
      showMore: true,
    };
  },
  mounted() {
    this.data.pcr = this.propsDataRekapitulasiSulteng.pcr;
    this.countPercentage();
  },
  methods: {
    countPercentage() {
      const self = this;
      self.data.pcr.total = self.data.pcr.jumlah_sampling;
      self.data.pcr_persentase_by_total.positif =
        (self.data.pcr.positif / self.data.pcr.total) * 100;
      self.data.pcr_persentase_by_total.negatif =
        (self.data.pcr.negatif / self.data.pcr.total) * 100;
      self.data.pcr_persentase_by_total.invalid =
        (self.data.pcr.invalid / self.data.pcr.total) * 100;
      self.data.pcr_persentase_by_total.proses =
        (self.data.pcr.proses / self.data.pcr.total) * 100;
    },
    clickShowMore() {
      this.showMore = !this.showMore;
    },
  },
};
</script>

<style scoped>
.pcr-main {
  background-color: #18ad5b;
}
/* Tooltip container */
.tooltip {
  position: absolute;
  display: inline-block;
}
/* Tooltip text */
.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: white;
  color: #000;
  text-align: center;
  padding: 5px 0;
  border-radius: 6px;
  /* Position the tooltip text - see examples below! */
  position: absolute;
  z-index: 1;
  width: 120px;
  top: 100%;
  left: 50%;
  margin-left: -60px; /* Use half of the width (120/2 = 60), to center the tooltip */
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14);
}
.tooltip .tooltiptext::after {
  content: " ";
  position: absolute;
  bottom: 100%; /* At the top of the tooltip */
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: transparent transparent white transparent;
}
/* Show the tooltip text when you mouse over the tooltip container */
.tooltip:hover .tooltiptext {
  visibility: visible;
}
</style>