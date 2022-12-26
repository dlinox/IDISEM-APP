<template>

    <AdminLayout>
        <div class="container">


            <div class="card border-0 my-3">
                <div class="card-header border-0 bg-primary d-flex justify-content-between align-items-center">
                    <span class="text-white fw-bold">
                        Crear Nuevo
                    </span>

                </div>
                <div class="card-body">
                    <form @submit.prevent="submit">

                        <div class="mb-3">
                            <label class="form-label">Nombres</label>
                            <input v-model="form.nombres" type="text" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Correo</label>
                            <input v-model="form.correo" type="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Rol</label>
                            <select v-model="form.rol" class="form-select" aria-label="Rol de Administrador" required>
                                <option disabled> --- Seleccione un rol ---</option>
                                <option v-for="(item, index) in roles" :key="index" :value="item.name"> {{ item.name }}
                                </option>
                            </select>
                        </div>

                        <div class=" d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary" :disabled="form.processing" type="submit">
                                <template v-if="form.processing">
                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true"></span>
                                </template>
                                <template v-else>
                                    <i class="bi bi-save me-2"></i>
                                </template>
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </AdminLayout>
</template>
<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { useForm } from '@inertiajs/inertia-vue3'

const form = useForm({
    nombres: null,
    correo: null,
    rol: null
})
const props = defineProps({
    roles: Array
});

const submit = () => {
    form.post('/admin/administradores')
}

</script>