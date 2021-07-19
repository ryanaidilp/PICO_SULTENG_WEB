<template>
  <div class="flex flex-col flex-grow w-full flex-shrinks">
    <div class="flex flex-row items-center bg-white rounded-lg shadow-lg">
      <div class="flex-1 text-center">
        <div
          class="p-2 bg-white border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg "
        >
          <h5 class="font-bold text-gray-600 uppercase md:text-lg">
            {{ title }}
          </h5>
        </div>
        <div class="flex items-center mt-4 flex-column">
          <div class="w-1/2">
            <p class="text-xs md:text-base">Dalam {{ status }}</p>
            <h3 class="text-3xl font-bold">
              {{ formatNumber(activeCase) }}
            </h3>
            <h3 class="text-sm font-bold">
              ({{ newCaseFormat(newCase - newFinishedCase) }})
            </h3>
            <p class="mt-2 text-sm text-gray-600">
              ({{ percentageFormat(activeCasePercentage) }})
            </p>
          </div>
          <div class="w-1/2">
            <p class="text-xs md:text-base">Selesai {{ status }}</p>
            <h3 class="text-3xl font-bold">
              {{ formatNumber(totalFinishedCase) }}
            </h3>
            <h3 class="text-sm font-bold">
              ({{ newCaseFormat(newFinishedCase) }})
            </h3>
            <p class="mt-2 text-sm text-gray-600">
              ({{ percentageFormat(finishedCasePercentage) }})
            </p>
          </div>
        </div>
        <div class="mb-4 text-center">
          <p>Total</p>
          <h3 class="text-3xl font-bold">{{ formatNumber(totalCase) }}</h3>
          <h3 class="text-sm font-bold">
            <i class="fas fa-arrow-up"></i>
            {{ formatNumber(newCase) }}
          </h3>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
const NumberFormat = new Intl.NumberFormat("id");
export default {
  props: {
    title: {
      type: String,
      required: true,
    },
    newCase: {
      type: Number,
      required: true,
    },
    newFinishedCase: {
      type: Number,
      required: true,
    },
    activeCase: {
      type: Number,
      required: true,
    },
    totalCase: {
      type: Number,
      required: true,
    },
    totalFinishedCase: {
      type: Number,
      required: true,
    },
    status: {
      type: String,
      required: true,
    },
  },
  computed: {
    finishedCasePercentage: function () {
      return this.percentage(this.totalFinishedCase, this.totalCase);
    },
    activeCasePercentage: function () {
      return this.percentage(this.activeCase, this.totalCase);
    },
  },
  methods: {
    percentage: function (value, total) {
      let sum = value.toString().replace(".", "");
      let count = total.toString().replace(".", "");
      return ((parseInt(sum) / parseInt(count)) * 100).toFixed(2);
    },
    percentageFormat(value) {
      return NumberFormat.format(value) + "%";
    },
    newCaseFormat(value) {
      var res = "";
      if (value > 0) {
        res = "+" + NumberFormat.format(value);
      } else if (value <= 0) {
        res = NumberFormat.format(value);
      }
      return res;
    },
    formatNumber(value) {
      return NumberFormat.format(value);
    },
  },
};
</script>