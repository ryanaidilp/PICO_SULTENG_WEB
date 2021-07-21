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
              Berdasarkan informasi dari @soalpalu, stok vaksin di Kota Palu
              pada minggu ini (11-17 Juli 2021) sedang menipis. Oleh karena itu,
              untuk vaksinasi suntikan pertama kemungkinan tidak dilayani.
              Vaksinasi sedang diprioritaskan untuk masyarakat yang akan
              melakukan penyuntikan kedua. Bagi masyarakat yang ingin melakukan
              penyuntikan pertama, dimohon untuk ke fasilitas kesehatan terdekat
              mulai minggu depan.
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
          :province-vaccine="provinceVaccine"
          :national-vaccine="nationalVaccine"
          show-target-card
        />
      </section>
      <section class="px-4 my-16">
        <h2 class="text-2xl text-left md:text-3xl">
          <b>Progress Vaksinasi COVID-19</b>
        </h2>
        <vaccine-progress
          :province-vaccine="provinceVaccine"
          :national-vaccine="nationalVaccine"
        />
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
  return "Belum Ada Info";
};

const formatBoolean = (value) => {
  if (value) {
    return `Ya`;
  }
  return "Tidak";
};

const formatQuota = (value) => {
  if (value) {
    return `${value.toLocaleString("id-ID")}/hari`;
  }
  return "Belum Ada Info";
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
    provinceVaccine: {
      type: Object,
    },
    nationalVaccine: {
      type: Object,
    },
    vaccineLocations: {
      type: Array,
    },
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
        this.$inertia.reload({ only: ["localVaccine", "nationalVaccine"] });
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
