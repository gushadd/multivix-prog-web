import { defineStore } from "pinia";
import { ref, computed, watch } from "vue";

export const useCartStore = defineStore("cart", () => {
    // Recuperar o carrinho salvo no localStorage (se houver)
    const cart = ref(JSON.parse(localStorage.getItem("cart")) || []);

    // Salvar o carrinho no localStorage sempre que ele for alterado
    watch(
        cart,
        (newCart) => {
            localStorage.setItem("cart", JSON.stringify(newCart));
        },
        { deep: true }
    );

    // Função para adicionar um item ao carrinho
    const addToCart = (product, quantity = 1) => {
        const existing = cart.value.find((p) => p.id === product.id);
        if (existing) {
            existing.quantity += quantity;
        } else {
            cart.value.push({ ...product, quantity });
        }
    };

    // Função para atualizar a quantidade de um item no carrinho
    const updateQuantity = (productId, newQuantity) => {
        const item = cart.value.find((p) => p.id === productId);
        if (item) {
            item.quantity = newQuantity;
        }
    };

    // Função para remover um item do carrinho
    const removeFromCart = (id) => {
        cart.value = cart.value.filter((p) => p.id !== id);
    };

    // Função para aumentar a quantidade de um item no carrinho
    const increaseQuantity = (id) => {
        const item = cart.value.find((p) => p.id === id);
        if (item) item.quantity++;
    };

    // Função para diminuir a quantidade de um item no carrinho
    const decreaseQuantity = (id) => {
        const item = cart.value.find((p) => p.id === id);
        if (item && item.quantity > 1) {
            item.quantity--;
        } else {
            removeFromCart(id);
        }
    };

    // Função para limpar o carrinho
    const clearCart = () => {
        cart.value = [];
    };

    // Computar o total de itens no carrinho
    const totalItems = computed(() => {
        return cart.value.reduce((sum, p) => sum + p.quantity, 0);
    });

    // Computar o preço total do carrinho
    const totalPrice = computed(() => {
        return cart.value
            .reduce((sum, p) => {
                const numericPrice = parseFloat(p.price.replace(/[^\d,]/g, "").replace(",", "."));
                return sum + numericPrice * p.quantity;
            }, 0)
            .toFixed(2);
    });

    return {
        cart,
        addToCart,
        removeFromCart,
        increaseQuantity,
        decreaseQuantity,
        clearCart,
        totalItems,
        totalPrice,
        updateQuantity,
    };
});
