<template>
  <layout>
    <div class="w-full leading-normal xl:px-0 xl:mt-8">
      <section class="px-4">
        <h2 class="text-2xl text-left md:text-3xl">
          <b>Lokasi Vaksinasi COVID-19 di Sulawesi Tengah</b>
        </h2>
        <div class="text-justify">
          <p class="my-2 font-semibold">Pengumuman</p>
          <div class="flex flex-row my-2">
            <p class="mr-2 font-semibold">1.</p>
            <p>
              Berdasarkan informasi dari
              <hyperlink
                href="https://instagram.com/soalpalu"
                label="@soalpalu"
              />, stok vaksin di Kota Palu pada minggu ini (11-17 Juli 2021)
              sedang menipis. Oleh karena itu, untuk vaksinasi suntikan pertama
              kemungkinan tidak dilayani. Vaksinasi sedang diprioritaskan untuk
              masyarakat yang akan melakukan penyuntikan kedua. Bagi masyarakat
              yang ingin melakukan penyuntikan pertama, dimohon untuk ke
              fasilitas kesehatan terdekat mulai minggu depan.
            </p>
          </div>
          <div class="flex flex-row my-2">
            <p class="mr-2 font-semibold">2.</p>
            <p>
              Informasi ini dikumpulkan dari masyarakat. Oleh karen itu, jika
              anda mempunyai informasi terbaru, silahkan bagikan melalui DM ke
              Instagram
              <hyperlink
                href="https://instagram.com/infopalu"
                label="@infopalu"
              />
              atau
              <hyperlink
                href="https://instagram.com/sultenglawancovid"
                label="@sultenglawancovid"
              />
            </p>
          </div>
          <div class="flex flex-row my-2">
            <p class="mr-2 font-semibold">3.</p>
            <p>
              Untuk KTP di luar Kota Palu, tetap bisa melakukan vaksinasi di
              faskes yang ada di Kota Palu. Anda hanya perlu mendaftarkan diri
              dengan membawa KTP. Info di lapangan bahawa harus antri antri
              terlebih dahulu, jadi usahakan untuk datang di pagi hari.
            </p>
          </div>
          <div class="flex flex-row my-2">
            <p class="mr-2 font-semibold">4.</p>
            <p>
              Vaksinasi untuk anak (12 - 17 tahun) sudah bisa dilakukan di
              beberapa fasilitas kesehatan.
            </p>
          </div>
        </div>
        <data-table
          :header-fields="headerFields"
          :data="vaccineLocations"
          id="table-vaccine-location"
          class="my-4"
        >
          <template #notes>
            Data didapatkan dari hasil pendataan
            <hyperlink
              href="https://instagram.com/infopalu"
              label="@infopalu"
            />
            &
            <hyperlink
              href="https://instagram.com/sultenglawancovid"
              label="@sultenglawancovid"
            />. Untuk melihat data selengkapnya silahkan kunjungi
            <hyperlink
              href="https://bit.ly/lokasivaksinpalu"
              label="https://bit.ly/lokasivaksinpalu"
            />.
          </template>
        </data-table>
      </section>

      <section class="px-4 my-16">
        <h2 class="text-2xl text-left md:text-3xl">
          <b>Situasi Vaksinasi COVID-19</b>
        </h2>
        <vaccine-data
          :province-vaccine="province_vaccine"
          :national-vaccine="national_vaccine"
          show-target-card
        />
      </section>
      <section class="px-4 my-16">
        <h2 class="text-2xl text-left md:text-3xl">
          <b>Progress Vaksinasi COVID-19</b>
        </h2>
        <vaccine-progress
          :province-vaccine="province_vaccine"
          :national-vaccine="national_vaccine"
        />
      </section>
      <section class="px-4 py-8 mx-4 my-16 bg-white rounded-lg shadow-lg">
        <h2 class="mb-8 text-2xl text-left md:text-3xl">
          <b>Informasi Vaksinasi COVID-19</b>
        </h2>
        <div class="mb-8">
          <h2 class="mb-2 text-xl font-semibold">Rangkuman</h2>
          <p class="text-sm text-justify break-words md:text-base">
            Vaksinasi COVID-19 sudah dimulai sejak 13 Januari 2021. Program
            vaksinasi ini akan dilakukan secara bertahap dalam 2 gelombang yang
            akan berlangsung hingga Maret 2022. Vaksin akan membuat tubuh
            seseorang mengenali virus COVID-19, sehingga bila terpapar virus
            tersebut akan menjadi lebih kebal. Jika pelaksanaan program
            vaksinasi ini tinggi dan merata, maka akan mendorong terbentuknya
            herd immunity (kekebalan kelompok) yang dapat membantu kita
            menghadapi pandemi agar segera usai.
            <br />
            <i class="text-xs text-gray-600">
              Sumber:
              <hyperlink
                text-color="text-gray-600"
                href="https://kesmas.kemkes.go.id"
                label="https://kesmas.kemkes.go.id"
              />
            </i>
          </p>
        </div>
        <div class="mb-8">
          <h2 class="mb-2 text-xl font-semibold">Apa itu vaksinasi?</h2>
          <p class="text-sm text-justify break-words md:text-base">
            Vaksinasi adalah proses di dalam tubuh, dimana seseorang menjadi
            kebal atau terlindungi dari suatu penyakit sehingga apabila suatu
            saat terpajan dengan penyakit tersebut maka tidak akan sakit atau
            hanya mengalami sakit ringan, biasanya dengan pemberian vaksin.
            <br />
            <i class="text-xs text-gray-600">
              Sumber:
              <hyperlink
                text-color="text-gray-600"
                href="https://kesmas.kemkes.go.id"
                label="https://kesmas.kemkes.go.id"
              />
            </i>
          </p>
        </div>
        <div class="mb-8">
          <h2 class="mb-2 text-xl font-semibold">Apakah Vaksin itu obat?</h2>
          <p class="text-sm text-justify break-words md:text-base">
            Vaksin bukanlah obat, vaksin mendorong pembentukan kekebalan
            spesifik tubuh agar terhindar dari tertular ataupun kemungkinan
            sakit berat. Selama belum ada obat yang defenitif untuk COVID-19,
            maka vaksin COVID-19 yang aman dan efektif serta perilaku 3M
            (memakasi masker, mencuci tangan dengan sabun dan menjaga jarak)
            adalah upaya perlindungan yang bisa kita lakukan agar terhindar dari
            penyakit COVID-19.
            <br />
            <i class="text-xs text-gray-600">
              Sumber:
              <hyperlink
                text-color="text-gray-600"
                href="https://kesmas.kemkes.go.id"
                label="https://kesmas.kemkes.go.id"
              />
            </i>
          </p>
        </div>
        <div class="mb-8">
          <h2 class="mb-2 text-xl font-semibold">
            Apa yang dimaksud dengan kekebalan kelompok (herd immunity)?
          </h2>
          <p class="text-sm text-justify break-words md:text-base">
            Kekebalan kelompok atau herd Immunity merupakan situasi dimana
            sebagian besar masyarakat terlindung/kebal terhadap penyakit
            tertentu sehingga menimbulkan dampak tidak langsung (indirect
            effect), yaitu turut terlindunginya kelompok masyarakat yang rentan
            dan bukan merupakan sasaran vaksinasi. Kondisi tersebut hanya dapat
            tercapai dengan cakupan vaksinasi yang tinggi dan merata.
            <br />
            <i class="text-xs text-gray-600">
              Sumber:
              <hyperlink
                text-color="text-gray-600"
                href="https://kesmas.kemkes.go.id"
                label="https://kesmas.kemkes.go.id"
              />
            </i>
          </p>
        </div>
        <div class="mb-8">
          <h2 class="mb-2 text-xl font-semibold">
            Apakah ada efek samping dari vaksinasi?
          </h2>
          <p class="text-sm text-justify break-words md:text-base">
            Secara umum, efek samping yang timbul dapat beragam, pada umumnya
            ringan dan bersifat sementara, dan tidak selalu ada, serta
            bergantung pada kondisi tubuh. Efek simpang ringan seperti demam dan
            nyeri otot atau ruam-ruam pada bekas suntikan adalah hal yang wajar
            namun tetap perlu dimonitor. Melalui tahapan pengembangan dan
            pengujian vaksin yang lengkap, efek samping yang berat dapat
            terlebih dahulu terdeteksi sehingga dapat dievaluasi lebih lanjut.
            Manfaat vaksin jauh lebih besar dibandingkan risiko sakit karena
            terinfeksi bila tidak divaksin. Apabila nanti terjadi Kejadian
            Ikutan Pasca Imunisasi (KIPI), kita sudah ada Komite Nasional
            Pengkajian dan Penanggulangan KIPI maupun komite di setiap daerah
            untuk memantau dan menanggulangi KIPI.

            <br />
            <i class="text-xs text-gray-600">
              Sumber:
              <hyperlink
                text-color="text-gray-600"
                href="https://kesmas.kemkes.go.id"
                label="https://kesmas.kemkes.go.id"
              />
            </i>
          </p>
        </div>
        <div class="mb-8">
          <h2 class="mb-2 text-xl font-semibold">
            Dimana bisa mendapatkan informasi terbaru seputar soal KIPI / dampak
            vaksin COVID-19?
          </h2>
          <p class="text-sm text-justify break-words md:text-base">
            Anda dapat mendapatkan informasi terbaru seputar KIPI / dampak
            vaksin COVID-19 di sini:
            <hyperlink
              href="https://kipi.covid19.go.id"
              label="https://kipi.covid19.go.id"
            />
          </p>
        </div>
      </section>

      <partner-footer :partners="partners" class="mt-8" />
    </div>
  </layout>
