<script setup>
import * as yup from "yup";
import InputText from "primevue/inputtext";
import Password from "primevue/password";
import Button from "primevue/button";
import Dialog from "primevue/dialog";
import Tabs from "primevue/tabs";
import Tab from "primevue/tab";
import TabPanels from "primevue/tabpanels";
import TabPanel from "primevue/tabpanel";
import Popover from "primevue/popover";

import { ref, onMounted } from "vue";
import { RouterLink, useRouter } from "vue-router";
import { useToast } from "vue-toastification";
import { useAuthStore } from "@/stores/auth";
import { useCartStore } from "@/stores/cart";

const cart = useCartStore();
const toast = useToast();
const router = useRouter();
const auth = useAuthStore();

const isLoggedIn = ref(false);
const headerUserName = ref("");
const dialogIsVisible = ref(false);

// Variáveis de login
const loginEmail = ref("");
const loginPassword = ref("");

// Variáveis de cadastro
const signInUserName = ref("");
const signInEmail = ref("");
const signInPassword = ref("");
const signInConfirmPassword = ref("");

const loginErrors = ref({});
const registerErrors = ref({});

const loginSchema = yup.object({
    email: yup.string().email("Email inválido").required("Email é obrigatório"),
    password: yup.string().required("Senha é obrigatória"),
});

const registerSchema = yup.object({
    name: yup.string().required("Nome é obrigatório"),
    email: yup.string().email("Email inválido").required("Email é obrigatório"),
    password: yup.string().min(8, "A senha deve ter no mínimo 8 caracteres").required("Senha é obrigatória"),
    confirmPassword: yup
        .string()
        .oneOf([yup.ref("password")], "As senhas não coincidem")
        .required("Confirmação de senha é obrigatória"),
});

// Checar se o usuário já está logado ao carregar a página
onMounted(() => {
    if (auth.isAuthenticated && auth.user) {
        headerUserName.value = auth.user.name;
        isLoggedIn.value = true;
    }
});

const logIn = async () => {
    try {
        loginErrors.value = {};
        await loginSchema.validate({ email: loginEmail.value, password: loginPassword.value }, { abortEarly: false });

        const ok = await auth.login({ email: loginEmail.value, password: loginPassword.value });
        if (ok) {
            dialogIsVisible.value = false;
            headerUserName.value = auth.user.name;
            isLoggedIn.value = true;
            toast.success("Login realizado com sucesso.");
            loginEmail.value = "";
            loginPassword.value = "";
        } else {
            toast.error("Erro ao fazer login. Verifique suas credenciais.");
        }
    } catch (err) {
        if (err.inner) {
            err.inner.forEach((e) => {
                loginErrors.value[e.path] = e.message;
            });
        }
    }
};

const signIn = async () => {
    try {
        registerErrors.value = {};
        await registerSchema.validate(
            {
                name: signInUserName.value,
                email: signInEmail.value,
                password: signInPassword.value,
                confirmPassword: signInConfirmPassword.value,
            },
            { abortEarly: false }
        );

        const ok = await auth.register({
            name: signInUserName.value,
            email: signInEmail.value,
            password: signInPassword.value,
            password_confirmation: signInConfirmPassword.value,
        });

        if (ok) {
            toast.success("Cadastro realizado com sucesso. Faça login para continuar.");
            signInUserName.value = "";
            signInEmail.value = "";
            signInPassword.value = "";
            signInConfirmPassword.value = "";
        } else {
            toast.error("Erro ao realizar cadastro.");
        }
    } catch (err) {
        if (err.inner) {
            err.inner.forEach((e) => {
                registerErrors.value[e.path] = e.message;
            });
        }
    }
};

const logout = async () => {
    try {
        await auth.logout();
        isLoggedIn.value = false;
        headerUserName.value = "";
        toast.success("Logout realizado com sucesso.");
        router.push("/"); // redireciona para a home após logout
    } catch (err) {
        toast.error("Erro ao realizar logout.");
    }
};

const goToCart = () => {
    router.push("/carrinho");
};

// Popover menu hamburguer
const op = ref();
const toggleMenu = (event) => {
    op.value.toggle(event);
};

// Popover logout
const logoutOp = ref();
const toggleLogout = (event) => {
    logoutOp.value.toggle(event);
};
</script>

