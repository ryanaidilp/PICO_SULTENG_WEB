(window.webpackJsonp=window.webpackJsonp||[]).push([[7],{17:function(t,a,e){"use strict";var s={props:["title","cumulative_local","new_local","cumulative_national","new_national","bg_card","bg_new","text_color"]},i=e(0),n=Object(i.a)(s,(function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",{staticClass:"w-full p-3 lg:w-1/3"},[e("div",{staticClass:"p-6 rounded-lg shadow-lg",class:t.bg_card},[e("div",{staticClass:"flex flex-row items-center"},[e("div",{staticClass:"flex-1 w-3/5 text-left"},[e("h5",{staticClass:"text-3xl font-bold"},[t._v(t._s(t.title))]),t._v(" "),e("h5",{staticClass:"text-base text-left xl:text-xl"},[t._v("Sulawesi Tengah")]),t._v(" "),e("h5",{staticClass:"mt-2 text-xs md:text-base"},[t._v("Indonesia")])]),t._v(" "),e("div",{staticClass:"w-1/5 ml-2 text-left"},[e("h5",{staticClass:"text-xl font-bold md:text-3xl",class:t.text_color},[t._v("-")]),t._v(" "),e("h5",{staticClass:"text-3xl font-bold"},[t._v(t._s(t.cumulative_local))]),t._v(" "),e("h5",{staticClass:"mt-2 text-xs font-semibold md:text-base"},[t._v(t._s(t.cumulative_national))])]),t._v(" "),e("div",{staticClass:"flex flex-col justify-center justify-between w-1/5 ml-2 text-center"},[e("h5",{staticClass:"text-4xl font-bold",class:t.text_color},[t._v("-")]),t._v(" "),e("h5",{staticClass:"p-0 text-xl font-semibold text-white rounded-lg",class:t.bg_new},[t._v("+ "+t._s(t.new_local))]),t._v(" "),e("h5",{staticClass:"mt-2 text-base font-semibold text-white rounded-md md:mt-4",class:t.bg_new},[t._v("+ "+t._s(t.new_national))])])])])])}),[],!1,null,null,null);a.a=n.exports},18:function(t,a,e){"use strict";var s={props:["title","new_case","new_finished_case","active_case","total_case","total_finished_case","status"],computed:{finishedCasePercentage:function(){return this.percentage(this.$props.total_finished_case,this.$props.total_case)},activeCasePercentage:function(){return this.percentage(this.$props.active_case,this.$props.total_case)}},methods:{percentage:function(t,a){return(parseInt(t.replace(".",""))/parseInt(a.replace(".",""))*100).toFixed(2)},percentageFormat:function(t){return t+"%"},newCaseFormat:function(t){var a="";return t>0?a="+"+t:t<=0&&(a=t),a}}},i=e(0),n=Object(i.a)(s,(function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",{staticClass:"flex flex-col flex-grow w-full md:w-1/2 flex-shrinks"},[e("div",{staticClass:"flex-1 overflow-hidden"},[e("div",{staticClass:"p-5 rounded-lg"},[e("div",{staticClass:"flex flex-row items-center bg-white rounded-lg shadow-lg"},[e("div",{staticClass:"flex-1 text-center"},[e("div",{staticClass:"p-2 bg-white border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg"},[e("h5",{staticClass:"font-bold text-gray-600 uppercase md:text-lg"},[t._v(t._s(t.title))])]),t._v(" "),e("div",{staticClass:"flex items-center mt-4 flex-column"},[e("div",{staticClass:"w-1/2"},[e("p",[t._v("Dalam "+t._s(t.status))]),t._v(" "),e("h3",{staticClass:"text-3xl font-bold"},[t._v(t._s(t.active_case))]),t._v(" "),e("h3",{staticClass:"text-sm font-bold"},[t._v("("+t._s(t.newCaseFormat(t.new_case-t.new_finished_case))+")")]),t._v(" "),e("p",{staticClass:"mt-2 text-xs text-gray-600"},[t._v("("+t._s(t.percentageFormat(t.activeCasePercentage))+")")])]),t._v(" "),e("div",{staticClass:"w-1/2"},[e("p",[t._v("Selesai "+t._s(t.status))]),t._v(" "),e("h3",{staticClass:"text-3xl font-bold"},[t._v(t._s(t.total_finished_case))]),t._v(" "),e("h3",{staticClass:"text-sm font-bold"},[t._v("("+t._s(t.newCaseFormat(t.new_finished_case))+")")]),t._v(" "),e("p",{staticClass:"mt-2 text-xs text-gray-600"},[t._v("("+t._s(t.percentageFormat(t.finishedCasePercentage))+")")])])]),t._v(" "),e("div",{staticClass:"mb-4 text-center"},[e("p",[t._v("Total")]),t._v(" "),e("h3",{staticClass:"text-3xl font-bold"},[t._v(t._s(t.total_case))]),t._v(" "),e("h3",{staticClass:"text-sm font-bold"},[e("i",{staticClass:"fas fa-arrow-up"}),t._v("\n              "+t._s(t.new_case)+"\n            ")])])])])])])])}),[],!1,null,null,null);a.a=n.exports},9:function(t,a,e){"use strict";var s={data:function(){return{partners:[{id:"1",link:"https://detexi.id",image:"detexi.png",name:"Detexi"},{id:"2",link:"https://dinkes.sultengprov.go.id",image:"dinkes.png",name:"Dinas Kesehatan Sulawesi Tengah"},{id:"3",link:"https://kawalcorona.com",image:"ehi.png",name:"Kawal Corona"},{id:"4",link:"https://covid19.go.id/peta-sebaran",image:"inacovid.png",name:"Gugus Tugas COVID-19 Indonesia"},{id:"5",link:"https://pikobar.jabarprov.go.id",image:"pikobar.png",name:"PIKOBAR Jawa Barat"},{id:"6",link:"https://vuejs.org",image:"vue.svg",name:"Vue JS"},{id:"7",link:"https://banuacoders.com",image:"banuacoders.png",name:"Banua Coders"},{id:"8",link:"https://laravel.com",image:"laravel.jpeg",name:"Laravel"}]}}},i=e(0),n=Object(i.a)(s,(function(){var t=this.$createElement,a=this._self._c||t;return a("div",{staticClass:"w-full mt-4"},[a("div",{staticClass:"p-6 mx-4 bg-white rounded-lg shadow-lg"},[a("h3",{staticClass:"text-sm font-bold text-center lg:text-xl"},[this._v("Pranala Luar")]),this._v(" "),a("div",{staticClass:"flex flex-col flex-wrap w-full md:flex-row"},this._l(this.partners,(function(t){return a("a",{key:t.id,staticClass:"w-full p-2 mt-4 md:w-1/4 hover:opacity-75",attrs:{href:t.link,target:"_blank"}},[a("img",{directives:[{name:"lazy",rawName:"v-lazy",value:"/corona/public/assets/images/partner/"+t.image,expression:"'/corona/public/assets/images/partner/' + partner.image"}],staticClass:"object-contain h-20 mx-auto",attrs:{alt:t.name,title:t.name}})])})),0),this._v(" "),this._m(0)])])}),[function(){var t=this.$createElement,a=this._self._c||t;return a("p",{staticClass:"mt-6 text-xs text-center text-gray-500 md:text-sm"},[this._v("© BanuaCoders 2020. Made with "),a("i",{staticClass:"fas fa-heart"}),this._v(" by "),a("a",{staticClass:"hover:text-gray-800",attrs:{href:"https://linkedin.com/in/ryanaidilp",target:"_blank"}},[this._v("Fajrian Aidil Pratama")])])}],!1,null,null,null);a.a=n.exports},96:function(t,a,e){"use strict";e.r(a);var s=e(3),i=e.n(s),n=e(27),l={data:function(){return{carouselItem:[],isLoading:!1}},components:{Carousel:n.Carousel,Loading:i.a,Slide:n.Slide},methods:{getDonation:function(){var t=this;this.isLoading=!0,axios.get("/corona/api/donasi").then((function(a){var e=a.data.data;t.carouselItem.length>0&&(t.carouselItem=[]),e.forEach((function(a){a.status&&t.carouselItem.push(a)}))})),this.isLoading=!1},updater:function(){var t=this;setInterval((function(){t.getDonation()}),3e5)}},mounted:function(){this.getDonation(),this.updater()}},r=e(0),o=Object(r.a)(l,(function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",[e("div",{staticClass:"absolute flex justify-center w-full"},[e("loading",{attrs:{active:t.isLoading,opacity:.8,height:300,width:128,loader:"spinner",color:"#59F"},on:{"update:active":function(a){t.isLoading=a}}})],1),t._v(" "),e("carousel",{attrs:{"per-page":1,"mouse-drag":!1,autoplay:!0,navigationEnabled:!1,loop:!0,paginationPosition:"bottom-overlay",paginationColor:"#777",paginationActiveColor:"#fff",autoplayTimeout:5e3}},t._l(t.carouselItem,(function(t){return e("slide",{key:t.phone},[e("a",{staticClass:"hover:opacity-75",attrs:{href:"tel:"+t.phone}},[e("img",{directives:[{name:"lazy",rawName:"v-lazy",value:"/corona/public/assets/images/"+t.image,expression:"'/corona/public/assets/images/' + item.image"}],staticClass:"object-fill rounded-lg w-96 sm:w-full xl:max-w-lg xl:max-h-lg",attrs:{alt:t.nama,title:t.nama}})])])})),1)],1)}),[],!1,null,null,null).exports,c=Object(r.a)({},(function(){var t=this.$createElement;this._self._c;return this._m(0)}),[function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",[e("div",{staticClass:"w-1/2 p-3"},[e("div",{staticClass:"p-6 bg-white rounded-lg shadow-lg hover:bg-blue-200"},[e("a",{staticClass:"flex flex-row items-center",attrs:{href:"tel:119"}},[e("div",{staticClass:"flex-1 text-left"},[e("h5",{staticClass:"text-xl font-bold md:text-3xl"},[t._v("Call Center")]),t._v(" "),e("h5",{staticClass:"text-xs md:text-base"},[t._v("Nomor Darurat")]),t._v(" "),e("div",{staticClass:"flex flex-row"},[e("i",{staticClass:"hidden mt-1 text-xs text-blue-400 lg:block md:mt-3 md:text-lg fas fa-phone-alt",attrs:{"aria-hidden":"true"}}),t._v(" "),e("h3",{staticClass:"ml-2 text-xs font-bold text-blue-400 md:text-2xl"},[t._v("119")])])])])])]),t._v(" "),e("div",{staticClass:"w-1/2 p-3"},[e("div",{staticClass:"p-6 bg-white rounded-lg shadow-lg hover:bg-blue-200"},[e("a",{staticClass:"flex flex-row items-center",attrs:{href:"tel:0811404119"}},[e("div",{staticClass:"flex-1 text-left"},[e("h5",{staticClass:"text-xl font-bold md:text-3xl"},[t._v("Hotline")]),t._v(" "),e("h5",{staticClass:"text-xs md:text-base"},[t._v("Dinkes Sulteng\n            ")]),t._v(" "),e("div",{staticClass:"flex flex-row"},[e("i",{staticClass:"hidden mt-1 text-xs text-blue-400 lg:block md:mt-3 md:text-lg fas fa-phone-alt",attrs:{"aria-hidden":"true"}}),t._v(" "),e("h3",{staticClass:"ml-2 text-xs font-bold text-blue-400 md:text-2xl"},[t._v("+62811-404-119")])])])])])])])}],!1,null,null,null).exports,u=Object(r.a)({},(function(){var t=this.$createElement;this._self._c;return this._m(0)}),[function(){var t=this.$createElement,a=this._self._c||t;return a("div",{staticClass:"w-full mt-4"},[a("div",{staticClass:"p-6 mx-4 text-white bg-blue-400 rounded-lg shadow-lg"},[a("h3",{staticClass:"text-xl font-bold md:text-2xl"},[this._v("Donasi COVID-19")]),this._v(" "),a("p",{staticClass:"mt-4 text-sm text-justify md:text-lg"},[this._v("\n      Mari jo sama-sama bantu saudara-saudara kita yang terdapampak COVID-19 dan saudara-saudara kita yang\n      saat ini berada di garda terdepan dalam melawan COVID-19 melalui donasi teman-teman semua. Bagaimana caranya kalau mau berdonasi? Gampang, tekan saja poster donasi nya maka teman-teman akan langsung diarahkan untuk menghubungi CP dari donasi yang teman-teman pilih.\n    ")])])])}],!1,null,null,null).exports,d=e(1),m=e(17),f=e(18),h=(e(11),anychart.map()),v={data:function(){return{today:new Date,districtRecoveredDataset:[],districtPositiveDataset:[],districtDeathDataset:[],districtODPDataset:[],districtPDPDataset:[],districtPositiveColor:["#F9CACD","#F4A8AC","#EE868B","#E76569","#DF4346","#820029","#6E002C","#CD0000"],districtRecoveredColor:["#DEEDCF","#BFE1B0","#99D492","#74C67A","#56B870","#0E4D64","#0A2F51","#1D9A6C"],districtDeathColor:["#FFF3BA","#FFEB9B","#FFE07C","#FFD45D","#FFC63E","#E1851E","#DA7F25","#FFA500"],districtODPColor:["#DFE4F8","#BECCF1","#9FB5E8","#80A2DF","#6190D5","#174689","#0E2C63","#2773BF"],districtPDPColor:["#DEADD0","#D291C3","#C574B6","#B757AB","#A93AA1","#720060","#65004C","#88008B"]}},methods:{getDistrictData:function(){var t=this;axios.get("/corona/api/kabupaten").then((function(a){t.districtPositiveDataset.length>0&&(t.districts=null,t.districtPositiveDataset=[],t.districtRecoveredDataset=[],t.districtDeathDataset=[],t.districtODPDataset=[],t.districtPDPDataset=[]),t.districts=a.data.data,t.districts.forEach((function(a){t.districtPositiveDataset.push({id:a.kabupaten,value:a.positif,sembuh:a.sembuh,meninggal:a.meninggal,ODP:a.dalam_pemantauan,PDP:a.dalam_pengawasan}),t.districtRecoveredDataset.push({id:a.kabupaten,value:a.sembuh,positif:a.positif,meninggal:a.meninggal,ODP:a.dalam_pemantauan,PDP:a.dalam_pengawasan}),t.districtDeathDataset.push({id:a.kabupaten,value:a.meninggal,positif:a.positif,sembuh:a.sembuh,ODP:a.dalam_pemantauan,PDP:a.dalam_pengawasan}),t.districtODPDataset.push({id:a.kabupaten,value:a.dalam_pemantauan,positif:a.positif,sembuh:a.sembuh,meninggal:a.meninggal,PDP:a.dalam_pengawasan}),t.districtPDPDataset.push({id:a.kabupaten,value:a.dalam_pengawasan,positif:a.positif,sembuh:a.sembuh,meninggal:a.meninggal,ODP:a.dalam_pemantauan})}))}))},createChoroplethMapLocal:function(t,a,e){h.removeAllSeries();var s=h.choropleth(a);s.labels(!0),s.labels().format("{%value}"),s.labels().fontWeight(600),s.labels().fontColor("Black"),s.colorScale(anychart.scales.ordinalColor([{less:0,color:e[0]},{from:0,to:10,color:e[1]},{from:10,to:20,color:e[2]},{from:20,to:30,color:e[3]},{from:30,to:40,color:e[4]},{from:40,to:50,color:e[5]},{greater:50,color:e[6]}])),s.tooltip().titleFormat((function(t){return t.getData("id")})),s.tooltip().hideDelay(5e3),s.tooltip().format((function(t){var a=null==t.getData("positif")?t.getData("value"):t.getData("positif"),e=null==t.getData("sembuh")?t.getData("value"):t.getData("sembuh"),s=null==t.getData("meninggal")?t.getData("value"):t.getData("meninggal");return"Positif: "+a+"\nDirawat: "+(a-(e+s))+"\nSembuh: "+e+"\nMeninggal: "+s+"\nODP Aktif: "+(null==t.getData("ODP")?t.getData("value"):t.getData("ODP"))+"\nPDP Aktif: "+(null==t.getData("PDP")?t.getData("value"):t.getData("PDP"))})),s.name(t+"(Choropleth)"),s.hovered().fill(e[7]),h.colorRange(!0),h.colorRange().length(1e3),s.selectionMode("none");var i=h.title();i.enabled(!0),i.text("Choropleth Map kasus "+t+" COVID-19 di Sulawesi Tengah")},loadMap:function(){axios.get("/corona/public/assets/geojson/sulteng.json").then((function(t){h.geoData(t.data)}))},intervalUpdater:function(){var t=this;setInterval((function(){t.getDistrictData()}),3e5)}},mounted:function(){var t=this.$refs.map_kabupaten_case;this.getDistrictData(),null==h.geoData()&&this.loadMap(),this.intervalUpdater();var a="Data COVID-19 Sulawesi Tengah_"+(this.today.getDate()+"-"+(this.today.getMonth()+1)+"-"+this.today.getFullYear());h.exports().filename(a),h.maxBubbleSize(35),h.minBubbleSize(9);var e=anychart.ui.zoom();e.target(h),e.render(),h.container(t),h.draw(!0)}},p=Object(r.a)(v,(function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",{staticClass:"w-full p-3 text-xs bg-white rounded-lg shadow-lg md:text-base"},[e("div",[e("div",{staticClass:"flex flex-wrap justify-center max-w-md mx-auto text-center"},[e("div",{staticClass:"flex items-center mr-4"},[e("input",{staticClass:"hidden",attrs:{id:"district-positif",type:"radio",name:"data_covid",value:"Positif",checked:""},on:{change:function(a){return t.createChoroplethMapLocal("Positif",t.districtPositiveDataset,t.districtPositiveColor)}}}),t._v(" "),t._m(0)]),t._v(" "),e("div",{staticClass:"flex items-center mr-4"},[e("input",{staticClass:"hidden",attrs:{id:"district-sembuh",type:"radio",name:"data_covid",value:"Sembuh"},on:{change:function(a){return t.createChoroplethMapLocal("Sembuh",t.districtRecoveredDataset,t.districtRecoveredColor)}}}),t._v(" "),t._m(1)]),t._v(" "),e("div",{staticClass:"flex items-center mr-4"},[e("input",{staticClass:"hidden",attrs:{id:"district-meninggal",type:"radio",name:"data_covid",value:"Meninggal"},on:{change:function(a){return t.createChoroplethMapLocal("Meninggal",t.districtDeathDataset,t.districtDeathColor)}}}),t._v(" "),t._m(2)]),t._v(" "),e("div",{staticClass:"flex items-center mr-4"},[e("input",{staticClass:"hidden",attrs:{id:"district-odp",type:"radio",name:"data_covid",value:"ODP"},on:{change:function(a){return t.createChoroplethMapLocal("ODP",t.districtODPDataset,t.districtODPColor)}}}),t._v(" "),t._m(3)]),t._v(" "),e("div",{staticClass:"flex items-center mr-4"},[e("input",{staticClass:"hidden",attrs:{id:"district-pdp",type:"radio",name:"data_covid",value:"PDP"},on:{change:function(a){return t.createChoroplethMapLocal("PDP",t.districtPDPDataset,t.districtPDPColor)}}}),t._v(" "),t._m(4)])]),t._v(" "),e("div",{ref:"map_kabupaten_case",staticClass:"w-full mt-2 rounded-b",staticStyle:{height:"500px"}})])])}),[function(){var t=this.$createElement,a=this._self._c||t;return a("label",{staticClass:"flex items-center cursor-pointer",attrs:{for:"district-positif"}},[a("span",{staticClass:"inline-block w-4 h-4 mr-1 border rounded-full border-grey"}),this._v("\n          Positif\n        ")])},function(){var t=this.$createElement,a=this._self._c||t;return a("label",{staticClass:"flex items-center cursor-pointer",attrs:{for:"district-sembuh"}},[a("span",{staticClass:"inline-block w-4 h-4 mr-1 border rounded-full border-grey"}),this._v("\n          Sembuh\n        ")])},function(){var t=this.$createElement,a=this._self._c||t;return a("label",{staticClass:"flex items-center cursor-pointer",attrs:{for:"district-meninggal"}},[a("span",{staticClass:"inline-block w-4 h-4 mr-1 border rounded-full border-grey"}),this._v("\n          Meninggal\n        ")])},function(){var t=this.$createElement,a=this._self._c||t;return a("label",{staticClass:"flex items-center cursor-pointer",attrs:{for:"district-odp"}},[a("span",{staticClass:"inline-block w-4 h-4 mr-1 border rounded-full border-grey"}),this._v("\n          ODP\n        ")])},function(){var t=this.$createElement,a=this._self._c||t;return a("label",{staticClass:"flex items-center cursor-pointer",attrs:{for:"district-pdp"}},[a("span",{staticClass:"inline-block w-4 h-4 mr-1 border rounded-full border-grey"}),this._v("\n          PDP\n        ")])}],!1,null,null,null).exports,g=e(28),b=e.n(g);function _(t,a,e,s,i,n,l){try{var r=t[n](l),o=r.value}catch(t){return void e(t)}r.done?a(o):Promise.resolve(o).then(s,i)}var x=anychart.map(),C={data:function(){return{today:new Date,districtRecoveredDataset:[],districtPositiveDataset:[],districtDeathDataset:[],districtODPDataset:[],districtPDPDataset:[],districtPositiveColor:["#F9CACD","#F4A8AC","#EE868B","#E76569","#DF4346","#820029","#6E002C","#CD0000"],districtRecoveredColor:["#DEEDCF","#BFE1B0","#99D492","#74C67A","#56B870","#0E4D64","#0A2F51","#1D9A6C"],districtDeathColor:["#FFF3BA","#FFEB9B","#FFE07C","#FFD45D","#FFC63E","#E1851E","#DA7F25","#FFA500"],districtODPColor:["#DFE4F8","#BECCF1","#9FB5E8","#80A2DF","#6190D5","#174689","#0E2C63","#2773BF"],districtPDPColor:["#DEADD0","#D291C3","#C574B6","#B757AB","#A93AA1","#720060","#65004C","#88008B"]}},methods:{getDistrictData:function(){var t,a=this;return(t=b.a.mark((function t(){return b.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:axios.get("/corona/api/kabupaten").then((function(t){a.districtPositiveDataset.length>0&&(a.districts=null,a.districtPositiveDataset=[],a.districtRecoveredDataset=[],a.districtDeathDataset=[],a.districtODPDataset=[],a.districtPDPDataset=[]),a.districts=t.data.data,a.districts.forEach((function(t){a.districtPositiveDataset.push({id:t.kabupaten,value:t.positif,sembuh:t.sembuh,meninggal:t.meninggal,ODP:t.dalam_pemantauan,PDP:t.dalam_pengawasan}),a.districtRecoveredDataset.push({id:t.kabupaten,value:t.sembuh,positif:t.positif,meninggal:t.meninggal,ODP:t.dalam_pemantauan,PDP:t.dalam_pengawasan}),a.districtDeathDataset.push({id:t.kabupaten,value:t.meninggal,positif:t.positif,sembuh:t.sembuh,ODP:t.dalam_pemantauan,PDP:t.dalam_pengawasan}),a.districtODPDataset.push({id:t.kabupaten,value:t.dalam_pemantauan,positif:t.positif,sembuh:t.sembuh,meninggal:t.meninggal,PDP:t.dalam_pengawasan}),a.districtPDPDataset.push({id:t.kabupaten,value:t.dalam_pengawasan,positif:t.positif,sembuh:t.sembuh,meninggal:t.meninggal,ODP:t.dalam_pemantauan})}))}));case 1:case"end":return t.stop()}}),t)})),function(){var a=this,e=arguments;return new Promise((function(s,i){var n=t.apply(a,e);function l(t){_(n,s,i,l,r,"next",t)}function r(t){_(n,s,i,l,r,"throw",t)}l(void 0)}))})()},createClusterLocal:function(t,a,e){x.colorRange().enabled(!1),x.removeAllSeries(),a=anychart.data.set(a).mapAs({size:"value"});var s=x.bubble(a);s.name(t+"(Cluster)"),s.selectionMode("none"),s.labels(!0),s.labels().format("{%value}"),s.labels().fontWeight(600),s.labels().fontColor("Black"),s.fill(e[3],.35),s.hovered().fill(e[5],.7),s.stroke(e[3]),s.tooltip().titleFormat((function(t){return t.getData("id")})),s.tooltip().hideDelay(5e3),s.tooltip().format(t+" : {%value}"),s.hovered().stroke(e[5]);var i=x.title();i.enabled(!0),i.text("Bubble Map kasus "+t+" COVID-19 di Sulawesi Tengah")},loadMap:function(){axios.get("/corona/public/assets/geojson/sulteng.json").then((function(t){x.geoData(t.data)}))},intervalUpdater:function(){var t=this;setInterval((function(){t.getDistrictData()}),3e5)}},mounted:function(){var t=this.$refs.map_kabupaten_bubble;this.getDistrictData(),null==x.geoData()&&this.loadMap(),this.intervalUpdater();var a="Data COVID-19 Sulawesi Tengah_"+(this.today.getDate()+"-"+(this.today.getMonth()+1)+"-"+this.today.getFullYear());x.exports().filename(a),x.maxBubbleSize(35),x.minBubbleSize(9);var e=anychart.ui.zoom();e.target(x),e.render(),x.container(t),x.maxBubbleSize(35),x.minBubbleSize(9),x.draw(!0)}},D=Object(r.a)(C,(function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",{staticClass:"w-full p-3 text-xs bg-white rounded-lg shadow-lg md:text-base"},[e("div",[e("div",{staticClass:"flex flex-wrap justify-center max-w-md mx-auto text-center"},[e("div",{staticClass:"flex items-center mr-4"},[e("input",{staticClass:"hidden",attrs:{id:"district-positif-bubble",type:"radio",name:"data_covid_bubble",value:"Positif",checked:""},on:{change:function(a){return t.createClusterLocal("Positif",t.districtPositiveDataset,t.districtPositiveColor)}}}),t._v(" "),t._m(0)]),t._v(" "),e("div",{staticClass:"flex items-center mr-4"},[e("input",{staticClass:"hidden",attrs:{id:"district-sembuh-bubble",type:"radio",name:"data_covid_bubble",value:"Sembuh"},on:{change:function(a){return t.createClusterLocal("Sembuh",t.districtRecoveredDataset,t.districtRecoveredColor)}}}),t._v(" "),t._m(1)]),t._v(" "),e("div",{staticClass:"flex items-center mr-4"},[e("input",{staticClass:"hidden",attrs:{id:"district-meninggal-bubble",type:"radio",name:"data_covid_bubble",value:"Meninggal"},on:{change:function(a){return t.createClusterLocal("Meninggal",t.districtDeathDataset,t.districtDeathColor)}}}),t._v(" "),t._m(2)]),t._v(" "),e("div",{staticClass:"flex items-center mr-4"},[e("input",{staticClass:"hidden",attrs:{id:"district-odp-bubble",type:"radio",name:"data_covid_bubble",value:"ODP"},on:{change:function(a){return t.createClusterLocal("ODP",t.districtODPDataset,t.districtODPColor)}}}),t._v(" "),t._m(3)]),t._v(" "),e("div",{staticClass:"flex items-center mr-4"},[e("input",{staticClass:"hidden",attrs:{id:"district-pdp-bubble",type:"radio",name:"data_covid_bubble",value:"PDP"},on:{change:function(a){return t.createClusterLocal("PDP",t.districtPDPDataset,t.districtPDPColor)}}}),t._v(" "),t._m(4)])]),t._v(" "),e("div",{ref:"map_kabupaten_bubble",staticClass:"w-full mt-2 rounded-b",staticStyle:{height:"500px"}})])])}),[function(){var t=this.$createElement,a=this._self._c||t;return a("label",{staticClass:"flex items-center cursor-pointer",attrs:{for:"district-positif-bubble"}},[a("span",{staticClass:"inline-block w-4 h-4 mr-1 border rounded-full border-grey"}),this._v("\n          Positif\n        ")])},function(){var t=this.$createElement,a=this._self._c||t;return a("label",{staticClass:"flex items-center cursor-pointer",attrs:{for:"district-sembuh-bubble"}},[a("span",{staticClass:"inline-block w-4 h-4 mr-1 border rounded-full border-grey"}),this._v("\n          Sembuh\n        ")])},function(){var t=this.$createElement,a=this._self._c||t;return a("label",{staticClass:"flex items-center cursor-pointer",attrs:{for:"district-meninggal-bubble"}},[a("span",{staticClass:"inline-block w-4 h-4 mr-1 border rounded-full border-grey"}),this._v("\n          Meninggal\n        ")])},function(){var t=this.$createElement,a=this._self._c||t;return a("label",{staticClass:"flex items-center cursor-pointer",attrs:{for:"district-odp-bubble"}},[a("span",{staticClass:"inline-block w-4 h-4 mr-1 border rounded-full border-grey"}),this._v("\n          ODP\n        ")])},function(){var t=this.$createElement,a=this._self._c||t;return a("label",{staticClass:"flex items-center cursor-pointer",attrs:{for:"district-pdp-bubble"}},[a("span",{staticClass:"inline-block w-4 h-4 mr-1 border rounded-full border-grey"}),this._v("\n          PDP\n        ")])}],!1,null,null,null).exports,P=new Intl.NumberFormat("id"),w={components:{ContentLoader:d.a,CardCase:m.a,CardSuspect:f.a,MapChoropleth:p,MapBubble:D},data:function(){return{openTab:1,statistics:null,totalPositif:0,totalSembuh:0,totalMeninggal:0,positifBaru:0,sembuhBaru:0,meninggalBaru:0,ODPBaru:0,ODPAktif:0,PDPBaru:0,PDPAktif:0,selesaiODP:0,selesaiODPBaru:0,selesaiPDP:0,selesaiPDPBaru:0,totalODP:0,totalPDP:0,positifNasional:0,sembuhNasional:0,meninggalNasional:0,positifBaruNasional:0,sembuhBaruNasional:0,meninggalBaruNasional:0}},methods:{toggleTabs:function(t){this.openTab=t},getStatistics:function(){var t=this;axios.get("/corona/api/statistik/terkini").then((function(a){new Intl.NumberFormat("id-ID");t.statistics=a.data.data,t.totalPositif=P.format(t.statistics.kumulatif.positif),t.totalSembuh=P.format(t.statistics.kumulatif.sembuh),t.totalMeninggal=P.format(t.statistics.kumulatif.meninggal),t.positifBaru=P.format(t.statistics.kasus_baru.positif),t.sembuhBaru=P.format(t.statistics.kasus_baru.sembuh),t.meninggalBaru=P.format(t.statistics.kasus_baru.meninggal),t.totalODP=P.format(t.statistics.kumulatif.ODP),t.selesaiODP=P.format(t.statistics.kumulatif.selesai_ODP),t.ODPAktif=P.format(t.statistics.aktif.ODP),t.ODPBaru=P.format(t.statistics.kasus_baru.ODP),t.selesaiODPBaru=P.format(t.statistics.selesai.ODP),t.totalPDP=P.format(t.statistics.kumulatif.PDP),t.selesaiPDP=P.format(t.statistics.kumulatif.selesai_PDP),t.PDPAktif=P.format(t.statistics.aktif.PDP),t.PDPBaru=P.format(t.statistics.kasus_baru.PDP),t.selesaiPDPBaru=P.format(t.statistics.selesai.PDP)})).catch((function(t){return console.log(t)}))},getNationalData:function(){var t=this;axios.get("/corona/api/nasional/terkini").then((function(a){var e=a.data.data;t.positifNasional=P.format(e.kumulatif.positif),t.sembuhNasional=P.format(e.kumulatif.sembuh),t.meninggalNasional=P.format(e.kumulatif.meninggal),t.positifBaruNasional=P.format(e.kasus_baru.positif),t.sembuhBaruNasional=P.format(e.kasus_baru.sembuh),t.meninggalBaruNasional=P.format(e.kasus_baru.meninggal)}))}},mounted:function(){var t=this;this.getStatistics(),this.getNationalData(),setInterval((function(){t.getStatistics(),t.getNationalData()}),6e4)}},k=Object(r.a)(w,(function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",{staticClass:"w-full"},[e("ul",{staticClass:"flex flex-row flex-wrap pt-3 mb-0 list-none border-b-2"},[e("li",{staticClass:"flex-1 mr-2 -mb-px last:mr-0"},[e("a",{staticClass:"block px-5 py-3 text-xs font-bold md:text-sm",class:{"text-black":1!==t.openTab,"text-blue-600 border-blue-600 border-b-2":1===t.openTab},on:{click:function(a){return t.toggleTabs(1)}}},[t._v("Statistik")])]),t._v(" "),e("li",{staticClass:"flex-1 mr-2 -mb-px last:mr-0"},[e("a",{staticClass:"block px-5 py-3 text-xs font-bold md:text-sm",class:{"text-black":2!==t.openTab,"text-blue-600 border-blue-600 border-b-2":2===t.openTab},on:{click:function(a){return t.toggleTabs(2)}}},[e("span",{staticClass:"hidden sm:block"},[t._v("Peta Sebaran Kab./Kota")]),t._v(" "),e("span",{staticClass:"block sm:hidden"},[t._v("Heat Map")])])]),t._v(" "),e("li",{staticClass:"flex-1 mr-2 -mb-px last:mr-0"},[e("a",{staticClass:"block px-5 py-3 text-xs font-bold md:text-sm",class:{"text-black":3!==t.openTab,"text-blue-600 border-blue-600 border-b-2":3===t.openTab},on:{click:function(a){return t.toggleTabs(3)}}},[e("span",{staticClass:"hidden sm:block"},[t._v("Peta Titik Sebaran Kasus")]),t._v(" "),e("span",{staticClass:"block sm:hidden"},[t._v("Bubble Map")])])])]),t._v(" "),t.statistics||this.positifNasional?e("div",{staticClass:"relative flex flex-col w-full min-w-0 mb-6 break-words"},[e("div",{staticClass:"flex-1 py-5"},[e("div",{staticClass:"tab-content tab-space"},[e("div",{class:{hidden:1!==t.openTab,"block items-center justify-center flex flex-wrap flex-col md:flex-row w-full":1===t.openTab}},[e("card-case",{attrs:{title:"Positif",cumulative_local:t.totalPositif,new_local:t.positifBaru,cumulative_national:t.positifNasional,new_national:t.positifBaruNasional,bg_card:"bg-red-300",bg_new:"bg-red-400",text_color:"text-red-300"}}),t._v(" "),e("card-case",{attrs:{title:"Sembuh",cumulative_local:t.totalSembuh,new_local:t.sembuhBaru,cumulative_national:t.sembuhNasional,new_national:t.sembuhBaruNasional,bg_card:"bg-green-300",bg_new:"bg-green-400",text_color:"text-green-300"}}),t._v(" "),e("card-case",{attrs:{title:"Meninggal",cumulative_local:t.totalMeninggal,new_local:t.meninggalBaru,cumulative_national:t.meninggalNasional,new_national:t.meninggalBaruNasional,bg_card:"bg-orange-300",bg_new:"bg-orange-400",text_color:"text-orange-300"}}),t._v(" "),e("card-suspect",{attrs:{title:"Pasien Dalam Pengawasan (PDP)",new_case:t.PDPBaru,new_finished_case:t.selesaiPDPBaru,active_case:t.PDPAktif,total_case:t.totalPDP,total_finished_case:t.selesaiPDP,status:"Pengawasan"}}),t._v(" "),e("card-suspect",{attrs:{title:"Orang Dalam Pemantauan (ODP)",new_case:t.ODPBaru,new_finished_case:t.selesaiODPBaru,active_case:t.ODPAktif,total_case:t.totalODP,total_finished_case:t.selesaiODP,status:"Pemantauan"}})],1),t._v(" "),e("div",{class:{hidden:2!==t.openTab,"block mx-6 text-center bg-white rounded-lg shadow-lg":2===t.openTab}},[e("keep-alive",[e("map-choropleth")],1)],1),t._v(" "),e("div",{class:{hidden:3!==t.openTab,"block mx-6 text-center bg-white rounded-lg shadow-lg":3===t.openTab}},[e("keep-alive",[e("map-bubble")],1)],1)])])]):e("content-loader",{attrs:{height:400,width:900,speed:1,primaryColor:"#ddd",secondaryColor:"#fff"}},[e("rect",{attrs:{x:"0",y:"20",rx:"3",ry:"3",width:"290",height:"110"}}),t._v(" "),e("rect",{attrs:{x:"320",y:"20",rx:"3",ry:"3",width:"290",height:"110"}}),t._v(" "),e("rect",{attrs:{x:"640",y:"20",rx:"3",ry:"3",width:"290",height:"110"}}),t._v(" "),e("rect",{attrs:{x:"0",y:"150",rx:"3",ry:"3",width:"450",height:"210"}}),t._v(" "),e("rect",{attrs:{x:"480",y:"150",rx:"3",ry:"3",width:"450",height:"210"}})]),t._v(" "),e("div",{staticClass:"flex flex-row w-full text-xl text-blue-600 hover:text-blue-400"},[e("router-link",{staticClass:"mx-auto",attrs:{to:"/corona/data"}},[t._v("\n      Lihat Selengkapnya\n      "),e("i",{staticClass:"fas fa-angle-right",attrs:{"aria-hidden":"true"}})])],1)],1)}),[],!1,null,null,null).exports,y=e(99),O=e(12).format,B=e(30).formatToTimeZone,E={components:{ContentLoader:d.a,DataTabs:k},data:function(){return{stats:null,lastUpdate:null}},methods:{getDistricts:function(){var t=this;axios.get("/corona/api/nasional/terkini").then((function(a){t.stats=a.data.data;var e=B(new Date(t.stats.tanggal),"HH:mm:ss",{timeZone:"Asia/Makassar"});t.lastUpdate=O(new Date(t.stats.tanggal),"EEEE, dd MMMM yyyy",{locale:y.a}),t.lastUpdate+=" "+e})).catch((function(t){return console.log(t)}))}},mounted:function(){var t=this;this.getDistricts(),setInterval((function(){t.getDistricts}))}},F={components:{CardLindungi:function(){return e.e(9).then(e.bind(null,107))},CardPeriksa:function(){return e.e(10).then(e.bind(null,108))},Simptomps:function(){return e.e(1).then(e.bind(null,102))}}},S={components:{CarouselComponent:o,CallCenterComponent:c,Donation:u,DataCovid:Object(r.a)(E,(function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",{staticClass:"flex flex-wrap justify-center mt-8 md:mt-16"},[e("h3",{staticClass:"w-full font-bold text-center text-md lg:text-left md:ml-10 md:text-3xl"},[t._v("Situasi Terkini COVID-19 di Sulawesi Tengah")]),t._v(" "),t.lastUpdate?e("p",{staticClass:"w-full h-10 text-xs text-center lg:text-left md:ml-10 text-muted md:text-lg"},[t._v("\n    Pembaruan Terakhir :\n    "+t._s(t.lastUpdate)+"\n    WITA\n    "),e("br"),t._v(" "),t._m(0)]):e("div",{staticClass:"h-10"},[e("content-loader",{attrs:{speed:2,height:400,width:900,animate:!0,primaryColor:"#ddd",secondaryColor:"#fff"}},[e("rect",{attrs:{x:"30",y:"0",rx:"3",ry:"3",width:"400",height:"15"}})])],1),t._v(" "),e("data-tabs",{staticClass:"md:ml-8"})],1)}),[function(){var t=this.$createElement,a=this._self._c||t;return a("i",{staticClass:"text-xs text-gray-600"},[this._v("\n      Sumber data :\n      "),a("a",{staticClass:"no-underline hover:no-underline hover:text-blue-200",attrs:{href:"https://dinkes.sultengprov.go.id"}},[this._v("https://dinkes.sultengprov.go.id")])])}],!1,null,null,null).exports,InfoCovid:Object(r.a)(F,(function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",[e("div",{staticClass:"mt-12"},[e("h3",{staticClass:"w-auto font-bold text-center text-md md:ml-10 md:text-3xl"},[t._v("Apa yang Harus Dilakukan?")]),t._v(" "),e("card-periksa"),t._v(" "),e("card-lindungi",{staticClass:"mt-8"})],1),t._v(" "),e("div",{staticClass:"mt-12"},[e("h3",{staticClass:"w-auto font-bold text-center text-md md:ml-10 md:text-3xl"},[t._v("Apa yang Harus Diketahui?")]),t._v(" "),e("div",{staticClass:"w-full mt-4"},[e("div",{staticClass:"p-6 mx-4"},[e("h3",{staticClass:"text-xl font-bold lg:text-2xl"},[t._v("Apa Itu COVID-19?")]),t._v(" "),t._m(0),t._v(" "),e("h3",{staticClass:"mt-4 text-xl font-bold lg:text-2xl"},[t._v("Gejala")]),t._v(" "),e("Simptomps"),t._v(" "),t._m(1),t._v(" "),t._m(2)],1)])])])}),[function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",{staticClass:"flex flex-row w-full"},[e("span",{staticClass:"w-auto mt-2 text-xs text-justify lg:text-lg"},[t._v("\n            COVID-19 adalah penyakit yang disebabkan oleh "),e("span",{staticClass:"italic font-semibold"},[t._v("Novel Coronavirus (2019-nCoV)")]),t._v(", jenis baru coronavirus yang pada manusia menyebabkan penyakit mulai flu biasa hingga penyakit yang serius seperti "),e("span",{staticClass:"italic font-semibold"},[t._v("Middle East Respiratory Syndrome (MERS)")]),t._v(" dan Sindrom Pernapasan Akut Berat/\n            "),e("span",{staticClass:"italic font-semibold"},[t._v("Severe Acute Respiratory Syndrome (SARS)")]),t._v(".\n            "),e("br"),t._v(" "),e("br"),t._v("Pada 11 Februari 2020, "),e("span",{staticClass:"italic font-semibold"},[t._v("World Health Organization (WHO)")]),t._v(" mengumumkan nama penyakit yang disebabkan 2019-nCov, yaitu Coronavirus Disease (COVID-19).\n          ")])])},function(){var t=this.$createElement,a=this._self._c||t;return a("div",{staticClass:"flex flex-row w-full"},[a("span",{staticClass:"w-auto mt-2 text-xs text-justify lg:text-lg"},[this._v("Gejala umum berupa demam ≥38°C, batuk kering, dan sesak napas. Jika ada orang yang dalam 14 hari sebelum muncul gejala tersebut pernah melakukan perjalanan ke negara terjangkit, atau pernah merawat/kontak erat dengan penderita COVID-19, maka terhadap orang tersebut akan dilakukan pemeriksaan laboratorium lebih lanjut untuk memastikan diagnosisnya.")])])},function(){var t=this.$createElement,a=this._self._c||t;return a("i",{staticClass:"mt-8 text-xs text-gray-600"},[this._v("\n          Sumber materi :\n          "),a("a",{staticClass:"no-underline hover:no-underline hover:text-blue-200",attrs:{href:"https://pikobar.jabarprov.go.id"}},[this._v("https://pikobar.jabarprov.go.id")])])}],!1,null,null,null).exports,Partner:e(9).a}},A=Object(r.a)(S,(function(){var t=this.$createElement,a=this._self._c||t;return a("div",{staticClass:"w-full leading-normal text-gray-800 xl:px-0 xl:mt-8"},[a("div",{staticClass:"flex flex-wrap justify-center"},[a("carousel-component",{staticClass:"rounded-lg shadow-lg w-96 sm:w-screen xl:max-w-lg xl:w-1/2"}),this._v(" "),a("div",{staticClass:"flex flex-col flex-wrap w-full mt-4 xl:w-1/2 xl:ml-12 xl:-mt-3"},[a("call-center-component",{staticClass:"flex flex-wrap justify-center w-full"}),this._v(" "),a("Donation")],1)],1),this._v(" "),a("keep-alive",[a("data-covid",{staticClass:"mt-8"})],1),this._v(" "),a("InfoCovid",{staticClass:"mt-16 md:ml-10"}),this._v(" "),a("div",{staticClass:"flex flex-row w-full text-xl text-blue-600 hover:text-blue-400"},[a("router-link",{staticClass:"mx-auto",attrs:{to:"/corona/wiki"}},[this._v("\n      Lihat Selengkapnya\n      "),a("i",{staticClass:"fas fa-angle-right",attrs:{"aria-hidden":"true"}})])],1),this._v(" "),a("Partner",{staticClass:"mt-16"})],1)}),[],!1,null,null,null);a.default=A.exports}}]);