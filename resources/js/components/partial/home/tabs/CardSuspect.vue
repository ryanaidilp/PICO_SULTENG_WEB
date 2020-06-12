<template>
  <div class="flex flex-col flex-grow w-full lg:w-1/2 flex-shrinks">
    <div class="flex-1 overflow-hidden">
      <div class="p-5 rounded-lg">
        <div class="flex flex-row items-center bg-white rounded-lg shadow-lg">
          <div class="flex-1 text-center">
            <div class="p-2 bg-white border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg">
              <h5 class="font-bold text-gray-600 uppercase md:text-lg">{{ title }}</h5>
            </div>
            <div class="flex items-center mt-4 flex-column">
              <div class="w-1/2">
                <p class="text-xs md:text-base">Dalam {{ status }}</p>
                <h3 class="text-3xl font-bold">{{ active_case }}</h3>
                <h3 class="text-sm font-bold">({{ newCaseFormat(new_case - new_finished_case) }})</h3>
                <p class="mt-2 text-xs text-gray-600">({{ percentageFormat(activeCasePercentage) }})</p>
              </div>
              <div class="w-1/2">
                <p class="text-xs md:text-base">Selesai {{ status }}</p>
                <h3 class="text-3xl font-bold">{{ total_finished_case }}</h3>
                <h3 class="text-sm font-bold">({{ newCaseFormat(new_finished_case) }})</h3>
                <p
                  class="mt-2 text-xs text-gray-600"
                >({{ percentageFormat(finishedCasePercentage) }})</p>
              </div>
            </div>
            <div class="mb-4 text-center">
              <p>Total</p>
              <h3 class="text-3xl font-bold">{{ total_case }}</h3>
              <h3 class="text-sm font-bold">
                <i class="fas fa-arrow-up"></i>
                {{ new_case }}
              </h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: [
    "title",
    "new_case",
    "new_finished_case",
    "active_case",
    "total_case",
    "total_finished_case",
    "status"
  ],
  computed: {
    finishedCasePercentage: function() {
      return this.percentage(
        this.$props.total_finished_case,
        this.$props.total_case
      );
    },
    activeCasePercentage: function() {
      return this.percentage(this.$props.active_case, this.$props.total_case);
    }
  },
  methods: {
    percentage: function(value, total) {
      let sum = value.toString().replace(".", "");
      let count = total.toString().replace(".", "");
      return ((parseInt(sum) / parseInt(count)) * 100).toFixed(2);
    },
    percentageFormat(value) {
      return value + "%";
    },
    newCaseFormat(value) {
      var res = "";
      if (value > 0) {
        res = "+" + value;
      } else if (value <= 0) {
        res = value;
      }
      return res;
    }
  }
};
</script>