<template>
  <layout>
    <div class="w-full leading-normal xl:px-0 xl:mt-8">
      <h2 class="mx-4 mt-2 text-2xl text-left md:text-3xl">
        <b>Informasi Isolasi Mandiri</b>
      </h2>
      <div class="grid grid-cols-1 gap-5 m-4 sm:grid-cols-2">
        <div
          v-for="information in informations"
          :key="information.url"
          class="flex flex-row flex-wrap p-4 bg-white rounded-lg shadow-lg"
        >
          <img
            :src="asset(`images/${information.image}.png`)"
            class="object-contain w-full lg:w-2/5"
            alt=""
          />
          <div class="flex flex-col justify-between w-full lg:w-3/5">
            <h2 class="font-bold">{{ information.title }}</h2>
            <div class="my-4">
              <p>
                {{ information.description }}
              </p>
            </div>
            <a
              :href="information.url"
              :target="information.is_blank ? '_blank' : '_self'"
              class="flex flex-row items-center justify-between w-full p-2 text-white transition-all duration-150 bg-blue-600 rounded-lg  hover:bg-blue-700"
            >
              <span class="font-bold">{{ information.label }}</span>
              <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
      <section class="px-4 py-2 mx-4 my-8 bg-white rounded-lg shadow-lg">
        <div class="text-justify">
          <p class="my-2 font-bold md:text-lg">
            Perawatan Bagi Pasien COVID-19
          </p>
          <p>
            Seiring dengan meningkatnya kasus Covid-19 di Sulawesi Tengah,
            diperlukan adanya informasi mengenai angka keterisian tempat tidur
            <i>(Bed Occupancy Rate/BOR)</i> Rumah Sakit untuk memudahkan
            pendistribusian perawatan pasien Covid-19. Selain itu, diperlukan
            juga informasi pedoman melakukan Isolasi Mandiri bagi masyarakat
            untuk membantu masyarakat yang sedang melakukan Isoman. Berikut
            adalah anjuran perawatan pasien Covid-19 di Sulawesi Tengah yang
            dikategorikan berdasarkan gejala yang dialami oleh pasien Covid-19.
          </p>
          <p class="mx-auto my-4 font-bold text-center">
            Anjuran tempat perawatan pasien Covid-19 berdasarkan gejalanya
          </p>
          <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-4">
            <div class="flex flex-col border border-blue-600">
              <div class="p-2 font-bold text-white bg-blue-600">
                Tanpa Gejala
              </div>
              <div class="flex-1 p-2">
                <h2 class="font-bold text-blue-600">Gejala</h2>
                <ul class="my-2 fa-ul">
                  <li class="my-2">
                    <span class="fa-li"
                      ><i class="text-xs text-blue-500 fas fa-circle"></i
                    ></span>
                    Frekuensi napas : 12-20 kali/menit
                  </li>
                  <li class="my-2">
                    <span class="fa-li"
                      ><i class="text-xs text-blue-500 fas fa-circle"></i
                    ></span>
                    Saturasi &#8805; 95%
                  </li>
                </ul>
              </div>
              <hr />
              <div class="p-2">
                <h2 class="font-bold text-blue-600">Tempat Perawatan</h2>
                <ul class="my-2 fa-ul">
                  <li class="my-2">
                    <span class="fa-li"
                      ><i class="text-xs text-blue-500 fas fa-circle"></i
                    ></span>
                    Isoman di rumah
                  </li>
                  <li class="my-2">
                    <span class="fa-li"
                      ><i class="text-xs text-blue-500 fas fa-circle"></i
                    ></span>
                    Fasilitas isolasi pemerintah
                  </li>
                </ul>
              </div>
            </div>
            <div class="flex flex-col border border-blue-600">
              <div class="p-2 font-bold text-white bg-blue-600">Ringan</div>
              <div class="flex-1 p-2">
                <h2 class="font-bold text-blue-600">Gejala</h2>
                <ul class="my-2 fa-ul">
                  <li class="my-2">
                    <span class="fa-li"
                      ><i class="text-xs text-blue-500 fas fa-circle"></i
                    ></span>
                    Demam, batuk, sakit kepala, mual, kehilangan indera
                    penciuman dan pengecapan
                  </li>
                  <li class="my-2">
                    <span class="fa-li"
                      ><i class="text-xs text-blue-500 fas fa-circle"></i
                    ></span>
                    Frekuensi napas : 12-20 kali/menit
                  </li>
                  <li class="my-2">
                    <span class="fa-li"
                      ><i class="text-xs text-blue-500 fas fa-circle"></i
                    ></span>
                    Saturasi &#8805; 95%
                  </li>
                </ul>
              </div>
              <hr />
              <div class="p-2">
                <h2 class="font-bold text-blue-600">Tempat Perawatan</h2>
                <ul class="my-2 fa-ul">
                  <li class="my-2">
                    <span class="fa-li"
                      ><i class="text-xs text-blue-500 fas fa-circle"></i
                    ></span>
                    Fasilitas isolasi pemerintah
                  </li>
                  <li class="my-2">
                    <span class="fa-li"
                      ><i class="text-xs text-blue-500 fas fa-circle"></i
                    ></span>
                    Isolasi di rumah bagi yang memenuhi syarat
                  </li>
                </ul>
              </div>
            </div>
            <div class="flex flex-col border border-blue-600">
              <div class="p-2 font-bold text-white bg-blue-600">Sedang</div>
              <div class="flex-1 p-2">
                <h2 class="font-bold text-blue-600">Gejala</h2>
                <ul class="my-2 fa-ul">
                  <li class="my-2">
                    <span class="fa-li"
                      ><i class="text-xs text-blue-500 fas fa-circle"></i
                    ></span>
                    Hampir sama dengan gejala pasien ringan
                  </li>
                  <li class="my-2">
                    <span class="fa-li"
                      ><i class="text-xs text-blue-500 fas fa-circle"></i
                    ></span>
                    <b>namun dengan</b> <br />
                    Frekuensi napas : 20-30 kali/menit
                  </li>
                  <li class="my-2">
                    <span class="fa-li"
                      ><i class="text-xs text-blue-500 fas fa-circle"></i
                    ></span>
                    Saturasi &#8826; 95%
                  </li>
                  <li class="my-2">
                    <span class="fa-li"
                      ><i class="text-xs text-blue-500 fas fa-circle"></i
                    ></span>
                    Sesak napas tanpa distress pernapasan
                  </li>
                </ul>
              </div>
              <hr />
              <div class="p-2">
                <h2 class="font-bold text-blue-600">Tempat Perawatan</h2>
                <ul class="my-2 fa-ul">
                  <li class="my-2">
                    <span class="fa-li"
                      ><i class="text-xs text-blue-500 fas fa-circle"></i
                    ></span>
                    RS Darurat Covid-19
                  </li>
                  <li class="my-2">
                    <span class="fa-li"
                      ><i class="text-xs text-blue-500 fas fa-circle"></i
                    ></span>
                    RS Non Rujukan
                  </li>
                  <li class="my-2">
                    <span class="fa-li"
                      ><i class="text-xs text-blue-500 fas fa-circle"></i
                    ></span>
                    RS Rujukan
                  </li>
                </ul>
              </div>
            </div>
            <div class="flex flex-col border border-blue-600">
              <div class="p-2 font-bold text-white bg-blue-600">
                Berat-Kritis
              </div>
              <div class="flex-1 p-2">
                <h2 class="font-bold text-blue-600">Gejala</h2>
                <ul class="my-2 fa-ul">
                  <li class="my-2">
                    <span class="fa-li"
                      ><i class="text-xs text-blue-500 fas fa-circle"></i
                    ></span>
                    Hampir sama dengan gejala pasien sedang
                  </li>
                  <li class="my-2">
                    <span class="fa-li"
                      ><i class="text-xs text-blue-500 fas fa-circle"></i
                    ></span>
                    <b>namun dengan</b> <br />
                    Frekuensi napas : &#8827; 30 kali/menit
                  </li>
                  <li class="my-2">
                    <span class="fa-li"
                      ><i class="text-xs text-blue-500 fas fa-circle"></i
                    ></span>
                    Saturasi &#8826; 95%
                  </li>
                  <li class="my-2">
                    <span class="fa-li"
                      ><i class="text-xs text-blue-500 fas fa-circle"></i
                    ></span>
                    Sesak napas dengan distress pernapasan
                  </li>
                  <li class="my-2">
                    <span class="fa-li"
                      ><i class="text-xs text-blue-500 fas fa-circle"></i
                    ></span>
                    <b>Kondisi kritis: </b>gagal napas, syok sepsis, dan
                    <i>multiorgan failure</i>
                  </li>
                </ul>
              </div>
              <hr />
              <div class="p-2">
                <h2 class="font-bold text-blue-600">Tempat Perawatan</h2>
                <ul class="my-2 fa-ul">
                  <li class="my-2">
                    <span class="fa-li"
                      ><i class="text-xs text-blue-500 fas fa-circle"></i
                    ></span>
                    HCU/ICU RS Rujukan
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <p class="mt-2 text-sm text-right text-gray-500">
            Sumber : Kementrian Kesehatan RI
          </p>
        </div>
      </section>

      <section class="px-4 py-2 mx-4 my-8 bg-white rounded-lg shadow-lg">
        <div class="text-justify">
          <p class="my-2 font-bold md:text-lg">Panduan Isolasi di Rumah</p>
          <p>
            Hal pertama yang perlu anda lakukan ketika mengetahui terkonfirmasi
            positif adalah dengan
            <b
              >melaporkan diri ke puskesmas/fasilitas pelayanan kesehatan
              (fasyankes)</b
            >
            terdekat untuk pemantauan kesehatan. Tak hanya untuk mendapatkan
            pemeriksaan dini oleh tenaga medis, pelaporan ini juga diperlukan
            untuk proses pelacakan kontak erat.
          </p>
          <br />
          <p>
            Pasien dengan hasil tes positif Covid-19 tidak bisa memutuskan
            langsung untuk isolasi mandiri
            <b>tanpa berkonsultasi dengan dokter</b>. Dokter berkompeten
            memutuskan apakah pasien cukup isoman di rumah, di fasilitas isolasi
            terpusat, atau perlu dirawat di RS. Konsultasi dokter penting agar
            pengobatan yang diberikan sesuai kondisi, dan mengantisipasi
            perburukan saat isoman.
          </p>
          <br />
          <p>
            Ketika anda terkonfirmasi tanpa gejala atau dengan gejala ringan,
            maka yang perlu anda lakukan adalah melakukan isolasi mandiri.
            <b>Apa yang perlu anda siapkan untuk isoman?</b>
          </p>
          <ol class="mx-4 list-decimal list-outside">
            <li class="my-4">
              Tetap tinggal di rumah, kecuali untuk kepentingan medis.
            </li>
            <li class="my-4">
              Selain membekali dengan obat dan vitamin, ada baiknya miliki nomor
              kontak dokter untuk konsultasi & pemantauan kondisi pasien.
            </li>
            <li class="my-4">
              Lengkapi diri dengan alat kesehatan seperti: termometer, oximeter,
              alat kesehatan lain yang disesuaikan dengan komorbid (mis.
              pengukur tensi darah)
            </li>
            <li class="my-4">
              Kabarkan keluarga, komunitas, dan teman jika terdiagnosis positif
              Covid-19 dan harus menjalani isoman.
            </li>
            <li class="my-4">
              Gunakan kamar tidur terpisah dengan anggota keluarga lainnya, dan
              jika memungkinkan dengan kamar mandi terpisah.
            </li>
            <li class="my-4">
              Terapkan protokol kesehatan (gunakan masker, mencuci tangan,
              menjaga jarak)
            </li>
            <li class="my-4">
              Lakukan pengukuran suhu harian dan observasi gejala klinis seperti
              batuk atau kesulitan bernapas.
            </li>
            <li class="my-4">
              Hindari pemakaian bersama peralatan makan, mandi, dan linen/sprei.
            </li>
            <li class="my-4">Tidak disarankan menggunakan AC.</li>
            <li class="my-4">
              Terapkan Perilaku Hidup Bersih dan Sehat (PHBS): konsumsi makanan
              bergizi, mencuci tangan dengan sabun dan air mengalir, dan lakukan
              etika batuk/bersin.
            </li>
            <li class="my-4">Berjemur di bawah sinar matahari setiap pagi.</li>
            <li class="my-4">Jaga kebersihan rumah dengan disinfektan.</li>
            <li class="my-4">
              Siapkan tas berisi kebutuhan darurat jika tiba-tiba harus pergi ke
              fasyankes terdekat, seperti: KTP, kartu BPJS, kartu berobat di
              fasyankes/RS langganan, baju ganti, peralatan lain seperti gadget,
              dll.
            </li>
            <li class="my-4">
              Segera hubungi fasyankes terdekat jika terjadi perburukan gejala
              untuk perawatan lebih lanjut.
            </li>
          </ol>
          <p class="mt-2 text-sm text-right text-gray-500">
            Sumber : Kementrian Kesehatan RI & KawalCovid19
          </p>
        </div>
      </section>
      <section class="px-4 py-2 mx-4 my-8 bg-white rounded-lg shadow-lg">
        <div class="text-justify">
          <p class="my-2 font-bold md:text-lg">
            Kontak Erat dari Pasien COVID-19
          </p>
          <p>
            Semua yang pernah berhubungan dengan pasien Covid-19 dalam kurun
            waktu <b>48 jam sebelum tes Covid-19 dilaksanakan</b>, termasuk
            kontak erat. Pelacakan kontak erat meliputi upaya identifikasi orang
            yang mungkin terpapar Covid-19 dan pemantauan harian atas kontak
            erat setiap hari selama 14 hari. Kontak erat disarankan melakukan
            tes PCR Covid-19
            <b
              >minimal 3 hari setelah kontak erat dengan pasien Covid-19, atau
              minimal 5 hari setelah kontak dengan pasien untuk tes swab
              antigen</b
            >.
          </p>
          <br />
          <p>
            Jika hasil tes PCR/Antigen negatif, anggota keluarga tetap wajib
            melakukan karantina di ruangan berbeda selama 14 hari untuk
            mengantisipasi munculnya gejala.
            <b>
              Prosedur karantina kontak erat serupa dengan isolasi mandiri
              pasien Covid-19, namun tidak perlu minum obat</b
            >.
          </p>

          <p class="mt-2 text-sm text-right text-gray-500">
            Sumber : WHO & KawalCovid19
          </p>
        </div>
      </section>
      <section class="px-4 py-2 mx-4 my-8 bg-white rounded-lg shadow-lg">
        <div class="text-justify">
          <p class="my-2 font-bold md:text-lg">
            Kapan Pasien COVID-19 Dinyatakan Bebas Isoman?
          </p>
          <p>
            solasi mandiri dilakukan selama <b>±10 hari</b> atau hingga pasien
            memenuhi kriteria sembuh Covid-19. Pasien Covid-19 ringan atau
            bergejala sedang perlu melakukan isoman selama 10 hari ditambah 3
            hari setelah gejala hilang, lalu bebas pada hari ke-14. Namun, jika
            pada masa isoman muncul gejala, maka waktu isolasi
            <b> perlu ditambah 10 hari lagi sejak hari pertama gejala muncul</b
            >, bukan dihitung sejak pertama kali dikonfirmasi positif Covid-19.
          </p>

          <p class="mt-2 text-sm text-right text-gray-500">
            Sumber : Kementrian Kesehatan RI & KawalCovid19
          </p>
        </div>
      </section>
      <section class="px-4 py-2 mx-4 my-8 bg-white rounded-lg shadow-lg">
        <div class="text-justify">
          <p class="my-2 font-bold md:text-lg">
            Jika Isoman Sudah Selesai, Haruskah Tes PCR Ulang?
          </p>
          <p>
            Kementerian Kesehatan telah menyatakan bahwa tidak ada keharusan
            melakukan tes PCR ulang bagi pasien Covid-19 ringan-sedang yang
            <b>telah menyelesaikan isoman</b>.
          </p>
          <br />
          <p>
            Pasien Covid-19 tidak perlu bergantung pada nilai CT yang tertera
            pada hasil tes. Hasil CT juga bukan satu-satunya acuan seseorang
            bebas dari masa isoman ataupun pengetesan ulang. Hanya dokter yang
            <b
              >memiliki wewenang dan dapat memastikan status kesehatan pasien</b
            >
            serta menentukan perlu tidaknya tes PCR ulang.
          </p>
          <br />
          <p>
            Isolasi di rumah bagi pasien tanpa gejala maupun yang bergejala
            ringan, bisa menjadi hal yang berat bagi sebagian orang. Namun, cara
            ini efektif untuk melindungi anda, keluarga, serta orang lain dari
            penularan Covid-19.
          </p>
          <p class="mt-2 text-sm text-right text-gray-500">
            Sumber : Kementrian Kesehatan RI & KawalCovid19
          </p>
        </div>
      </section>
      <section
        id="donations"
        class="px-4 py-2 mx-4 my-8 bg-white rounded-lg shadow-lg"
      >
        <div class="text-justify">
          <p class="my-2 font-bold md:text-lg">Donasi Isoman</p>
          <p>
            Bagi teman-teman, roa-roa semua yang ingin berdonasi untuk
            masyarakat yang tidak mampu dan sedang menjalani isolasi mandiri,
            silahkan menyalurkan bantuan atau donasi yang sedang digalang oleh
            teman-teman baik berikut.
          </p>
          <br />
          <p>
            Jika kita masih diberi rezeki dan memiliki kelebihan di tengah
            pandemi ini, tidak ada salahnya kita baku bantu. Mari baku jaga.
          </p>
          <br />
          <hr />
          <p class="mx-auto my-4 font-bold text-center">
            Daftar Donasi Khusus Pasien Isoman
          </p>
          <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-3">
            <donation-card
              v-for="donation in donations"
              :key="donation.id"
              :donation="donation"
            />
          </div>
          <p class="mt-2 text-sm text-right text-gray-500">
            Sumber : Berbagai Sumber
          </p>
        </div>
      </section>
      <section
        id="telemedicine"
        class="px-4 py-2 mx-4 my-8 bg-white rounded-lg shadow-lg"
      >
        <div class="text-justify">
          <p class="my-2 font-bold md:text-lg">Konsultasi dengan Dokter</p>
          <p>
            Untuk yang sedang melakukan isolasi mandiri di rumah dan membutuhkan
            konsultasi dokter, beberapa nomor dokter berikut dapat dihubungi.
            Dokter yang ada di daftar telah terdaftar di website KKL. Untuk saat
            ini, semua dokter yang ada pada daftar ini berada di Pulau Jawa.
          </p>
          <br />
          <p>
            <span class="italic text-gray-600">Catatan : </span>
          </p>
          <ul class="my-2 italic fa-ul">
            <li class="my-2">
              <span class="fa-li"><i class="text-xs fas fa-circle"></i></span>
              Hanya menerima chat, tidak menerima telfon atau video call kecuali
              dokter menerima.
            </li>
            <li class="my-2">
              <span class="fa-li"><i class="text-xs fas fa-circle"></i></span>
              Tidak menerima penulisan resep antibiotik, antiparasit, antivirus.
            </li>
            <li class="my-2">
              <span class="fa-li"><i class="text-xs fas fa-circle"></i></span>
              Tidak bisa mencarikan ambulans atau rumah sakit atau tes swab
              gratis.
            </li>
            <li class="my-2">
              <span class="fa-li"><i class="text-xs fas fa-circle"></i></span>
              Tidak bisa memberikan atau mengirimkan obat gratis, hanya
              menyediakan layanan konsultasi.
            </li>
            <li class="my-2">
              <span class="fa-li"><i class="text-xs fas fa-circle"></i></span>
              Hanya menjawab sesuai waktu konsultasi.
            </li>
          </ul>
          <hr />
          <p class="mx-auto my-4 font-bold text-center">
            Daftar <i>Telemedicine</i> Khusus Pasien Isoman
          </p>
          <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-3">
            <telemedicine-card
              v-for="telemedicine in telemedicines"
              :key="telemedicine.id"
              :name="telemedicine.name"
              :is-free="telemedicine.is_free"
              :contacts="telemedicine.contacts"
              :schedules="telemedicine.schedules"
            />
          </div>
          <p class="mt-2 text-sm text-right text-gray-500">
            Sumber : Berbagai Sumber
          </p>
        </div>
      </section>
      <partner-footer class="mt-16" :partners="partners" />
    </div>
  </layout>
