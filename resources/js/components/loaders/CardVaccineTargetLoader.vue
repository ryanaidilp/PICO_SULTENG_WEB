<template>
  <content-loader
    :height="308"
    :width="1504"
    :speed="2"
    primaryColor="#f3f3f3"
    secondaryColor="#ecebeb"
  >
    <rect x="0" y="0" rx="10" ry="10" width="742" height="144" />
    <rect x="762" y="0" rx="10" ry="10" width="742" height="144" />
    <rect x="0" y="162" rx="10" ry="10" width="742" height="144" />
    <rect x="762" y="162" rx="10" ry="10" width="742" height="144" />
  </content-loader>
</template>
<script>
import { ContentLoader } from "vue-content-loader";
export default {
  components: {
    ContentLoader,
  },
};
</script>