(window.webpackJsonp=window.webpackJsonp||[]).push([[5],{1:function(t,a,e){"use strict";e.d(a,"a",(function(){return r}));var i=e(23),s=e.n(i),n=function(){return Math.random().toString(36).substring(2)},r={name:"ContentLoader",functional:!0,props:{width:{type:[Number,String],default:400},height:{type:[Number,String],default:130},speed:{type:Number,default:2},preserveAspectRatio:{type:String,default:"xMidYMid meet"},baseUrl:{type:String,default:""},primaryColor:{type:String,default:"#f9f9f9"},secondaryColor:{type:String,default:"#ecebeb"},primaryOpacity:{type:Number,default:1},secondaryOpacity:{type:Number,default:1},uniqueKey:{type:String},animate:{type:Boolean,default:!0}},render:function(t,a){var e=a.props,i=a.data,r=a.children,l=e.uniqueKey?e.uniqueKey+"-idClip":n(),u=e.uniqueKey?e.uniqueKey+"-idGradient":n();return t("svg",s()([i,{attrs:{viewBox:"0 0 "+e.width+" "+e.height,version:"1.1",preserveAspectRatio:e.preserveAspectRatio}}]),[t("rect",{style:{fill:"url("+e.baseUrl+"#"+u+")"},attrs:{"clip-path":"url("+e.baseUrl+"#"+l+")",x:"0",y:"0",width:e.width,height:e.height}}),t("defs",[t("clipPath",{attrs:{id:l}},[r||t("rect",{attrs:{x:"0",y:"0",rx:"5",ry:"5",width:e.width,height:e.height}})]),t("linearGradient",{attrs:{id:u}},[t("stop",{attrs:{offset:"0%","stop-color":e.primaryColor,"stop-opacity":e.primaryOpacity}},[e.animate?t("animate",{attrs:{attributeName:"offset",values:"-2; 1",dur:e.speed+"s",repeatCount:"indefinite"}}):null]),t("stop",{attrs:{offset:"50%","stop-color":e.secondaryColor,"stop-opacity":e.secondaryOpacity}},[e.animate?t("animate",{attrs:{attributeName:"offset",values:"-1.5; 1.5",dur:e.speed+"s",repeatCount:"indefinite"}}):null]),t("stop",{attrs:{offset:"100%","stop-color":e.primaryColor,"stop-opacity":e.primaryOpacity}},[e.animate?t("animate",{attrs:{attributeName:"offset",values:"-1; 2",dur:e.speed+"s",repeatCount:"indefinite"}}):null])])])])}}},23:function(t,a){var e=/^(attrs|props|on|nativeOn|class|style|hook)$/;function i(t,a){return function(){t&&t.apply(this,arguments),a&&a.apply(this,arguments)}}t.exports=function(t){return t.reduce((function(t,a){var s,n,r,l,u;for(r in a)if(s=t[r],n=a[r],s&&e.test(r))if("class"===r&&("string"==typeof s&&(u=s,t[r]=s={},s[u]=!0),"string"==typeof n&&(u=n,a[r]=n={},n[u]=!0)),"on"===r||"nativeOn"===r||"hook"===r)for(l in n)s[l]=i(s[l],n[l]);else if(Array.isArray(s))t[r]=s.concat(n);else if(Array.isArray(n))t[r]=[s].concat(n);else for(l in n)s[l]=n[l];else t[r]=a[r];return t}),{})}},9:function(t,a,e){"use strict";var i={data:function(){return{partners:[{id:"1",link:"https://detexi.id",image:"detexi.png",name:"Detexi"},{id:"2",link:"https://dinkes.sultengprov.go.id",image:"dinkes.png",name:"Dinas Kesehatan Sulawesi Tengah"},{id:"3",link:"https://kawalcorona.com",image:"ehi.png",name:"Kawal Corona"},{id:"4",link:"https://covid19.go.id/peta-sebaran",image:"inacovid.png",name:"Gugus Tugas COVID-19 Indonesia"},{id:"5",link:"https://pikobar.jabarprov.go.id",image:"pikobar.png",name:"PIKOBAR Jawa Barat"},{id:"6",link:"https://vuejs.org",image:"vue.svg",name:"Vue JS"},{id:"7",link:"https://banuacoders.com",image:"banuacoders.png",name:"Banua Coders"},{id:"8",link:"https://laravel.com",image:"laravel.jpeg",name:"Laravel"}]}}},s=e(0),n=Object(s.a)(i,(function(){var t=this.$createElement,a=this._self._c||t;return a("div",{staticClass:"w-full mt-4"},[a("div",{staticClass:"p-6 mx-4 bg-white rounded-lg shadow-lg"},[a("h3",{staticClass:"text-sm font-bold text-center lg:text-xl"},[this._v("Pranala Luar")]),this._v(" "),a("div",{staticClass:"flex flex-col flex-wrap w-full md:flex-row"},this._l(this.partners,(function(t){return a("a",{key:t.id,staticClass:"w-full p-2 mt-4 md:w-1/4 hover:opacity-75",attrs:{href:t.link,target:"_blank"}},[a("img",{directives:[{name:"lazy",rawName:"v-lazy",value:"/corona/public/assets/images/partner/"+t.image,expression:"'/corona/public/assets/images/partner/' + partner.image"}],staticClass:"object-contain h-20 mx-auto",attrs:{alt:t.name,title:t.name}})])})),0),this._v(" "),this._m(0)])])}),[function(){var t=this.$createElement,a=this._self._c||t;return a("p",{staticClass:"mt-6 text-xs text-center text-gray-500 md:text-sm"},[this._v("© BanuaCoders 2020. Made with "),a("i",{staticClass:"fas fa-heart"}),this._v(" by "),a("a",{staticClass:"hover:text-gray-800",attrs:{href:"https://linkedin.com/in/ryanaidilp",target:"_blank"}},[this._v("Fajrian Aidil Pratama")])])}],!1,null,null,null);a.a=n.exports},98:function(t,a,e){"use strict";e.r(a);var i=e(9),s=e(0),n=Object(s.a)({},(function(){var t=this.$createElement,a=this._self._c||t;return a("div",{staticClass:"w-full"},[a("div",{staticClass:"p-6 mx-4 bg-white rounded-lg shadow-lg"},[a("h3",{staticClass:"text-lg font-bold lg:text-3xl"},[this._v("Lindungi Diri dan Orang Lain")]),this._v(" "),a("div",{staticClass:"flex flex-row w-full"},[this._m(0),this._v(" "),a("div",{staticClass:"flex flex-col justify-center hidden w-1/4 mx-2 my-auto rounded-lg lg:block sm:p-2 lg:mx-16"},[a("img",{directives:[{name:"lazy",rawName:"v-lazy",value:"/corona/public/assets/images/wash_hands.png",expression:"'/corona/public/assets/images/wash_hands.png'"}],staticClass:"object-contain",attrs:{alt:"Cuci Tangan",title:"Cuci Tangan"}}),this._v(" "),a("img",{directives:[{name:"lazy",rawName:"v-lazy",value:"/corona/public/assets/images/wear_mask.png",expression:"'/corona/public/assets/images/wear_mask.png'"}],staticClass:"object-contain mt-6",attrs:{alt:"Pakai Masker",title:"Pakai Masker"}})])]),this._v(" "),this._m(1)])])}),[function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("span",{staticClass:"w-auto mt-4 text-xs text-justify lg:w-3/4 lg:text-lg"},[t._v("\n        Sampai saat ini belum ditemukan vaksin untuk COVID-19, sehingga cara terbaik agar tidak terinfeksi adalah dengan menghindari terekspos virus.\n        "),e("br"),t._v(" "),e("br"),t._v(" "),e("span",{staticClass:"font-semibold"},[t._v("COVID-19 dapat menyebar dari orang ke orang melalui tetesan kecil (droplet) saat batuk atau bersin. Maka yang bisa Komiu dan Kita semua lakukan adalah:")]),t._v(" "),e("ul",{staticClass:"mt-2"},[e("li",[e("i",{staticClass:"text-green-400 fas fa-check",attrs:{"aria-hidden":"true"}}),t._v(" Sering cuci tangan pakai sabun atau\n            "),e("i",[t._v("Hand Sanitizer")])]),t._v(" "),e("li",[e("i",{staticClass:"text-green-400 fas fa-check",attrs:{"aria-hidden":"true"}}),t._v(" Hindari menyentuh wajah terutama area hidung, mulut, dan mata\n          ")]),t._v(" "),e("li",[e("i",{staticClass:"text-green-400 fas fa-check",attrs:{"aria-hidden":"true"}}),t._v(" Bersihkan permukaan benda yang disentuh banyak orang\n          ")]),t._v(" "),e("li",[e("i",{staticClass:"text-green-400 fas fa-check",attrs:{"aria-hidden":"true"}}),t._v(" "),e("i",[t._v("Physical Distancing")]),t._v("! Minimalisir kontak fisik dengan sesama\n          ")]),t._v(" "),e("li",[e("i",{staticClass:"text-green-400 fas fa-check",attrs:{"aria-hidden":"true"}}),t._v(" Jaga jarak 1-3 meter dengan sesama\n          ")]),t._v(" "),e("li",[e("i",{staticClass:"text-green-400 fas fa-check",attrs:{"aria-hidden":"true"}}),t._v(" Tetap tinggal di rumah, hindari bepergian ke tempat umum bila tidak perlu\n          ")]),t._v(" "),e("li",[e("i",{staticClass:"text-green-400 fas fa-check",attrs:{"aria-hidden":"true"}}),t._v(" Selalu gunakan masker jika harus keluar rumah dan berinteraksi langsung dengan orang lain\n          ")])])])},function(){var t=this.$createElement,a=this._self._c||t;return a("i",{staticClass:"mt-8 text-xs text-gray-600"},[this._v("\n      Sumber materi :\n      "),a("a",{staticClass:"no-underline hover:no-underline hover:text-blue-200",attrs:{href:"https://pikobar.jabarprov.go.id"}},[this._v("https://pikobar.jabarprov.go.id")])])}],!1,null,null,null).exports,r=Object(s.a)({},(function(){var t=this.$createElement,a=this._self._c||t;return a("div",{staticClass:"w-full"},[a("div",{staticClass:"p-6 mx-4 bg-white rounded-lg shadow-lg"},[this._m(0),this._v(" "),a("div",{staticClass:"flex flex-row w-full"},[this._m(1),this._v(" "),a("div",{staticClass:"flex flex-col justify-center hidden mx-2 my-auto rounded-lg w-50 lg:block sm:p-2 lg:mx-16"},[a("img",{directives:[{name:"lazy",rawName:"v-lazy",value:"/corona/public/assets/images/flatten.jpeg",expression:"'/corona/public/assets/images/flatten.jpeg'"}],staticClass:"object-contain",attrs:{alt:"Kurva",title:"Kurva"}})])]),this._v(" "),this._m(2)])])}),[function(){var t=this.$createElement,a=this._self._c||t;return a("h3",{staticClass:"text-lg font-bold lg:text-3xl"},[this._v("\n      Kenapa Harus\n      "),a("i",[this._v("Physical Distancing")]),this._v("?\n    ")])},function(){var t=this.$createElement,a=this._self._c||t;return a("span",{staticClass:"w-auto mt-4 text-xs text-justify lg:w-3/4 lg:text-lg"},[this._v("\n        COVID-19 menyebar dengan cepat. Orang dapat terinfeksi tanpa menunjukkan gejala, namun tetap dapat menyebarkannya ke orang lain. Jika kita tidak melakukan upaya pencegahan berupa menghindari keramaian, jumlah orang terinfeksi akan meledak dan fasilitas layanan kesehatan akan kewalahan sehingga banyak kasus akan tidak tertangani.\n        "),a("br"),this._v(" "),a("br"),this._v(" "),a("span",{staticClass:"font-semibold"},[a("i",[this._v("Physical Distancing")]),this._v(" akan mengurangi laju penularan dan memungkinkan pasien terinfeksi untuk ditangani hingga sembuh, seperti di grafik terlampir.\n        ")])])},function(){var t=this.$createElement,a=this._self._c||t;return a("i",{staticClass:"mt-8 text-xs text-gray-600"},[this._v("\n      Sumber materi :\n      "),a("a",{staticClass:"no-underline hover:no-underline hover:text-blue-200",attrs:{href:"https://pikobar.jabarprov.go.id"}},[this._v("https://pikobar.jabarprov.go.id")])])}],!1,null,null,null).exports,l={components:{Istilah:function(){return e.e(13).then(e.bind(null,101))},ContentLoader:e(1).a,CardLindungi:n,CardPhysical:r,WhatIsCovid:function(){return e.e(16).then(e.bind(null,103))},HowInfected:function(){return e.e(12).then(e.bind(null,104))},Mythbuster:function(){return e.e(14).then(e.bind(null,106))},WhatIfInfected:function(){return e.e(15).then(e.bind(null,105))},Symptomps:function(){return e.e(11).then(e.bind(null,100))},Partner:i.a}},u=Object(s.a)(l,(function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",{staticClass:"w-full mt-8 text-gray-800"},[e("h5",{staticClass:"text-xl font-bold text-center md:text-4xl md:text-left md:ml-6"},[t._v("Pusat Informasi COVID-19")]),t._v(" "),e("p",{staticClass:"text-xs text-center md:text-xl md:text-left md:ml-6"},[t._v("Kumpulan informasi penting seputar COVID-19.")]),t._v(" "),e("what-is-covid",{staticClass:"mt-8 md:mt-16"}),t._v(" "),e("how-infected",{staticClass:"mt-16"}),t._v(" "),e("symptomps",{staticClass:"mt-16"}),t._v(" "),e("istilah",{staticClass:"mt-16"}),t._v(" "),e("what-if-infected",{staticClass:"mt-16"}),t._v(" "),e("card-lindungi",{staticClass:"mt-16"}),t._v(" "),e("card-physical",{staticClass:"mt-16"}),t._v(" "),e("mythbuster",{staticClass:"mt-16"}),t._v(" "),e("Partner",{staticClass:"mt-16"})],1)}),[],!1,null,null,null);a.default=u.exports}}]);