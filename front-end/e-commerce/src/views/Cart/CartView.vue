<script setup>
import Button from "primevue/button";
import products from "@/assets/products.json";

import CartProduct from "@/components/CartProduct.vue";
</script>

<template>
    <main class="main-wrapper">
        <div class="cart-details">
            <h2>Meu Carrinho</h2>
            <CartProduct v-for="product in products" :key="product.id" :product="product" />
        </div>
        <div class="cart-total">
            <h5>Total</h5>
            <h3>R$ 199,00</h3>
            <Button label="Fechar pedido" />
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
