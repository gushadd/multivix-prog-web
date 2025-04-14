<script setup>
import InputText from "primevue/inputtext";
import Button from "primevue/button";

import { ref } from "vue";

const isLoggedIn = ref(false);
const userName = ref("João");
</script>

<template>
    <header>
        <div class="logo-wrapper">
            <img src="../assets/images/logo.png" alt="" />
        </div>
        <search class="search">
            <InputText class="search-input" placeholder="Pesquise" />
            <Button icon="pi pi-search" variant="link" />
        </search>
        <div class="header-buttons">
            <Button class="cart-button" label="Carrinho" icon="pi pi-shopping-cart" variant="link" />
            <Button v-if="!isLoggedIn" class="login-button" label="Login" icon="pi pi-sign-in" variant="link" />
            <Button v-if="isLoggedIn" class="login-button" :label="userName" icon="pi pi-user" variant="link" />
            <Button class="side-menu-button" icon="pi pi-bars" variant="link" />
        </div>
    </header>
</template>

<style scoped>
header {
    background-color: var(--surface-800);
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
        flex: 0;
    }

    .search {
        justify-content: start;
    }

    .cart-button {
        display: none;
    }

    .login-button {
        display: none;
    }

    .side-menu-button {
        display: flex;
    }
}
</style>
