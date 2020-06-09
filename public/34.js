(window.webpackJsonp=window.webpackJsonp||[]).push([[34],{114:function(t,a,e){"use strict";e.r(a);var i=e(3),s=e.n(i),n=e(6),r=e.n(n),l=(e(16),e(108)),o=e(12).format,d={data:{labels:[],datasets:[{label:"Rt",type:"line",data:[],fill:!1,pointRadius:1,pointBackgroundColor:"rgba(65, 131, 215, 1)",borderColor:"rgba(65, 131, 215, 1)"},{data:[],type:"line",fill:!0,pointRadius:1,yAxisID:"rt-axis",backgroundColor:"rgba(255, 255, 255, 1)",borderColor:"rgba(118, 93, 105, 0.2)"},{data:[],type:"line",fill:!0,pointRadius:1,backgroundColor:"rgba(118, 93, 105, 0.2)",borderColor:"rgba(118, 93, 105, 0.2)"}]},options:{title:{display:!0,fontSize:16,text:["Angka Reproduksi (Rt) COVID-19 di Sulawesi Tengah","Dihitung dengan metode Sequential-Bayes."]},plugins:{datalabels:{display:!1}},scales:{yAxes:[{id:"rt-axis",position:"right",display:!0,scaleLabel:{display:!0,labelString:"Angka Reproduksi Efektif/Effective Infection Rate (Rt)"}}],xAxes:[{ticks:{callback:function(t,a,e){var i=t.split(" ");return i[0]+i[1]},maxRotation:90,minRotation:90},display:!0,stacked:!0,scaleLabel:{display:!0,labelString:"Tanggal"}}]},maintainAspectRatio:!1,responsive:!0,tooltips:{filter:function(t){return 0==t.datasetIndex},mode:"nearest",intersect:!1,backgroundColor:"rgba(255,255,255,1)",titleFontColor:"#000",bodyFontColor:"#000",borderColor:"#222",borderWidth:1},hover:{mode:"nearest",intersect:!1},legend:{position:"bottom",usePointStyle:!0,display:!1}}},u={components:{Loading:s.a},props:["kasus","wilayah"],data:function(){return{isLoading:!1,chart:null}},methods:{createChart:function(t,a){var e=document.getElementById(t);null!=this.chart&&this.chart.destroy(),this.chart=new r.a(e,{type:a.type,data:a.data,options:a.options})},getStatistic:function(){var t=this;this.isLoading=!0;axios.get("/corona/api/statistik").then((function(a){for(var e=a.data.data,i=[],s=[],n=[],r=[],u=0;u<e.length;u++){var c=e[u].tanggal.split("/"),p=null;if(c.length>=3){var g=c[2].split(" ");g=g[0];var h=c[1];p=c[0]+"-"+h+"-"+g}else p=e[u].tanggal;p=o(Date.parse(p),"dd MMM yyyy",{locale:l.a});i.push(p),s.push(e[u].rekap.Rt),n.push(e[u].rekap.Rt_upper),r.push(e[u].rekap.Rt_lower)}d.data.datasets[0].data=s,d.data.datasets[1].data=r,d.data.datasets[2].data=n,d.data.labels=i,t.chart.update(),t.isLoading=!1}))},updater:function(){var t=this;setInterval((function(){t.createChart("rt-chart",d),t.getStatistic()}),3e5)}},mounted:function(){this.createChart("rt-chart",d),this.getStatistic(),this.updater()}},c=e(0),p=Object(c.a)(u,(function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",{staticClass:"w-full p-3 pb-8"},[e("div",{staticClass:"relative bg-white rounded-lg shadow-lg"},[e("div",{staticClass:"absolute flex justify-center w-full"},[e("loading",{attrs:{active:t.isLoading,opacity:.8,height:400,width:50,loader:"spinner",color:"#59F"},on:{"update:active":function(a){t.isLoading=a}}})],1),t._v(" "),e("div",{staticClass:"p-5",staticStyle:{height:"400px"}},[e("keep-alive",[e("canvas",{attrs:{id:"rt-chart","aria-label":"Chart Angka Reproduksi",role:"img"}})])],1),t._v(" "),t._m(0)])])}),[function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",{staticClass:"pb-8 mb-8 text-center"},[e("span",{staticClass:"mx-4 text-xs md:text-base"},[e("i",{staticClass:"mr-2 text-lg text-blue-600 fas fa-minus"}),t._v("Rt (Angka Reproduksi Efektif)\n        "),e("i",{staticClass:"ml-4 mr-2 text-lg fas fa-square-full"}),t._v("Selang Kepercayaan (95%)\n      ")]),t._v(" "),e("p",{staticClass:"mx-8 mt-8 text-sm text-left text-justify border-t-2"},[t._v("\n        *Keterangan :\n        "),e("br"),t._v(" "),e("b",[t._v("Rt")]),t._v(" merupakan "),e("b",[t._v("rata-rata orang yang bisa terinfeksi dari satu pasien positif")]),t._v(" usai intervensi pemerintah.\n        Sebagai contoh, Rt = 2 berarti satu orang yang terinfeksi bisa menulari rata-rata dua orang lainnya.\n        Rt dipergunakan sebagai "),e("b",[t._v("syarat mutlak pelonggaran PSBB")]),t._v(" di Indonesia. Sesuai ketetapan Badan Perencanaan Pembangunan Nasional (Bappenas), angka Rt di sebuah wilayah harus di bawah 1 selama 14 hari berturut-turut sebelum relaksasi PSBB diberi lampu hijau.\n      ")]),t._v(" "),e("p",{staticClass:"mx-8 mt-4 text-sm text-left text-justify text-gray-500"},[t._v("\n        Referensi : "),e("a",{staticClass:"hover:text-gray-800 font-italic",attrs:{href:"https://www.datacamp.com/community/tutorials/replicating-in-r-covid19",target:"_blank"}},[t._v("Estimating COVID-19's "),e("i",[t._v("Rt")]),t._v(" in Real-Time")])])])}],!1,null,null,null);a.default=p.exports}}]);