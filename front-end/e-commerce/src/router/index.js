import { createRouter, createWebHistory } from "vue-router";

import Home from "@/views/Products/Home.vue";
import ProductDetails from "@/views/Products/ProductDetails.vue";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        { path: "/", name: "Home", component: Home },
        { path: "/produto/:id", name: "ProductDetails", component: ProductDetails },
        // {
        //   path: '/',
        //   name: 'home',
        //   component: HomeView,
        // },
    ],
});

export default router;