</template>
<script>
import Layout from "@/layout/Layout";
import Hyperlink from "@/components/Hyperlink";
import PartnerFooter from "@/Shared/PartnerFooter";
import DonationCard from "@/components/_pages/isolation/DonationCard";
import TelemedicineCard from "@/components/_pages/isolation/TelemedicineCard";
export default {
  props: {
    partners: {
      type: Array,
    },
    telemedicines: {
      type: Array,
    },
    donations: {
      type: Array,
    },
  },
  components: {
    Layout,
    Hyperlink,
    PartnerFooter,
    DonationCard,
    TelemedicineCard,
  },
  data() {
    return {
      informations: [
        {
          url: "#telemedicine",
          image: "tele_consultation",
          title: "Konsultasi dengan Dokter",
          label: "Tanyakan Sekarang",
          description:
            " Bagi warga yang membutuhkan obat atau konsultasi, yuk konsultasikan terlebih dahulu dengan dokter melalui layanan telekonsultasi dokter.",
          is_blank: false,
        },
        {
          url: "https://form.jotform.com/212021090712034",
          image: "survey",
          title: "Pendataan Pasien Isoman",
          label: "Isi Sekarang",
          description:
            "Pendataan pasien isoman dan kebutuhan selama isoman untuk membantu tim relawan dalam mendistribusikan bantuan kebutuhan pokok untuk pasien isolasi mandiri.",
          is_blank: true,
        },
        {
          url: "https://bit.ly/faqisoman",
          image: "faq",
          title: "Pertanyaan Seputar Isoman",
          label: "Lihat",
          description:
            "Kumpulan tanya jawab dari teman-teman dokter dan nakes seputar Isoman dan COVID-19.",
          is_blank: true,
        },
        {
          url: "#donations",
          image: "delivery",
          title: "Donasi Untuk Pasien Isoman",
          label: "Donasi Sekarang",
          description:
            "Kumpulan donasi yang diinisiasi oleh teman-teman baik untuk membantu warga yang sedang melakukan isolasi mandiri.",
          is_blank: false,
        },
      ],
    };
  },
};
</script>