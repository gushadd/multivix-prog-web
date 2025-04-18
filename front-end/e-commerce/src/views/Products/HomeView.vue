<script setup>
import { onMounted, ref } from "vue";

import Product from "../../components/Product.vue";
import { getProducts } from "@/services/productService";

const products = ref([]);

// Função para carregar os produtos
const loadProducts = async () => {
    try {
        const data = await getProducts();
        products.value = data;
    } catch (err) {
        toast.error("Erro ao carregar os produtos.");
    }
};

onMounted(() => {
    loadProducts(); // Carregar produtos ao montar o componente
});
</script>

<template>
    <main>
        <Product v-for="product in products" :key="product.id" :product="product" />
    </main>
</template>

<style scoped>
main {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 30px;
    width: 80%;
    margin: 0 auto; /* Centraliza o grid na página */
    justify-content: center; /* Centraliza o conteúdo horizontalmente */
    align-items: center; /* Alinha os itens verticalmente */
}

@media (max-width: 1800px) {
    main {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 1300px) {
    main {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 900px) {
    main {
        grid-template-columns: repeat(1, 1fr);
    }
}
</style>
