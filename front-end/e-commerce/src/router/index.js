import { createRouter, createWebHistory } from "vue-router";
import { useAuthStore } from "@/stores/auth";
import { nextTick } from "vue";
import { useToast } from "vue-toastification";

import HomeView from "@/views/Products/HomeView.vue";
import ProductDetailsView from "@/views/Products/ProductDetailsView.vue";
import CartView from "@/views/Cart/CartView.vue";
import CheckoutView from "@/views/Cart/CheckoutView.vue";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        { path: "/", name: "HomeView", component: HomeView },
        { path: "/produto/:id", name: "ProductDetailsView", component: ProductDetailsView },
        { path: "/carrinho", name: "CartView", component: CartView, meta: { requiresAuth: true } },
        { path: "/checkout", name: "CheckoutView", component: CheckoutView, meta: { requiresAuth: true } },
    ],
});

router.beforeEach((to, from, next) => {
    const auth = useAuthStore();

    if (to.meta.requiresAuth && !auth.isAuthenticated) {
        // Toast precisa rodar dentro de um contexto do Vue
        nextTick(() => {
            const toast = useToast();
            toast.error("Você precisa estar logado para acessar esta página.");
        });

        next("/");
    } else {
        next();
    }
});

export default router;
