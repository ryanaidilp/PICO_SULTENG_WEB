<template>
  <div class="flex flex-row w-full text-sm text-blue-600 md:text-base hover:text-blue-400">
    <inertia-link class="mx-auto" :href="linkUrl">
      Lihat Selengkapnya
      <i class="fas fa-angle-right" aria-hidden="true"></i>
    </inertia-link>
  </div>
</template>

<script>
export default {
  props: ["linkUrl"],
};
</script>