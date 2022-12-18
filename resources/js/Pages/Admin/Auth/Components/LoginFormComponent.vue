<template>
    <form @submit.prevent="submit">
        <div class="mb-3">
            <label for="i-email" class="form-label">Correo</label>
            <input v-model="form.email" type="email" class="form-control">
        </div>

        <div class="mb-3">
            <label for="i-password" class="form-label">Contraseña</label>
            <input v-model="form.password" type="password" class="form-control">
        </div>

        <div class="mb-3  d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary" :disabled="form.processing" type="submit">

                <template v-if="form.processing">
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                </template>
                <template v-else>
                    <i class="bi bi-box-arrow-in-right me-2"></i>
                </template>
                Ingresar</button>
        </div>
    </form>
</template>


<script setup>
import { useForm } from '@inertiajs/inertia-vue3'

const form = useForm({
    email: null,
    password: null,

})

const submit = () => {
    form.post('/admin/auth/login')
}
</script>