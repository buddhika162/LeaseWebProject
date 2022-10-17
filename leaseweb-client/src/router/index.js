import { createRouter, createWebHistory } from 'vue-router'
import Index from '../views/Index.vue'

const routes = [
    {
        path: '/',
        name: 'Serves',
        component: Index
    },
    {
        path: '/add',
        name: 'AddServer',
        component: () => import(/* webpackChunkName: "about" */ '../views/AddServers.vue')
    },
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

export default router
