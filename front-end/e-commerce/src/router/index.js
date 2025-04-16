import { createRouter, createWebHistory } from "vue-router";

import Home from "@/views/Products/HomeView.vue";
import ProductDetails from "@/views/Products/ProductDetailsView.vue";
import Cart from "@/views/Cart/CartView.vue";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        { path: "/", name: "Home", component: Home },
        { path: "/produto/:id", name: "ProductDetails", component: ProductDetails },
        { path: "/carrinho", name: "Cart", component: Cart },
        // {
        //   path: '/',
        //   name: 'home',
        //   component: HomeView,
        // },
    ],
});

export default router;
