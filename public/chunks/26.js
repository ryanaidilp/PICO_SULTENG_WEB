(window.webpackJsonp=window.webpackJsonp||[]).push([[26],{kGIl:function(t,e,i){"undefined"!=typeof self&&self,t.exports=function(t){var e={};function i(a){if(e[a])return e[a].exports;var n=e[a]={i:a,l:!1,exports:{}};return t[a].call(n.exports,n,n.exports,i),n.l=!0,n.exports}return i.m=t,i.c=e,i.d=function(t,e,a){i.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:a})},i.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},i.t=function(t,e){if(1&e&&(t=i(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var a=Object.create(null);if(i.r(a),Object.defineProperty(a,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var n in t)i.d(a,n,function(e){return t[e]}.bind(null,n));return a},i.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return i.d(e,"a",e),e},i.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},i.p="",i(i.s=1)}([function(t,e,i){},function(t,e,i){"use strict";i.r(e);var a="undefined"!=typeof window?window.HTMLElement:Object,n={mounted:function(){document.addEventListener("focusin",this.focusIn)},methods:{focusIn:function(t){if(this.isActive&&t.target!==this.$el&&!this.$el.contains(t.target)){var e=this.container?this.container:this.isFullPage?null:this.$el.parentElement;(this.isFullPage||e&&e.contains(t.target))&&(t.preventDefault(),this.$el.focus())}}},beforeDestroy:function(){document.removeEventListener("focusin",this.focusIn)}};function r(t,e,i,a,n,r,s,o){var l,c="function"==typeof t?t.options:t;if(e&&(c.render=e,c.staticRenderFns=i,c._compiled=!0),a&&(c.functional=!0),r&&(c._scopeId="data-v-"+r),s?(l=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),n&&n.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(s)},c._ssrRegister=l):n&&(l=o?function(){n.call(this,this.$root.$options.shadowRoot)}:n),l)if(c.functional){c._injectStyles=l;var u=c.render;c.render=function(t,e){return l.call(e),u(t,e)}}else{var d=c.beforeCreate;c.beforeCreate=d?[].concat(d,l):[l]}return{exports:t,options:c}}var s=r({name:"spinner",props:{color:{type:String,default:"#000"},height:{type:Number,default:64},width:{type:Number,default:64}}},(function(){var t=this.$createElement,e=this._self._c||t;return e("svg",{attrs:{viewBox:"0 0 38 38",xmlns:"http://www.w3.org/2000/svg",width:this.width,height:this.height,stroke:this.color}},[e("g",{attrs:{fill:"none","fill-rule":"evenodd"}},[e("g",{attrs:{transform:"translate(1 1)","stroke-width":"2"}},[e("circle",{attrs:{"stroke-opacity":".25",cx:"18",cy:"18",r:"18"}}),e("path",{attrs:{d:"M36 18c0-9.94-8.06-18-18-18"}},[e("animateTransform",{attrs:{attributeName:"transform",type:"rotate",from:"0 18 18",to:"360 18 18",dur:"0.8s",repeatCount:"indefinite"}})],1)])])])}),[],!1,null,null,null).exports,o=r({name:"dots",props:{color:{type:String,default:"#000"},height:{type:Number,default:240},width:{type:Number,default:60}}},(function(){var t=this.$createElement,e=this._self._c||t;return e("svg",{attrs:{viewBox:"0 0 120 30",xmlns:"http://www.w3.org/2000/svg",fill:this.color,width:this.width,height:this.height}},[e("circle",{attrs:{cx:"15",cy:"15",r:"15"}},[e("animate",{attrs:{attributeName:"r",from:"15",to:"15",begin:"0s",dur:"0.8s",values:"15;9;15",calcMode:"linear",repeatCount:"indefinite"}}),e("animate",{attrs:{attributeName:"fill-opacity",from:"1",to:"1",begin:"0s",dur:"0.8s",values:"1;.5;1",calcMode:"linear",repeatCount:"indefinite"}})]),e("circle",{attrs:{cx:"60",cy:"15",r:"9","fill-opacity":"0.3"}},[e("animate",{attrs:{attributeName:"r",from:"9",to:"9",begin:"0s",dur:"0.8s",values:"9;15;9",calcMode:"linear",repeatCount:"indefinite"}}),e("animate",{attrs:{attributeName:"fill-opacity",from:"0.5",to:"0.5",begin:"0s",dur:"0.8s",values:".5;1;.5",calcMode:"linear",repeatCount:"indefinite"}})]),e("circle",{attrs:{cx:"105",cy:"15",r:"15"}},[e("animate",{attrs:{attributeName:"r",from:"15",to:"15",begin:"0s",dur:"0.8s",values:"15;9;15",calcMode:"linear",repeatCount:"indefinite"}}),e("animate",{attrs:{attributeName:"fill-opacity",from:"1",to:"1",begin:"0s",dur:"0.8s",values:"1;.5;1",calcMode:"linear",repeatCount:"indefinite"}})])])}),[],!1,null,null,null).exports,l=r({name:"bars",props:{color:{type:String,default:"#000"},height:{type:Number,default:40},width:{type:Number,default:40}}},(function(){var t=this.$createElement,e=this._self._c||t;return e("svg",{attrs:{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 30 30",height:this.height,width:this.width,fill:this.color}},[e("rect",{attrs:{x:"0",y:"13",width:"4",height:"5"}},[e("animate",{attrs:{attributeName:"height",attributeType:"XML",values:"5;21;5",begin:"0s",dur:"0.6s",repeatCount:"indefinite"}}),e("animate",{attrs:{attributeName:"y",attributeType:"XML",values:"13; 5; 13",begin:"0s",dur:"0.6s",repeatCount:"indefinite"}})]),e("rect",{attrs:{x:"10",y:"13",width:"4",height:"5"}},[e("animate",{attrs:{attributeName:"height",attributeType:"XML",values:"5;21;5",begin:"0.15s",dur:"0.6s",repeatCount:"indefinite"}}),e("animate",{attrs:{attributeName:"y",attributeType:"XML",values:"13; 5; 13",begin:"0.15s",dur:"0.6s",repeatCount:"indefinite"}})]),e("rect",{attrs:{x:"20",y:"13",width:"4",height:"5"}},[e("animate",{attrs:{attributeName:"height",attributeType:"XML",values:"5;21;5",begin:"0.3s",dur:"0.6s",repeatCount:"indefinite"}}),e("animate",{attrs:{attributeName:"y",attributeType:"XML",values:"13; 5; 13",begin:"0.3s",dur:"0.6s",repeatCount:"indefinite"}})])])}),[],!1,null,null,null).exports,c=r({name:"vue-loading",mixins:[n],props:{active:Boolean,programmatic:Boolean,container:[Object,Function,a],isFullPage:{type:Boolean,default:!0},transition:{type:String,default:"fade"},canCancel:Boolean,onCancel:{type:Function,default:function(){}},color:String,backgroundColor:String,opacity:Number,width:Number,height:Number,zIndex:Number,loader:{type:String,default:"spinner"}},data:function(){return{isActive:this.active}},components:{Spinner:s,Dots:o,Bars:l},beforeMount:function(){this.programmatic&&(this.container?(this.isFullPage=!1,this.container.appendChild(this.$el)):document.body.appendChild(this.$el))},mounted:function(){this.programmatic&&(this.isActive=!0),document.addEventListener("keyup",this.keyPress)},methods:{cancel:function(){this.canCancel&&this.isActive&&(this.hide(),this.onCancel.apply(null,arguments))},hide:function(){var t=this;this.$emit("hide"),this.$emit("update:active",!1),this.programmatic&&(this.isActive=!1,setTimeout((function(){var e;t.$destroy(),void 0!==(e=t.$el).remove?e.remove():e.parentNode.removeChild(e)}),150))},keyPress:function(t){27===t.keyCode&&this.cancel()}},watch:{active:function(t){this.isActive=t}},beforeDestroy:function(){document.removeEventListener("keyup",this.keyPress)}},(function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("transition",{attrs:{name:t.transition}},[i("div",{directives:[{name:"show",rawName:"v-show",value:t.isActive,expression:"isActive"}],staticClass:"vld-overlay is-active",class:{"is-full-page":t.isFullPage},style:{zIndex:t.zIndex},attrs:{tabindex:"0","aria-busy":t.isActive,"aria-label":"Loading"}},[i("div",{staticClass:"vld-background",style:{background:t.backgroundColor,opacity:t.opacity},on:{click:function(e){return e.preventDefault(),t.cancel(e)}}}),i("div",{staticClass:"vld-icon"},[t._t("before"),t._t("default",[i(t.loader,{tag:"component",attrs:{color:t.color,width:t.width,height:t.height}})]),t._t("after")],2)])])}),[],!1,null,null,null).exports,u=function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},i=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};return{show:function(){var a=arguments.length>0&&void 0!==arguments[0]?arguments[0]:e,n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:i,r={programmatic:!0},s=Object.assign({},e,a,r),o=new(t.extend(c))({el:document.createElement("div"),propsData:s}),l=Object.assign({},i,n);return Object.keys(l).map((function(t){o.$slots[t]=l[t]})),o}}};i(0),c.install=function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},i=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{},a=u(t,e,i);t.$loading=a,t.prototype.$loading=a},e.default=c}]).default},twKv:function(t,e,i){"use strict";i.r(e);var a=i("kGIl"),n=i.n(a),r=(i("Xd0Y"),anychart.map()),s={components:{Loading:n.a},data:function(){return{isLoading:!1,today:new Date,districtRecoveredDataset:[],districtPositiveDataset:[],districtDeathDataset:[],districtODPDataset:[],districtPDPDataset:[],districtPositiveColor:["#418a47","#81a24c","#bdb75a","#facb75","#f39e5b","#e87050","#d43d51","#CD0000"],districtRecoveredColor:["#398c2a","#3e982e","#44a433","#4ab037","#4fbc3c","#55c841","#5bd445","#61e14a"],districtDeathColor:["#FFF3BA","#FFEB9B","#FFE07C","#FFD45D","#FFC63E","#E1851E","#DA7F25","#FFA500"],districtODPColor:["#DFE4F8","#BECCF1","#9FB5E8","#80A2DF","#6190D5","#174689","#0E2C63","#2773BF"],districtPDPColor:["#DEADD0","#D291C3","#C574B6","#B757AB","#A93AA1","#720060","#65004C","#88008B"]}},methods:{getDistrictData:function(){var t=this;this.isLoading=!0,axios.get("/corona/api/kabupaten").then((function(e){t.districtPositiveDataset.length>0&&(t.districts=null,t.districtPositiveDataset=[],t.districtRecoveredDataset=[],t.districtDeathDataset=[],t.districtODPDataset=[],t.districtPDPDataset=[]),t.districts=e.data.data,t.districts.forEach((function(e){t.districtPositiveDataset.push({id:e.kabupaten,value:e.positif,sembuh:e.sembuh,meninggal:e.meninggal,ODP:e.dalam_pemantauan,PDP:e.dalam_pengawasan}),t.districtRecoveredDataset.push({id:e.kabupaten,value:e.sembuh,positif:e.positif,meninggal:e.meninggal,ODP:e.dalam_pemantauan,PDP:e.dalam_pengawasan}),t.districtDeathDataset.push({id:e.kabupaten,value:e.meninggal,positif:e.positif,sembuh:e.sembuh,ODP:e.dalam_pemantauan,PDP:e.dalam_pengawasan}),t.districtODPDataset.push({id:e.kabupaten,value:e.dalam_pemantauan,positif:e.positif,sembuh:e.sembuh,meninggal:e.meninggal,PDP:e.dalam_pengawasan}),t.districtPDPDataset.push({id:e.kabupaten,value:e.dalam_pengawasan,positif:e.positif,sembuh:e.sembuh,meninggal:e.meninggal,ODP:e.dalam_pemantauan})}))})),this.isLoading=!1},createChoroplethMapLocal:function(t,e,i){this.isLoading=!0,r.removeAllSeries();var a=r.choropleth(e);a.labels(!0),a.labels().format("{%value}"),a.labels().fontWeight(600),a.labels().fontColor("Black"),a.colorScale(anychart.scales.ordinalColor([{less:0,color:i[0]},{from:0,to:10,color:i[1]},{from:10,to:20,color:i[2]},{from:20,to:30,color:i[3]},{from:30,to:40,color:i[4]},{from:40,to:50,color:i[5]},{greater:50,color:i[6]}])),a.tooltip().titleFormat((function(t){return t.getData("id")})),a.tooltip().hideDelay(3e3),a.tooltip().format((function(t){var e=null==t.getData("positif")?t.getData("value"):t.getData("positif"),i=null==t.getData("sembuh")?t.getData("value"):t.getData("sembuh"),a=null==t.getData("meninggal")?t.getData("value"):t.getData("meninggal");return"Positif: "+e+"\nDirawat: "+(e-(i+a))+"\nSembuh: "+i+"\nMeninggal: "+a+"\nODP Aktif: "+(null==t.getData("ODP")?t.getData("value"):t.getData("ODP"))+"\nPDP Aktif: "+(null==t.getData("PDP")?t.getData("value"):t.getData("PDP"))})),a.name(t+"(Choropleth)"),a.hovered().fill(i[7]),r.colorRange(!0),r.colorRange().length(1e3),a.selectionMode("none");var n=r.title();n.enabled(!0),n.text("Choropleth Map kasus "+t+" COVID-19 di Sulawesi Tengah"),this.isLoading=!1},loadMap:function(){this.isLoading=!0,axios.get("/corona/public/assets/geojson/sulteng.json").then((function(t){r.geoData(t.data)})),this.isLoading=!1},intervalUpdater:function(){var t=this;setInterval((function(){t.getDistrictData()}),3e5)}},mounted:function(){var t=this.$refs.map_kabupaten_case;this.getDistrictData(),null==r.geoData()&&this.loadMap(),this.intervalUpdater();var e="Data COVID-19 Sulawesi Tengah_"+(this.today.getDate()+"-"+(this.today.getMonth()+1)+"-"+this.today.getFullYear());r.exports().filename(e),r.maxBubbleSize(35),r.minBubbleSize(9);var i=anychart.ui.zoom();i.target(r),i.render(),r.container(t),r.draw(!0)}},o=i("KHd+"),l=Object(o.a)(s,(function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"relative w-full p-3 text-xs bg-white rounded-lg shadow-lg md:text-base"},[i("div",{staticClass:"absolute flex justify-center w-full"},[i("loading",{attrs:{active:t.isLoading,opacity:.8,height:300,width:128,loader:"spinner",color:"#59F"},on:{"update:active":function(e){t.isLoading=e}}})],1),t._v(" "),i("div",[i("div",{staticClass:"flex flex-wrap justify-center max-w-md mx-auto text-center"},[i("div",{staticClass:"flex items-center mr-4"},[i("input",{staticClass:"hidden",attrs:{id:"district-positif",type:"radio",name:"data_covid_lokal",value:"Positif",checked:""},on:{change:function(e){return t.createChoroplethMapLocal("Positif",t.districtPositiveDataset,t.districtPositiveColor)}}}),t._v(" "),t._m(0)]),t._v(" "),i("div",{staticClass:"flex items-center mr-4"},[i("input",{staticClass:"hidden",attrs:{id:"district-sembuh",type:"radio",name:"data_covid_lokal",value:"Sembuh"},on:{change:function(e){return t.createChoroplethMapLocal("Sembuh",t.districtRecoveredDataset,t.districtRecoveredColor)}}}),t._v(" "),t._m(1)]),t._v(" "),i("div",{staticClass:"flex items-center mr-4"},[i("input",{staticClass:"hidden",attrs:{id:"district-meninggal",type:"radio",name:"data_covid_lokal",value:"Meninggal"},on:{change:function(e){return t.createChoroplethMapLocal("Meninggal",t.districtDeathDataset,t.districtDeathColor)}}}),t._v(" "),t._m(2)]),t._v(" "),i("div",{staticClass:"flex items-center mr-4"},[i("input",{staticClass:"hidden",attrs:{id:"district-odp",type:"radio",name:"data_covid_lokal",value:"ODP"},on:{change:function(e){return t.createChoroplethMapLocal("ODP",t.districtODPDataset,t.districtODPColor)}}}),t._v(" "),t._m(3)]),t._v(" "),i("div",{staticClass:"flex items-center mr-4"},[i("input",{staticClass:"hidden",attrs:{id:"district-pdp",type:"radio",name:"data_covid_lokal",value:"PDP"},on:{change:function(e){return t.createChoroplethMapLocal("PDP",t.districtPDPDataset,t.districtPDPColor)}}}),t._v(" "),t._m(4)])]),t._v(" "),i("div",{ref:"map_kabupaten_case",staticClass:"w-full mt-2 rounded-b",staticStyle:{height:"500px"}})])])}),[function(){var t=this.$createElement,e=this._self._c||t;return e("label",{staticClass:"flex items-center cursor-pointer",attrs:{for:"district-positif"}},[e("span",{staticClass:"inline-block w-4 h-4 mr-1 border rounded-full border-grey"}),this._v("\n          Positif\n        ")])},function(){var t=this.$createElement,e=this._self._c||t;return e("label",{staticClass:"flex items-center cursor-pointer",attrs:{for:"district-sembuh"}},[e("span",{staticClass:"inline-block w-4 h-4 mr-1 border rounded-full border-grey"}),this._v("\n          Sembuh\n        ")])},function(){var t=this.$createElement,e=this._self._c||t;return e("label",{staticClass:"flex items-center cursor-pointer",attrs:{for:"district-meninggal"}},[e("span",{staticClass:"inline-block w-4 h-4 mr-1 border rounded-full border-grey"}),this._v("\n          Meninggal\n        ")])},function(){var t=this.$createElement,e=this._self._c||t;return e("label",{staticClass:"flex items-center cursor-pointer",attrs:{for:"district-odp"}},[e("span",{staticClass:"inline-block w-4 h-4 mr-1 border rounded-full border-grey"}),this._v("\n          ODP\n        ")])},function(){var t=this.$createElement,e=this._self._c||t;return e("label",{staticClass:"flex items-center cursor-pointer",attrs:{for:"district-pdp"}},[e("span",{staticClass:"inline-block w-4 h-4 mr-1 border rounded-full border-grey"}),this._v("\n          PDP\n        ")])}],!1,null,null,null);e.default=l.exports}}]);