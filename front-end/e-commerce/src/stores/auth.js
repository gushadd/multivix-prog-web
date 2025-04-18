import { defineStore } from "pinia";
import { ref } from "vue";
import { login as loginApi } from "@/services/authService";
import { logout as logoutApi } from "@/services/authService";
import { register as registerApi } from "@/services/authService";
import { useCartStore } from "@/stores/cart";
import api from "@/services/api";

export const useAuthStore = defineStore("auth", () => {
    const user = ref(JSON.parse(localStorage.getItem("user")) || null); // Corrigido: era "usuario"
    const token = ref(localStorage.getItem("token") || null);

    const isAuthenticated = ref(!!token.value);

    if (token.value) {
        api.defaults.headers.common["Authorization"] = `Bearer ${token.value}`;
    }

    const login = async (credentials) => {
        try {
            const data = await loginApi(credentials);

            user.value = data.usuario;
            token.value = data.token;

            console.log(token.value);

            isAuthenticated.value = true;

            localStorage.setItem("user", JSON.stringify(user.value)); // "user" agora bate com o que lê
            localStorage.setItem("token", token.value);

            api.defaults.headers.common["Authorization"] = `Bearer ${token.value}`;

            const cartStore = useCartStore();
            await cartStore.fetchCart();

            return true;
        } catch (err) {
            console.error("Erro no login:", err);
            return false;
        }
    };

    const logout = async () => {
        try {
            await logoutApi();
        } catch (err) {
            console.warn("Erro ao deslogar na API, limpando mesmo assim.");
        }

        user.value = null;
        token.value = null;
        isAuthenticated.value = false;

        localStorage.removeItem("user");
        localStorage.removeItem("token");

        delete api.defaults.headers.common["Authorization"];
    };

    const register = async (userData) => {
        try {
            const data = await registerApi(userData);

            user.value = data.usuario;
            token.value = data.token;
            isAuthenticated.value = true;

            localStorage.setItem("user", JSON.stringify(user.value));
            localStorage.setItem("token", token.value);

            api.defaults.headers.common["Authorization"] = `Bearer ${token.value}`;

            return true;
        } catch (err) {
            console.error("Erro no cadastro:", err.response?.data);
            return false;
        }
    };

    return { user, token, isAuthenticated, login, logout, register };
});
