<script setup>
defineProps({
    product: Object,
});
</script>

<template>
    <RouterLink :to="'/produto/' + product.id" class="product">
        <div class="image-wrapper">
            <img :src="product.image" alt="" />
        </div>
        <div class="product-info">
            <h3>{{ product.name }}</h3>
            <p>{{ product.price }}</p>
        </div>
    </RouterLink>
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
    min-height: 250px;
    max-height: 250px;
    overflow: hidden;
}

.product-info {
    height: 100%;

    display: flex;
    flex-direction: column;
    padding: 10px 15px;

    border-top: 1px solid var(--surface-300);
}

.product-info h3 {
    margin: 0;
    font-size: 1rem;
    font-weight: 600;
}

.product-info p {
    margin-top: 5px;
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--primary-700);
}
</style>
