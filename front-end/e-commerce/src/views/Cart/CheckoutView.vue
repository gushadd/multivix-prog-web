<script setup>
import { ref } from "vue";
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import RadioButton from "primevue/radiobutton";
import Select from "primevue/select";

import products from "@/assets/products.json";

import CheckoutProduct from "@/components/CheckoutProduct.vue";

const paymentMethod = ref("");
const paymentMethodIsCreditCard = ref(false);
const installments = ref([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]);

const checkCreditCard = () => {
    paymentMethodIsCreditCard.value = true;
};

const checkOtherPayment = () => {
    paymentMethodIsCreditCard.value = false;
};
</script>

<template>
    <main class="main-wrapper">
        <h2>Fechar Pedido</h2>
        <div class="products-wrapper">
            <CheckoutProduct v-for="product in products" :key="product.id" :product="product" />
        </div>
        <div class="checkout-info-wrapper">
            <div class="address-form-wrapper">
                <h3>Endereço de Entrega</h3>
                <InputText placeholder="CEP" size="small" class="address-input w-3/5 mt-5" />
                <InputText placeholder="Rua" size="small" class="address-input w-3/5" />
                <InputText placeholder="Número" type="number" size="small" class="address-input w-3/5" />
                <InputText placeholder="Bairro" size="small" class="address-input w-3/5" />
                <InputText placeholder="Cidade" size="small" class="address-input w-3/5" />
                <InputText placeholder="Estado" size="small" class="address-input w-3/5" />
                <Button label="Salvar" class="address-save-button w-3/5 mt-5" />
            </div>
            <div class="payment-wrapper">
                <div>
                    <h3>Forma de Pagamento</h3>
                    <div class="flex gap-2 items-center mt-5">
                        <RadioButton v-model="paymentMethod" inputId="payment1" name="payment" value="pix" @change="checkOtherPayment" />
                        <label for="payment1">Pix</label>
                    </div>
                    <div class="flex gap-2 items-center mt-5">
                        <RadioButton v-model="paymentMethod" inputId="payment2" name="payment" value="boleto" @change="checkOtherPayment" />
                        <label for="payment2">Boleto</label>
                    </div>
                    <div class="flex gap-2 items-center mt-5">
                        <RadioButton v-model="paymentMethod" inputId="payment3" name="payment" value="cartao" @change="checkCreditCard" />
                        <label for="payment3">Cartão de Crédito</label>
                    </div>
                    <div v-if="paymentMethodIsCreditCard" class="flex gap-2 items-center mt-5">
                        <Select size="small" placeholder="Selecione as parcelas" :options="installments" />
                    </div>
                    <div class="mt-10 w-full flex flex-col items-start"></div>
                </div>
                <div>
                    <h3>Total: <span>R$ 199,99</span></h3>
                    <h5>Forma de Pagamento: Pix</h5>
                    <Button label="Confirmar Pedido" class="confirm-button w-3/5 mt-5" />
                </div>
            </div>
        </div>
    </main>
</template>

<style scoped>
.main-wrapper {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.products-wrapper {
    display: flex;
    flex-direction: column;
    gap: 10px;
    width: 100%;
    min-height: 600px;
    max-height: 600px;
    overflow-y: scroll;
}

.checkout-info-wrapper {
    display: flex;
    gap: 20px;
    height: 500px;
    margin-top: 20px;
}

.address-form-wrapper {
    width: 50%;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.payment-wrapper {
    display: flex;
    flex-direction: column;
    width: 50%;
}

@media (max-width: 1300px) {
    .checkout-info-wrapper {
        flex-direction: column;
        gap: 50px;
        height: fit-content;
        align-items: center;
    }

    .address-form-wrapper {
        width: 100%;
    }

    .address-input {
        width: 100%;
    }

    .address-save-button {
        width: 100%;
    }

    .payment-wrapper {
        flex-direction: row;
        gap: 20px;
        width: 100%;
        justify-content: center;
    }
}

@media (max-width: 700px) {
    .payment-wrapper {
        flex-direction: column;
    }

    .confirm-button {
        width: 100%;
    }
}
</style>
