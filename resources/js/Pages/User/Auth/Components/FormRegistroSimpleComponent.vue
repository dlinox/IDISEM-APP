<template>
    <form @submit.prevent="submit">
        <div class="row">
            <div class="col-12 mb-3">
                <label for="input-codigo_mat" class="form-label">
                    Codigo de matrícula
                    <span class="text-danger">*</span>
                </label>
                <input
                    v-model="formData.codigo_mat"
                    type="text"
                    class="form-control"
                    id="input-codigo_mat"
                    placeholder="Codigo de matrícula(6 digitos)"
                    required
                />

                <div v-if="formData.errors.codigo_mat" class="text-danger">
                    <small> {{ formData.errors.codigo_mat }}</small>
                </div>
            </div>

            <div class="col-12 mb-3">
                <label for="input-correo" class="form-label">Correo</label>
                <input
                    v-model="formData.correo"
                    type="email"
                    class="form-control"
                    id="input-correo"
                    placeholder="Correo"

                />

                <div v-if="formData.errors.correo" class="text-danger">
                    <small> {{ formData.errors.correo }}</small>
                </div>
            </div>
        </div>

        <hr />

        <div class="d-flex justify-content-end">
      
            <button
                class="btn btn-primary"
                type="submit"
                :disabled="formData.processing"
            >
                <template v-if="formData.processing">
                    <span
                        class="spinner-border spinner-border-sm me-2"
                        role="status"
                        aria-hidden="true"
                    ></span>
                </template>
                <template v-else>
                    <i class="bi bi-save me-2"></i>
                </template>
                Registrarme
            </button>
        </div>
    </form>
</template>
<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

import { useToast } from "vue-toastification";
const toast = useToast();

const emits = defineEmits(["onCancel", "onSubmit"]);

const formData = useForm({
    nombres: '-',
    paterno: '-',
    materno: '-',
    correo: null,
    dni: '-',
    celular: '-',
    codigo_mat: null,
});

const submit = () => {
    formData.post("/user/auth/register-sign-in", {
        onError: (e) => {
            for (const property in e) {
                toast.error(property.toUpperCase() + ": " + e[property]);
            }
        },
        onSuccess: () => {
            formData.reset();
            emits("onSubmit");
        },
    });
};
</script>
