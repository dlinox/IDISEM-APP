<template>

    <AdminLayout>
        <div class="container">
            <div class="card border-0 my-3">
                <div class="card-header border-0 bg-primary">

                </div>
                <div class="card-body">
                    <div class="">
                        <span class="text-secondary fw-bold mb-1">
                           {{ roles.length }}  Roles
                        </span>
                        <h1 class="fs-3 mb-0">
                            Roles
                        </h1>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Creado</th>
                            <th scope="col">Permisos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in roles" :key="index">
                            <th scope="row"> {{ index + 1 }} </th>
                            <td> {{ item.nombre }} </td>
                            <td> {{ item.creado }} </td>

                            <td>
                                <Link type="as" class="btn btn-sm btn-outline-primary"
                                    :href="'/admin/roles/' + item.id + '/edit'">
                                Ver <span class="badge text-bg-primary ms-2"> {{ item.permisos.length }} </span>
                                </Link>
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
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
    roles: Array,
    permisos: Array
});
</script>
<style>

</style>