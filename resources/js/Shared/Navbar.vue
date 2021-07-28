<template>
  <div class="z-50 text-gray-600">
    <nav
      ref="header"
      class="fixed top-0 w-full bg-white shadow-md main-nav-top"
    >
      <div
        class="container flex flex-wrap items-center w-full pt-2 pb-3 mx-auto mt-0 "
      >
        <div class="w-1/2 pl-2 md:pl-0">
          <a
            class="flex flex-wrap text-gray-900 no-underline hover:no-underline"
            :href="route('home')"
          >
            <div class="hidden mt-2 mr-3 md:mt-1 md:block">
              <img
                :src="asset('/images/logo.png')"
                alt="PICO"
                class="w-5 h-5 md:w-10 md:h-10"
              />
            </div>
            <div>
              <span class="text-xs font-semibold text-gray-800 md:text-lg"
                >Pusat Informasi COVID-19</span
              >
              <br />
              <span class="text-xs text-gray-800 md:text-sm"
                >Provinsi Sulawesi Tengah</span
              >
            </div>
          </a>
        </div>

        <div class="w-1/2 pr-0">
          <div class="relative flex float-right">
            <div
              class="relative z-20 flex-grow hidden w-full mt-2 text-sm bg-white  lg:block"
            >
              <ul class="items-center flex-1 px-4 list-reset lg:flex md:px-0">
                <li class="my-2 mr-6 md:my-0">
                  <inertia-link
                    :href="route('home')"
                    :class="isActive('home')"
                    @click.prevent="changePage(route('home'))"
                    class="block py-1 pl-1 text-gray-500 no-underline align-middle border-b-2 border-white  md:py-3 hover:text-gray-900 hover:border-blue-600"
                    exact
                  >
                    <span class="pb-1 text-sm font-semibold md:pb-0"
                      >Beranda</span
                    >
                  </inertia-link>
                </li>
                <li class="my-2 mr-6 md:my-0">
                  <inertia-link
                    :href="route('data')"
                    :class="isActive('data')"
                    @click.prevent="changePage(route('data'))"
                    class="block py-1 pl-1 text-gray-500 no-underline align-middle border-b-2 border-white  md:py-3 hover:text-gray-900 hover:border-blue-500"
                  >
                    <span class="pb-1 text-sm font-semibold md:pb-0">Data</span>
                  </inertia-link>
                </li>
                <li class="my-2 mr-6 md:my-0">
                  <inertia-link
                    :href="route('vaccine')"
                    :class="isActive('vaccine')"
                    @click.prevent="changePage(route('vaccine'))"
                    class="block py-1 pl-1 text-gray-500 no-underline align-middle border-b-2 border-white  md:py-3 hover:text-gray-900 hover:border-blue-500"
                  >
                    <span class="pb-1 text-sm font-semibold md:pb-0"
                      >Vaksin</span
                    >
                  </inertia-link>
                </li>
                <li class="my-2 mr-6 md:my-0">
                  <inertia-link
                    :href="route('self-isolation')"
                    :class="isActive('self-isolation')"
                    @click.prevent="changePage(route('self-isolation'))"
                    class="block py-1 pl-1 text-gray-500 no-underline align-middle border-b-2 border-white  md:py-3 hover:text-gray-900 hover:border-blue-500"
                  >
                    <span class="pb-1 text-sm font-semibold md:pb-0"
                      >Isoman</span
                    >
                  </inertia-link>
                </li>
                <li class="my-2 mr-6 md:my-0">
                  <inertia-link
                    :href="route('contact')"
                    :class="isActive('contact')"
                    @click.prevent="changePage(route('contact'))"
                    class="block py-1 pl-1 text-gray-500 no-underline align-middle border-b-2 border-white  md:py-3 hover:text-gray-900 hover:border-blue-500"
                  >
                    <span class="pb-1 text-sm font-semibold md:pb-0"
                      >Kontak</span
                    >
                  </inertia-link>
                </li>
                <li class="my-2 mr-6 md:my-0">
                  <inertia-link
                    :href="route('wiki')"
                    :class="isActive('wiki')"
                    @click.prevent="changePage(route('wiki'))"
                    class="block py-1 pl-1 text-gray-500 no-underline align-middle border-b-2 border-white  md:py-3 hover:text-gray-900 hover:border-blue-500"
                  >
                    <span class="pb-1 text-sm font-semibold md:pb-0">Wiki</span>
                  </inertia-link>
                </li>
                <li class="my-2 mr-6 md:my-0">
                  <a
                    href="https://banuacoders.com/app/pico"
                    target="_blank"
                    class="block px-3 py-2 text-sm font-bold text-center text-white no-underline align-middle bg-blue-500 rounded-lg  hover:bg-blue-700"
                  >
                    Download App
                  </a>
                </li>
              </ul>
            </div>

            <div class="block pr-4 lg:hidden">
              <button
                @click="toggleMenu"
                ref="nav-toggle"
                class="flex items-center px-3 py-2 text-gray-500 border border-gray-600 rounded appearance-none  hover:text-gray-900 hover:border-blue-500 focus:outline-none"
              >
                <transition name="fade" mode="out-in">
                  <svg
                    v-if="!showDropdown"
                    class="w-3 h-3 fill-current"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                  </svg>
                  <i v-else class="fas fa-times hover:text-blue-500"></i>
                </transition>
              </button>
            </div>
          </div>
        </div>

        <div
          class="fixed bottom-0 left-0 w-full h-16 px-2 text-center bg-gray-900  lg:hidden"
        >
          <div class="w-full mx-auto">
            <ul class="flex flex-row text-center">
              <li class="flex-1 mr-3">
                <inertia-link
                  :href="route('home')"
                  :class="isActive('home')"
                  @click.prevent="changePage(route('home'))"
                  class="block py-1 pl-1 text-white no-underline align-middle border-b-2 border-gray-800  hover:text-blue-500 hover:border-blue-500"
                >
                  <i class="pr-0 fas fa-home"></i>
                  <span class="block pb-1 text-xs">Beranda</span>
                </inertia-link>
              </li>
              <li class="flex-1 mr-3">
                <inertia-link
                  :href="route('data')"
                  :class="isActive('data')"
                  @click.prevent="changePage(route('data'))"
                  class="block py-1 pl-1 text-white no-underline align-middle border-b-2 border-gray-800  hover:text-blue-500 hover:border-blue-500"
                >
                  <i class="pr-0 fas fa-chart-bar"></i>
                  <span class="block pb-1 text-xs">Data</span>
                </inertia-link>
              </li>
              <li class="flex-1 mr-3">
                <inertia-link
                  :href="route('contact')"
                  :class="isActive('contact')"
                  @click.prevent="changePage(route('contact'))"
                  class="block py-1 pl-1 text-white no-underline align-middle border-b-2 border-gray-800  hover:text-blue-500 hover:border-blue-500"
                >
                  <i class="pr-0 fas fa-address-book"></i>
                  <span class="block pb-1 text-xs">Kontak</span>
                </inertia-link>
              </li>
              <li class="flex-1 mr-3">
                <a
                  href="#"
                  @click.prevent="toggleMenu"
                  class="block py-1 pl-1 text-white no-underline align-middle border-b-2 border-gray-800  hover:text-blue-500 hover:border-blue-500"
                >
                  <i class="fas fa-ellipsis-h"></i>
                  <span class="block pb-1 text-xs">Lainnya</span>
                </a>
              </li>
            </ul>
          </div>
        </div>

        <transition name="fade" mode="out-in">
          <div
            v-if="showDropdown"
            class="z-20 flex-grow w-full mt-2 bg-white border-t-2 border-gray-300  lg:hidden"
            ref="nav-content"
          >
            <h2 class="m-2 font-semibold">Menu</h2>
            <hr />
            <ul class="items-center flex-1 px-1 list-reset lg:flex md:px-0">
              <li class="my-2 md:my-0">
                <inertia-link
                  :href="route('vaccine')"
                  :class="isActive('vaccine')"
                  @click.prevent="changePage(route('vaccine'))"
                  target="_blank"
                  class="flex justify-between py-2 text-center text-gray-600 no-underline align-middle border-b-2 border-gray-300  hover:text-blue-500 hover:border-blue-500"
                >
                  <i class="px-3 fas fa-syringe"></i>
                  <span class="px-3">Vaksin</span>
                </inertia-link>
              </li>
              <li class="my-2 md:my-0">
                <inertia-link
                  :href="route('self-isolation')"
                  :class="isActive('self-isolation')"
                  @click.prevent="changePage(route('self-isolation'))"
                  target="_blank"
                  class="flex justify-between py-2 text-center text-gray-600 no-underline align-middle border-b-2 border-gray-300  hover:text-blue-500 hover:border-blue-500"
                >
                  <i class="px-3 fas fa-procedures"></i>
                  <span class="px-3">Isoman</span>
                </inertia-link>
              </li>
              <li class="my-2 md:my-0">
                <inertia-link
                  :href="route('wiki')"
                  :class="isActive('wiki')"
                  @click.prevent="changePage(route('wiki'))"
                  target="_blank"
                  class="flex justify-between py-2 text-center text-gray-600 no-underline align-middle border-b-2 border-gray-300  hover:text-blue-500 hover:border-blue-500"
                >
                  <i class="px-3 fas fa-question"></i>
                  <span class="px-3">Wiki</span>
                </inertia-link>
              </li>
              <li class="mx-auto my-2 md:my-0">
                <a
                  href="https://banuacoders.com/app/pico"
                  target="_blank"
                  class="block py-2 text-center text-white no-underline align-middle bg-blue-500 rounded-lg  hover:bg-blue-700"
                >
                  <span class="px-3 text-sm md:pb-0">Download App</span>
                </a>
              </li>
            </ul>
          </div>
        </transition>
      </div>
    </nav>
  </div>
