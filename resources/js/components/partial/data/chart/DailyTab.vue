<template>
  <div class="text-gray-800 bg-white rounded-lg">
    <p class="ml-8 font-semibold md:text-xl">Kasus harian {{ selectedCase }} di {{ name }}</p>
    <div class="flex flex-row flex-wrap">
      <v-select
        v-if="selectedCase == 'ODP' || selectedCase == 'PDP'"
        :options="optionLocale"
        :reduce="optionLocale => optionLocale.code"
        label="name"
        class="w-1/2 mx-8 mt-4 text-xs rounded-lg md:text-base md:w-1/4"
        v-model="selected"
        :value="selected"
      />
      <v-select
        v-else
        :options="options"
        :reduce="options => options.code"
        label="name"
        class="w-1/2 mx-8 mt-4 text-xs rounded-lg md:text-base md:w-1/4"
        v-model="selected"
        :value="selected"
      />
      <v-select
        v-if="selected != 'Indonesia'"
        :options="optionCasesLocal"
        class="w-1/2 mx-8 mt-4 text-xs rounded-lg md:text-base md:w-1/4"
        v-model="selectedCase"
        :value="selectedCase"
      />
      <v-select
        v-else
        :options="optionCases"
        class="w-1/2 mx-8 mt-4 text-xs rounded-lg md:text-base md:w-1/4"
        v-model="selectedCase"
        :value="selectedCase"
      />
    </div>
    <div v-if="selected && selectedCase" class="mt-8 border-t-2">
      <keep-alive>
        <chart-local-positive :wilayah="selected" :kasus="selectedCase" class="mt-4"></chart-local-positive>
      </keep-alive>
      <div class="mb-4 text-center">
        <i class="mr-2 fas fa-minus"></i>Kumulatif
        <i
          class="ml-4 mr-2 fas fa-square-full"
          :class="{
            'text-red-600' : selectedCase == 'Positif',
            'text-green-500' : selectedCase == 'Sembuh',
            'text-orange-600':selectedCase == 'Meninggal',
            'text-blue-600': selectedCase == 'ODP',
            'text-purple-700': selectedCase == 'PDP'
          }"
        ></i>
        Kasus Baru
        <span v-if="selectedCase == 'ODP' || selectedCase == 'PDP'">
          <i
            :class="{
            'text-blue-800' : selectedCase == 'ODP', 
            'text-purple-900':selectedCase == 'PDP'
          }"
            class="ml-4 mr-2 fas fa-square-full"
          ></i>
          Selesai
        </span>
      </div>
    </div>
    <div
      v-else
      class="my-8 text-lg font-bold text-center bg-white rounded-lg"
    >Tidak Ada wilayah/kasus yang dipilih</div>
  </div>
</template>
<script>
const ChartLocalPositive = () => import("./DailyChart");
import VSelect from "vue-select";
import "vue-select/dist/vue-select.css";
export default {
  components: {
    VSelect,
    ChartLocalPositive
  },
  data() {
    return {
      name:"Sulawesi Tengah",
      selected: "Sulawesi Tengah",
      options: [
        { name: "Sulawesi Tengah", code: "Sulawesi Tengah" },
        { name: "Indonesia", code: "Indonesia" },
        { name: "Banggai", code: 1 },
        { name: "Banggai Kepulauan", code: 2 },
        { name: "Banggai Laut", code: 3 },
        { name: "Buol", code: 4 },
        { name: "Donggala", code: 5 },
        { name: "Morowali", code: 6 },
        { name: "Morowali Utara", code: 7 },
        { name: "Parigi Moutong", code: 8 },
        { name: "Poso", code: 9 },
        { name: "Sigi", code: 10 },
        { name: "Tojo Una-Una", code: 11 },
        { name: "Toli-Toli", code: 12 },
        { name: "Kota Palu", code: 13 }
      ],
      optionLocale: [
        { name: "Sulawesi Tengah", code: "Sulawesi Tengah" },
        { name: "Banggai", code: 1 },
        { name: "Banggai Kepulauan", code: 2 },
        { name: "Banggai Laut", code: 3 },
        { name: "Buol", code: 4 },
        { name: "Donggala", code: 5 },
        { name: "Morowali", code: 6 },
        { name: "Morowali Utara", code: 7 },
        { name: "Parigi Moutong", code: 8 },
        { name: "Poso", code: 9 },
        { name: "Sigi", code: 10 },
        { name: "Tojo Una-Una", code: 11 },
        { name: "Toli-Toli", code: 12 },
        { name: "Kota Palu", code: 13 }
      ],
      selectedCase: "Positif",
      optionCasesLocal: ["Positif", "Sembuh", "Meninggal", "ODP", "PDP"],
      optionCases: ["Positif", "Sembuh", "Meninggal"]
    };
  },
  watch: {
    selected: function() {
      this.options.forEach(element => {
        if(element.code == this.selected) {
          this.name =  element.name
        }
      })
    }
  }
};
</script>