<template>
  <div class="w-full">
    <div class="p-6 mx-4 mt-8 bg-white rounded-lg shadow-lg">
      <h3 class="text-lg font-bold text-left lg:text-3xl">Istilah Penting <i class="fas fa-lightbulb"></i></h3>
      <p
        class="mt-4 text-sm md:text-base"
      >Berikut ini beberapa istilah penting yang perlu diketahui selama pandemi COVID-19 berlangsung.</p>
      <div class="flex flex-col flex-wrap justify-between w-full mt-4 md:flex-row">
        <div
          v-for="item in istilah"
          :key="item.no"
          class="flex flex-col flex-wrap w-full p-4 mx-auto mt-6 bg-gray-100 border-l-2 border-blue-400 rounded-lg shadow-lg md:m-4 md:max-w-lg border-left"
        >
          <h4 class="mb-4 font-bold text-left">{{ item.nama }}</h4>
          <p class="my-auto text-xs text-left text-justify md:text-sm">{{ item.deskripsi }}</p>
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
          nama: "ODP (Orang Dalam Pemantauan)",
          deskripsi:
            "Orang dalam pemantauan (ODP) adalah seseorang yang mengalami demam (≥38°C) atau riwayat demam; atau gejala gangguan sistem pernapasan, seperti pilek/sakit tenggorokan/batuk DAN tidak ada penyebab lain berdasarkan gambaran klinis yang meyakinkan DAN pada 14 hari terakhir sebelum timbul gejala, memenuhi salah satu kriteria: “memiliki riwayat perjalanan atau tinggal di luar negeri yang melaporkan transmisi lokal” atau “memiliki riwayat perjalanan atau tinggal di area transmisi lokal di Indonesia”."
        },
        {
          id: 2,
          nama: "PDP (Pasien Dalam Pengawasan)",
          deskripsi:
            "Pasien Dalam Pengawasan adalah seseorang dengan Infeksi Saluran Pernapasan Akut (ISPA) yaitu demam (≥38°C) atau riwayat demam; disertai salah satu gejala/tanda penyakit pernapasan seperti: batuk/sesak nafas/sakit tenggorokan/pilek/pneumonia ringan hingga berat DAN tidak ada penyebab lain berdasarkan gambaran klinis yang meyakinkan DAN pada 14 hari terakhir sebelum timbul gejala, memenuhi salah satu kriteria: \"memiliki riwayat perjalanan atau tinggal di luar negeri yang melaporkan transmisi lokal\" atau \"memiliki riwayat perjalanan atau tinggal di area transmisi lokal di Indonesia\"."
        },
        {
          id: 3,
          nama: "OTG (Orang Tanpa Gejala)",
          deskripsi:
            "Kategori selanjutnya adalah Orang Tanpa Gejala atau OTG. Seseorang dapat masuk kategori OTG jika memiliki kontak erat dengan kasus konfirmasi covid-19. Kontak erat yang dimaksud seperti melakukan kontak fisik, berada di ruangan yang sama, atau berkunjung kurang dari 1 meter dengan kasus positif covid-19. Namun OTG tidak memiliki gejala yang mengarah pada covid-19 seperti demam, batuk, radang tenggorokan, dan sesak napas."
        },
        {
          id: 4,
          nama: "Suspect COVID-19",
          deskripsi:
            "Suspect atau Terduga. Seseorang dikatakan suspect atau terduga jika ia memiliki riwayat bepergian ke negara terinfeksi virus korona atau melakukan kontak dengan pasien positif korona. Ia diduga kuat telah terinfeksi korona dan memiliki gejala terinfeksi virus itu. Oleh pemerintah pasien dengan kategori suspect akan menjalani pemeriksaan dua metode, yakni Polymerase Chain Reaction (PCR) dan Genome Sequencing. Dari pemeriksaan tersebut akan diketahui apakah pasien dinyatakan positif atau negatif korona."
        },
        {
          id: 5,
          nama: "Imported Case",
          deskripsi:
            "Seseorang terjangkit saat berada diluar wilayah di mana pasien melapor."
        },
        {
          id: 6,
          nama: "Local Transmission",
          deskripsi:
            "Pasien tertular diwilayah dimana kasus ditemukan."
        },
      ]
    };
  }
};
</script>