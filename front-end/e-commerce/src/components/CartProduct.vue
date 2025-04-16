<script setup>
import { ref } from "vue";

import InputNumber from "primevue/inputnumber";
import Select from "primevue/select";

defineProps({
    product: Object,
});

const quantityOptions = ref([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
</script>

<template>
    <main>
        <div class="img-wrapper">
            <img :src="product.image" alt="" />
        </div>
        <div class="product-info">
            <h4>{{ product.name }}</h4>
            <div class="quantity-selector">
                <p>Quantidade</p>
                <Select :options="quantityOptions" size="small"></Select>
            </div>
            <h5>Total</h5>
            <h3>R$ 199,99</h3>
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
