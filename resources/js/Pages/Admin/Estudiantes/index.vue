<template>

    <AdminLayout>
        <div class="container">


            <div class="card border-0 my-3">
                <div class="card-header border-0 bg-primary">

                </div>
                <div class="card-body">
                    <div class="">
                        <span class="text-secondary fw-bold mb-1">
                            {{ estudiantes.length }} Estudiantes
                        </span>
                        <h1 class="fs-3 mb-0">
                            Estudiantes Registrados
                        </h1>


                    </div>
                </div>
            </div>
            <div class="card border-0 rounded-0 table-content">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Correo</th>
                            <th scope="col">DNI</th>
                            <th scope="col">Celular</th>
                            <th scope="col">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in estudiantes" :key="index">
                            <th scope="row">{{ item.id }} </th>
                            <td> {{ item.nombres }} </td>
                            <td>{{ item.apellidos }}</td>
                            <td>{{ item.correo }}</td>
                            <td>{{ item.dni }}</td>
                            <td>{{ item.celular }}</td>
                            <td>
                                <template v-if="item.registrado">
                                    <span class="badge text-bg-success"> Registrado</span>
                                </template>
                                <template v-else>
                                    <span class="badge text-bg-danger"> No</span>
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


const props = defineProps({
    estudiantes: Array
});
</script>
<style>
.table-content {
    min-width: 20rem;
    overflow-y: hidden;
    overflow-x: auto;
    display: flex;
    justify-content: center;
}
</style>