<template>
    <header>
        <RouterLink to="/" class="logo-wrapper">
            <img src="/images/logo.png" alt="" />
        </RouterLink>
        <search class="search">
            <!-- <InputText class="search-input" placeholder="Pesquise" />
            <Button icon="pi pi-search" variant="link" /> -->
        </search>
        <div class="header-buttons">
            <Button v-if="isLoggedIn" class="cart-button" label="Carrinho" icon="pi pi-shopping-cart" variant="link" @click="goToCart" :badge="cart.totalItems" />
            <Button v-if="!isLoggedIn" class="login-button" label="Login" icon="pi pi-sign-in" variant="link" @click="dialogIsVisible = !dialogIsVisible" />
            <Button v-if="isLoggedIn" class="login-button" :label="headerUserName" icon="pi pi-user" variant="link" @click="toggleLogout" />
            <Button class="side-menu-button" icon="pi pi-bars" variant="link" @click="toggleMenu" />
        </div>
    </header>

    <Popover ref="op">
        <div class="flex flex-col items-start">
            <Button label="Carrinho" icon="pi pi-shopping-cart" variant="link" @click="goToCart" />
            <Button v-if="!isLoggedIn" label="Login" icon="pi pi-sign-in" variant="link" @click="dialogIsVisible = !dialogIsVisible" />
            <Button v-if="isLoggedIn" :label="headerUserName" icon="pi pi-user" variant="link" />
        </div>
    </Popover>

    <Popover ref="logoutOp">
        <div class="flex flex-col items-start">
            <Button label="Logout" icon="pi pi-sign-out" variant="link" @click="logout" />
        </div>
    </Popover>

    <Dialog v-model:visible="dialogIsVisible" header="Entrar" modal>
        <Tabs value="0">
            <TabsList>
                <Tab value="0">Login</Tab>
                <Tab value="1">Cadastro</Tab>
            </TabsList>
            <TabPanels>
                <TabPanel value="0">
                    <div class="flex flex-col justify-center gap-3 w-80 mt-5">
                        <InputText placeholder="Email" v-model="loginEmail" />
                        <small v-if="loginErrors.email" class="text-red-500">{{ loginErrors.email }}</small>

                        <InputText placeholder="Senha" v-model="loginPassword" type="password" />
                        <small v-if="loginErrors.password" class="text-red-500">{{ loginErrors.password }}</small>

                        <Button class="mt-6" label="Entrar" @click="logIn" />
                    </div>
                </TabPanel>
                <TabPanel value="1">
                    <div class="flex flex-col justify-center gap-3 w-80 mt-5">
                        <InputText placeholder="Nome de Usuário" v-model="signInUserName" />
                        <small v-if="registerErrors.name" class="text-red-500">{{ registerErrors.name }}</small>

                        <InputText placeholder="Email" v-model="signInEmail" />
                        <small v-if="registerErrors.email" class="text-red-500">{{ registerErrors.email }}</small>

                        <InputText placeholder="Senha" v-model="signInPassword" type="password" />
                        <small v-if="registerErrors.password" class="text-red-500">{{ registerErrors.password }}</small>

                        <InputText placeholder="Confirme a senha" v-model="signInConfirmPassword" type="password" />
                        <small v-if="registerErrors.confirmPassword" class="text-red-500">{{ registerErrors.confirmPassword }}</small>
                        <Button class="mt-6" label="Cadastrar" @click="signIn" />
                    </div>
                </TabPanel>
            </TabPanels>
        </Tabs>
    </Dialog>
</template>

<style scoped>
header {
    background-color: var(--surface-900);
    display: flex;
    align-items: center;
    overflow: hidden;
    height: 5rem;
    padding: 1rem;
}

.logo-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 80%;
    flex: 0.2;
}

img {
    height: 100%;
}

.search {
    height: 100%;
    flex: auto;

    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
}

.search-input {
    width: 20vw;
    min-width: 250px;
}

.header-buttons {
    height: 100%;
    flex: 0.2;

    display: flex;
    justify-content: center;
    align-items: center;
}

.side-menu-button {
    display: none;
}

@media (max-width: 768px) {
    .logo-wrapper {
        flex: 0.5;
    }
}
</style>
