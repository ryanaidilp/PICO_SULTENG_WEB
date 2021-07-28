<template>
  <div class="flex flex-row justify-center w-full mt-4 md:justify-start">
    <div
      v-for="symptomp in symptomps"
      :key="symptomp.id"
      class="flex flex-col p-4 mr-4 text-center align-text-bottom bg-white rounded-md shadow  hover:shadow-xl"
    >
      <img
        v-lazy="asset(symptomp.image)"
        :alt="symptomp.detail"
        :title="symptomp.detail"
      />
      <p class="text-xs font-semibold md:text-base">{{ symptomp.detail }}</p>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      symptomps: [
        {
          id: 1,
          image: "/images/caugh.png",
          detail: "Batuk",
        },
        {
          id: 2,
          image: "/images/fever.png",
          detail: "Demam",
        },
        {
          id: 3,
          image: "/images/headache.png",
          detail: "Sakit Kepala",
        },
      ],
    };
  },
};
</script>