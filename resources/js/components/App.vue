<template>
  <div class="w-full bg-gray-200">
    <Navigation :class="{'hidden': $route.meta.hideNavigation}"/>
    <keep-alive>
      <router-view :key="$route.fullPath" class="container w-full pt-20 pb-20 mx-auto"></router-view>
    </keep-alive>
    <back-to-top>
      <i
        class="p-4 mb-8 text-white bg-blue-600 rounded-full shadow-md lg:mb-0 lg:p-6 hover:shadow-lg lg:text-lg fas fa-arrow-up"
      ></i>
    </back-to-top>
  </div>
</template>

<script>
import Navigation from "./partial/NavComponent";
export default {
  components: {
    Navigation
  }
};
</script>
