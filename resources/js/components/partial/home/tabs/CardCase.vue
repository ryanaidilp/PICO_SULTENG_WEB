<template>
  <div class="w-full p-3 lg:w-1/4">
    <div class="p-6 rounded-lg shadow-lg" :class="bg_card">
      <div class="container flex items-center">
        <div class="flex-row flex-1 w-3/5 text-left">
          <h5 class="text-3xl font-bold">{{ title }}</h5>
          <h5 class="mt-2 text-lg text-left md:mt-0 md:text-sm">Sulawesi Tengah</h5>
          <h5 class="mt-2 text-base md:text-sm">Indonesia</h5>
        </div>
        <div class="w-1/5 ml-2 text-center">
          <h5 class="text-2xl font-bold" :class="text_color">-</h5>
          <h5 class="text-4xl font-bold md:text-2xl">{{ cumulative_local }}</h5>
          <h5 class="mt-2 text-xs font-semibold md:text-sm">{{ cumulative_national }}</h5>
        </div>
        <div class="flex flex-col justify-center justify-between w-1/5 ml-2 text-center">
          <h5 class="text-3xl font-bold" :class="text_color">-</h5>
          <h5 class="p-0 font-semibold text-white rounded-lg text-md" :class="bg_new">{{ new_local >= 0 ? "+" + new_local : new_local }}</h5>
          <h5 class="mt-5 text-base font-semibold text-white rounded-md md:mt-3 md:text-sm" :class="bg_new">{{ new_national >= 0 ? "+" + new_national : new_national }}</h5>
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