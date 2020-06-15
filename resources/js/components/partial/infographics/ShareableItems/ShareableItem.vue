<template>
  <div class="flex items-baseline justify-between py-4 border-b border-gray-300 border-solid">
    <vue-gallery-slideshow :images="images" :index="index" @close="index = null"></vue-gallery-slideshow>
    <p class="flex-1 mr-4 break-words cursor-pointer hover:underline" @click="index = 0">{{ title }}</p>
    <p class="flex-none text-sm text-gray-600">
      <button @click="index = 0" class="px-2 py-2 mr-1 rounded-md hover:bg-gray-300">
        <i class="mr-1 fas fa-eye"></i>
        <span>Lihat</span>
      </button>
      <a class="px-2 py-2 rounded-md hover:bg-gray-300" target="_blank" :href="route">
        <i class="mr-1 fas fa-share"></i>
        <span>Bagikan</span>
      </a>
    </p>
  </div>
</template>

<script>
import VueGallerySlideshow from "vue-gallery-slideshow";
export default {
  components: {
    VueGallerySlideshow
  },
  data() {
    return {
      index: null
    };
  },
  props: {
    title: {
      type: String,
      default: ""
    },
    route: {
      type: String,
      default: ""
    },
    images: {
      type: Array,
      default: () => []
    }
  }
};
</script>

