const Vue = require('vue')
import router from './router'
import App from './components/App'
import VueLazyLoad from 'vue-lazyload'
import BackToTop from 'vue-backtotop';
import VueAnalytics from 'vue-analytics'


Vue.use(VueAnalytics, {
    id: 'UA-165600458-2',
    router,
    checkDuplicatedScript: true,
    autoTracking: {
      screenview: true,
      pageviewOnLoad: false
    },
  })
Vue.use(BackToTop)
Vue.use(VueLazyLoad, {
    preload: 1.3,
    error: '/corona/public/assets/images/error.png',
    loading: '/corona/public/assets/images/loading.gif',
    attempt: 3
})

require('./bootstrap');
const app = new Vue({
    el: '#app',
    components: {
        App,
    },
    router
});
