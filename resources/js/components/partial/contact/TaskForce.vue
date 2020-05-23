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
          v-for="post in posts"
          :key="post.no"
          class="flex flex-col flex-wrap w-full p-4 mx-auto mt-6 border-l-2 border-blue-400 rounded-lg shadow-lg md:m-4 md:max-w-lg border-left"
        >
          <h4 class="font-bold text-left">{{ post.nama }}</h4>
          <p class="my-auto text-xs text-left text-justify md:text-sm">Hotline tim Gugus Tugas COVID-19 {{ post.nama }}</p>
          <span class="flex flex-wrap" v-for="posko in post.posko" :key="posko.no">
            <a
              v-for="phone in posko.no_hp"
              :key="phone"
              :href="'tel:'+phone"
              class="w-full p-2 mx-auto mt-2 text-sm text-left text-white bg-blue-600 rounded-md hover:opacity-75 md:text-base"
            >
              <i class="fas fa-phone-alt"></i>
              {{posko.nama + ' - ' + phone }}
            </a>
          </span>
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
        this.posts = response.data.data;
      });
    }
  },
  mounted() {
    this.getPosts();
  }
};
</script>