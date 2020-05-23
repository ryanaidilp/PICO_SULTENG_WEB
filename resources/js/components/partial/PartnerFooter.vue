<template>
  <div class="w-full mt-4">
    <div class="p-6 mx-4 bg-white rounded-lg shadow-lg">
      <h3 class="text-sm font-bold text-center lg:text-xl">Pranala Luar</h3>
      <div class="flex flex-col flex-wrap w-full md:flex-row">
        <a
          v-for="partner in partners"
          :key="partner.id"
          class="w-full p-2 mt-4 md:w-1/4 hover:opacity-75"
          :href="partner.link"
          target="_blank"
        >
          <img
            v-lazy="'/corona/public/assets/images/partner/' + partner.image"
            :alt="partner.name"
            class="object-contain h-20 mx-auto"
            :title="partner.name"
          />
        </a>
      </div>
      <p class="mt-6 text-xs text-center text-gray-500 md:text-sm">&copy; BanuaCoders 2020. Made with <i class="fas fa-heart"></i> by <a href="https://linkedin.com/in/ryanaidilp" target="_blank" class="hover:text-gray-800">Fajrian Aidil Pratama</a></p>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      partners: [
        {
          id: "1",
          link: "https://detexi.id",
          image: "detexi.png",
          name: "Detexi"
        },
        {
          id: "2",
          link: "https://dinkes.sultengprov.go.id",
          image: "dinkes.png",
          name: "Dinas Kesehatan Sulawesi Tengah"
        },
        {
          id: "3",
          link: "https://kawalcorona.com",
          image: "ehi.png",
          name: "Kawal Corona"
        },
        {
          id: "4",
          link: "https://covid19.go.id/peta-sebaran",
          image: "inacovid.png",
          name: "Gugus Tugas COVID-19 Indonesia"
        },
        {
          id: "5",
          link: "https://pikobar.jabarprov.go.id",
          image: "pikobar.png",
          name: "PIKOBAR Jawa Barat"
        },
        {
          id: "6",
          link: "https://vuejs.org",
          image: "vue.svg",
          name: "Vue JS"
        },
        {
          id: "7",
          link: "https://banuacoders.com",
          image: "banuacoders.png",
          name: "Banua Coders"
        },
        {
          id: "8",
          link: "https://laravel.com",
          image: "laravel.jpeg",
          name: "Laravel"
        }
      ]
    };
  }
};
</script>