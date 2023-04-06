<template>
    <form @submit.prevent="submit">
        <div class="mb-3">
            <label for="i-email" class="form-label">
                Código de matrícula <span class="text-danger">* </span>
            </label>
            <input v-model="form.email" type="text" class="form-control" />
            <div v-if="form.errors.email" class="text-danger">
                <small> {{ form.errors.email }}</small>
            </div>
        </div>

        <div class="mb-3">
            <label for="i-password" class="form-label">Contraseña</label>
            <input
                v-model="form.password"
                type="password"
                class="form-control"
                autocomplete="on"
            />
            <div v-if="form.errors.password" class="text-danger">
                <small> {{ form.errors.password }}</small>
            </div>
        </div>

        <div class="mb-3 d-grid gap-2 d-md-flex justify-content-md-end">
            <button
                class="btn btn-primary"
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

                Ingresar
            </button>
        </div>
    </form>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    email: null,
    password: null,
});

const submit = () => {
    form.post("/user/auth/login");
};
</script>
