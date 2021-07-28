<template>
  <div>
    <h3
      class="w-full mt-8 text-lg font-bold text-center  md:text-left md:ml-4 md:text-3xl"
    >
      Dashboard COVID-19 Sulawesi Tengah
    </h3>
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
    <p
      v-else
      class="w-full h-10 text-xs text-center  md:text-left md:ml-4 text-muted md:text-lg"
    >
      Pembaruan Terakhir :
      {{ lastUpdate }}
      <br />
      <i class="text-xs text-center text-gray-600">
        Sumber data :
        <a
          href="https://dinkes.sultengprov.go.id"
          class="no-underline hover:no-underline hover:text-blue-200"
          >https://dinkes.sultengprov.go.id</a
        >
      </i>
    </p>
    <div v-if="isNull(local) && isNull(national)">
      <content-loader
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
    </div>
    <statistics v-else :local="local" :national="national" class="mt-4" />
  </div>
</template>
<script>
const { format } = require("date-fns");
const { formatToTimeZone } = require("date-fns-timezone");
import { id } from "date-fns/locale";
import { ContentLoader } from "vue-content-loader";
const NumberFormat = new Intl.NumberFormat("id");
import Statistics from "@/components/Statistics";
export default {
  components: {
    ContentLoader,
    Statistics,
  },
  props: {
    local: {
      type: Object,
      default: () => {},
    },
    national: {
      type: Object,
      default: () => {},
    },
    lastUpdate: {
      type: String,
      default: () => null,
    },
  },
  methods: {
    isNull(data) {
      return _.isEmpty(data);
    },
  },
};
</script>