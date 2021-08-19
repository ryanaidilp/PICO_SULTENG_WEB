(self.webpackChunk=self.webpackChunk||[]).push([[226,321],{3933:t=>{var e=/^(attrs|props|on|nativeOn|class|style|hook)$/;function a(t,e){return function(){t&&t.apply(this,arguments),e&&e.apply(this,arguments)}}t.exports=function(t){return t.reduce((function(t,s){var r,n,i,l,o;for(i in s)if(r=t[i],n=s[i],r&&e.test(i))if("class"===i&&("string"==typeof r&&(o=r,t[i]=r={},r[o]=!0),"string"==typeof n&&(o=n,s[i]=n={},n[o]=!0)),"on"===i||"nativeOn"===i||"hook"===i)for(l in n)r[l]=a(r[l],n[l]);else if(Array.isArray(r))t[i]=r.concat(n);else if(Array.isArray(n))t[i]=[r].concat(n);else for(l in n)r[l]=n[l];else t[i]=s[i];return t}),{})}},6357:(t,e,a)=>{"use strict";a.d(e,{pO:()=>i});var s=a(3933),r=a.n(s),n=function(){return Math.random().toString(36).substring(2)},i={name:"ContentLoader",functional:!0,props:{width:{type:[Number,String],default:400},height:{type:[Number,String],default:130},speed:{type:Number,default:2},preserveAspectRatio:{type:String,default:"xMidYMid meet"},baseUrl:{type:String,default:""},primaryColor:{type:String,default:"#f9f9f9"},secondaryColor:{type:String,default:"#ecebeb"},primaryOpacity:{type:Number,default:1},secondaryOpacity:{type:Number,default:1},uniqueKey:{type:String},animate:{type:Boolean,default:!0}},render:function(t,e){var a=e.props,s=e.data,i=e.children,l=a.uniqueKey?a.uniqueKey+"-idClip":n(),o=a.uniqueKey?a.uniqueKey+"-idGradient":n();return t("svg",r()([s,{attrs:{viewBox:"0 0 "+a.width+" "+a.height,version:"1.1",preserveAspectRatio:a.preserveAspectRatio}}]),[t("rect",{style:{fill:"url("+a.baseUrl+"#"+o+")"},attrs:{"clip-path":"url("+a.baseUrl+"#"+l+")",x:"0",y:"0",width:a.width,height:a.height}}),t("defs",[t("clipPath",{attrs:{id:l}},[i||t("rect",{attrs:{x:"0",y:"0",rx:"5",ry:"5",width:a.width,height:a.height}})]),t("linearGradient",{attrs:{id:o}},[t("stop",{attrs:{offset:"0%","stop-color":a.primaryColor,"stop-opacity":a.primaryOpacity}},[a.animate?t("animate",{attrs:{attributeName:"offset",values:"-2; 1",dur:a.speed+"s",repeatCount:"indefinite"}}):null]),t("stop",{attrs:{offset:"50%","stop-color":a.secondaryColor,"stop-opacity":a.secondaryOpacity}},[a.animate?t("animate",{attrs:{attributeName:"offset",values:"-1.5; 1.5",dur:a.speed+"s",repeatCount:"indefinite"}}):null]),t("stop",{attrs:{offset:"100%","stop-color":a.primaryColor,"stop-opacity":a.primaryOpacity}},[a.animate?t("animate",{attrs:{attributeName:"offset",values:"-1; 2",dur:a.speed+"s",repeatCount:"indefinite"}}):null])])])])}}},2226:(t,e,a)=>{"use strict";a.r(e),a.d(e,{default:()=>f});var s=a(2281),r=a(9182),n=a(6357),i=a(6551);const l={props:{hospitals:{type:Array,required:!0,default:function(){return[]}}},methods:{checkBed:function(t){return"https://yankes.kemkes.go.id/app/siranap/tempat_tidur?kode_rs=".concat(t,"&jenis=1&propinsi=72prop")}},components:{ContentLoader:n.pO,ContactButton:i.Z}};var o=a(1900);const c=(0,o.Z)(l,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"w-full"},[a("div",{staticClass:"p-6 mx-4 mt-8 bg-white rounded-lg shadow-md"},[a("h3",{staticClass:"text-lg font-bold text-left lg:text-3xl"},[t._v("\n      Daftar Rumah Sakit Rujukan\n    ")]),t._v(" "),a("p",{staticClass:"mt-4 text-sm md:text-base"},[t._v("\n      Berikut ini adalah rumah sakit yang menjadi rujukan untuk pasien dengan\n      status Pasien dalam Pengawasan. Anda harus mengunjungi fasilitas\n      kesehatan terdekat terlebih dahulu seperti klinik/rumah sakit umum\n      sebelum akhirnya dapat dirujuk ke rumah sakit di bawah ini.\n    ")]),t._v(" "),t.hospitals.length<=0?a("content-loader"):a("div",{staticClass:"grid grid-cols-1 gap-5 mt-8 md:grid-cols-2 xl:grid-cols-3"},t._l(t.hospitals,(function(e){return a("div",{key:e.id,staticClass:"flex flex-col flex-wrap w-full p-4 border-l-2 border-r-2 border-blue-400 rounded-lg "},[a("h4",{staticClass:"font-bold text-left"},[t._v("\n          "+t._s(e.name)+"\n          "),e.igd_count>0?a("span",{staticClass:"font-normal"},[t._v("\n            ("),a("b",[t._v(t._s(e.igd_count))]),t._v(" IGD tersedia)\n          ")]):a("span",{staticClass:"font-normal text-red-600"},[t._v(" (IGD Penuh!) ")])]),t._v(" "),a("p",{staticClass:"my-2 text-xs text-left"},[a("span",{staticClass:"text-gray-500"},[t._v("Pembaruan Terakhir : ")]),t._v("\n          "+t._s(t.formatDate(e.bed_update))+"\n        ")]),t._v(" "),a("p",{staticClass:"flex-1 my-2 text-xs text-left md:text-sm"},[t._v("\n          "+t._s(e.address)+"\n        ")]),t._v(" "),a("div",{staticClass:"flex-1 space-y-2"},t._l(e.contacts,(function(t){return a("contact-button",{key:t.id,staticClass:"flex-none",attrs:{contact:t,"margin-right":"mr-2"}})})),1),t._v(" "),a("hr",{staticClass:"my-2"}),t._v(" "),a("div",{staticClass:"grid grid-cols-1 gap-5 md:grid-cols-2"},[a("a",{staticClass:"w-full p-2 mx-auto text-sm text-center text-white bg-gray-700 rounded-md  hover:opacity-75 xl:text-base",attrs:{href:"https://maps.google.com/maps?q="+e.latitude+","+e.longitude,target:"_blank"}},[a("i",{staticClass:"fas fa-map"}),t._v(" Lihat di Peta\n          ")]),t._v(" "),a("a",{staticClass:"w-full p-2 mx-auto text-sm text-center text-white bg-pink-700 rounded-md  hover:opacity-75 xl:text-base",attrs:{href:t.checkBed(e.hospital_code),target:"_blank"}},[a("i",{staticClass:"fas fa-procedures"}),t._v(" Lihat Tempat Tidur\n          ")])])])})),0)],1)])}),[],!1,null,null,null).exports;const d={props:{contacts:{type:Array,required:!0},regency:{type:String,default:""},label:{type:String,default:""}},components:{ContactButton:i.Z}};const u=(0,o.Z)(d,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"relative pl-5 mb-8"},[a("div",{staticClass:"absolute top-0 bottom-0 left-0 w-1 bg-blue-300"}),t._v(" "),a("h5",{staticClass:"inline-block text-lg font-bold leading-loose"},[t._v(t._s(t.regency))]),t._v(" "),a("p",{staticClass:"opacity-75 text-md"},[t._v(t._s(t.label))]),t._v(" "),a("div",{staticClass:"mt-4 space-y-2 text-sm"},t._l(t.contacts,(function(t){return a("contact-button",{key:t.id,attrs:{contact:t,"margin-right":"mr-2","is-task-force":""}})})),1)])}),[],!1,null,null,null).exports,p={props:{taskForces:{type:Array,required:!0,default:function(){return[]}}},components:{ContentLoader:n.pO,ContactListItem:u}};const m=(0,o.Z)(p,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"w-full"},[a("div",{staticClass:"p-6 mx-4 mt-8 bg-white rounded-lg shadow-md"},[a("h3",{staticClass:"text-lg font-bold text-left lg:text-3xl"},[t._v("\n      Hotline Gugus Tugas\n    ")]),t._v(" "),a("p",{staticClass:"text-sm md:text-base"},[t._v("\n      Berikut ini adalah nomor telpon tim gugus tugas COVID-19 di Kab/Kota se\n      Sulawesi Tengah.\n    ")]),t._v(" "),t.taskForces.length<=0?a("content-loader"):a("ul",{staticClass:"items-stretch block gap-5 mt-8 lg:grid lg:grid-cols-3"},t._l(t.taskForces,(function(t,e){return a("li",{key:e},[a("ContactListItem",{attrs:{regency:t.regency,label:"Call Center & Hotline Gugus Tugas COVID-19 "+t.regency,contacts:t.contacts}})],1)})),0)],1)])}),[],!1,null,null,null).exports,h={props:{partners:{type:Array,required:!0},hospitals:{type:Array,required:!0},taskForces:{type:Array,required:!0}},components:{Layout:r.Z,Partner:s.default,Hospital:c,TaskForce:m}};const f=(0,o.Z)(h,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("layout",[a("div",{staticClass:"text-gray-800"},[a("h5",{staticClass:"mx-6 mt-8 text-lg font-bold md:text-3xl md:text-left"},[t._v("\n      Kontak Rumah Sakit dan Hotline Gugus Tugas di Kabupaten\n    ")]),t._v(" "),a("p",{staticClass:"mx-6 text-xs md:text-lg md:text-left"},[t._v("\n      Informasi nomor telpon dan alamat rumah sakit yang menjadi rujukan\n      pemeriksaan pasien COVID-19\n    ")]),t._v(" "),a("hospital",{staticClass:"md:mt-16",attrs:{hospitals:t.hospitals}}),t._v(" "),a("task-force",{staticClass:"mt-16",attrs:{"task-forces":t.taskForces}}),t._v(" "),a("Partner",{staticClass:"mt-16",attrs:{partners:t.partners}})],1)])}),[],!1,null,null,null).exports},2281:(t,e,a)=>{"use strict";a.r(e),a.d(e,{default:()=>r});const s={props:{partners:{type:Array,requred:!0}}};const r=(0,a(1900).Z)(s,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"w-full mt-4"},[a("div",{staticClass:"p-6 mx-4 bg-white rounded-lg shadow-lg"},[a("h3",{staticClass:"text-xl font-bold text-center"},[t._v("Pranala Luar")]),t._v(" "),a("div",{staticClass:"grid justify-center w-full md:grid-cols-4"},t._l(t.partners,(function(e){return a("a",{key:e.id,staticClass:"w-full p-2 mt-4 hover:opacity-75",attrs:{href:e.link,target:"_blank"}},[a("img",{directives:[{name:"lazy",rawName:"v-lazy",value:t.asset("/images/partner/"+e.image),expression:"asset(`/images/partner/${partner.image}`)"}],staticClass:"object-contain h-20 mx-auto",attrs:{alt:e.name,title:e.name}})])})),0),t._v(" "),a("hr"),t._v(" "),a("div",{staticClass:"flex content-center justify-center w-full mt-2"},[a("a",{staticClass:"inline-block h-10 p-2 text-center text-gray-800 no-underline  hover:opacity-75 md:h-auto md:p-4",attrs:{href:"https://github.com/ryanaidilp/PICO_SULTENG_WEB",target:"_blank","data-tippy-content":"@github_handle"}},[a("svg",{staticClass:"h-6 fill-current",attrs:{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 32 32",version:"1.1"}},[a("title",[t._v("Lihat projek di GitHub")]),t._v(" "),a("path",{attrs:{d:"M 16 0.394531 C 7.160156 0.394531 0 7.558594 0 16.394531 C 0 23.464844 4.585938 29.460938 10.941406 31.574219 C 11.738281 31.726562 12.035156 31.230469 12.035156 30.808594 C 12.035156 30.425781 12.019531 29.421875 12.011719 28.085938 C 7.5625 29.050781 6.625 25.941406 6.625 25.941406 C 5.894531 24.09375 4.84375 23.601562 4.84375 23.601562 C 3.394531 22.609375 4.957031 22.628906 4.957031 22.628906 C 6.5625 22.738281 7.40625 24.277344 7.40625 24.277344 C 8.832031 26.722656 11.152344 26.015625 12.066406 25.605469 C 12.210938 24.570312 12.621094 23.867188 13.078125 23.464844 C 9.527344 23.066406 5.792969 21.691406 5.792969 15.558594 C 5.792969 13.8125 6.410156 12.386719 7.4375 11.265625 C 7.257812 10.863281 6.71875 9.234375 7.578125 7.03125 C 7.578125 7.03125 8.917969 6.601562 11.980469 8.671875 C 13.257812 8.316406 14.617188 8.140625 15.980469 8.132812 C 17.339844 8.140625 18.699219 8.316406 19.980469 8.671875 C 23.019531 6.601562 24.359375 7.03125 24.359375 7.03125 C 25.21875 9.234375 24.679688 10.863281 24.519531 11.265625 C 25.539062 12.386719 26.160156 13.8125 26.160156 15.558594 C 26.160156 21.707031 22.417969 23.058594 18.859375 23.453125 C 19.417969 23.933594 19.9375 24.914062 19.9375 26.414062 C 19.9375 28.554688 19.917969 30.273438 19.917969 30.792969 C 19.917969 31.214844 20.199219 31.714844 21.019531 31.554688 C 27.421875 29.457031 32 23.457031 32 16.394531 C 32 7.558594 24.835938 0.394531 16 0.394531 "}})])]),t._v(" "),a("a",{staticClass:"inline-block h-10 p-2 text-center text-pink-500 no-underline  hover:opacity-75 hover:text-underline md:h-auto md:p-4",attrs:{"data-tippy-content":"@instagram_handle",target:"_blank",href:"https://instagram.com/banuacoders_"}},[a("svg",{staticClass:"h-6 fill-current",attrs:{id:"icon-instagram",viewBox:"0 0 32 32"}},[a("title",[t._v("Follow kami di Instagram")]),t._v(" "),a("path",{attrs:{d:"M16 2.881c4.275 0 4.781 0.019 6.462 0.094 1.563 0.069 2.406 0.331 2.969 0.55 0.744 0.288 1.281 0.638 1.837 1.194 0.563 0.563 0.906 1.094 1.2 1.838 0.219 0.563 0.481 1.412 0.55 2.969 0.075 1.688 0.094 2.194 0.094 6.463s-0.019 4.781-0.094 6.463c-0.069 1.563-0.331 2.406-0.55 2.969-0.288 0.744-0.637 1.281-1.194 1.837-0.563 0.563-1.094 0.906-1.837 1.2-0.563 0.219-1.413 0.481-2.969 0.55-1.688 0.075-2.194 0.094-6.463 0.094s-4.781-0.019-6.463-0.094c-1.563-0.069-2.406-0.331-2.969-0.55-0.744-0.288-1.281-0.637-1.838-1.194-0.563-0.563-0.906-1.094-1.2-1.837-0.219-0.563-0.481-1.413-0.55-2.969-0.075-1.688-0.094-2.194-0.094-6.463s0.019-4.781 0.094-6.463c0.069-1.563 0.331-2.406 0.55-2.969 0.288-0.744 0.638-1.281 1.194-1.838 0.563-0.563 1.094-0.906 1.838-1.2 0.563-0.219 1.412-0.481 2.969-0.55 1.681-0.075 2.188-0.094 6.463-0.094zM16 0c-4.344 0-4.887 0.019-6.594 0.094-1.7 0.075-2.869 0.35-3.881 0.744-1.056 0.412-1.95 0.956-2.837 1.85-0.894 0.888-1.438 1.781-1.85 2.831-0.394 1.019-0.669 2.181-0.744 3.881-0.075 1.713-0.094 2.256-0.094 6.6s0.019 4.887 0.094 6.594c0.075 1.7 0.35 2.869 0.744 3.881 0.413 1.056 0.956 1.95 1.85 2.837 0.887 0.887 1.781 1.438 2.831 1.844 1.019 0.394 2.181 0.669 3.881 0.744 1.706 0.075 2.25 0.094 6.594 0.094s4.888-0.019 6.594-0.094c1.7-0.075 2.869-0.35 3.881-0.744 1.050-0.406 1.944-0.956 2.831-1.844s1.438-1.781 1.844-2.831c0.394-1.019 0.669-2.181 0.744-3.881 0.075-1.706 0.094-2.25 0.094-6.594s-0.019-4.887-0.094-6.594c-0.075-1.7-0.35-2.869-0.744-3.881-0.394-1.063-0.938-1.956-1.831-2.844-0.887-0.887-1.781-1.438-2.831-1.844-1.019-0.394-2.181-0.669-3.881-0.744-1.712-0.081-2.256-0.1-6.6-0.1v0z"}}),t._v(" "),a("path",{attrs:{d:"M16 7.781c-4.537 0-8.219 3.681-8.219 8.219s3.681 8.219 8.219 8.219 8.219-3.681 8.219-8.219c0-4.537-3.681-8.219-8.219-8.219zM16 21.331c-2.944 0-5.331-2.387-5.331-5.331s2.387-5.331 5.331-5.331c2.944 0 5.331 2.387 5.331 5.331s-2.387 5.331-5.331 5.331z"}}),t._v(" "),a("path",{attrs:{d:"M26.462 7.456c0 1.060-0.859 1.919-1.919 1.919s-1.919-0.859-1.919-1.919c0-1.060 0.859-1.919 1.919-1.919s1.919 0.859 1.919 1.919z"}})])]),t._v(" "),a("a",{staticClass:"inline-block h-10 p-2 text-center text-blue-500 no-underline  hover:opacity-75 hover:text-underline md:h-auto md:p-4",attrs:{target:"_blank","data-tippy-content":"#facebook_id",href:"https://www.facebook.com/banuacoder"}},[a("svg",{staticClass:"h-6 fill-current",attrs:{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 32 32"}},[a("title",[t._v("Like kami di Facebook")]),t._v(" "),a("path",{attrs:{d:"M19 6h5V0h-5c-3.86 0-7 3.14-7 7v3H8v6h4v16h6V16h5l1-6h-6V7c0-.542.458-1 1-1z"}})])]),t._v(" "),a("a",{staticClass:"inline-block h-10 p-2 text-center text-red-500 no-underline  hover:opacity-75 hover:text-underline md:h-auto md:p-4",attrs:{target:"_blank","data-tippy-content":"@youtube_handle",href:"https://www.youtube.com/channel/UC0SrBwl_lIlvR_wpYcmCG8w"}},[a("svg",{staticClass:"h-6 fill-current",attrs:{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 32 32",version:"1.1"}},[a("title",[t._v("Subscribe YouTube Kami")]),t._v(" "),a("path",{attrs:{d:"M 31.328125 8.273438 C 30.949219 6.921875 29.894531 5.867188 28.542969 5.488281 C 26.050781 4.820312 16.015625 4.820312 16.015625 4.820312 C 16.015625 4.820312 6.003906 4.808594 3.488281 5.488281 C 2.136719 5.867188 1.078125 6.921875 0.703125 8.273438 C 0.230469 10.824219 -0.00390625 13.417969 0.0078125 16.011719 C 0 18.597656 0.230469 21.179688 0.703125 23.722656 C 1.078125 25.074219 2.136719 26.132812 3.488281 26.507812 C 5.976562 27.175781 16.015625 27.175781 16.015625 27.175781 C 16.015625 27.175781 26.023438 27.175781 28.542969 26.507812 C 29.894531 26.132812 30.949219 25.074219 31.328125 23.722656 C 31.789062 21.179688 32.011719 18.597656 31.992188 16.011719 C 32.011719 13.417969 31.789062 10.828125 31.328125 8.273438 Z M 12.8125 20.800781 L 12.8125 11.210938 L 21.164062 16.011719 Z M 12.8125 20.800781 "}})])])]),t._v(" "),a("p",{staticClass:"text-xs text-center text-gray-500 md:text-sm"},[t._v("\n      Made with "),a("i",{staticClass:"fas fa-heart"}),t._v(" by\n      "),a("a",{staticClass:"hover:text-gray-800",attrs:{href:"https://linkedin.com/in/ryanaidilp",target:"_blank"}},[t._v("Fajrian Aidil Pratama")]),t._v(" "),a("br"),t._v("\n      © Copyright 2020 - "+t._s((new Date).getFullYear())+" BanuaCoders.\n    ")])])])}),[],!1,null,null,null).exports},6551:(t,e,a)=>{"use strict";a.d(e,{Z:()=>r});const s={props:{contact:{type:Object,required:!0},textSize:{type:String,required:!1,default:"text-xs"},marginRight:{type:String,required:!1,default:""},isTaskForce:{type:Boolean,required:!1,default:!1}},methods:{setHref:function(t){return"".concat(t.prefix).concat(t.contact)},setLinkTitle:function(t){var e=t.contact;return this.isTaskForce&&(e=t.name),"".concat(t.label," ").concat(e)},setIcon:function(t){return t.icon},setBgColor:function(t){return"".concat(t.bg_color," ").concat(this.textSize," ").concat(this.marginRight)}}};const r=(0,a(1900).Z)(s,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("a",{staticClass:"inline-block px-4 py-1 text-white transition-all duration-300 rounded  hover:opacity-50",class:t.setBgColor(t.contact),attrs:{href:t.setHref(t.contact),target:"_blank",title:t.setLinkTitle(t.contact)}},[a("i",{staticClass:"mr-1 -ml-2",class:t.setIcon(t.contact)}),t._v(" "),a("span",{staticClass:"font-semibold"},[t._v(t._s(t.contact.contact))])])}),[],!1,null,null,null).exports},9182:(t,e,a)=>{"use strict";a.d(e,{Z:()=>i});const s={data:function(){return{showDropdown:!1}},methods:{isActive:function(t){return this.route().current(t)?"text-blue-500 border-blue-500 hover:text-blue-800":""},changePage:function(t){this.$emit("change-page"),this.$inertia.visit(t)},toggleMenu:function(){this.showDropdown=!this.showDropdown}},mounted:function(){this.$refs["nav-content"],this.$refs["nav-toggle"]}};var r=a(1900);const n={components:{Navbar:(0,r.Z)(s,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"z-50 text-gray-600"},[a("nav",{ref:"header",staticClass:"fixed top-0 w-full bg-white shadow-md main-nav-top"},[a("div",{staticClass:"container flex flex-wrap items-center w-full pt-2 pb-3 mx-auto mt-0 "},[a("div",{staticClass:"w-1/2 pl-2 md:pl-0"},[a("a",{staticClass:"flex flex-wrap text-gray-900 no-underline hover:no-underline",attrs:{href:t.route("home")}},[a("div",{staticClass:"hidden mt-2 mr-3 md:mt-1 md:block"},[a("img",{staticClass:"w-5 h-5 md:w-10 md:h-10",attrs:{src:t.asset("/images/logo.png"),alt:"PICO"}})]),t._v(" "),t._m(0)])]),t._v(" "),a("div",{staticClass:"w-1/2 pr-0"},[a("div",{staticClass:"relative flex float-right"},[a("div",{staticClass:"relative z-20 flex-grow hidden w-full mt-2 text-sm bg-white  lg:block"},[a("ul",{staticClass:"items-center flex-1 px-4 list-reset lg:flex md:px-0"},[a("li",{staticClass:"my-2 mr-6 md:my-0"},[a("inertia-link",{staticClass:"block py-1 pl-1 text-gray-500 no-underline align-middle border-b-2 border-white  md:py-3 hover:text-gray-900 hover:border-blue-600",class:t.isActive("home"),attrs:{href:t.route("home"),exact:""},on:{click:function(e){e.preventDefault(),t.changePage(t.route("home"))}}},[a("span",{staticClass:"pb-1 text-sm font-semibold md:pb-0"},[t._v("Beranda")])])],1),t._v(" "),a("li",{staticClass:"my-2 mr-6 md:my-0"},[a("inertia-link",{staticClass:"block py-1 pl-1 text-gray-500 no-underline align-middle border-b-2 border-white  md:py-3 hover:text-gray-900 hover:border-blue-500",class:t.isActive("data"),attrs:{href:t.route("data")},on:{click:function(e){e.preventDefault(),t.changePage(t.route("data"))}}},[a("span",{staticClass:"pb-1 text-sm font-semibold md:pb-0"},[t._v("Data")])])],1),t._v(" "),a("li",{staticClass:"my-2 mr-6 md:my-0"},[a("inertia-link",{staticClass:"block py-1 pl-1 text-gray-500 no-underline align-middle border-b-2 border-white  md:py-3 hover:text-gray-900 hover:border-blue-500",class:t.isActive("vaccine"),attrs:{href:t.route("vaccine")},on:{click:function(e){e.preventDefault(),t.changePage(t.route("vaccine"))}}},[a("span",{staticClass:"pb-1 text-sm font-semibold md:pb-0"},[t._v("Vaksin")])])],1),t._v(" "),a("li",{staticClass:"my-2 mr-6 md:my-0"},[a("inertia-link",{staticClass:"block py-1 pl-1 text-gray-500 no-underline align-middle border-b-2 border-white  md:py-3 hover:text-gray-900 hover:border-blue-500",class:t.isActive("self-isolation"),attrs:{href:t.route("self-isolation")},on:{click:function(e){e.preventDefault(),t.changePage(t.route("self-isolation"))}}},[a("span",{staticClass:"pb-1 text-sm font-semibold md:pb-0"},[t._v("Isoman")])])],1),t._v(" "),a("li",{staticClass:"my-2 mr-6 md:my-0"},[a("inertia-link",{staticClass:"block py-1 pl-1 text-gray-500 no-underline align-middle border-b-2 border-white  md:py-3 hover:text-gray-900 hover:border-blue-500",class:t.isActive("contact"),attrs:{href:t.route("contact")},on:{click:function(e){e.preventDefault(),t.changePage(t.route("contact"))}}},[a("span",{staticClass:"pb-1 text-sm font-semibold md:pb-0"},[t._v("Kontak")])])],1),t._v(" "),a("li",{staticClass:"my-2 mr-6 md:my-0"},[a("inertia-link",{staticClass:"block py-1 pl-1 text-gray-500 no-underline align-middle border-b-2 border-white  md:py-3 hover:text-gray-900 hover:border-blue-500",class:t.isActive("wiki"),attrs:{href:t.route("wiki")},on:{click:function(e){e.preventDefault(),t.changePage(t.route("wiki"))}}},[a("span",{staticClass:"pb-1 text-sm font-semibold md:pb-0"},[t._v("Wiki")])])],1),t._v(" "),t._m(1)])]),t._v(" "),a("div",{staticClass:"block pr-4 lg:hidden"},[a("button",{ref:"nav-toggle",staticClass:"flex items-center px-3 py-2 text-gray-500 border border-gray-600 rounded appearance-none  hover:text-gray-900 hover:border-blue-500 focus:outline-none",on:{click:t.toggleMenu}},[a("transition",{attrs:{name:"fade",mode:"out-in"}},[t.showDropdown?a("i",{staticClass:"fas fa-times hover:text-blue-500"}):a("svg",{staticClass:"w-3 h-3 fill-current",attrs:{viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"}},[a("title",[t._v("Menu")]),t._v(" "),a("path",{attrs:{d:"M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"}})])])],1)])])]),t._v(" "),a("div",{staticClass:"fixed bottom-0 left-0 w-full h-16 px-2 text-center bg-gray-900  lg:hidden"},[a("div",{staticClass:"w-full mx-auto"},[a("ul",{staticClass:"flex flex-row text-center"},[a("li",{staticClass:"flex-1 mr-3"},[a("inertia-link",{staticClass:"block py-1 pl-1 text-white no-underline align-middle border-b-2 border-gray-800  hover:text-blue-500 hover:border-blue-500",class:t.isActive("home"),attrs:{href:t.route("home")},on:{click:function(e){e.preventDefault(),t.changePage(t.route("home"))}}},[a("i",{staticClass:"pr-0 fas fa-home"}),t._v(" "),a("span",{staticClass:"block pb-1 text-xs"},[t._v("Beranda")])])],1),t._v(" "),a("li",{staticClass:"flex-1 mr-3"},[a("inertia-link",{staticClass:"block py-1 pl-1 text-white no-underline align-middle border-b-2 border-gray-800  hover:text-blue-500 hover:border-blue-500",class:t.isActive("data"),attrs:{href:t.route("data")},on:{click:function(e){e.preventDefault(),t.changePage(t.route("data"))}}},[a("i",{staticClass:"pr-0 fas fa-chart-bar"}),t._v(" "),a("span",{staticClass:"block pb-1 text-xs"},[t._v("Data")])])],1),t._v(" "),a("li",{staticClass:"flex-1 mr-3"},[a("inertia-link",{staticClass:"block py-1 pl-1 text-white no-underline align-middle border-b-2 border-gray-800  hover:text-blue-500 hover:border-blue-500",class:t.isActive("contact"),attrs:{href:t.route("contact")},on:{click:function(e){e.preventDefault(),t.changePage(t.route("contact"))}}},[a("i",{staticClass:"pr-0 fas fa-address-book"}),t._v(" "),a("span",{staticClass:"block pb-1 text-xs"},[t._v("Kontak")])])],1),t._v(" "),a("li",{staticClass:"flex-1 mr-3"},[a("a",{staticClass:"block py-1 pl-1 text-white no-underline align-middle border-b-2 border-gray-800  hover:text-blue-500 hover:border-blue-500",attrs:{href:"#"},on:{click:function(e){return e.preventDefault(),t.toggleMenu.apply(null,arguments)}}},[a("i",{staticClass:"fas fa-ellipsis-h"}),t._v(" "),a("span",{staticClass:"block pb-1 text-xs"},[t._v("Lainnya")])])])])])]),t._v(" "),a("transition",{attrs:{name:"fade",mode:"out-in"}},[t.showDropdown?a("div",{ref:"nav-content",staticClass:"z-20 flex-grow w-full mt-2 bg-white border-t-2 border-gray-300  lg:hidden"},[a("h2",{staticClass:"m-2 font-semibold"},[t._v("Menu")]),t._v(" "),a("hr"),t._v(" "),a("ul",{staticClass:"items-center flex-1 px-1 list-reset lg:flex md:px-0"},[a("li",{staticClass:"my-2 md:my-0"},[a("inertia-link",{staticClass:"flex justify-between py-2 text-center text-gray-600 no-underline align-middle border-b-2 border-gray-300  hover:text-blue-500 hover:border-blue-500",class:t.isActive("vaccine"),attrs:{href:t.route("vaccine"),target:"_blank"},on:{click:function(e){e.preventDefault(),t.changePage(t.route("vaccine"))}}},[a("i",{staticClass:"px-3 fas fa-syringe"}),t._v(" "),a("span",{staticClass:"px-3"},[t._v("Vaksin")])])],1),t._v(" "),a("li",{staticClass:"my-2 md:my-0"},[a("inertia-link",{staticClass:"flex justify-between py-2 text-center text-gray-600 no-underline align-middle border-b-2 border-gray-300  hover:text-blue-500 hover:border-blue-500",class:t.isActive("self-isolation"),attrs:{href:t.route("self-isolation"),target:"_blank"},on:{click:function(e){e.preventDefault(),t.changePage(t.route("self-isolation"))}}},[a("i",{staticClass:"px-3 fas fa-procedures"}),t._v(" "),a("span",{staticClass:"px-3"},[t._v("Isoman")])])],1),t._v(" "),a("li",{staticClass:"my-2 md:my-0"},[a("inertia-link",{staticClass:"flex justify-between py-2 text-center text-gray-600 no-underline align-middle border-b-2 border-gray-300  hover:text-blue-500 hover:border-blue-500",class:t.isActive("wiki"),attrs:{href:t.route("wiki"),target:"_blank"},on:{click:function(e){e.preventDefault(),t.changePage(t.route("wiki"))}}},[a("i",{staticClass:"px-3 fas fa-question"}),t._v(" "),a("span",{staticClass:"px-3"},[t._v("Wiki")])])],1),t._v(" "),a("li",{staticClass:"mx-auto my-2 md:my-0"},[a("a",{staticClass:"block py-2 text-center text-white no-underline align-middle bg-blue-500 rounded-lg  hover:bg-blue-700",attrs:{href:"https://banuacoders.com/app/pico",target:"_blank"}},[a("span",{staticClass:"px-3 text-sm md:pb-0"},[t._v("Download App")])])])])]):t._e()])],1)])])}),[function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("span",{staticClass:"text-xs font-semibold text-gray-800 md:text-lg"},[t._v("Pusat Informasi COVID-19")]),t._v(" "),a("br"),t._v(" "),a("span",{staticClass:"text-xs text-gray-800 md:text-sm"},[t._v("Provinsi Sulawesi Tengah")])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("li",{staticClass:"my-2 mr-6 md:my-0"},[a("a",{staticClass:"block px-3 py-2 text-sm font-bold text-center text-white no-underline align-middle bg-blue-500 rounded-lg  hover:bg-blue-700",attrs:{href:"https://banuacoders.com/app/pico",target:"_blank"}},[t._v("\n                  Download App\n                ")])])}],!1,null,"1c0a353c",null).exports},data:function(){return{content_trigger:!1}},methods:{toggleContent:function(){this.content_trigger=!this.content_trigger}},mounted:function(){this.content_trigger=!0}};const i=(0,r.Z)(n,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("main",{staticClass:"min-h-screen text-gray-800 bg-gray-200"},[a("Navbar",{on:{"change-page":function(e){t.content_trigger=!1}}}),t._v(" "),a("div",{staticClass:"container w-full pt-20 pb-20 mx-auto"},[a("transition",{attrs:{name:"slide-fade",mode:"out-in"}},[t.content_trigger?a("main",[t._t("default")],2):t._e()])],1),t._v(" "),a("back-to-top",[a("i",{staticClass:"px-5 py-4 mb-8 text-white bg-blue-600 rounded-full shadow-md  lg:mb-0 hover:shadow-lg lg:text-lg fas fa-arrow-up"})])],1)}),[],!1,null,null,null).exports}}]);
//# sourceMappingURL=226.js.map?id=9239e94640f89ca57679