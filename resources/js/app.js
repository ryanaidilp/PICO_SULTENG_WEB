require("./bootstrap")

import Vue from "vue";
import store from "./store";

import {
    createInertiaApp
} from "@inertiajs/inertia-vue"
import {
    InertiaProgress
} from "@inertiajs/progress"
import VueLazyload from "vue-lazyload"
import BackToTop from "vue-backtotop"

// Plugin Initialization

InertiaProgress.init({
    delay: 250,
    color: "#29d",
    includeCSS: true,
    showSpinner: true
})

// Mixin or Plugin Installation

Vue.mixin({
    methods: routes
})
Vue.use(plugin)
Vue.use(BackToTop)
Vue.use(VueLazyload, {
    preLoad: 1.3,
    attempt: 3
})


createInertiaApp({
    resolve: name => import(`./Pages/${name}`),
    setup({
        el,
        app,
        props
    }) {
        new Vue({
            render: h => h(app, props),
            store
        }).$mount(el)
    }
})
