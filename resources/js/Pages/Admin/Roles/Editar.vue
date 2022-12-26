<template>

    <AdminLayout>
        <div class="container">
            <div class="card border-0 my-3">
                <div class="card-header border-0 bg-primary d-flex   justify-content-between align-items-center">
                    <span class="text-white fw-bold ">
                        Editar Rol
                    </span>
                    <button class="btn btn-outline-light" type="button" @click="guardar">
                        Guardar Cambios
                    </button>

                </div>
                <div class="card-body">

                    <div class="d-flex w-100  justify-content-between mt-2">
                        <template v-if="editName">
                            <input v-model="form.nombre" type="text" required class="form-control"
                                :placeholder="form.nombre">
                            <select class="form-select ms-2" v-model="form.redirect" required>
                                <option value="null" disabled>--- SELECCIONAR UNO ---</option>
                                <option v-for="(item, index) in  permisos" :value="item.nombre">
                                    {{ item.nombre }}
                                </option>
                            </select>
                        </template>
                        <template v-else>
                            <div>
                                <h1 class="fs-3 mb-0">
                                    {{ form.nombre }}
                                </h1>
                                <small>
                                    {{ form.redirect }}
                                </small>
                            </div>


                        </template>
                        <button type="button" class="btn btn-icon" @click="editName = !editName">
                            <i class="bi bi-pencil-square text-primary"></i>
                        </button>

                    </div>
                </div>
            </div>

            <div class="card border-0 shadow">
                <div class="card-body text-center text-muted">

                    <template v-if="form.permisos.length == 0">
                        <i class="bi bi-folder2-open fs-1"></i>
                        <p class="text-sm">SIN PERMISOS</p>

                    </template>
                    <template v-else>
                        <span class="fs-1"> {{ form.permisos.length }} </span>
                        <p class="text-sm">PERMISOS</p>

                    </template>
                    <button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                        aria-expanded="false" aria-controls="collapseExample">
                        Ver permisos
                    </button>
                </div>
                <div class="collapse" id="collapseExample">
                    <div class="card border-0 ">
                        <div class="content-permisos">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <input type="checkbox" class="btn-check " id="btn-check-outlined"
                                                autocomplete="off" v-model="checked">
                                            <label class="btn btn-sm btn-outline-primary"
                                                for="btn-check-outlined">Todo</label>
                                        </th>
                                        <th scope="col">Nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in permisos" :key="index">
                                        <th class="">

                                            <input class="form-check-input" type="checkbox" :value="item"
                                                v-model="form.permisos">

                                        </th>
                                        <td> {{ item.nombre }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { useForm } from '@inertiajs/inertia-vue3';
import { ref, watch } from 'vue';

const props = defineProps({
    rol: Object,
    permisos: Array
});

const editName = ref(false);
const checked = ref(false);

const form = useForm({
    id: props.rol.id,
    nombre: props.rol.nombre,
    permisos: props.rol.permisos,
    redirect: props.rol.redirect,
})

watch(checked, (val) => {
    if (val) {
        form.permisos = props.permisos;
    }
    else {
        form.permisos = [];
    }
});

const guardar = () => {
    form.put('/admin/roles/' + form.id)
}


</script>
<style lang="scss" scoped>
.content-permisos {
    overflow: hidden;
    overflow-y: auto;
    max-height: 25rem;
}
</style>