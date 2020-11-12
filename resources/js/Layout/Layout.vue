<template>
  <main class="min-h-screen text-gray-800 bg-gray-200">
    <Navbar />
    <div class="container w-full pt-20 pb-20 mx-auto">
      <slot />
    </div>
    <back-to-top>
      <i
        class="p-4 mb-8 text-white bg-blue-600 rounded-full shadow-md lg:mb-0 lg:p-6 hover:shadow-lg lg:text-lg fas fa-arrow-up"
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
};
</script>