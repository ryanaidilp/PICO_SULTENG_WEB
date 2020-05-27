import Vue from 'vue'
import VueRouter from 'vue-router'
const DataComponent = () => import("./components/pages/DataComponent")
const HomeComponent = () => import('./components/pages/HomeComponent')
const ContactComponent = () => import('./components/pages/ContactComponent')
const WikiComponent = () => import('./components/pages/WikiComponent')


Vue.use(VueRouter)

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
