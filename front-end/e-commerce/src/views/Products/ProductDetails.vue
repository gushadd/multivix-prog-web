<script setup>
import Select from "primevue/select";
import Button from "primevue/button";
import OtherProducts from "@/components/OtherProducts.vue";

import products from "@/assets/products.json";
import { onMounted, ref, watch } from "vue";
import { useRoute } from "vue-router";

const route = useRoute();
const productId = parseInt(route.params.id);
const product = ref(null);
const productQuantities = ref([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);

const loadProduct = (id) => {
    const numericId = parseInt(id);
    product.value = products.find((p) => p.id === numericId);
};

onMounted(() => {
    loadProduct(route.params.id);
});

watch(
    () => route.params.id,
    (newId) => {
        loadProduct(newId);
        window.scrollTo({ top: 0, behavior: "smooth" });
    }
);
</script>

<template>
    <main>
        <div v-if="product" class="product-detail">
            <div class="product-info">
                <div class="img-wrapper">
                    <img :src="product.image" alt="" />
                </div>
                <div class="info">
                    <h2>{{ product.name }}</h2>
                    <p>{{ product.description }}</p>
                </div>
            </div>
            <div class="buy-options">
                <h2>{{ product.price }}</h2>
                <Select placeholder="Quantidade" :options="productQuantities" size="small" class="w-50 my-5" />
                <Button label="Comprar Agora" class="w-50" />
                <Button label="Adicionar ao Carrinho" class="w-50" variant="outlined" />
            </div>
        </div>
        <h3>Outros Produtos</h3>
        <div class="other-products">
            <OtherProducts />
        </div>
    </main>
</template>

<style scoped>
main {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.product-detail {
    display: flex;
    gap: 20px;
    margin-bottom: 40px;

    height: 60vh;
    width: 100%;
}

.product-info {
    flex: 3;

    display: flex;
    gap: 20px;
}

.img-wrapper {
    flex: 1.4;
}

.img-wrapper img {
    height: 100%;
    object-fit: cover;
    border-radius: 20px;
}

.info {
    flex: 1.6;

    display: flex;
    flex-direction: column;
}

.info p {
    opacity: 0.7;
}

.buy-options {
    flex: 1;
    gap: 10px;

    display: flex;
    flex-direction: column;
    justify-content: start;
    align-items: center;
}

.buy-options h2 {
    color: var(--primary-700);
}

.other-products {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

@media (max-width: 1800px) {
    .product-info {
        flex-direction: column;
        gap: 0;
    }

    .img-wrapper {
        flex: 1;
        background-color: lightcoral;
    }

    .info {
        flex: 2;
        background-color: lightcyan;
    }
}
</style>
