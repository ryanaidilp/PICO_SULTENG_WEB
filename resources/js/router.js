import Vue from 'vue'
import VueRouter from 'vue-router'
const DataComponent = () => import("./components/pages/DataComponent")
const HomeComponent = () => import('./components/pages/HomeComponent')
const ContactComponent = () => import('./components/pages/ContactComponent')
const WikiComponent = () => import('./components/pages/WikiComponent')


Vue.use(VueRouter)

export default new VueRouter({
    routes: [{
            name: 'home',
            path: '/corona',
            component: HomeComponent
        },
        {
            name: "data",
            path: '/corona/data',
            component: DataComponent
        },
        {
            name: "contact",
            path: '/corona/kontak',
            component: ContactComponent
        },
        {
            name: "wiki",
            path: '/corona/wiki',
            component: WikiComponent
        },
        {
            name: "table-data",
            path: '/corona/table-data',
            component: () => import('./components/pages/TableData')
        },
    ],
    mode: 'history',
})
