// src/services/cartService.js
import api from "./api";

export const getCart = () => api.get("/carrinhos");
export const addToCart = (produtoId) => api.post("/carrinhos", { produto_id: produtoId });
export const removeFromCart = (id) => api.delete(`/carrinhos/${id}`);
