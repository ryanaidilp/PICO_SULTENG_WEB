<template>
  <div class="transition-all rounded-lg shadow-md hover:shadow-xl">
    <img
      :src="asset(donation.image)"
      :alt="donation.title"
      @click="show"
      class="object-contain rounded-t-lg hover:cursor-pointer"
    />
    <div class="flex flex-col px-2 pb-4">
      <h2 class="my-2 text-xl text-bold">{{ donation.title }}</h2>
      <hr />
      <p>
        <span class="my-2 font-semibold text-gray-600">Inisiator</span>
        <hyperlink :href="donation.url" :label="donation.initiator" />
      </p>
      <hr />
      <div class="py-4 space-y-2 text-xs">
        <contact-button
          v-for="contact in donation.contacts"
          :key="contact.id"
          :contact="contact"
          text-size="text-sm"
          margin-right="mr-2"
        />
      </div>
      <hr v-if="donation.accept_noncash" />
      <p v-if="donation.accept_noncash" class="mt-2 font-semibold">
        Alamat Pengiriman Bantuan Non-Tunai
      </p>
      <div v-if="donation.accept_noncash" class="py-4">
        <i class="text-gray-500 fas fa-map-marker"></i>
        {{ donation.delivery_address }}
      </div>
      <hr />
      <p class="mt-2 font-semibold">Rekening</p>
      <div class="grid grid-cols-1 gap-2 py-4">
        <div
          v-for="account in donation.accounts"
          :key="account.id"
          class="flex flex-row items-center justify-between"
        >
          <img
            :src="account.bank_logo"
            :alt="account.bank"
            class="object-contain w-1/5 h-12"
          />
          <div class="flex flex-col w-3/5 text-sm text-center">
            <p class="italic font-bold text-gray-600">
              {{ account.bank }}
            </p>
            <p class="font-bold">{{ account.number }}</p>
            <span
              >a/n <b>{{ account.name }}</b></span
            >
          </div>
          <div class="items-center">
            <button type="button" @click="doCopy(account.number)">
              <i class="fas fa-clipboard"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Hyperlink from "@/components/Hyperlink";
import ContactButton from "@/components/ContactButton";
export default {
  props: {
    donation: {
      type: Object,
      required: true,
    },
  },
  components: {
    Hyperlink,
    ContactButton,
  },
  methods: {
    show() {
      this.$viewerApi({
        images: [this.asset(this.donation.image)],
      });
    },
    doCopy(value) {
      var self = this;
      this.$copyText(value).then(
        function (e) {
          self.$swal({
            title: "Sukses!",
            icon: "success",
            text: "Berhasil menyalin nomor rekening!",
          });
          console.log(e);
        },
        function (e) {
          self.$swal({
            title: "Sukses!",
            icon: "error",
            text: "Gagal menyalin nomor rekening!",
          });
          console.error(e);
        }
      );
    },
  },
};
</script>