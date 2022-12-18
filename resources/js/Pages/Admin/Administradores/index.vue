<template>

    <AdminLayout>
        <div class="container">


            <div class="card border-0 my-3">
                <div class="card-header border-0 bg-primary">

                </div>
                <div class="card-body">
                    <div class="">
                        <span class="text-secondary fw-bold mb-1">
                            {{ admins.length }} Administradores
                        </span>
                        <h1 class="fs-3 mb-0">
                            Administradores Registrados
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
                            <th scope="col">Registrado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in admins" :key="index">
                            <th scope="row">{{ item.id }} </th>
                            <td> {{ item.name }} </td>
                            <td>{{ item.email }}</td>
                            <td>{{ item.registrado }}</td>


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
    admins: Array
});
</script>