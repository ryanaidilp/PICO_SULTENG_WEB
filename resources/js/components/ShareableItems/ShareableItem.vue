<template>
  <div
    class="flex items-baseline justify-between py-4 border-b border-gray-300 border-solid "
  >
    <p
      class="flex-1 mr-4 break-words cursor-pointer hover:underline"
      @click="show"
    >
      {{ title }}
    </p>
    <p class="items-center flex-none text-sm text-gray-600">
      <button @click="show" class="px-2 py-2 mr-1 rounded-md hover:bg-gray-300">
        <i class="mr-1 fas fa-eye"></i>
        <span>Lihat</span>
      </button>
      <a
        class="px-2 py-2 rounded-md hover:bg-gray-300"
        target="_blank"
        :href="link"
      >
        <i class="mr-1 fas fa-share"></i>
        <span>Bagikan</span>
      </a>
    </p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      index: null,
    };
  },
  props: {
    title: {
      type: String,
      default: "",
    },
    link: {
      type: String,
      default: "",
    },
    images: {
      type: Array,
      default: () => [],
    },
  },
  methods: {
    show() {
      this.$viewerApi({
        images: this.images,
      });
    },
  },
};
</script>

