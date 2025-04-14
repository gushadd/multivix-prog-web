<script setup>
import { RouterLink, RouterView } from "vue-router";

import Header from "./components/Header.vue";
import CategorySelector from "./components/CategorySelector.vue";

import Button from "primevue/button";

// const toggleDarkMode = () => {
//     document.documentElement.classList.toggle("my-app-dark");
// };
</script>

<template>
    <Header />
    <CategorySelector />
    <main class="p-10">
        <RouterView />
    </main>
</template>

<style scoped></style>
