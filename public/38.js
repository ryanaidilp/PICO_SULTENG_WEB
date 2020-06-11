(window.webpackJsonp=window.webpackJsonp||[]).push([[38],{173:function(e,t,a){"use strict";a.r(t);a(15);var i=anychart.map(),s={data:function(){return{today:new Date,positiveDataset:[],positiveColor:["#F9CACD","#F4A8AC","#EE868B","#E76569","#DF4346","#D12E2A","#BB000E","#A90019","#960022","#820029","#6E002C","#CD0000"],recoveredDataset:[],recoveredColor:["#DEEDCF","#BFE1B0","#99D492","#74C67A","#56B870","#39A96B","#198C75","#188977","#137177","#0E4D64","#0A2F51","#1D9A6C"],deathDataset:[],deathColor:["#FFF3BA","#FFEB9B","#FFE07C","#FFD45D","#FFC63E","#FFB61F","#F89C07","#F0930F","#E98C16","#E1851E","#DA7F25","#FFA500"]}},methods:{loadGeoJson:function(){axios.get("/corona/public/assets/geojson/indonesia.json").then((function(e){i.geoData(e.data)}))},createCluster:function(e,t,a){i.colorRange().enabled(!1),i.removeAllSeries(),t=anychart.data.set(t).mapAs({size:"value"});var s=i.bubble(t);s.name(e+"(Cluster)"),s.selectionMode("none"),s.labels(!0),s.labels().format("{%value}"),s.labels().fontWeight(600),s.labels().fontColor("Black"),s.legendItem().enabled(!0).iconType("circle").iconFill(a[5]).iconStroke("2 #E1E1E1"),s.fill(a[5],.35),s.hovered().fill(a[5],.7),s.stroke(a[5]),s.tooltip().format(e+" : {%value}"),s.tooltip().hideDelay(5e3),s.hovered().stroke(a[5]);var n=i.title();i.maxBubbleSize(35),i.minBubbleSize(9),n.enabled(!0),n.text("Bubble Map kasus "+e+" COVID-19 di Indonesia")},getAllProvinces:function(){var e=this;axios.get("/corona/api/provinsi").then((function(t){e.positiveDataset.length>0&&(e.positiveDataset=[],e.recoveredDataset=[],e.deathDataset=[]),t.data.data.forEach((function(t){e.positiveDataset.push({id:t.map_id,value:t.positif,sembuh:t.sembuh,meninggal:t.meninggal}),e.recoveredDataset.push({id:t.map_id,value:t.sembuh,positif:t.positif,meninggal:t.meninggal}),e.deathDataset.push({id:t.map_id,value:t.meninggal,positif:t.positif,sembuh:t.sembuh})}))}))}},mounted:function(){null==i.geoData()&&this.loadGeoJson(),this.getAllProvinces();var e=anychart.ui.zoom();e.target(i),e.render();var t=this.$refs.map_nasional_case,a="Data COVID-19 Nasional_"+(this.today.getDate()+"-"+(this.today.getMonth()+1)+"-"+this.today.getFullYear());i.exports().filename(a),i.container(t),i.draw(!0)}},n=a(0),o=Object(n.a)(s,(function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"w-full p-3"},[a("div",{staticClass:"bg-white"},[a("div",{staticClass:"flex flex-wrap justify-center max-w-md mx-auto text-center"},[a("div",{staticClass:"flex items-center mr-4"},[a("input",{staticClass:"hidden",attrs:{id:"positif_nasional",type:"radio",name:"data_covid_nasional",value:"Positif",checked:""},on:{change:function(t){return e.createCluster("Positif",e.positiveDataset,e.positiveColor)}}}),e._v(" "),e._m(0)]),e._v(" "),a("div",{staticClass:"flex items-center mr-4"},[a("input",{staticClass:"hidden",attrs:{id:"sembuh_nasional",type:"radio",name:"data_covid_nasional",value:"Sembuh"},on:{change:function(t){return e.createCluster("Sembuh",e.recoveredDataset,e.recoveredColor)}}}),e._v(" "),e._m(1)]),e._v(" "),a("div",{staticClass:"flex items-center mr-4"},[a("input",{staticClass:"hidden",attrs:{id:"meninggal_nasional",type:"radio",name:"data_covid_nasional",value:"Meninggal"},on:{change:function(t){return e.createCluster("Meninggal",e.deathDataset,e.deathColor)}}}),e._v(" "),e._m(2)])]),e._v(" "),a("div",{ref:"map_nasional_case",staticClass:"w-full mt-2 rounded-lg",staticStyle:{height:"500px"}})])])}),[function(){var e=this.$createElement,t=this._self._c||e;return t("label",{staticClass:"flex items-center cursor-pointer",attrs:{for:"positif_nasional"}},[t("span",{staticClass:"inline-block w-4 h-4 mr-1 border rounded-full border-grey"}),this._v("\n          Positif\n        ")])},function(){var e=this.$createElement,t=this._self._c||e;return t("label",{staticClass:"flex items-center cursor-pointer",attrs:{for:"sembuh_nasional"}},[t("span",{staticClass:"inline-block w-4 h-4 mr-1 border rounded-full border-grey"}),this._v("\n          Sembuh\n        ")])},function(){var e=this.$createElement,t=this._self._c||e;return t("label",{staticClass:"flex items-center cursor-pointer",attrs:{for:"meninggal_nasional"}},[t("span",{staticClass:"inline-block w-4 h-4 mr-1 border rounded-full border-grey"}),this._v("\n          Meninggal\n        ")])}],!1,null,null,null);t.default=o.exports}}]);