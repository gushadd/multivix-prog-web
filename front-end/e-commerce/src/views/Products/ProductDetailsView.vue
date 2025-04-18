<script setup>
import Select from "primevue/select";
import Button from "primevue/button";
import OtherProducts from "@/components/OtherProducts.vue";

import { useCartStore } from "@/stores/cart";
import { useAuthStore } from "@/stores/auth";

import products from "@/assets/products.json";
import { onMounted, ref, watch } from "vue";
import { useRoute } from "vue-router";
import { useToast } from "vue-toastification";

const toast = useToast();
const route = useRoute();
const cart = useCartStore();
const auth = useAuthStore();

const productId = parseInt(route.params.id);
const product = ref(null);
const productQuantity = ref(1);
const productQuantities = ref([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);

const handleAddToCart = () => {
    if (auth.isAuthenticated) {
        cart.addToCart(product.value, productQuantity.value);
        toast.success("Produto adicionado ao carrinho!");
    } else {
        toast.error("Por favor, faça login antes de adicionar ao carrinho.");
    }
};

const handleBuyNow = () => {
    if (auth.isAuthenticated) {
        toast.success("Compre agora!");
    } else {
        toast.error("Por favor, faça login antes de comprar.");
    }
};

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
                <Select placeholder="Quantidade" :options="productQuantities" size="small" class="w-50 my-5" v-model="productQuantity" />
                <Button label="Comprar Agora" class="w-50" @click="handleBuyNow" />
                <Button label="Adicionar ao Carrinho" class="w-50" variant="outlined" @click="handleAddToCart" />
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
    margin-bottom: 40px;

    height: 450px;
    width: 100%;
}

.product-info {
    flex: 3;

    display: flex;
    gap: 20px;
}

.img-wrapper {
    min-width: 500px;
    max-width: 500px;
}

.img-wrapper img {
    border-radius: 20px;
    object-fit: cover;
}

.info {
    flex: 1.6;

    display: flex;
    flex-direction: column;
}

.info p {
    opacity: 0.7;
    text-overflow: ellipsis;
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

@media (max-width: 1500px) {
    .product-detail {
        height: 500px;
    }

    .product-info {
        flex-direction: column;
        flex: 2;
        align-items: center;
    }

    .img-wrapper {
        min-width: 400px;
        max-width: 400px;
    }

    .other-products {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 1000px) {
    .other-products {
        grid-template-columns: repeat(1, 1fr);
        align-items: center;
    }
}

@media (max-width: 900px) {
    .product-detail {
        flex-direction: column;
        height: 700px;
        gap: 30px;
    }

    .buy-options {
        align-items: start;
    }
}

@media (max-width: 900px) {
    .product-detail {
        height: 800px;
        margin-bottom: 80px;
    }
}
</style>
