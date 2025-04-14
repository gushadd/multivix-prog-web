<script setup>
import Product from "../../components/Product.vue";

const products = [
    { id: 1, name: "Produto 1", price: "R$ 100,00" },
    { id: 2, name: "Produto 2", price: "R$ 100,00" },
    { id: 3, name: "Produto 3", price: "R$ 100,00" },
    { id: 4, name: "Produto 4", price: "R$ 100,00" },
    { id: 5, name: "Produto 5", price: "R$ 100,00" },
    { id: 6, name: "Produto 6", price: "R$ 100,00" },
    { id: 7, name: "Produto 7", price: "R$ 100,00" },
    { id: 8, name: "Produto 8", price: "R$ 100,00" },
];
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
    main{
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 1300px) {
    main{
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 900px) {
    main{
        grid-template-columns: repeat(1, 1fr);
    }
}
</style>
