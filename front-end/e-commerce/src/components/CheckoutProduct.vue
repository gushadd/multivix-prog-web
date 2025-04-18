<script setup>
import { useCartStore } from "@/stores/cart";

const cart = useCartStore();

defineProps({
    product: Object,
});
</script>

<template>
    <div class="product-wrapper">
        <div class="img-wrapper">
            <img :src="product.produto.foto" alt="" />
        </div>
        <div class="info">
            <h4>{{ product.produto.nome }}</h4>
            <h6>Quantidade: {{ product.quantidade }}</h6>
            <h3>
                {{
                    (product.produto.valor * product.quantidade).toLocaleString("pt-BR", {
                        style: "currency",
                        currency: "BRL",
                    })
                }}
            </h3>
        </div>
    </div>
</template>

<style scoped>
.product-wrapper {
    display: flex;
    gap: 20px;
    width: 100%;
    min-height: 200px;
    border-bottom: 1px solid var(--surface-300);
    padding-bottom: 20px;
    margin-top: 20px;
    overflow: hidden;
}

.img-wrapper {
    max-width: 20%;
    width: 20%;
    max-height: 200px;
    overflow: hidden;
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}

img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 20px;
    display: block;
}

.info {
    width: 70%;

    display: flex;
    flex-direction: column;
}

h6 {
    opacity: 0.6;
}

h3 {
    margin-top: 30px;
}

@media (max-width: 1000px) {
    .img-wrapper {
        max-width: 70%;
        width: 70%;
    }
}
</style>
