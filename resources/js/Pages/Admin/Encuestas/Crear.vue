<template>

    <AdminLayout>
        <div class="container">


            <div class="my-3">
                <h1 class="fs-4 mb-0">
                    Crear Nueva Encuesta
                </h1>
            </div>

            <form @submit.prevent="submit">

                <div class="card border-0 bg-transparent">
                    <div class="card-body bg-white">

                        <div class="d-flex justify-content-end">
                            <CalificacionEncuestaComponent v-model="form.calificaciones" />

                            <button type="submit" class="btn btn-primary ms-3" :disabled="form.processing">
                                <template v-if="form.processing">
                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true"></span>
                                </template>
                                <template v-else>
                                    <i class="bi bi-save me-2"></i>
                                </template>
                                Guardar
                            </button>
                        </div>

                        <div class="d-flex mt-3 mb-2">
                            <input v-model="form.titulo" type="text" class="form-control"
                                placeholder="Titulo de la encuesta" required>


                        </div>

                        <div class="d-flex my-3">
                            <textarea v-model="form.descripcion" class="form-control" rows="2"
                                placeholder="Descripcin de la encuesta" required></textarea>
                        </div>

                    </div>

                    <div class="accordion" id="accordionSection">
                        <div v-for="(item, i) in form.secciones" :key="i"
                            class="accordion-item border-0 bg-transparent">
                            <div class="accordion-header" :id="'accordionSection-h' + i">
                                <div class="accordion-button rounded-0">
                                    <input v-model="item.titulo" type="text" class="form-control me-2"
                                        :placeholder="'Seccion ' + (i + 1)">
                                    <button class="btn btn-dark" type="button" data-bs-toggle="collapse"
                                        :data-bs-target="'#accordionSection-c' + i" aria-expanded="true"
                                        :aria-controls="'accordionSection-c' + i">
                                        <i class="bi bi-caret-down"></i>
                                    </button>
                                </div>
                            </div>
                            <div :id="'accordionSection-c' + i" class="accordion-collapse collapse show"
                                :aria-labelledby="'accordionSection-' + i">
                                <div class="accordion-body px-2 border border-light">

                                    <VueDraggableNext :list="item.preguntas">
                                        <div v-for="(item, j) in item.preguntas" :key="j"
                                            class="card shadow border-0 mb-3">
                                            <div class="card-header border-0">
                                                <div class="d-flex mt-3 mb-2">
                                                    <input v-model="item.titulo" type="text" class="form-control"
                                                        :placeholder="'Pregunta ' + (j + 1)" :disabled="!item.tipo">

                                                    <DropDownTypeComponent v-model="item.tipo" />
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <TypeContentComponent :selected-type="item.tipo"
                                                    v-model="item.opciones" />
                                            </div>
                                            <div class="card-footer border-0">
                                                <div class="d-flex justify-content-end">

                                                    <button type="button" class="btn btn-dark ms-2"
                                                        @click="dublicateQuestion(item, i)">
                                                        <i class="bi bi-collection"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-outline-secondary ms-2"
                                                        @click="reomoveQuestion(j, i)">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </VueDraggableNext>

                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-success" @click="addQuestion(i)">
                                            <i class="bi bi-plus-square-dotted"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end py-2">
                        <button class="btn btn-success" type="button" @click="addSection()">
                            <i class="bi bi-plus-square-dotted me-2"></i> Añadir Seccion</button>
                    </div>
                </div>
            </form>
        </div>

    </AdminLayout>
</template>

<script setup>

import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Link, useForm } from '@inertiajs/inertia-vue3';
import { VueDraggableNext } from 'vue-draggable-next'
import HeadingPagesComponent from '../../../Components/HeadingPagesComponent.vue';
import CalificacionEncuestaComponent from '../Components/CalificacionEncuestaComponent.vue';
import ModalComponent from '../../../Components/ModalComponent.vue';
import DropDownTypeComponent from '../Components/DropDownTypeComponent.vue';
import TypeContentComponent from '../Components/TypeContentComponent.vue';


const form = useForm({
    titulo: null,
    descripcion: '',
    calificaciones: [
        {
            id: null,
            detalle: null,
            mensaje: null,
            img: null,
            min: null,
            max: null
        }
    ],
    secciones: [
        {
            id: null,
            titulo: '',
            preguntas: [
                {
                    id: null,
                    titulo: '',
                    tipo: '',
                    opcion: '',
                    opciones: [
                        {
                            id: null,
                            detalle: null,
                            ponderado: null,
                        },
                    ]
                },
            ],
        }
    ],

})

const submit = (e) => {
    console.log(e.type);
    form.post('/admin/encuestas')
}

const seccion = {
    id: null,
    titulo: '',
    preguntas: [
        {
            titulo: '',
            tipo: '',
            opcion: '',
            opciones: [
                {
                    id: null,
                    detalle: null,
                    ponderado: 0,
                },
            ]
        },
    ],
};

const pregunta = {
    titulo: '',
    tipo: '',
    opcion: '',
    opciones: [
        {
            id: null,
            detalle: null,
            ponderado: null,
        },
    ]
}

const addSection = () => {
    let aux = JSON.parse(JSON.stringify(seccion));
    form.secciones.push({ ...aux })
}

const addQuestion = (i) => {
    let aux = JSON.parse(JSON.stringify(pregunta));
    form.secciones[i].preguntas.push({ ...aux })
}

const dublicateQuestion = (item, i) => {
    let aux = JSON.parse(JSON.stringify(item));
    form.secciones[i].preguntas.push({ ...aux });
}

const reomoveQuestion = (index, i) => {
    form.secciones[i].preguntas.splice(index, 1);
}

</script>

<style>
.accordion-button:not(.collapsed)::after {
    display: none;
}
</style>