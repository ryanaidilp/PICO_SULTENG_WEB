<template>
  <div class="w-full">
    <div class="p-6 mx-4 mt-8 bg-white rounded-lg shadow-lg">
      <h3 class="text-lg font-bold text-left lg:text-3xl">Hotline Gugus Tugas</h3>
      <p
        class="text-sm md:text-base"
      >Berikut ini adalah nomor telpon tim gugus tugas COVID-19 di Kab/Kota se Sulawesi Tengah.</p>
      <content-loader v-if="posts.length <= 0"></content-loader>
      <div v-else class="flex flex-col flex-wrap justify-between w-full mt-4 md:flex-row">
        <div
          v-for="(posko, i) in posts"
          :key="i"
          class="flex flex-col flex-wrap w-full p-4 mx-auto mt-6 border-l-2 border-blue-400 rounded-lg shadow-lg md:m-4 md:max-w-lg border-left"
        >
          <h4 class="font-bold text-left">{{ posko.name }}</h4>
          <p class="text-xs text-left md:text-sm">{{ posko.address }}</p>
          <div class="flex flex-row flex-wrap w-full">
            <a
              v-for="(phone, j) in posko.phones"
              :key="j"
              class="inline-block px-4 py-1 mt-2 mr-2 text-sm text-white bg-blue-400 rounded hover:opacity-50"
              :href="`tel:${phone}`"
              target="_blank"
              :title="`Telpon ${phone}`"
            >
              <i class="mr-1 fas fa-phone fa-sm" />
              <span>{{ phone }}</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { ContentLoader } from "vue-content-loader";
export default {
  components: {
    ContentLoader
  },
  data() {
    return {
      posts: []
    };
  },
  methods: {
    getPosts: function() {
      axios.get("/corona/api/posko").then(response => {
        let data = response.data.data;
        data.forEach(element => {
          let phones = [];
          let post = {
            name: "",
            address: "",
            phones: []
          };
          post.name = element.nama;
          post.address = `Hotline Gugus Tugas COVID-19 di ${element.nama}`;
          element.posko.forEach(posko => {
            posko.no_hp.forEach(phone => {
              phones.push(phone);
            });
          });
          post.phones = phones;
          this.posts.push(post);
        });
      });
    }
  },
  mounted() {
    this.getPosts();
  }
};
</script>