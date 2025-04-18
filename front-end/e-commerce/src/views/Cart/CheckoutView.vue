<script setup>
import { ref, reactive, onMounted } from "vue";
import * as yup from "yup";

import InputText from "primevue/inputtext";
import Button from "primevue/button";
import RadioButton from "primevue/radiobutton";
import Select from "primevue/select";

import CheckoutProduct from "@/components/CheckoutProduct.vue";
import { useCartStore } from "@/stores/cart";
import { useToast } from "vue-toastification";
import { useRouter } from "vue-router";

const router = useRouter();
const toast = useToast();
const cart = useCartStore();

const address = reactive({
    cep: "",
    rua: "",
    numero: "",
    bairro: "",
    cidade: "",
    estado: "",
});

const paymentMethod = ref("");
const paymentMethodIsCreditCard = ref(false);
const selectedInstallments = ref(null);
const installments = ref([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]);

const checkCreditCard = () => {
    paymentMethodIsCreditCard.value = true;
};

const checkOtherPayment = () => {
    paymentMethodIsCreditCard.value = false;
    selectedInstallments.value = null;
};

// Schema de validação com yup
const schema = yup.object({
    cep: yup.string().required("CEP é obrigatório"),
    rua: yup.string().required("Rua é obrigatória"),
    numero: yup.number().typeError("Número deve ser numérico").required("Número é obrigatório"),
    bairro: yup.string().required("Bairro é obrigatório"),
    cidade: yup.string().required("Cidade é obrigatória"),
    estado: yup.string().required("Estado é obrigatório"),
    paymentMethod: yup.string().required("Forma de pagamento é obrigatória"),
    installments: yup
        .number()
        .nullable()
        .when("paymentMethod", {
            is: "cartao",
            then: (schema) => schema.required("Selecione o número de parcelas"),
        }),
});

const errors = ref({});

const validate = async () => {
    try {
        errors.value = {};
        await schema.validate(
            {
                ...address,
                paymentMethod: paymentMethod.value,
                installments: selectedInstallments.value,
            },
            { abortEarly: false }
        );

        // Mostrar o toast de agradecimento
        toast.success("Obrigado pela sua compra!", {
            timeout: 5000,
        });

        // Limpar carrinho
        cart.clear();

        // Redirecionar para a tela inicial após um pequeno delay
        setTimeout(() => {
            router.push("/");
        }, 500);
    } catch (err) {
        if (err.inner) {
            err.inner.forEach((e) => {
                errors.value[e.path] = e.message;
            });
        }
    }
};

onMounted(() => {
    cart.fetchCart();
});

const buscarCep = async () => {
    if (!address.cep) return;

    try {
        const response = await fetch(`https://brasilapi.com.br/api/cep/v1/${address.cep}`);
        if (!response.ok) throw new Error("Erro ao buscar o CEP");

        const data = await response.json();

        address.rua = data.street;
        address.bairro = data.neighborhood;
        address.cidade = data.city;
        address.estado = data.state;
    } catch (error) {
        toast.error("CEP inválido");
    }
};
</script>

<template>
    <main class="main-wrapper">
        <h2>Fechar Pedido</h2>
        <div class="products-wrapper">
            <CheckoutProduct v-for="product in cart.groupedItems" :key="product.produto.id" :product="product" />
        </div>

        <div class="checkout-info-wrapper">
            <div class="address-form-wrapper">
                <h3>Endereço de Entrega</h3>

                <div class="flex gap-2 items-center w-full mt-5">
                    <InputText v-model="address.cep" placeholder="CEP" type="number" size="small" class="address-input w-3/5" />
                    <Button icon="pi pi-search" @click="buscarCep" severity="secondary" variant="text" />
                </div>
                <small v-if="errors.cep" class="text-red-500">{{ errors.cep }}</small>

                <InputText v-model="address.rua" placeholder="Rua" size="small" class="address-input w-3/5" />
                <small v-if="errors.rua" class="text-red-500">{{ errors.rua }}</small>

                <InputText v-model="address.numero" placeholder="Número" type="number" size="small" class="address-input w-3/5" />
                <small v-if="errors.numero" class="text-red-500">{{ errors.numero }}</small>

                <InputText v-model="address.bairro" placeholder="Bairro" size="small" class="address-input w-3/5" />
                <small v-if="errors.bairro" class="text-red-500">{{ errors.bairro }}</small>

                <InputText v-model="address.cidade" placeholder="Cidade" size="small" class="address-input w-3/5" />
                <small v-if="errors.cidade" class="text-red-500">{{ errors.cidade }}</small>

                <InputText v-model="address.estado" placeholder="Estado" size="small" class="address-input w-3/5" />
                <small v-if="errors.estado" class="text-red-500">{{ errors.estado }}</small>
            </div>

            <div class="payment-wrapper">
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
                <small v-if="errors.paymentMethod" class="text-red-500">
                    {{ errors.paymentMethod }}
                </small>

                <div v-if="paymentMethodIsCreditCard" class="flex gap-2 items-center mt-5">
                    <Select v-model="selectedInstallments" :options="installments" size="small" placeholder="Selecione as parcelas" />
                    <small v-if="errors.installments" class="text-red-500">
                        {{ errors.installments }}
                    </small>
                </div>

                <div class="mt-10 w-full flex flex-col items-start"></div>

                <div>
                    <h3>
                        Total:
                        <span>
                            {{
                                cart.totalPrice.toLocaleString("pt-BR", {
                                    style: "currency",
                                    currency: "BRL",
                                })
                            }}
                        </span>
                    </h3>
                    <Button label="Confirmar Pedido" class="confirm-button w-3/5 mt-5" @click="validate" />
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
    min-height: fit-content;
    max-height: 600px;
    overflow-y: scroll;
}

.checkout-info-wrapper {
    display: flex;
    gap: 20px;
    min-height: fit-content;
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
        flex-direction: column;
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
