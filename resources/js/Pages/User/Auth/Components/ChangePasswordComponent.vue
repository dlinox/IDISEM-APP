<template>
    <button v-if="button" class="btn btn-dark" @click="dialog = !dialog">
        Cambiar clave
    </button>
    <ModalComponent v-model="dialog">
        <template #content>
            <div class="fw-bold">CAMBIAR CONTRASEÑA</div>
            <hr />

            <form @submit.prevent="submit">
                <div class="mb-3">
                    <label for="i-password" class="form-label"
                        >Nueva Contraseña</label
                    >
                    <input
                        v-model="form.password"
                        type="password"
                        class="form-control"
                        autocomplete="on"
                    />
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button
                        v-if="cancel"
                        class="btn btn-text text-danger order-2 order-md-1"
                        type="button"
                        @click="dialog = !dialog"
                    >
                        Cancelar
                    </button>

                    <button
                        class="btn btn-primary order-1 order-md-2"
                        type="submit"
                        :disabled="form.processing"
                    >
                        <template v-if="form.processing">
                            <span
                                class="spinner-border spinner-border-sm me-2"
                                role="status"
                                aria-hidden="true"
                            ></span>
                        </template>
                        <template v-else>
                            <i class="bi bi-box-arrow-in-right me-2"></i>
                        </template>
                        Guardar
                    </button>
                </div>
            </form>
        </template>
    </ModalComponent>
</template>

<script setup>
import ModalComponent from "@/Components/ModalComponent.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

const props = defineProps({
    cancel: {
        type: Boolean,
        default: true,
    },
    button: {
        type: Boolean,
        default: false,
    },
});
const form = useForm({
    password: null,
});

const dialog = ref(false);

const submit = () => {
    form.post("/user/auth/changer-password");
    console.log("asds");
};
</script>