</template>
<script>
import Layout from "@/layout/Layout";
import PartnerFooter from "@/Shared/PartnerFooter";
import VaccineData from "@/components/_pages/home/VaccineData";
import VaccineProgress from "@/components/_pages/vaccine/VaccineProgress";
import DataTable from "@/components/DataTable";
import Hyperlink from "@/components/Hyperlink";
import { mapState } from "vuex";

const formatDate = (value) => {
  if (value) {
    return new Intl.DateTimeFormat("id-ID", {
      weekday: "long",
      day: "numeric",
      month: "long",
      year: "numeric",
      hour: "2-digit",
      minute: "2-digit",
      second: "2-digit",
      timeZoneName: "short",
    })
      .format(new Date(value))
      .replaceAll(".", ":");
  }
  return "";
};

const formatStock = (value) => {
  if (value) {
    return `${value.toLocaleString("id-ID")} vial`;
  }
  return "-";
};

const formatBoolean = (value) => {
  if (value) {
    return `Ya`;
  }
  return "-";
};

const formatQuota = (value) => {
  if (value) {
    return `${value.toLocaleString("id-ID")}/hari`;
  }
  return "-";
};

const formatNotes = (value) => {
  if (value) {
    return value;
  }
  return "-";
};

export default {
  data() {
    return {
      headerFields: [
        {
          name: "regency_name",
          label: "Wilayah",
          sortable: true,
        },
        {
          name: "name",
          label: "Lokasi Vaksin",
          sortable: true,
        },
        {
          name: "address",
          label: "Alamat",
        },
        {
          name: "operational_time",
          label: "Jam Operasional",
          sortable: true,
        },
        {
          name: "is_first_vaccination",
          label: "Vaksinasi Pertama",
          format: formatBoolean,
          sortable: true,
        },
        {
          name: "is_second_vaccination",
          label: "Vaksinasi Kedua",
          format: formatBoolean,
          sortable: true,
        },
        {
          name: "daily_vaccination_quota",
          label: "Kuota Vaksin",
          sortable: true,
          format: formatQuota,
        },
        {
          name: "vaccination_stock_remaining",
          label: "Sisa Vaksin",
          sortable: true,
          format: formatStock,
        },
        {
          name: "notes",
          label: "Catatan",
          format: formatNotes,
        },
        {
          name: "updated_at",
          label: "Pembaruan Terakhir",
          format: formatDate,
        },
      ],
    };
  },
  props: {
    partners: {
      type: Array,
    },
    vaccineLocations: {
      type: Array,
    },
  },
  computed: {
    ...mapState(["national_vaccine", "province_vaccine"]),
  },
  components: {
    Layout,
    DataTable,
    Hyperlink,
    VaccineData,
    PartnerFooter,
    VaccineProgress,
  },
  methods: {
    reloadData() {
      setInterval(() => {
        this.$inertia.reload({ only: ["vaccineLocations"] });
      }, 5 * 60 * 1000);
    },
    formatDate(date) {
      const d = new Date(date);
      const options = {
        day: "numeric",
        month: "short",
        year: "numeric",
      };
      return d.toLocaleString("id-ID", options);
    },
  },
  mounted() {
    this.reloadData();
  },
};
</script>