</template>
<script>
export default {
  data() {
    return {
      showDropdown: false,
    };
  },
  methods: {
    isActive(link) {
      return this.route().current(link)
        ? "text-blue-500 border-blue-500 hover:text-blue-800"
        : "";
    },
    changePage(page) {
      this.$emit("change-page");
      this.$inertia.visit(page);
    },
    toggleMenu() {
      this.showDropdown = !this.showDropdown;
    },
  },
  mounted() {
    var navMenuDiv = this.$refs["nav-content"];
    var navMenu = this.$refs["nav-toggle"];

    // document.onclick = check;

    // function check(e) {
    //   var target = (e && e.target) || (e && e.srcElement);

    //   //Nav Menu
    //   if (!checkParent(target, navMenuDiv)) {
    //     // click NOT on the menu
    //     if (checkParent(target, navMenu)) {
    //       // click on the link
    //       if (navMenuDiv.classList.contains("hidden")) {
    //         navMenuDiv.classList.remove("hidden");
    //       } else {
    //         navMenuDiv.classList.add("hidden");
    //       }
    //     } else {
    //       // click both outside link and outside menu, hide menu
    //       navMenuDiv.classList.add("hidden");
    //     }
    //   }
    // }

    // function checkParent(t, elm) {
    //   while (t.parentNode) {
    //     if (t == elm) {
    //       return true;
    //     }
    //     t = t.parentNode;
    //   }
    //   return false;
    // }
  },
};
</script>

<style scoped>
.main-nav-top {
  z-index: 200;
}
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>