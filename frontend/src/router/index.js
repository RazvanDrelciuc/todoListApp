import {createRouter, createWebHistory} from 'vue-router'
import Dashboard from "@/views/DashboardView.vue";
import AboutView from "@/views/AboutView.vue";

const routes = [
    {
        path: '/',
        name: 'dashboard',
        component: Dashboard
    },
    {
        path: '/about',
        name: 'about',
        component: AboutView
    }
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

export default router
