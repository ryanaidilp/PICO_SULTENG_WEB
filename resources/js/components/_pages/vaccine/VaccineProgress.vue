<template>
  <div class="w-full">
    <div class="items-center justify-center w-full">
      <ul class="flex flex-row flex-wrap max-w-xl pb-3 mb-0 list-none">
        <li class="flex-1 -mb-px">
          <a
            @click="changeTab(1)"
            :class="activeTab(1)"
            class="block py-3 text-xs font-semibold cursor-pointer md:text-xl"
          >
            Nasional
          </a>
        </li>
        <li class="flex-1 -mb-px">
          <a
            @click="changeTab(2)"
            :class="activeTab(2)"
            class="block py-3 text-xs font-semibold cursor-pointer md:text-xl"
          >
            Sulawesi Tengah
          </a>
        </li>
      </ul>
      <div
        v-if="active_tabs === 1"
        class="container p-4 mx-auto text-gray-800 lg:py-4 lg:px-0"
      >
        <p class="mb-4">
          <span class="text-gray-500">Pembaruan Terakhir </span>
          <br />
          {{ formatDate(nationalVaccine.date) }}
        </p>
        <div class="grid w-full gap-5 xl:grid-cols-2">
          <div class="grid w-full grid-cols-1 gap-5">
            <p class="text-2xl font-semibold">Vaksinasi Dosis 1</p>
            <card-vaccine
              title="Semua Vaksinasi"
              text-color="text-green-700"
              progress-color="bg-green-700"
              :total="nationalVaccine.cumulative_first_vaccination_received"
              :target="nationalVaccine.total_vaccination_target"
              :addition="nationalVaccine.first_vaccination_received"
              :growth-rate="
                nationalVaccine.first_vaccination_received_changes_rate
              "
            />
            <card-vaccine
              title="Vaksinasi Lansia"
              text-color="text-blue-500"
              progress-color="bg-blue-500"
              :total="
                nationalVaccine.cumulative_elderly_first_vaccination_received
              "
              :target="nationalVaccine.elderly_vaccination_target"
              :addition="nationalVaccine.elderly_first_vaccination_received"
              :growth-rate="
                nationalVaccine.elderly_first_vaccination_received_changes_rate
              "
            />
            <card-vaccine
              title="Vaksinasi Petugas Publik"
              text-color="text-purple-500"
              progress-color="bg-purple-500"
              :total="
                nationalVaccine.cumulative_public_officer_first_vaccination_received
              "
              :target="nationalVaccine.public_officer_vaccination_target"
              :addition="
                nationalVaccine.public_officer_first_vaccination_received
              "
              :growth-rate="
                nationalVaccine.public_officer_first_vaccination_received_changes_rate
              "
            />
            <card-vaccine
              title="Vaksinasi Tenaga Kesehatan"
              text-color="text-orange-500"
              progress-color="bg-orange-500"
              :total="
                nationalVaccine.cumulative_health_worker_first_vaccination_received
              "
              :target="nationalVaccine.health_worker_vaccination_target"
              :addition="
                nationalVaccine.health_worker_first_vaccination_received
              "
              :growth-rate="
                nationalVaccine.health_worker_first_vaccination_received_changes_rate
              "
            />
          </div>
          <div class="grid w-full grid-cols-1 gap-5">
            <p class="text-2xl font-semibold">Vaksinasi Dosis 2</p>
            <card-vaccine
              title="Semua Vaksinasi"
              text-color="text-green-700"
              progress-color="bg-green-700"
              :total="nationalVaccine.cumulative_second_vaccination_received"
              :target="nationalVaccine.total_vaccination_target"
              :addition="nationalVaccine.second_vaccination_received"
              :growth-rate="
                nationalVaccine.second_vaccination_received_changes_rate
              "
            />
            <card-vaccine
              title="Vaksinasi Lansia"
              text-color="text-blue-500"
              progress-color="bg-blue-500"
              :total="
                nationalVaccine.cumulative_elderly_second_vaccination_received
              "
              :target="nationalVaccine.elderly_vaccination_target"
              :addition="nationalVaccine.elderly_second_vaccination_received"
              :growth-rate="
                nationalVaccine.elderly_second_vaccination_received_changes_rate
              "
            />
            <card-vaccine
              title="Vaksinasi Petugas Publik"
              text-color="text-purple-500"
              progress-color="bg-purple-500"
              :total="
                nationalVaccine.cumulative_public_officer_second_vaccination_received
              "
              :target="nationalVaccine.public_officer_vaccination_target"
              :addition="
                nationalVaccine.public_officer_second_vaccination_received
              "
              :growth-rate="
                nationalVaccine.public_officer_second_vaccination_received_changes_rate
              "
            />
            <card-vaccine
              title="Vaksinasi Tenaga Kesehatan"
              text-color="text-orange-500"
              progress-color="bg-orange-500"
              :total="
                nationalVaccine.cumulative_health_worker_second_vaccination_received
              "
              :target="nationalVaccine.health_worker_vaccination_target"
              :addition="
                nationalVaccine.health_worker_second_vaccination_received
              "
              :growth-rate="
                nationalVaccine.health_worker_second_vaccination_received_changes_rate
              "
            />
          </div>
        </div>
      </div>
      <div
        v-if="active_tabs === 2"
        class="container p-4 mx-auto text-gray-800 lg:py-4 lg:px-0"
      >
        <p class="mb-4">
          <span class="text-gray-500">Pembaruan Terakhir </span>
          <br />
          {{ formatDate(provinceVaccine.date) }}
        </p>
        <div class="grid w-full gap-5 xl:grid-cols-2">
          <div class="grid w-full grid-cols-1 gap-5">
            <p class="text-2xl font-semibold">Vaksinasi Dosis 1</p>
            <card-vaccine
              title="Semua Vaksinasi"
              text-color="text-green-700"
              progress-color="bg-green-700"
              :total="provinceVaccine.cumulative_first_vaccination_received"
              :target="provinceVaccine.total_vaccination_target"
              :addition="provinceVaccine.first_vaccination_received"
              :growth-rate="
                provinceVaccine.first_vaccination_received_changes_rate
              "
            />
            <card-vaccine
              title="Vaksinasi Lansia"
              text-color="text-blue-500"
              progress-color="bg-blue-500"
              :total="
                provinceVaccine.cumulative_elderly_first_vaccination_received
              "
              :target="provinceVaccine.elderly_vaccination_target"
              :addition="provinceVaccine.elderly_first_vaccination_received"
              :growth-rate="
                provinceVaccine.elderly_first_vaccination_received_changes_rate
              "
            />
            <card-vaccine
              title="Vaksinasi Petugas Publik"
              text-color="text-purple-500"
              progress-color="bg-purple-500"
              :total="
                provinceVaccine.cumulative_public_officer_first_vaccination_received
              "
              :target="provinceVaccine.public_officer_vaccination_target"
              :addition="
                provinceVaccine.public_officer_first_vaccination_received
              "
              :growth-rate="
                provinceVaccine.public_officer_first_vaccination_received_changes_rate
              "
            />
            <card-vaccine
              title="Vaksinasi Tenaga Kesehatan"
              text-color="text-orange-500"
              progress-color="bg-orange-500"
              :total="
                provinceVaccine.cumulative_health_worker_first_vaccination_received
              "
              :target="provinceVaccine.health_worker_vaccination_target"
              :addition="
                provinceVaccine.health_worker_first_vaccination_received
              "
              :growth-rate="
                provinceVaccine.health_worker_first_vaccination_received_changes_rate
              "
            />
          </div>
          <div class="grid w-full grid-cols-1 gap-5">
            <p class="text-2xl font-semibold">Vaksinasi Dosis 2</p>
            <card-vaccine
              title="Semua Vaksinasi"
              text-color="text-green-700"
              progress-color="bg-green-700"
              :total="provinceVaccine.cumulative_second_vaccination_received"
              :target="provinceVaccine.total_vaccination_target"
              :addition="provinceVaccine.second_vaccination_received"
              :growth-rate="
                provinceVaccine.second_vaccination_received_changes_rate
              "
            />
            <card-vaccine
              title="Vaksinasi Lansia"
              text-color="text-blue-500"
              progress-color="bg-blue-500"
              :total="
                provinceVaccine.cumulative_elderly_second_vaccination_received
              "
              :target="provinceVaccine.elderly_vaccination_target"
              :addition="provinceVaccine.elderly_second_vaccination_received"
              :growth-rate="
                provinceVaccine.elderly_second_vaccination_received_changes_rate
              "
            />
            <card-vaccine
              title="Vaksinasi Petugas Publik"
              text-color="text-purple-500"
              progress-color="bg-purple-500"
              :total="
                provinceVaccine.cumulative_public_officer_second_vaccination_received
              "
              :target="provinceVaccine.public_officer_vaccination_target"
              :addition="
                provinceVaccine.public_officer_second_vaccination_received
              "
              :growth-rate="
                provinceVaccine.public_officer_second_vaccination_received_changes_rate
              "
            />
            <card-vaccine
              title="Vaksinasi Tenaga Kesehatan"
              text-color="text-orange-500"
              progress-color="bg-orange-500"
              :total="
                provinceVaccine.cumulative_health_worker_second_vaccination_received
              "
              :target="provinceVaccine.health_worker_vaccination_target"
              :addition="
                provinceVaccine.health_worker_second_vaccination_received
              "
              :growth-rate="
                provinceVaccine.health_worker_second_vaccination_received_changes_rate
              "
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import CardVaccine from "@/components/CardVaccine";
export default {
  props: {
    nationalVaccine: {
      type: Object,
      required: true,
    },
    provinceVaccine: {
      type: Object,
      required: true,
    },
  },
  components: {
    CardVaccine,
  },
  data() {
    return {
      active_tabs: 1,
    };
  },

  methods: {
    changeTab(tab) {
      this.active_tabs = tab;
    },
    activeTab(tab) {
      if (this.active_tabs === tab) {
        return "text-gray-800 border-b-2 border-gray-800";
      }
      return "text-gray-400";
    },
  },
};
</script>