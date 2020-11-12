<template>
  <div class="flex flex-wrap justify-center mt-8 md:mt-16">
    <h3
      class="w-full font-bold text-center text-md lg:text-left md:ml-10 md:text-3xl"
    >
      Situasi Terkini COVID-19 di Sulawesi Tengah
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
        <rect x="30" y="0" rx="3" ry="3" width="400" height="15" />
      </content-loader>
    </div>
    <p
      v-else
      class="w-full h-10 text-xs text-center lg:text-left md:ml-10 text-muted md:text-lg"
    >
      Pembaruan Terakhir :
      {{ lastUpdate }}
    
      <br />
      <i class="text-xs text-gray-600">
        Sumber data :
        <a
          href="https://dinkes.sultengprov.go.id"
          class="no-underline hover:no-underline hover:text-gray-800"
          >https://dinkes.sultengprov.go.id</a
        >
      </i>
    </p>
    <data-tabs 
    :national.sync="national"
    :local.sync="local"
    :districts="districts"
    class="md:ml-8" />
  </div>
</template>
<script>
import DataTabs from '@/components/DataTabs'
import { ContentLoader } from "vue-content-loader";
const { format } = require("date-fns");
const { formatToTimeZone } = require("date-fns-timezone");
import { id } from "date-fns/locale";
export default {
  props: ["lastUpdate", 'national', 'local', "districts"],
  components: {
    ContentLoader,
    DataTabs,
  },
};
</script>