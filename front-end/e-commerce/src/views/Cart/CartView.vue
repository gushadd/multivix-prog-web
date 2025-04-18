<script setup>
import Button from "primevue/button";
import CartProduct from "@/components/CartProduct.vue";

import { useRouter } from "vue-router";
import { useCartStore } from "@/stores/cart";
import { onMounted } from "vue";

const cart = useCartStore();
const router = useRouter();

onMounted(() => {
    cart.fetchCart();
});

const goToCheckout = () => {
    router.push("/checkout");
};
</script>

<template>
    <main class="main-wrapper">
        <h2 v-if="cart.items.length === 0">Carrinho vazio</h2>
        <div v-else class="cart-details">
            <h2>Meu Carrinho</h2>
            <CartProduct v-for="product in cart.groupedItems" :key="product.produto.id" :product="product" />
        </div>
        <div v-if="cart.items.length > 0" class="cart-total">
            <h5>Total</h5>
            <h3>R$ {{ cart.totalPrice.toFixed(2) }}</h3>
            <Button label="Fechar pedido" @click="goToCheckout" />
        </div>
    </main>
</template>

<style scoped>
.main-wrapper {
    display: flex;
    gap: 20px;
}

.cart-details {
    width: 80%;

    display: grid;
    grid-template-columns: repeat(1, 1fr);
    gap: 20px;
    max-height: 70vh;
    overflow-y: auto;
}

.cart-total {
    width: 20%;
    height: 400px;

    display: flex;
    flex-direction: column;
    align-items: center;
}

.cart-total h3 {
    color: var(--primary-700);
    margin-bottom: 15px;
}

@media (max-width: 1000px) {
    .main-wrapper {
        flex-direction: column;
    }

    .cart-details {
        width: 100%;
        max-height: none;
    }

    .cart-total {
        width: 100%;
    }
}
</style>
