// src/stores/cart.js
import { defineStore } from "pinia";
import { ref, computed } from "vue";
import { getCart, addToCart, removeFromCart } from "@/services/cartService";

export const useCartStore = defineStore("cart", () => {
    const items = ref([]);

    const fetchCart = async () => {
        try {
            const response = await getCart();
            items.value = response.data;
        } catch (error) {
            console.error("Erro ao buscar carrinho:", error);
        }
    };

    const add = async (produtoId) => {
        try {
            await addToCart(produtoId);
            await fetchCart();
        } catch (error) {
            console.error("Erro ao adicionar ao carrinho:", error);
        }
    };

    const remove = async (id) => {
        try {
            await removeFromCart(id);
            await fetchCart();
        } catch (error) {
            console.error("Erro ao remover do carrinho:", error);
        }
    };

    const clear = async () => {
        items.value.forEach((item) => {
            console.log(item);
            remove(item.id);
        });
        items.value = [];
    };

    const groupedItems = computed(() => {
        const map = new Map();

        for (const item of items.value) {
            const produtoId = item.produto.id;
            if (!map.has(produtoId)) {
                map.set(produtoId, { ...item, quantidade: 1 });
            } else {
                map.get(produtoId).quantidade += 1;
            }
        }

        return Array.from(map.values());
    });

    const totalPrice = computed(() => items.value.reduce((total, item) => total + item.produto.valor, 0));

    const totalItems = computed(() => items.value.length);

    return {
        items,
        totalItems,
        groupedItems,
        totalPrice,
        fetchCart,
        add,
        remove,
        clear,
    };
});
