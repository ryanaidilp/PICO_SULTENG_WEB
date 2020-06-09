<template>
  <div
    class="p-5 overflow-hidden text-white rounded-lg shadow-lg rdt-main"
  >
    <b class="text-lg">RDT (Rapid Diagnostic Test)</b>
    <div class="flex flex-col mt-2 mb-2 md:flex-row">
      <div class="w-full h-auto mt-2 mr-10 text-sm md:w-3/6 lg:w-3/6">
        Rapid Diagnostic Test (RDT) atau test diagnostik cepat merupakan test yang digunakan sebagai skrining medis awal untuk mendeteksi COVID-19. Pada hasil RDT yang Reaktif akan dilakukan pemeriksaan konfirmasi lebih lanjut dengan metode SWAB/Polymerase Chain Reaction (PCR).
        <span>
          <br><br>
        </span>
        <span>
          <b>
            Pembaruan Terakhir :
            <br>
            <p class="px-1 py-0 text-sm align-middle">{{ new Date(data.rdt.tanggal).toLocaleString('id-ID', {timeZone: "Asia/Makassar"}) }}</p>
            <br><br>
          </b>
        </span>
      </div>
      <div class="w-full h-auto mr-10 text-sm md:w-3/6 lg:w-3/6 row">
        <div class="flex flex-col h-auto text-left md:flex-row">
          <div class="w-full h-auto pl-2 text-left md:w-1/3 lg:w-1/3">
            <div class="text-4xl font-bold">
              {{ Number(data.rdt.jumlah_sampling).toLocaleString('id-ID') }}
            </div>
            <!-- <div class="text-sm"> Jumlah RDT <span class="text-xs tooltip">&#9432;<span class="tooltiptext">Tooltip text</span></span></div> -->
            <div class="text-sm">
              Jumlah RDT
              <div class="pl-1 tooltip">
                &#9432;
                <span class="text-xs tooltiptext">Jumlah Rapid Diagnostic Test (RDT) yang telah dilakukan</span>
              </div>
            </div>
          </div>
        </div>
        <div class="flex flex-col h-auto text-left md:flex-row">
          <div class="w-full h-auto pl-2 text-left md:w-1/3 lg:w-1/3">
            <div class="h-20 pt-3">
              <div class="mb-1">
                <span class="text-2xl font-bold">{{ Number(data.rdt.positif).toLocaleString('id-ID') }}</span>
                <span class="text-sm">({{ Number(data.rdt_persentase_by_jumlah_sampling.positif.toFixed(2)).toLocaleString('id-ID') }})%</span>
              </div>
              <div class="text-sm">
                Reaktif
              </div>
            </div>
          </div>
          <div class="w-full h-auto pl-2 text-left md:w-1/3 lg:w-1/3">
            <div class="h-20 pt-3">
              <div class="mb-1">
                <span class="text-2xl font-bold">{{ Number(data.rdt.negatif).toLocaleString('id-ID') }}</span>
                <span class="text-sm">({{ Number(data.rdt_persentase_by_jumlah_sampling.negatif.toFixed(2)).toLocaleString('id-ID') }})%</span>
              </div>
              <div class="text-sm">
                Non Reaktif
              </div>
            </div>
          </div>
          <div class="w-full h-auto pl-2 text-left md:w-1/3 lg:w-1/3">
            <div class="h-20 pt-3">
              <div class="mb-1">
                <span class="text-2xl font-bold">{{ Number(data.rdt.invalid).toLocaleString('id-ID') }}</span>
                <span class="text-sm">({{ Number(data.rdt_persentase_by_jumlah_sampling.invalid.toFixed(2)).toLocaleString('id-ID') }})%</span>
              </div>
              <div class="text-sm">
                Invalid
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'DataRDT',
  components: {
  },
  props: {
    propsDataRekapitulasiSulteng: {
      type: Object,
      default: () => ({
        rdt: {
          jumlah_sampling: 0,
          positif: 0,
          negatif: 0,
          invalid: 0,
          tanggal: "",
        }
      })
    }
  },
  data () {
    return {
      data: {
        rdt: {
          jumlah_sampling: 0,
          positif: 0,
          negatif: 0,
          invalid: 0,
          tanggal:"",
        },
        rdt_persentase_by_jumlah_sampling: {
          positif: 0,
          negatif: 0,
          invalid: 0,
        }
      }
    }
  },
  watch: {
    propsDataRekapitulasiSulteng () {
      this.data.rdt = this.propsDataRekapitulasiSulteng.rdt
      this.countPersentage()
    }
  },
  methods: {
    countPersentage () {
      const self = this
      self.data.rdt_persentase_by_jumlah_sampling.positif = self.data.rdt.positif / self.data.rdt.jumlah_sampling * 100
      self.data.rdt_persentase_by_jumlah_sampling.negatif = self.data.rdt.negatif / self.data.rdt.jumlah_sampling * 100
      self.data.rdt_persentase_by_jumlah_sampling.invalid = self.data.rdt.invalid / self.data.rdt.jumlah_sampling * 100
    }
  }
}
</script>

<style scoped>
  .rdt-main {
    background-color: rgb(179, 196, 33);
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
    color:#000;
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
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14)
  }
  .tooltip .tooltiptext::after {
    content: " ";
    position: absolute;
    bottom: 100%;  /* At the top of the tooltip */
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