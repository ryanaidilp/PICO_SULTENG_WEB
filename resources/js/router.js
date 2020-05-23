import Vue from 'vue'
import VueRouter from 'vue-router'
const DataComponent = () => import("./components/pages/DataComponent")
const HomeComponent = () => import('./components/pages/HomeComponent')
const ContactComponent = () => import('./components/pages/ContactComponent')
const WikiComponent = () => import('./components/pages/WikiComponent')
import VueAnalytics from 'vue-analytics'


Vue.use(VueRouter)
Vue.use(VueAnalytics, {
  id: 'UA-165600458-1',
  VueRouter,
  checkDuplicatedScript: true,
  autoTracking: {
    screenview: true,
    pageviewOnLoad: false
  },
  debug: {
    sendHitTask: process.env.NODE_ENV === 'production'
  }
})

export default new VueRouter({
    routes: [{
            path: '/corona',
            component: HomeComponent
        },
        {
            path: '/corona/data',
            component: DataComponent
        },
        {
            path: '/corona/kontak',
            component: ContactComponent
        },
        {
            path: '/corona/wiki',
            component: WikiComponent
        },
    ],
    mode: 'history',
})
