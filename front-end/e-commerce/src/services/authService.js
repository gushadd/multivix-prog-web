import api from "./api";

export const login = async ({ email, password }) => {
    const response = await api.post("/login", { email, password });
    return response.data;
};

export const logout = async () => {
    return await api.post("/logout");
};

export const register = async (userData) => {
    return api.post("/register", userData).then((res) => res.data);
};
