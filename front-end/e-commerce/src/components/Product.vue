<script setup>
defineProps({
    product: Object,
});
</script>

<template>
    <div class="product">
        <div class="image-wrapper">
            <img src="../assets/images/product.jpg" alt="" />
        </div>
        <div class="product-info">
            <h3>{{ product.name }}</h3>
            <p>{{ product.price }}</p>
        </div>
    </div>
</template>

<style scoped>
.product {
    width: 400px;
    height: 350px;
    display: flex;
    flex-direction: column;
    background-color: white;
    border: 1px solid var(--surface-300);
    border-radius: 10px;
    overflow: hidden;
    cursor: pointer;
    transition: all 0.13s;
}

.product:hover {
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.image-wrapper {
    min-height: 25vh;
    max-height: 25vh;
}

.product-info {
    padding: 10px;
}

.product-info h3 {
    margin: 0;
    font-size: 1.2rem;
}

.product-info p {
    margin-top: 5px;
    font-size: 1rem;
    color: var(--text-muted); /* Cor mais suave para o preço */
}
</style>
