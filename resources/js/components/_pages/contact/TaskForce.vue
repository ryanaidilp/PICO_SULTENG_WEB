<template>
  <div class="w-full">
    <div class="p-6 mx-4 mt-8 bg-white rounded-lg shadow-md">
      <h3 class="text-lg font-bold text-left lg:text-3xl">
        Hotline Gugus Tugas
      </h3>
      <p class="text-sm md:text-base">
        Berikut ini adalah nomor telpon tim gugus tugas COVID-19 di Kab/Kota se
        Sulawesi Tengah.
      </p>
      <content-loader v-if="posts.length <= 0"></content-loader>
      <div v-else class="grid grid-cols-1 gap-5 mt-8 md:grid-cols-2">
        <div
          v-for="(posko, i) in posts"
          :key="i"
          class="flex flex-col flex-wrap w-full p-4 border-l-2 border-blue-500 rounded-lg shadow-md  border-left"
        >
          <h4 class="font-bold text-left">{{ posko.name }}</h4>
          <p class="text-xs text-left md:text-sm">{{ posko.address }}</p>
          <div class="flex flex-row flex-wrap w-full">
            <a
              v-for="(phone, j) in posko.phones"
              :key="j"
              class="inline-block px-4 py-1 mt-2 mr-2 text-sm text-white bg-blue-500 rounded  hover:opacity-50"
              :href="`tel:${phone.phone}`"
              target="_blank"
              :title="`${phone.name}`"
            >
              <i class="mr-1 fas fa-phone fa-sm" />
              <span>{{ phone.phone }}</span>
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
  props: {
    districts: {
      type: Array,
      required: true,
      default: () => [],
    },
  },
  data() {
    return {
      posts: [],
    };
  },
  components: {
    ContentLoader,
  },
  methods: {
    getPosts() {
      let data = this.districts;
      data.forEach((element) => {
        let phones = [];
        let post = {
          name: "",
          address: "",
          phones: [],
        };
        post.name = element.name;
        post.address = `Hotline Gugus Tugas COVID-19 di ${element.name}`;
        element.posts.forEach((post) => {
          post.phones.forEach((phone) => {
            phones.push({
              name: post.name,
              phone: phone,
            });
          });
        });
        post.phones = phones;
        this.posts.push(post);
      });
    },
  },
  mounted() {
    this.getPosts();
  },
};
</script>