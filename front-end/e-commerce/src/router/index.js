import { createRouter, createWebHistory } from "vue-router";

import HomeView from "@/views/Products/HomeView.vue";
import ProductDetailsView from "@/views/Products/ProductDetailsView.vue";
import CartView from "@/views/Cart/CartView.vue";
import CheckoutView from "@/views/Cart/CheckoutView.vue";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        { path: "/", name: "HomeView", component: HomeView },
        { path: "/produto/:id", name: "ProductDetailsView", component: ProductDetailsView },
        { path: "/carrinho", name: "CartView", component: CartView },
        { path: "/checkout", name: "CheckoutView", component: CheckoutView },
        // {
        //   path: '/',
        //   name: 'home',
        //   component: HomeView,
        // },
    ],
});

export default router;
