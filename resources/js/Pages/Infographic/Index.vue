<template>
  <layout>
    <div class="w-full leading-normal text-gray-800 xl:px-0 xl:mt-8">
      <section class="m-4 mt-8">
        <vue-gallery-slideshow
          :images="selectedImage"
          :index="idx"
          @close="idx = null"
        ></vue-gallery-slideshow>
        <div class="bg-white rounded-lg shadow-md">
          <div class="flex flex-col flex-wrap p-5 items-left md:p-8">
            <h2 class="text-xl leading-normal md:text-3xl">
              <b>Info Praktikal</b>
              <br />
              <p class="text-base opacity-75">
                Info yang memuat infografis terkait COVID-19.
                <br />Sumber :
                <a
                  target="_blank"
                  class="hover:underline hover:opacity-100"
                  href="http://instagram.com/sultenglawancovid"
                  >Sulteng Lawan COVID</a
                >
              </p>
            </h2>
            <hr class="my-6" />
            <div class="infographic-list">
              <figure
                class="relative w-full"
                v-for="(item, index) in infographics"
                :key="index"
              >
                <div class="relative overflow-hidden img-container">
                  <img
                    @click="changeImage(item.images)"
                    :src="item.images[0]"
                    class="object-cover object-left-top w-full rounded-lg shadow-lg cursor-pointer infographic-list__item-image"
                  />
                  <div
                    class="absolute inset-0 flex-row items-center justify-center hidden text-white rounded-lg action-overlay lg:flex"
                    style="background-color: rgba(0, 0, 0, 0.75)"
                  >
                    <button
                      class="px-2 py-2 mr-1 rounded-md hover:bg-gray-800"
                      @click="changeImage(item.images)"
                    >
                      <i class="mr-1 fas fa-eye"></i>
                      <span>Lihat</span>
                    </button>
                    <a
                      class="px-2 py-2 rounded-md hover:bg-gray-800"
                      :href="item.route"
                    >
                      <i class="mr-1 fas fa-share"></i>
                      <span>Bagikan</span>
                    </a>
                  </div>
                </div>
                <caption class="block w-full mt-4 text-left opacity-75">
                  <button
                    class="font-bold hover:underline"
                    @click="changeImage(item.images)"
                  >
                    {{ item.title }}
                  </button>
                </caption>
              </figure>
            </div>
          </div>
        </div>
      </section>
      <section class="mt-24">
        <partner-footer :partners="partners" />
      </section>
    </div>
  </layout>
</template>

<script>
import VueGallerySlideshow from "vue-gallery-slideshow";
import Layout from "@/layout/Layout";
import PartnerFooter from "@/Shared/PartnerFooter";
export default {
  props: ["infographics", "partners"],
  components: {
    Layout,
    VueGallerySlideshow,
    PartnerFooter,
  },
  data() {
    return {
      selectedImage: [],
      isPending: true,
      idx: null,
    };
  },
  methods: {
    changeImage(images) {
      this.idx = 0;
      this.selectedImage = images;
    },
  },
};
</script>

<style lang="scss" scoped>
.infographic-list {
  display: grid;
  grid-template-columns: 1fr;
  column-gap: 1.5rem;
  row-gap: 3rem;

  &__item-image {
    height: 256px;
  }

  @screen md {
    grid-template-columns: 1fr 1fr;
  }

  @screen lg {
    grid-template-columns: 1fr 1fr 1fr;
  }
}

.img-container {
  > img {
    &:hover {
      opacity: 0.5;

      @screen lg {
        opacity: 1;
      }
    }
  }
  > .action-overlay {
    cursor: pointer;
    pointer-events: none;
    opacity: 0;
    transform: translateY(1rem);
    transition-property: opacity, transform;
    transition-duration: 0.25s;
    transition-timing-function: ease-in-out;
  }
  &:hover {
    > .action-overlay {
      pointer-events: all;
      opacity: 1;
      transform: translateY(0);
    }
  }
}
</style>
