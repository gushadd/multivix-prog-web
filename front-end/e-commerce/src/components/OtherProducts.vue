<script setup>
import Product from "./Product.vue";

import { ref, onMounted } from "vue";
import { getProducts } from "@/services/productService";
import { useToast } from "vue-toastification";

const toast = useToast();

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
    <Product v-for="product in products" :key="product.id" :product="product" />
</template>

<style scoped></style>
