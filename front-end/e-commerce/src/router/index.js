import { createRouter, createWebHistory } from "vue-router";

import Home from "@/views/Products/Home.vue";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        { path: "/", name: "Home", component: Home },
        // {
        //   path: '/',
        //   name: 'home',
        //   component: HomeView,
        // },
    ],
});

export default router;
