<template>
  <div>
    <div class="absolute flex justify-center w-full">
      <loading
        :active.sync="isLoading"
        :opacity="0.8"
        :height="300"
        :width="128"
        loader="spinner"
        color="#59F"
      ></loading>
    </div>
    <carousel
      :per-page="1"
      :mouse-drag="false"
      :autoplay="true"
      :navigationEnabled="false"
      :loop="true"
      paginationPosition="bottom-overlay"
      paginationColor="#777"
      paginationActiveColor="#fff"
      :autoplayTimeout="5000"
    >
      <slide v-for="item in carouselItem" :key="item.phone">
        <a :href="'tel:'+item.phone" class="hover:opacity-75">
          <img
            v-lazy="'/corona/public/assets/images/' + item.image"
            class="object-fill rounded-lg w-96 sm:w-full xl:max-w-lg xl:max-h-lg"
            :alt="item.nama"
            :title="item.nama"
          />
        </a>
      </slide>
    </carousel>
  </div>
</template>
<script>
import Loading from "vue-loading-overlay";
import { Carousel, Slide } from "vue-carousel";
export default {
  data() {
    return {
      carouselItem: [],
      isLoading: false
    };
  },
  components: {
    Carousel,
    Loading,
    Slide
  },
  methods: {
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