<template>

    <AdminLayout>
        <div class="container">
            <div class="card border-0 my-3">
                <div class="card-header border-0 bg-primary">
                </div>
                <div class="card-body">
                    <div class="">
                        <span class="text-secondary fw-bold mb-1">
                            {{ usuarios.length }} Usuarios
                        </span>
                        <h1 class="fs-3 mb-0">
                            Usuarios Registrados
                        </h1>
                    </div>
                </div>
            </div>
            <div class="card border-0 rounded-0">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Correo</th>
                            <th scope="col">TyC</th>
                            <th scope="col">Inf. General</th>
                            <th scope="col">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in usuarios" :key="index">
                            <th scope="row">{{ item.id }} </th>
                            <td> {{ item.name }} </td>
                            <td>{{ item.email }}</td>
                            <td>

                                <template v-if="item.tyc_state">
                                    <span class="badge text-bg-success"> Acepto</span>
                                </template>
                                <template v-else>
                                    <span class="badge text-bg-danger"> Falta</span>
                                </template>
                            </td>
                            <td>
                                <template v-if="item.info_state">
                                    <span class="badge text-bg-success"> Completada</span>
                                </template>
                                <template v-else>
                                    <span class="badge text-bg-danger"> Falta</span>
                                </template>

                            </td>
                            <td>
                                <template v-if="item.state">
                                    <span class="badge text-bg-primary"> Activo</span>
                                </template>
                                <template v-else>
                                    <span class="badge text-bg-danger"> Deshabilitado</span>
                                </template>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>
<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import HeadingPagesComponent from '../../../Components/HeadingPagesComponent.vue';

const props = defineProps({
    usuarios: Array
});
</script>