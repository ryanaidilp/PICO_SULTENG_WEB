<template>
  <div
    class="p-5 bg-white border border-gray-300 border-solid rounded-lg shadow-md"
  >
    <div style="">
      <ContentLoader
        speed="{2}"
        width="{400}"
        height="{80}"
        primaryColor="rgba(214, 210, 210,0.6)"
        secondaryColor="rgba(214, 210, 210,1)"
        style="max-width: 400px"
      >
        <rect x="{0}" y="{0}" rx="{8}" ry="{6}" width="50%" height="16"></rect>
        <rect x="{0}" y="{30}" rx="{8}" ry="{6}" width="66%" height="16"></rect>
        <rect x="{0}" y="{64}" rx="{8}" ry="{6}" width="20%" height="16"></rect>
      </ContentLoader>
    </div>
    <div class="mb-8 bg-white border border-solid digital-signage text-title">
      <h4 class="text-center">
        <b class="uppercase" :class="textColor">{{ label }}</b>
      </h4>
      <div class="flex flex-row mt-3 font-bold text-center" :class="textColor">
        <div class="w-1/2">
          <b class="text-black text-md">Sulawesi Tengah</b>
          <div class="text-3xl">
            {{ localTotal }}
          </div>
          <div>
            <span class="mr-1 rounded-full bg-confirmation-selesai px-custom-1">
              <i
                class="text-xs cursor-pointer fas"
                :class="checkIcon(localNew)"
              ></i>
            </span>
            {{ localNew }}
          </div>
        </div>
        <div class="w-1/2">
          <b class="text-black text-md">Indonesia</b>
          <div class="text-3xl">
            {{ nationalTotal }}
          </div>
          <div>
            <span
              class="mr-1 rounded-full bg-confirmation-selesai px-custom-1"
              style=""
            >
              <i class="text-xs fas" :class="checkIcon(nationalNew)"></i>
              />
            </span>
            {{ nationalNew }}
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { ContentLoader } from "vue-content-loader";
export default {
  props: [
    "label",
    "localNew",
    "localTotal",
    "nationalNew",
    "nationalTotal",
    "textColor",
  ],
  components: {
    ContentLoader,
  },
  methods: {
    checkIcon(val) {
      if (val > 0) {
        return  this.textColor + " fa-angle-double-up";
      }
      return  this.textColor + " fa-angle-double-down";
    },
  },
};
</script>