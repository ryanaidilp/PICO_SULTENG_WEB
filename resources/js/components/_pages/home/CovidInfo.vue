<template>
  <div>
    <div class="mt-12">
      <h3
        class="w-auto font-bold text-center text-md md:ml-10 md:text-3xl"
      >Apa yang Harus Dilakukan?</h3>
      <card-periksa />
      <card-lindungi class="mt-8" />
    </div>
    <div class="mt-12">
      <h3
        class="w-auto font-bold text-center text-md md:ml-10 md:text-3xl"
      >Apa yang Harus Diketahui?</h3>
      <div class="w-full mt-4">
        <div class="p-6 mx-4">
          <h3 class="text-xl font-bold lg:text-2xl">Apa Itu COVID-19?</h3>
          <div class="flex flex-row w-full">
            <span class="w-auto mt-2 text-xs text-justify lg:text-lg">
              COVID-19 adalah penyakit yang disebabkan oleh <span class="italic font-semibold">Novel Coronavirus (2019-nCoV)</span>, jenis baru coronavirus yang pada manusia menyebabkan penyakit mulai flu biasa hingga penyakit yang serius seperti <span class="italic font-semibold">Middle East Respiratory Syndrome (MERS)</span> dan Sindrom Pernapasan Akut Berat/
              <span class="italic font-semibold">Severe Acute Respiratory Syndrome (SARS)</span>.
              <br />
              <br />Pada 11 Februari 2020, <span class="italic font-semibold">World Health Organization (WHO)</span> mengumumkan nama penyakit yang disebabkan 2019-nCov, yaitu Coronavirus Disease (COVID-19).
            </span>
          </div>
          <h3 class="mt-4 text-xl font-bold lg:text-2xl">Gejala</h3>
          <Simptomps/>
          <div class="flex flex-row w-full">
            <span
              class="w-auto mt-2 text-xs text-justify lg:text-lg"
            >Gejala umum berupa demam ≥38°C, batuk kering, dan sesak napas. Jika ada orang yang dalam 14 hari sebelum muncul gejala tersebut pernah melakukan perjalanan ke negara terjangkit, atau pernah merawat/kontak erat dengan penderita COVID-19, maka terhadap orang tersebut akan dilakukan pemeriksaan laboratorium lebih lanjut untuk memastikan diagnosisnya.</span>
          </div>
          <i class="mt-8 text-xs text-gray-600">
            Sumber materi :
            <a
              href="https://pikobar.jabarprov.go.id"
              class="no-underline hover:no-underline hover:text-blue-200"
            >https://pikobar.jabarprov.go.id</a>
          </i>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  components: {
    CardLindungi: () => import("@/components/CardLindungi"),
    CardPeriksa: () => import("@/components/CardPeriksa"),
    Simptomps: () => import("@/components/Symptomps")
  }
};
</script>