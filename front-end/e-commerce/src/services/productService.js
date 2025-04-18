import api from "./api"; // A instância do Axios configurada

// Função para obter os produtos
export const getProducts = async () => {
    try {
        const response = await api.get("/produtos");
        return response.data;
    } catch (error) {
        console.error("Erro ao obter os produtos:", error);
        throw error; // Propaga o erro para quem chamou a função
    }
};

export const getProduct = async (id) => {
    try {
        const response = await api.get(`/produtos/${id}`);
        return response.data;
    } catch (error) {
        console.log(`Erro ao obter o produto com id ${id}: `, error);
    }
};
