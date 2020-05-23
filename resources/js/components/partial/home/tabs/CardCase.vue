<template>
  <div class="w-full p-3 lg:w-1/3">
    <div class="p-6 rounded-lg shadow-lg" :class="bg_card">
      <div class="flex flex-row items-center">
        <div class="flex-1 w-3/5 text-left">
          <h5 class="text-3xl font-bold">{{ title }}</h5>
          <h5 class="text-base text-left xl:text-xl">Sulawesi Tengah</h5>
          <h5 class="mt-2 text-xs md:text-base">Indonesia</h5>
        </div>
        <div class="w-1/5 ml-2 text-left">
          <h5 class="text-xl font-bold md:text-3xl" :class="text_color">-</h5>
          <h5 class="text-3xl font-bold md:text-lg xl:text-3xl">{{ cumulative_local }}</h5>
          <h5 class="mt-2 text-xs font-semibold md:text-base">{{ cumulative_national }}</h5>
        </div>
        <div class="flex flex-col justify-center justify-between w-1/5 ml-2 text-center">
          <h5 class="text-4xl font-bold" :class="text_color">-</h5>
          <h5 class="p-0 text-xl font-semibold text-white rounded-lg" :class="bg_new">+ {{ new_local }}</h5>
          <h5 class="mt-2 text-base font-semibold text-white rounded-md md:mt-4" :class="bg_new">+ {{ new_national }}</h5>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
    props: ['title', 'cumulative_local', 'new_local', 'cumulative_national', 'new_national', 'bg_card', 'bg_new', 'text_color'],
}
</script>