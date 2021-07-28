<template>
  <content-loader
    :height="1456"
    :width="1504"
    :speed="2"
    primaryColor="#f3f3f3"
    secondaryColor="#c0c0c0"
  >
    <rect x="0" y="0" rx="10" ry="10" width="742" height="336" />
    <rect x="762" y="0" rx="10" ry="10" width="742" height="336" />
    <rect x="0" y="356" rx="10" ry="10" width="742" height="336" />
    <rect x="762" y="356" rx="10" ry="10" width="742" height="336" />
    <rect x="0" y="712" rx="10" ry="10" width="742" height="336" />
    <rect x="762" y="712" rx="10" ry="10" width="742" height="336" />
    <rect x="0" y="1072" rx="10" ry="10" width="742" height="336" />
    <rect x="762" y="1072" rx="10" ry="10" width="742" height="336" />
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