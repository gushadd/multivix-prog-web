<script setup>
import { ref, watch } from "vue";
import InputNumber from "primevue/inputnumber"; // (caso use InputNumber em outro lugar)
import Select from "primevue/select";

import { useCartStore } from "@/stores/cart";
const cart = useCartStore();

const props = defineProps({
    product: Object,
});
</script>

<template>
    <main>
        <div class="img-wrapper">
            <img :src="product.produto.foto" alt="" />
        </div>
        <div class="product-info">
            <h4>{{ product.produto.nome }}</h4>
            <div class="quantity-selector">
                <p>Quantidade: {{ product.quantidade }}</p>
            </div>
            <h5>Total</h5>
            <h3>
                {{
                    (product.produto.valor * product.quantidade).toLocaleString("pt-BR", {
                        style: "currency",
                        currency: "BRL",
                    })
                }}
            </h3>
        </div>
    </main>
</template>

<style scoped>
main {
    display: flex;
    align-items: center;
    height: 300px;
    gap: 20px;
    border-bottom: 1px solid var(--surface-300);
}

.img-wrapper {
    width: 30%;
}

img {
    border-radius: 20px;
    max-width: 340px;
    min-width: 340px;
}

.product-info {
    width: 60%;

    display: flex;
    flex-direction: column;
    align-items: start;
}

p {
    opacity: 0.6;
}

h3 {
    color: var(--primary-700);
}

h5 {
    margin-top: 20px;
}

.quantity-selector {
    margin-top: 20px;
}

@media (max-width: 1800px) {
    img {
        max-width: 300px;
        min-width: 300px;
    }

    .product-info {
        width: 40%;
    }

    .quantity-selector {
        width: 20%;
    }
}

@media (max-width: 1500px) {
    img {
        max-width: 250px;
        min-width: 250px;
    }
}

@media (max-width: 1300px) {
    img {
        max-width: 200px;
        min-width: 200px;
    }

    .img-wrapper {
        width: 50%;
    }
}

@media (max-width: 1000px) {
    img {
        max-width: 140px;
        min-width: 140px;
    }
}
</style>
