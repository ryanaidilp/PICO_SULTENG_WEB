<template>
  <div class="relative pl-5 mb-8 ">
    <div class="absolute top-0 bottom-0 left-0 w-1 bg-blue-300" />
    <h5 class="inline-block text-lg font-bold leading-loose">{{ nama }}</h5>
    <p class="opacity-75 text-md">{{ alamat }}</p>
    <p class="text-sm">
      <a
        class="inline-block px-4 py-1 mt-2 mr-2 text-xs text-white bg-blue-500 rounded hover:opacity-50"
        :href="`tel:${telepon}`"
        target="_blank"
        :title="`Telpon ${telepon}`"
      >
        <i class="mr-1 fas fa-phone fa-sm" />
        <span>{{ telepon }}</span>
      </a>
      <a
        class="inline-block px-4 py-1 mt-2 mr-2 text-xs text-white bg-green-500 rounded hover:opacity-50"
        :href="`mailto:${email}`"
        target="_blank"
        :title="`Kirim Email ke ${email}`"
      >
        <i class="mr-1 fas fa-mail-bulk fa-sm" />
        <span>{{ email }}</span>
      </a>
    </p>
  </div>
</template>

<script>
export default {
  props: {
    nama: {
      type: String,
      default: ""
    },
    alamat: {
      type: String,
      default: ""
    },
    email: {
      type: String,
      default: ""
    },
    telepon: {
      type: String,
      default: ""
    }
  }
};
</script>

<style>
</style>
