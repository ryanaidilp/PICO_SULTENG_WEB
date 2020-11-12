<template>
  <div class="w-full">
    <div class="p-6 mx-4 mt-8 bg-white rounded-lg shadow-lg">
      <h3 class="text-lg font-bold text-left lg:text-3xl">
        Istilah Penting <i class="fas fa-lightbulb"></i>
      </h3>
      <p class="mt-4 text-sm md:text-base">
        Berikut ini beberapa istilah penting yang perlu diketahui selama pandemi
        COVID-19 berlangsung.
      </p>
      <div class="grid w-full grid-cols-1 gap-6 mt-8 md:grid-cols-2">
        <div
          v-for="item in istilah"
          :key="item.no"
          class="flex flex-col flex-wrap w-full p-4 bg-gray-100 border-l-2 border-blue-400 rounded-lg shadow-lg border-left"
        >
          <h4 class="mb-4 font-bold text-left">{{ item.nama }}</h4>
          <p
            class="my-auto text-xs text-justify md:text-sm"
            v-html="item.deskripsi"
          ></p>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      istilah: [
        {
          id: 1,
          nama: "Suspek",
          deskripsi: `
          Orang yang memiliki salah satu dari kriteria berikut :
            <ul class="list-disc list-inside">
            <li>Mengalami Infeksi Saluran Pernapasan Akut (ISPA) DAN pada 14 hari terakhir sebelum timbul gejala memiliki riwayat perjalanan atau tinggal di negara/wilayah Indonesia yang melaporkan transmisi lokal.</li>
            <li>Mengalami salah satu gejala/tanda ISPA DAN pada 14 hari terakhir sebelum timbul gejala memiliki riwayat kontak dengan kasus terkonfirmasi/probable COVID-19.</li>
            <li>Mengalami ISPA berat/pneumonia berat yang membutuhkan perawatan di rumah sakit DAN tidak ada penyebab lain berdasarkan gambaran klinik yang meyakinkan</li>
            </ul>
            `,
        },
        {
          id: 2,
          nama: "OTG (Orang Tanpa Gejala)",
          deskripsi:
            "Kategori selanjutnya adalah Orang Tanpa Gejala atau OTG. Seseorang dapat masuk kategori OTG jika memiliki kontak erat dengan kasus konfirmasi covid-19. Kontak erat yang dimaksud seperti melakukan kontak fisik, berada di ruangan yang sama, atau berkunjung kurang dari 1 meter dengan kasus positif covid-19. Namun OTG tidak memiliki gejala yang mengarah pada covid-19 seperti demam, batuk, radang tenggorokan, dan sesak napas.",
        },
        {
          id: 3,
          nama: "ODP (Orang Dalam Pemantauan)",
          deskripsi:
            "Orang dalam pemantauan (ODP) adalah seseorang yang mengalami demam (≥38°C) atau riwayat demam; atau gejala gangguan sistem pernapasan, seperti pilek/sakit tenggorokan/batuk DAN tidak ada penyebab lain berdasarkan gambaran klinis yang meyakinkan DAN pada 14 hari terakhir sebelum timbul gejala, memenuhi salah satu kriteria: “memiliki riwayat perjalanan atau tinggal di luar negeri yang melaporkan transmisi lokal” atau “memiliki riwayat perjalanan atau tinggal di area transmisi lokal di Indonesia”.",
        },
        {
          id: 4,
          nama: "PDP (Pasien Dalam Pengawasan)",
          deskripsi:
            'Pasien Dalam Pengawasan adalah seseorang dengan Infeksi Saluran Pernapasan Akut (ISPA) yaitu demam (≥38°C) atau riwayat demam; disertai salah satu gejala/tanda penyakit pernapasan seperti: batuk/sesak nafas/sakit tenggorokan/pilek/pneumonia ringan hingga berat DAN tidak ada penyebab lain berdasarkan gambaran klinis yang meyakinkan DAN pada 14 hari terakhir sebelum timbul gejala, memenuhi salah satu kriteria: "memiliki riwayat perjalanan atau tinggal di luar negeri yang melaporkan transmisi lokal" atau "memiliki riwayat perjalanan atau tinggal di area transmisi lokal di Indonesia".',
        },

        {
          id: 5,
          nama: "Kontak Erat",
          deskripsi:
            "Orang yang memiliki riwayat kontak dengan kasus probable atau terkonfirmasi COVID-19.",
        },
        {
          id: 6,
          nama: "Probable",
          deskripsi:
            "Kasus suspek dengan ISPA Berat/ARDS/meninggal dengan gambaran klinis yang meyakinkan COVID-19 dan belum ada hasil pemeriksaan laboratorium RT-PCR.",
        },
        {
          id: 7,
          nama: "Imported Case",
          deskripsi:
            "Seseorang terjangkit saat berada diluar wilayah di mana pasien melapor.",
        },
        {
          id: 8,
          nama: "Local Transmission",
          deskripsi: "Pasien tertular diwilayah dimana kasus ditemukan.",
        },
      ],
    };
  },
};
</script>