<template>
  <div class="w-full">
    <div class="p-6 mx-4 bg-white rounded-lg shadow-lg">
      <h3 class="text-lg font-bold lg:text-3xl">
        Kenapa Harus
        <i>Physical Distancing</i>?
      </h3>
      <div class="flex flex-row w-full">
        <span class="w-auto mt-4 text-xs text-justify lg:w-3/4 lg:text-base">
          COVID-19 menyebar dengan cepat. Orang dapat terinfeksi tanpa menunjukkan gejala, namun tetap dapat menyebarkannya ke orang lain. Jika kita tidak melakukan upaya pencegahan berupa menghindari keramaian, jumlah orang terinfeksi akan meledak dan fasilitas layanan kesehatan akan kewalahan sehingga banyak kasus akan tidak tertangani.
          <br />
          <br />
          <span class="font-semibold">
            <i>Physical Distancing</i> akan mengurangi laju penularan dan memungkinkan pasien terinfeksi untuk ditangani hingga sembuh, seperti di grafik terlampir.
          </span>
        </span>
        <div
          class="flex-col justify-center hidden mx-2 my-auto rounded-lg md:flex w-50 lg:block sm:p-2 lg:mx-16"
        >
          <img v-lazy="route('home')+'assets/images/flatten.jpeg'" alt="Kurva" title="Kurva" class="object-contain" />
        </div>
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
</template>