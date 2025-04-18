import { defineStore } from "pinia";
import { ref, computed, onMounted } from "vue";

export const useAuthStore = defineStore("auth", () => {
    // Inicializa a variável `user` com o valor do `localStorage` se houver
    const user = ref(null);

    // Recupera os dados de `localStorage` assim que o componente for montado
    onMounted(() => {
        const storedUser = localStorage.getItem("user");
        if (storedUser) {
            user.value = JSON.parse(storedUser); // Recupera os dados de usuário
        }
    });

    // Verifica se o usuário está autenticado
    const isAuthenticated = computed(() => user.value !== null);

    // Função de login (simulação, substitua pela chamada API real)
    const login = async (credentials) => {
        // Simulação de uma chamada de API (substitua com sua API real)
        if (credentials.email === "admin@email.com" && credentials.password === "123") {
            const response = {
                token: "meu-token-exemplo", // Substitua com o token retornado pela sua API
                user: { name: "Admin", email: credentials.email }, // Substitua com os dados reais do usuário
            };

            // Armazenando os dados no `localStorage` para persistência
            user.value = response.user;
            localStorage.setItem("user", JSON.stringify(user.value));
            localStorage.setItem("token", response.token);

            return true;
        } else {
            return false;
        }
    };

    // Função de logout
    const logout = () => {
        user.value = null;
        localStorage.removeItem("user");
        localStorage.removeItem("token");
    };

    return {
        user,
        isAuthenticated,
        login,
        logout,
    };
});
