<script setup>
import Button from "primevue/button";
</script>

<template>
    <div class="category-list">
        <ul>
            <Button label="Masculino" variant="text"/>
            <Button label="Feminino" variant="text" />
            <Button label="Infantil" variant="text" />
        </ul>
    </div>
</template>

<style scoped>
.category-list {
    background-color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 7vh;
    width: 100vw;
    border-bottom: 1px solid var(--surface-300);
}

ul {
    display: flex;
    gap: 10vw;
    font-size: 20px;
}
</style>
