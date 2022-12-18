<template>

    <AdminLayout>
        <div class="container">
            <HeadingPagesComponent />


            <div class="card border-0 rounded-0">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in usuarios" :key="index">
                            <th scope="row">{{ item.id }} </th>
                            <td> {{ item.name }} </td>
                            <td>{{ item.email }}</td>
                            <td>{{ item.state }}</td>
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