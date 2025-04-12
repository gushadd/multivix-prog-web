<script setup>
import { RouterLink, RouterView } from "vue-router";
import Button from "primevue/button";

const toggleDarkMode = () => {
    document.documentElement.classList.toggle("my-app-dark");
};
</script>

<template>
    <Button @click="toggleDarkMode">Toggle dark mode</Button>
</template>

<style scoped></style>
