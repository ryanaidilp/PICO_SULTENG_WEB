<template>
  <div class="w-full mt-4">
    <div class="p-6 mx-4 bg-white rounded-lg shadow-lg">
      <h3 class="text-xl font-bold lg:text-2xl">Lindungi Diri dan Orang Lain</h3>
      <div class="flex flex-row w-full">
        <span class="w-auto mt-4 text-xs text-justify lg:w-3/4 lg:text-lg">
          Sampai saat ini belum ditemukan vaksin untuk COVID-19, sehingga cara terbaik agar tidak terinfeksi adalah dengan menghindari terekspos virus.
          <br />
          <br />
          <span
            class="font-semibold"
          >COVID-19 dapat menyebar dari orang ke orang melalui tetesan kecil (droplet) saat batuk atau bersin. Maka yang bisa Komiu dan Kita semua lakukan adalah:</span>
          <ul class="mt-2">
            <li>
              <i class="text-green-400 fas fa-check" aria-hidden="true"></i> Sering cuci tangan pakai sabun atau
              <i>Hand Sanitizer</i>
            </li>
            <li>
              <i class="text-green-400 fas fa-check" aria-hidden="true"></i> Hindari menyentuh wajah terutama area hidung, mulut, dan mata
            </li>
            <li>
              <i class="text-green-400 fas fa-check" aria-hidden="true"></i> Bersihkan permukaan benda yang disentuh banyak orang
            </li>
            <li>
              <i class="text-green-400 fas fa-check" aria-hidden="true"></i>
              <i>Physical Distancing</i>! Minimalisir kontak fisik dengan sesama
            </li>
            <li>
              <i class="text-green-400 fas fa-check" aria-hidden="true"></i> Jaga jarak 1-3 meter dengan sesama
            </li>
            <li>
              <i class="text-green-400 fas fa-check" aria-hidden="true"></i> Tetap tinggal di rumah, hindari bepergian ke tempat umum bila tidak perlu
            </li>
            <li>
              <i class="text-green-400 fas fa-check" aria-hidden="true"></i> Selalu gunakan masker jika harus keluar rumah dan berinteraksi langsung dengan orang lain
            </li>
          </ul>
        </span>
        <div class="flex flex-col justify-center hidden w-1/4 mx-2 my-auto rounded-lg lg:block sm:p-2 lg:mx-16">
          <img v-lazy="'/corona/public/assets/images/wash_hands.png'" title="Cuci Tangan" alt="Cuci Tangan" class="object-contain" />
          <img v-lazy="'/corona/public/assets/images/wear_mask.png'" title="Pakai Masker" alt="Pakai Masker" class="object-contain mt-6" />
        </div>
      </div>
        <i class="mt-8 text-xs text-gray-600 ">
          Sumber materi :
          <a
            href="https://pikobar.jabarprov.go.id"
            class="no-underline hover:no-underline hover:text-blue-200"
          >https://pikobar.jabarprov.go.id</a>
        </i>
    </div>
  </div>
</template>