<template>
    <form @submit.prevent="submit">
        <div class="row">
            <div class="col-4 mb-3">
                <label for="input-dni" class="form-label">DNI</label>
                <input
                    v-model="formData.dni"
                    type="text"
                    class="form-control"
                    id="input-dni"
                    placeholder="Número de DNI"
                    required
                />

                <div v-if="formData.errors.dni" class="text-danger">
                    <small> {{ formData.errors.dni }}</small>
                </div>
            </div>

            <div class="col-8 mb-3">
                <label for="input-nombres" class="form-label">Nombre</label>
                <input
                    v-model="formData.nombres"
                    type="text"
                    class="form-control"
                    id="input-nombres"
                    placeholder="Nombre del estudiante"
                    required

                />

                <div v-if="formData.errors.nombres" class="text-danger">
                    <small> {{ formData.errors.nombres }}</small>
                </div>
            </div>

            <div class="col-6 mb-3">
                <label for="input-paterno" class="form-label">Paterno</label>
                <input
                    v-model="formData.paterno"
                    type="text"
                    class="form-control"
                    id="input-paterno"
                    placeholder="Apellido Paterno"
                    required

                />

                <div v-if="formData.errors.paterno" class="text-danger">
                    <small> {{ formData.errors.paterno }}</small>
                </div>
            </div>

            <div class="col-6 mb-3">
                <label for="input-materno" class="form-label">Materno</label>
                <input
                    v-model="formData.materno"
                    type="text"
                    class="form-control"
                    id="input-materno"
                    placeholder="Apellido Materno"
                    required

                />

                <div v-if="formData.errors.materno" class="text-danger">
                    <small> {{ formData.errors.materno }}</small>
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
                    required
                />

                <div v-if="formData.errors.correo" class="text-danger">
                    <small> {{ formData.errors.correo }}</small>
                </div>
            </div>

            <div class="col-6 mb-3">
                <label for="input-celular" class="form-label">Celular</label>
                <input
                    v-model="formData.celular"
                    type="text"
                    class="form-control"
                    id="input-celular"
                    placeholder="Número de celular"
                    required
                />

                <div v-if="formData.errors.celular" class="text-danger">
                    <small> {{ formData.errors.celular }}</small>
                </div>
            </div>

            <div class="col-6 mb-3">
                <label for="input-codigo_mat" class="form-label"
                    >Codigo de matrícula</label
                >
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
        </div>

        <hr />

        <div class="d-flex justify-content-between">
            <button
                class="btn btn-text text-danger"
                type="button"
                @click="$emit('onCancel')"
            >
                Cancelar
            </button>
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
    nombres: null,
    paterno: null,
    materno: null,
    correo: null,
    dni: null,
    celular: null,
    codigo_mat: null,
});

const submit = () => {


    formData.post("/user/auth/register-student", {
        onError: (e) => {
            for (const property in e) {
                toast.error(property.toUpperCase() +': '+ e[property]);
            }
        },
        onSuccess: () => {
            formData.reset();
            emits("onSubmit");
        },
    });
};
</script>
