<script setup>
import { RouterLink, RouterView } from "vue-router";

import Header from "./components/Header.vue";

import Button from "primevue/button";

// const toggleDarkMode = () => {
//     document.documentElement.classList.toggle("my-app-dark");
// };
</script>

<template>
    <Header />
    <main class="p-8">
        <Button>Clique</Button>
    </main>
</template>

<style scoped></style>
