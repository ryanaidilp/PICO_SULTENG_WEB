const Vue = require('vue')
import router from './router'
import App from './components/App'
import VueLazyLoad from 'vue-lazyload'
import BackToTop from 'vue-backtotop';

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
