import "./assets/main.css";
import 'primeicons/primeicons.css'

import { createApp } from "vue";
import { createPinia } from "pinia";
import { definePreset } from "@primeuix/themes";

import App from "./App.vue";
import router from "./router";
import PrimeVue from "primevue/config";
import Aura from "@primeuix/themes/aura";

const app = createApp(App);

const MyPreset = definePreset(Aura, {
    semantic: {
        primary: {
            50: "{orange.50}",
            100: "{orange.100}",
            200: "{orange.200}",
            300: "{orange.300}",
            400: "{orange.400}",
            500: "{orange.500}",
            600: "{orange.600}",
            700: "{orange.700}",
            800: "{orange.800}",
            900: "{orange.900}",
            950: "{orange.950}",
        },
        colorScheme: {
            light: {
                surface: {
                    50: "{zinc.50}",
                    100: "{zinc.100}",
                    200: "{zinc.200}",
                    300: "{zinc.300}",
                    400: "{zinc.400}",
                    500: "{zinc.500}",
                    600: "{zinc.600}",
                    700: "{zinc.700}",
                    800: "{zinc.800}",
                    900: "{zinc.900}",
                    950: "{zinc.950}",
                },
            },
            dark: {
                surface: {
                    50: "{slate.50}",
                    100: "{slate.100}",
                    200: "{slate.200}",
                    300: "{slate.300}",
                    400: "{slate.400}",
                    500: "{slate.500}",
                    600: "{slate.600}",
                    700: "{slate.700}",
                    800: "{slate.800}",
                    900: "{slate.900}",
                    950: "{slate.950}",
                },
            },
        },
    },
});

app.use(createPinia());
app.use(router);
app.use(PrimeVue, {
    theme: {
        preset: MyPreset,
        options: {
            darkModeSelector: ".my-app-dark",
        },
    },
});

app.mount("#app");
