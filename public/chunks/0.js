(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[0],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/ShareableItems/ShareableItem.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/ShareableItems/ShareableItem.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue_gallery_slideshow__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue-gallery-slideshow */ "./node_modules/vue-gallery-slideshow/dist/js/vue-gallery-slideshow.js");
/* harmony import */ var vue_gallery_slideshow__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vue_gallery_slideshow__WEBPACK_IMPORTED_MODULE_0__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    VueGallerySlideshow: vue_gallery_slideshow__WEBPACK_IMPORTED_MODULE_0___default.a
  },
  data: function data() {
    return {
      index: null
    };
  },
  props: {
    title: {
      type: String,
      "default": ""
    },
    link: {
      type: String,
      "default": ""
    },
    images: {
      type: Array,
      "default": function _default() {
        return [];
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/ShareableItems/ShareableItem.vue?vue&type=template&id=580b14a2&":
/*!*******************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/ShareableItems/ShareableItem.vue?vue&type=template&id=580b14a2& ***!
  \*******************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    {
      staticClass:
        "flex items-baseline justify-between py-4 border-b border-gray-300 border-solid"
    },
    [
      _c("vue-gallery-slideshow", {
        attrs: { images: _vm.images, index: _vm.index },
        on: {
          close: function($event) {
            _vm.index = null
          }
        }
      }),
      _vm._v(" "),
      _c(
        "p",
        {
          staticClass: "flex-1 mr-4 break-words cursor-pointer hover:underline",
          on: {
            click: function($event) {
              _vm.index = 0
            }
          }
        },
        [_vm._v(_vm._s(_vm.title))]
      ),
      _vm._v(" "),
      _c("p", { staticClass: "flex-none text-sm text-gray-600" }, [
        _c(
          "button",
          {
            staticClass: "px-2 py-2 mr-1 rounded-md hover:bg-gray-300",
            on: {
              click: function($event) {
                _vm.index = 0
              }
            }
          },
          [
            _c("i", { staticClass: "mr-1 fas fa-eye" }),
            _vm._v(" "),
            _c("span", [_vm._v("Lihat")])
          ]
        ),
        _vm._v(" "),
        _c(
          "a",
          {
            staticClass: "px-2 py-2 rounded-md hover:bg-gray-300",
            attrs: { target: "_blank", href: _vm.link }
          },
          [
            _c("i", { staticClass: "mr-1 fas fa-share" }),
            _vm._v(" "),
            _c("span", [_vm._v("Bagikan")])
          ]
        )
      ])
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/ShareableItems/ShareableItem.vue":
/*!******************************************************************!*\
  !*** ./resources/js/components/ShareableItems/ShareableItem.vue ***!
  \******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ShareableItem_vue_vue_type_template_id_580b14a2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ShareableItem.vue?vue&type=template&id=580b14a2& */ "./resources/js/components/ShareableItems/ShareableItem.vue?vue&type=template&id=580b14a2&");
/* harmony import */ var _ShareableItem_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ShareableItem.vue?vue&type=script&lang=js& */ "./resources/js/components/ShareableItems/ShareableItem.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ShareableItem_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ShareableItem_vue_vue_type_template_id_580b14a2___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ShareableItem_vue_vue_type_template_id_580b14a2___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/ShareableItems/ShareableItem.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/ShareableItems/ShareableItem.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************!*\
  !*** ./resources/js/components/ShareableItems/ShareableItem.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ShareableItem_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./ShareableItem.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/ShareableItems/ShareableItem.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ShareableItem_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/ShareableItems/ShareableItem.vue?vue&type=template&id=580b14a2&":
/*!*************************************************************************************************!*\
  !*** ./resources/js/components/ShareableItems/ShareableItem.vue?vue&type=template&id=580b14a2& ***!
  \*************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ShareableItem_vue_vue_type_template_id_580b14a2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./ShareableItem.vue?vue&type=template&id=580b14a2& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/ShareableItems/ShareableItem.vue?vue&type=template&id=580b14a2&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ShareableItem_vue_vue_type_template_id_580b14a2___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ShareableItem_vue_vue_type_template_id_580b14a2___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);