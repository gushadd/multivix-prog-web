<script setup>
import Button from "primevue/button";
</script>

<template>
    <div class="category-list">
        <ul>
            <Button label="Masculino" variant="link"/>
            <Button label="Feminino" variant="link"/>
            <Button label="Infantil" variant="link"/>
        </ul>
    </div>
</template>

<style scoped>
.category-list {
    background-color: var(--surface-700);
    display: flex;
    align-items: center;
    justify-content: center;
    height: 5vh;
    width: 100vw;
}

ul {
    display: flex;
    gap: 10vw;
    font-size: 20px;
}
</style>
