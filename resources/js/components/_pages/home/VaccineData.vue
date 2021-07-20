<template>
  <div class="w-full">
    <div class="items-center justify-center w-full">
      <ul
        class="flex flex-row flex-wrap max-w-xl pb-3 mb-0 list-none border-b-2"
      >
        <li class="flex-1 -mb-px">
          <a
            class="block py-3 text-xs font-semibold cursor-pointer md:text-xl"
            @click="changeTab(1)"
            :class="activeTab(1)"
            >Nasional</a
          >
        </li>
        <li class="flex-1 -mb-px">
          <a
            class="block py-3 text-xs font-semibold cursor-pointer md:text-xl"
            @click="changeTab(2)"
            :class="activeTab(2)"
          >
            <span>Sulawesi Tengah</span>
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
        <div
          class="grid grid-cols-1 gap-5 my-8 lg:grid-cols-2"
          v-if="showTargetCard"
        >
          <card-vaccine-target
            :target="nationalVaccine.total_vaccination_target"
            label="Total Sasaran Vaksinasi"
            text-color="text-green-700"
          />
          <card-vaccine-target
            :target="nationalVaccine.elderly_vaccination_target"
            label="Sasaran Vaksinasi Lansia"
            text-color="text-blue-500"
          />
          <card-vaccine-target
            :target="nationalVaccine.public_officer_vaccination_target"
            label="Sasaran Vaksinasi Petugas Publik"
            text-color="text-purple-500"
          />
          <card-vaccine-target
            :target="nationalVaccine.health_worker_vaccination_target"
            label="Sasaran Vaksinasi Petugas Kesehatan"
            text-color="text-orange-500"
          />
        </div>
        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2">
          <card-vaccine-home
            :title="'Vaksinasi Dosis 1'"
            :total="nationalVaccine.cumulative_first_vaccination_received"
            :target="nationalVaccine.total_vaccination_target"
            :health-worker-total="
              nationalVaccine.cumulative_health_worker_first_vaccination_received
            "
            :health-worker-target="
              nationalVaccine.health_worker_vaccination_target
            "
            :elderly-target="nationalVaccine.elderly_vaccination_target"
            :elderly-total="
              nationalVaccine.cumulative_elderly_first_vaccination_received
            "
            :public-worker-target="
              nationalVaccine.public_officer_vaccination_target
            "
            :public-worker-total="
              nationalVaccine.cumulative_public_officer_first_vaccination_received
            "
            :addition="nationalVaccine.first_vaccination_received"
            :growth-rate="
              nationalVaccine.first_vaccination_received_changes_rate
            "
          />
          <card-vaccine-home
            :title="'Vaksinasi Dosis 2'"
            :total="nationalVaccine.cumulative_second_vaccination_received"
            :target="nationalVaccine.total_vaccination_target"
            :health-worker-total="
              nationalVaccine.cumulative_health_worker_second_vaccination_received
            "
            :health-worker-target="
              nationalVaccine.health_worker_vaccination_target
            "
            :elderly-target="nationalVaccine.elderly_vaccination_target"
            :elderly-total="
              nationalVaccine.cumulative_elderly_second_vaccination_received
            "
            :public-worker-target="
              nationalVaccine.public_officer_vaccination_target
            "
            :public-worker-total="
              nationalVaccine.cumulative_public_officer_second_vaccination_received
            "
            :addition="nationalVaccine.second_vaccination_received"
            :growth-rate="
              nationalVaccine.second_vaccination_received_changes_rate
            "
          />
        </div>
      </div>
      <div v-else class="container p-4 mx-auto text-gray-800 lg:px-0 lg:py-4">
        <p class="mb-4">
          <span class="text-gray-500">Pembaruan Terakhir </span>
          <br />
          {{ formatDate(provinceVaccine.date) }}
        </p>
        <div
          class="grid grid-cols-1 gap-5 my-8 lg:grid-cols-2"
          v-if="showTargetCard"
        >
          <card-vaccine-target
            :target="provinceVaccine.total_vaccination_target"
            label="Total Sasaran Vaksinasi"
            text-color="text-green-700"
          />
          <card-vaccine-target
            :target="provinceVaccine.elderly_vaccination_target"
            label="Sasaran Vaksinasi Lansia"
            text-color="text-blue-500"
          />
          <card-vaccine-target
            :target="provinceVaccine.public_officer_vaccination_target"
            label="Sasaran Vaksinasi Petugas Publik"
            text-color="text-purple-500"
          />
          <card-vaccine-target
            :target="provinceVaccine.health_worker_vaccination_target"
            label="Sasaran Vaksinasi Petugas Kesehatan"
            text-color="text-orange-500"
          />
        </div>
        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2">
          <card-vaccine-home
            :title="'Vaksinasi Dosis 1'"
            :total="provinceVaccine.cumulative_first_vaccination_received"
            :target="provinceVaccine.total_vaccination_target"
            :health-worker-total="
              provinceVaccine.cumulative_health_worker_first_vaccination_received
            "
            :health-worker-target="
              provinceVaccine.health_worker_vaccination_target
            "
            :elderly-target="provinceVaccine.elderly_vaccination_target"
            :elderly-total="
              provinceVaccine.cumulative_elderly_first_vaccination_received
            "
            :public-worker-target="
              provinceVaccine.public_officer_vaccination_target
            "
            :public-worker-total="
              provinceVaccine.cumulative_public_officer_first_vaccination_received
            "
            :addition="provinceVaccine.first_vaccination_received"
            :growth-rate="
              provinceVaccine.first_vaccination_received_changes_rate
            "
          />
          <card-vaccine-home
            :title="'Vaksinasi Dosis 2'"
            :total="provinceVaccine.cumulative_second_vaccination_received"
            :target="provinceVaccine.total_vaccination_target"
            :health-worker-total="
              provinceVaccine.cumulative_health_worker_second_vaccination_received
            "
            :health-worker-target="
              provinceVaccine.health_worker_vaccination_target
            "
            :elderly-target="provinceVaccine.elderly_vaccination_target"
            :elderly-total="
              provinceVaccine.cumulative_elderly_second_vaccination_received
            "
            :public-worker-target="
              provinceVaccine.public_officer_vaccination_target
            "
            :public-worker-total="
              provinceVaccine.cumulative_public_officer_second_vaccination_received
            "
            :addition="provinceVaccine.second_vaccination_received"
            :growth-rate="
              provinceVaccine.second_vaccination_received_changes_rate
            "
          />
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import CardVaccineHome from "@/components/CardVaccineHome";
import CardVaccineTarget from "@/components/CardVaccineTarget";
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
    showTargetCard: {
      type: Boolean,
      default: () => false,
    },
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
  components: {
    CardVaccineHome,
    CardVaccineTarget,
  },
};
</script>

