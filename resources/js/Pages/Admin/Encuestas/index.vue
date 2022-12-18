<template>

    <AdminLayout>
        <div class="container">

            <HeadingPagesComponent />

            <div class="card border-0 my-3">
                <div class="card-header border-0 bg-primary">

                </div>
                <div class="card-body">
                    <div class="">
                        <span class="text-secondary fw-bold mb-1">
                            20 Respuestas
                        </span>
                        <h1 class="fs-3 mb-0">
                            Encuestas publicadas
                        </h1>

                    </div>
                </div>
            </div>

            <div class="row">
                <div v-for="(item, index ) in encuestas" :key="index" class="col-12 mb-3">
                    <div class="card border-0">
                        <div class="card-header border-0 d-flex justify-content-between align-items-center">

                            <small class="text-secondary">
                                <i class="bi bi-calendar-check me-2"></i> {{ item.actualizado }}
                            </small>

                            <div class="dropdown">
                                <button class="btn btn-sm" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu border-0 shadow">
                                    <li>
                                        <Link :href="'/admin/encuestas/' + item.id + '/edit'" class="dropdown-item">Editar</Link>
                                    </li>
                                    <li>
                                        <Link :href="'/admin/encuestas/' + item.id" class="dropdown-item">Respuestas</Link>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-11">
                                    <h5 class="card-title">
                                        <small class="rounded-2 bg-primary fs-6 text-white px-2 me-2">
                                            {{ item.estado == 1 ? 'Activa' : 'Bloqueda' }}
                                        </small> {{ item.titulo }}
                                    </h5>
                                    <p class="card-text text-secondary">
                                        {{ item.descripcion }}
                                    </p>
                                </div>
                                <div class="col-1"></div>
                            </div>

                            <!--  
                            <Link :href="'/admin/encuestas/' + item.id" class="btn btn-primary">Ver resultado</Link> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </AdminLayout>
</template>
<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import HeadingPagesComponent from '@/Components/HeadingPagesComponent.vue';
import { Link } from '@inertiajs/inertia-vue3';
const props = defineProps({
    encuestas: Array
})


</script>
