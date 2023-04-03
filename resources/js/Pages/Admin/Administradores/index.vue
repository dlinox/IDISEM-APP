<template>
    <AdminLayout>
        <div class="container">
            <div class="card border-0 my-3">
                <div
                    class="card-header border-0 bg-primary d-flex justify-content-between align-items-center"
                >
                    <span class="text-white fw-bold">
                        {{ admins.length }} Administradores
                    </span>

                    <Link
                        href="/admin/administradores/create"
                        class="btn btn-light"
                    >
                        Nuevo
                    </Link>
                </div>
                <div class="card-body">
                    <div class="">
                        <h1 class="fs-3 mb-0">Administradores Registrados</h1>
                    </div>
                </div>
            </div>
            <div class="card border-0 rounded-0">
                <div class="card-header bg-white">
                    <div class="row">
                        <div class="col-6"></div>
                        <div class="col-6">
                            <div class="input-group">
                                <input
                                    type="text"
                                    class="form-control border-0"
                                    placeholder="Buscar"
                                    aria-label="Buscar"
                                    v-model="formFiltres.search"
                                />
                                <span class="input-group-text border-0">
                                    <i class="bi bi-search"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Registrado</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in admins.data" :key="index">
                            <th scope="row">{{ item.id }}</th>
                            <td>{{ item.name }}</td>
                            <td>{{ item.email }}</td>
                            <td>{{ item.registrado }}</td>
                            <td>
                                <Link
                                    :href="
                                        '/admin/administradores/' +
                                        item.id +
                                        '/edit'
                                    "
                                    type="button"
                                    class="btn btn-icon text-info"
                                >
                                    <i class="bi bi-pencil-square"></i>
                                </Link>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="card-footer d-flex justify-content-end">
                    <PaginationComponent
                        :currentPage="admins.current_page"
                        :totalPages="admins.last_page"
                        :links="admins.links"
                    />
                </div>

            </div>
        </div>
    </AdminLayout>
</template>
<script setup>
import { computed, ref, watch } from "vue";
import { Link, useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

import AdminLayout from "@/Layouts/AdminLayout.vue";
import HeadingPagesComponent from "../../../Components/HeadingPagesComponent.vue";
import PaginationComponent from "@/Components/PaginationComponent.vue";
import throttle from "lodash/throttle";

const props = defineProps({
    admins: Object,
    filters: Object,
});

const formFiltres = useForm({
    search: props.filters.search,
});

const items = computed(() => props.admins.data);

watch(
    formFiltres,
    throttle((val) => {
        Inertia.get(
            "/admin/administradores",
            { search: val.search },
            {
                preserveState: true,
            }
        );
    }, 600),
    { deep: true }
);
</script>
