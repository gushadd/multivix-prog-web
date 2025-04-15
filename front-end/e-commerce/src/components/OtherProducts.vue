<script setup>
import products from "@/assets/products.json";
import Product from "./Product.vue";
</script>

<template>
    <Product v-for="product in products" :key="product.id" :product="product" />
</template>

<style scoped></style>
