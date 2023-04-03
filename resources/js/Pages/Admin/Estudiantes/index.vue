<template>
    <AdminLayout>
        <div class="container">
            <div class="card border-0 my-3">
                <div class="card-header border-0 bg-primary"></div>
                <div class="card-body">
                    <div class="">
                        <span class="text-secondary fw-bold mb-1">
                            {{ estudiantes.total }} Estudiantes
                        </span>
                        <h1 class="fs-3 mb-0">Estudiantes UNA-PUNO</h1>
                    </div>
                </div>
            </div>
            <div class="card border-0 rounded-0 table-content">
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
                            <th scope="col">Apellidos</th>
                            <th scope="col">Correo</th>
                            <th scope="col">DNI</th>
                            <th scope="col">Celular</th>
                            <th scope="col">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in items" :key="index">
                            <th scope="row">{{ item.id }}</th>
                            <td>{{ item.nombres }}</td>
                            <td>{{ item.paterno }}</td>
                            <td>{{ item.correo }}</td>
                            <td>{{ item.dni }}</td>
                            <td>{{ item.celular }}</td>
                            <td>
                                <template v-if="item.estado">
                                    <span class="badge text-bg-success">
                                        Registrado</span
                                    >
                                </template>
                                <template v-else>
                                    <span class="badge text-bg-danger">
                                        No</span
                                    >
                                </template>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="card-footer d-flex justify-content-end">
                    <PaginationComponent
                        :currentPage="estudiantes.current_page"
                        :totalPages="estudiantes.last_page"
                        :links="estudiantes.links"
                    />
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
<script setup>
import { computed, ref, watch } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import PaginationComponent from "@/Components/PaginationComponent.vue";
import throttle from "lodash/throttle";
const props = defineProps({
    estudiantes: Object,
    filters: Object,
});

const formFiltres = useForm({
    search: props.filters.search,
});

const items = computed(() => props.estudiantes.data);

watch(
    formFiltres,
    throttle((val) => {
        Inertia.get(
            "/admin/estudiantes",
            { search: val.search },
            {
                preserveState: true,
            }
        );
    }, 600),
    { deep: true }
);
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
