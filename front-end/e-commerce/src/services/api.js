import axios from "axios";

const api = axios.create({
    baseURL: `${import.meta.env.VITE_VUE_APP_LINK}`,
    headers: {
        Accept: "application/json",
    },
});

// Interceptador para adicionar token automaticamente
api.interceptors.request.use((config) => {
    const token = localStorage.getItem("token");
    if (token) {
        config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
});

export default api;
