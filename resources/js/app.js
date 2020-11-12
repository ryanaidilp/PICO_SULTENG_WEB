require('./bootstrap');

import Vue from 'vue'

import {InertiaApp, plugin} from '@inertiajs/inertia-vue'
import { InertiaProgress } from '@inertiajs/progress'
import VueLazyLoad from 'vue-lazyload'
import BackToTop from 'vue-backtotop'

InertiaProgress.init({
    delay: 250,

    // The color of the progress bar.
    color: '#29d',
  
    // Whether to include the default NProgress styles.
    includeCSS: true,
  
    // Whether the NProgress spinner will be shown.
    showSpinner: true,
})

import PortalVue from 'portal-vue'

Vue.mixin({methods : { route } })
Vue.use(plugin)
Vue.use(PortalVue)
Vue.use(BackToTop)
Vue.use(VueLazyLoad, {
    preload: 1.3,
    // error: window.route('home') + 'assets/images/error.png',
    // loading: window.route('home') + 'assets/images/loading.gif',
    attempt: 3
})

const app = document.getElementById('app');

new Vue({
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);