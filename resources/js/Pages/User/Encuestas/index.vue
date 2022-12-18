<template>
    <UserLayoutVue>
        <div class="container">
            <h1>Lista de encuestas</h1>
            <div class="card" v-for="(item, index) in encuestas" :key="index">
                <div class="card-header">
                    {{ item.enc_tiutlo }}
                </div>
                <div class="card-body">
                    {{ item.enc_descripcion ? item.enc_descripcion : 'sin descripcion' }}

                    <hr>
                    {{ item.created_at }}
                </div>
                <div class="card-footer d-flex justify-content-end ">
                    <Link class="btn btn-dark" :href="'/user/encuestas/' + item.enc_id">
                    Ver Encuesta </Link>
                </div>
            </div>
        </div>
    </UserLayoutVue>
</template>

<script setup>
import UserLayoutVue from '@/Layouts/UserLayout.vue';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
    encuestas: Array
})

</script>