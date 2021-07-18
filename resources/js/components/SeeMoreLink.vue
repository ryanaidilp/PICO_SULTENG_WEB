<template>
  <div
    class="flex flex-row w-full text-base text-blue-600  md:text-lg hover:text-blue-400"
  >
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