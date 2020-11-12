<template>
  <div class="w-full">
    <div class="p-6 mx-4 bg-white rounded-lg shadow-lg">
      <h3 class="text-lg font-bold lg:text-3xl">
        Gejala <i class="fas fa-diagnoses"></i>
      </h3>
      <Symptomps />
      <div class="flex flex-row w-full mt-4">
        <span class="w-auto mt-2 text-xs text-justify lg:text-base"
          >Gejala umum berupa demam ≥38°C, batuk kering, dan sesak napas. Jika
          ada orang yang dalam 14 hari sebelum muncul gejala tersebut pernah
          melakukan perjalanan ke negara terjangkit, atau pernah merawat/kontak
          erat dengan penderita COVID-19, maka terhadap orang tersebut akan
          dilakukan pemeriksaan laboratorium lebih lanjut untuk memastikan
          diagnosisnya.</span
        >
      </div>
      <i class="mt-8 text-xs text-gray-600">
        Sumber materi :
        <a
          href="https://pikobar.jabarprov.go.id"
          class="no-underline hover:no-underline hover:text-blue-200"
          >https://pikobar.jabarprov.go.id</a
        >
      </i>
    </div>
  </div>
</template>
<script>
import Symptomps from "@/components/Symptomps";
export default {
  components: {
    Symptomps,
  },
};
</script>