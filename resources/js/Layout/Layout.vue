<template>
  <main class="min-h-screen text-gray-800 bg-gray-200">
    <Navbar @change-page="content_trigger = false" />
    <div class="container w-full pt-20 pb-20 mx-auto">
      <transition name="slide-fade" mode="out-in">
        <main v-if="content_trigger">
          <slot />
        </main>
      </transition>
    </div>
    <back-to-top>
      <i
        class="px-5 py-4 mb-8 text-white bg-blue-600 rounded-full shadow-md  lg:mb-0 hover:shadow-lg lg:text-lg fas fa-arrow-up"
      ></i>
    </back-to-top>
  </main>
</template>

<script>
import Navbar from "@/shared/Navbar";
export default {
  components: {
    Navbar,
  },
  data() {
    return {
      content_trigger: false,
    };
  },
  methods: {
    toggleContent() {
      this.content_trigger = !this.content_trigger;
    },
  },
  mounted() {
    this.content_trigger = true;
  },
};
</script>

<style>
.slide-fade-enter-active {
  transition: all 0.3s ease;
}
.slide-fade-leave-active {
  transition: all 0.5s ease-out;
}

.slide-fade-enter-to,
.slide-leave {
  opacity: 1;
}

.slide-fade-enter
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateY(-10px);
  opacity: 0;
}

.slide-fade-leave-to {
  transform: translateY(10px);
  opacity: 0;
}
</style>