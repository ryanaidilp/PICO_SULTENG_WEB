<template>
  <client-only>
    <div @mouseover="showNavigation = true" @mouseleave="showNavigation = false" class="relative">
      <template v-if="isLoading" class="absolute flex justify-center w-full">
        <content-loader :speed="2" width="400" height="200">
          <rect x="0" y="0" rx="0" ry="0" width="100%" height="100%" />
        </content-loader>
      </template>
      <template v-else>
        <carousel
          ref="vueCarousel"
          :per-page="1"
          :mouse-drag="false"
          :autoplay="true"
          :navigationEnabled="false"
          :paginationEnabled="false"
          :loop="true"
          :mouseDrag="true"
          :autoplayTimeout="5000"
        >
          <slide v-for="item in carouselItem" :key="item.phone">
            <a :href.sync="'tel:'+item.phone">
              <img
                :src="'/corona/public/assets/images/' + item.image"
                class="object-fill rounded-lg w-96 h-96 sm:w-full md:w-full xl:max-w-lg xl:max-h-lg"
                :alt.sync="item.nama"
                :title.sync="item.nama"
              />
            </a>
          </slide>
        </carousel>
      </template>
      <div
        class="absolute top-0 left-0 right-0 flex-row items-center justify-between hidden h-full p-4 pointer-events-none md:flex"
      >
        <transition
          name="carousel-nav-appear-transition"
          enter-class="carousel-nav-appear-transition-enter--left"
          leave-to-class="carousel-nav-appear-transition-leave-to--left"
        >
          <button
            v-show="showNavigation"
            class="carousel-nav-button carousel-nav-button--left"
            @click="navigate('prev')"
          >
            <i class="fas fa-chevron-left"></i>
          </button>
        </transition>
        <transition
          name="carousel-nav-appear-transition"
          enter-class="carousel-nav-appear-transition-enter--right"
          leave-to-class="carousel-nav-appear-transition-leave-to--right"
        >
          <button
            v-show="showNavigation"
            class="carousel-nav-button carousel-nav-button--right"
            @click="navigate('next')"
          >
            <i class="fas fa-chevron-right"></i>
          </button>
        </transition>
      </div>
    </div>
  </client-only>
</template>
<script>
import { ContentLoader } from "vue-content-loader";
import { Carousel, Slide } from "vue-carousel";
export default {
  data() {
    return {
      carouselItem: [],
      isLoading: false,
      showNavigation: false
    };
  },
  components: {
    Carousel,
    ContentLoader,
    Slide
  },
  methods: {
    navigate(where) {
      if (!this.$refs.vueCarousel) {
        return;
      }
      switch (where) {
        case "next":
          this.$refs.vueCarousel.handleNavigation();
          break;
        case "prev":
          this.$refs.vueCarousel.handleNavigation("backward");
          break;
      }
    },
    getDonation() {
      this.isLoading = true;
      axios.get("/corona/api/donasi").then(response => {
        var data = response.data.data;
        if (this.carouselItem.length > 0) {
          this.carouselItem = [];
        }
        data.forEach(element => {
          if (element.status) {
            this.carouselItem.push(element);
          }
        });
      });
      this.isLoading = false;
    },
    updater: function() {
      setInterval(() => {
        this.getDonation();
      }, 5 * 60 * 1000);
    }
  },
  mounted() {
    this.getDonation();
    this.updater();
  }
};
</script>

<style lang="scss" scoped>
.carousel-nav-button {
  box-shadow: 0 0 0.5rem 0 rgba(0, 0, 0, 0.1),
    0 0.25rem 1.5rem 0 rgba(0, 0, 0, 0.1);
  @apply pointer-events-auto
  relative flex justify-center items-center
  w-16 h-16 rounded-full
  text-lg
  bg-white;
  &:focus,
  &:active {
    outline: none;
  }
  &:hover {
    @apply bg-gray-200;
  }
  &:active {
    @apply bg-white;
  }
}
.carousel-nav-appear-transition {
  &-enter--left,
  &-leave-to--left {
    transform: translateX(-2rem);
    opacity: 0;
  }
  &-enter--right,
  &-leave-to--right {
    transform: translateX(2rem);
    opacity: 0;
  }
  &-enter-active,
  &-leave-active {
    transition-property: transform opacity;
    transition-duration: 0.2s;
    transition-timing-function: ease-out;
  }
}
</style>
<style lang="scss">
.VueCarousel,
.VueCarousel-wrapper,
.VueCarousel-inner {
  height: 100% !important;
}
.VueCarousel {
  position: relative;
  .VueCarousel-pagination {
    position: absolute;
    bottom: 0;
  }
}
</style>