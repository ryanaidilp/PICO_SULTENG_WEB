<template>
  <div class="z-50 text-gray-600">
    <nav ref="header" class="fixed top-0 w-full bg-white shadow-md main-nav-top">
      <div class="container flex flex-wrap items-center w-full pt-2 pb-3 mx-auto mt-0">
        <div class="w-1/2 pl-2 md:pl-0">
          <a class="flex flex-wrap text-gray-900 no-underline hover:no-underline" href="https://banuacoders.com/corona">
            <div class="hidden mt-2 mr-3 md:mt-1 md:block">
              <img src="/corona/public/assets/images/logo.png" alt="PICO" class="w-5 h-5 md:w-10 md:h-10" />
            </div>
            <div>
              <span class="text-xs font-bold md:text-lg">Pusat Informasi COVID-19</span>
              <br />
              <span class="text-xs md:text-base">Provinsi Sulawesi Tengah</span>
            </div>
          </a>
        </div>

        <div class="w-1/2 pr-0">
          <div class="relative flex inline-block float-right">
            <div class="relative z-20 flex-grow hidden w-full mt-2 text-sm bg-white lg:block">
              <ul class="items-center flex-1 px-4 list-reset lg:flex md:px-0">
                <li class="my-2 mr-6 md:my-0">
                  <router-link
                    to="/corona"
                    class="block py-1 pl-1 text-gray-500 no-underline align-middle border-b-2 border-white md:py-3 hover:text-gray-900 hover:border-blue-600"
                    exact
                  >
                    <span class="pb-1 text-sm font-semibold md:pb-0">Beranda</span>
                  </router-link>
                </li>
                <li class="my-2 mr-6 md:my-0">
                  <router-link
                    to="/corona/data"
                    class="block py-1 pl-1 text-gray-500 no-underline align-middle border-b-2 border-white md:py-3 hover:text-gray-900 hover:border-blue-500"
                  >
                    <span class="pb-1 text-sm font-semibold md:pb-0">Data</span>
                  </router-link>
                </li>
                <li class="my-2 mr-6 md:my-0">
                  <router-link
                    to="/corona/kontak"
                    class="block py-1 pl-1 text-gray-500 no-underline align-middle border-b-2 border-white md:py-3 hover:text-gray-900 hover:border-blue-500"
                  >
                    <span class="pb-1 text-sm font-semibold md:pb-0">Kontak</span>
                  </router-link>
                </li>
                <li class="my-2 mr-6 md:my-0">
                  <router-link
                    to="/corona/wiki"
                    class="block py-1 pl-1 text-gray-500 no-underline align-middle border-b-2 border-white md:py-3 hover:text-gray-900 hover:border-blue-500"
                  >
                    <span class="pb-1 text-sm font-semibold md:pb-0">Wiki</span>
                  </router-link>
                </li>
                <li class="my-2 mr-6 md:my-0">
                  <a
                    href="https://banuacoders.com/app/pico"
                    target="_blank"
                    class="block py-2 text-white no-underline align-middle bg-blue-700 rounded-lg hover:text-gray-900 hover:bg-blue-500"
                  >
                    <span class="px-3 text-sm font-bold md:pb-0">Download App</span>
                  </a>
                </li>
              </ul>
            </div>

            <div class="block pr-4 lg:hidden">
              <button
                ref="nav-toggle"
                class="flex items-center px-3 py-2 text-gray-500 border border-gray-600 rounded appearance-none hover:text-gray-900 hover:border-blue-500 focus:outline-none"
              >
                <svg
                  class="w-3 h-3 fill-current"
                  viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <title>Menu</title>
                  <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                </svg>
              </button>
            </div>
          </div>
        </div>

        <div class="fixed bottom-0 left-0 w-full h-16 px-2 text-center bg-gray-900 lg:hidden">
            <div class="w-full mx-auto">
               <ul class="flex flex-row text-center">
                  <li class="flex-1 mr-3">
                     <router-link to="/corona" class="block py-1 pl-1 text-gray-600 no-underline align-middle border-b-2 border-gray-800 hover:text-blue-500 hover:border-blue-500">
                     <i class="pr-0 fas fa-home"></i><span class="block pb-1 text-xs">Beranda</span>
                     </router-link>
                  </li>
                  <li class="flex-1 mr-3">
                     <router-link to="/corona/data" class="block py-1 pl-1 text-gray-600 no-underline align-middle border-b-2 border-gray-800 hover:text-blue-500 hover:border-blue-500">
                     <i class="pr-0 fas fa-chart-bar"></i><span class="block pb-1 text-xs">Data</span>
                     </router-link>
                  </li>
                  <li class="flex-1 mr-3">
                     <router-link to="/corona/kontak" class="block py-1 pl-1 text-white text-gray-600 no-underline align-middle border-b-2 border-gray-800 hover:text-blue-500 hover:border-blue-500">
                     <i class="pr-0 fas fa-address-book"></i><span class="block pb-1 text-xs ">Kontak</span>
                     </router-link>
                  </li>
                  <li class="flex-1 mr-3">
                     <router-link to="/corona/wiki" class="block py-1 pl-1 text-gray-600 no-underline align-middle border-b-2 border-gray-800 hover:text-blue-500 hover:border-blue-500">
                     <i class="pr-0 fas fa-question"></i><span class="block pb-1 text-xs ">Wiki</span>
                     </router-link>
                  </li>
               </ul>
            </div>
         </div>

        <div class="z-20 flex-grow hidden w-full mt-2 bg-white lg:hidden" ref="nav-content">
          <ul class="items-center flex-1 px-4 list-reset lg:flex md:px-0">
            <li class="my-2 mr-6 md:my-0">
              <a
                href="https://banuacoders.com/app/pico"
                target="_blank"
                class="block py-2 text-center text-white no-underline align-middle bg-blue-700 rounded-lg hover:text-gray-900 hover:bg-blue-500"
              >
                <span class="px-3 text-sm md:pb-0">Download App</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</template>
<script>
export default {
  mounted() {
    var navMenuDiv = this.$refs["nav-content"];
    var navMenu = this.$refs["nav-toggle"];

    document.onclick = check;

    function check(e) {
      var target = (e && e.target) || (event && event.srcElement);

      //Nav Menu
      if (!checkParent(target, navMenuDiv)) {
        // click NOT on the menu
        if (checkParent(target, navMenu)) {
          // click on the link
          if (navMenuDiv.classList.contains("hidden")) {
            navMenuDiv.classList.remove("hidden");
          } else {
            navMenuDiv.classList.add("hidden");
          }
        } else {
          // click both outside link and outside menu, hide menu
          navMenuDiv.classList.add("hidden");
        }
      }
    }

    function checkParent(t, elm) {
      while (t.parentNode) {
        if (t == elm) {
          return true;
        }
        t = t.parentNode;
      }
      return false;
    }
  }
};
</script>

<style lang="scss" scoped>
.main-nav-top {
    z-index: 200;
  }
</style>