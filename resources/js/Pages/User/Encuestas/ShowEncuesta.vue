<template>
    <UserLayoutVue>
        <HeadingPageComponent :heading="heading" />

        <template v-if="respuestas">

            <div class="container">
                <div class="card border-0 my-5 mb-3" >
                <div class="row g-0">
                    <div class="col-md-4">
                        <img :src="'/uploads/' + calificaciones.cal_img_url" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title">
                                {{ calificaciones.cal_detalle }}
                            </h3>
                            <p class="card-text">
                                {{ calificaciones.cal_mensaje }}
                            </p>
                   
                        </div>
                    </div>
                </div>
            </div>
 
            </div>
        
 
        </template>
        <template v-else>
            <div class="container my-3">
                <form @submit.prevent="submit">
                    <div class="row">
                        <div v-for="(item, index) in  form.values" :key="index" class="col-12 mb-3">

                            <section>
                                <div class="my-3 fw-bold"> <i class="bi bi-collection me-3"></i>
                                    {{ (item.sec_titulo).toUpperCase() }}
                                </div>

                                <div v-for="(pregunta, j) in  item.preguntas" :key="j">
                                    <template v-if="pregunta.tipo === 'TEXT'">
                                        <InputTextComponent v-model="pregunta.respuesta" :pregunta="pregunta" />
                                    </template>

                                    <template v-else-if="pregunta.tipo === 'TEXTAREA'">
                                        <TextareaComponent v-model="pregunta.respuesta" :pregunta="pregunta" />
                                    </template>

                                    <template v-else-if="pregunta.tipo === 'RADIO'">
                                        <InputRadioComponent v-model="pregunta.respuesta" :pregunta="pregunta" />
                                    </template>

                                    <template v-else-if="pregunta.tipo === 'CHECKBOX'">
                                        <InputCheckboxComponent v-model="pregunta.respuesta" :pregunta="pregunta" />
                                    </template>
                                    <template v-else-if="pregunta.tipo === 'SELECT'">
                                        <SelectComponent v-model="pregunta.respuesta" :pregunta="pregunta" />
                                    </template>
                                </div>
                            </section>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit"> <i class="bi bi-send me-2"></i> Enviar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </template>
    </UserLayoutVue>
</template>

<script setup>

import UserLayoutVue from '@/Layouts/UserLayout.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import InputTextComponent from './Components/InputTextComponent.vue';
import TextareaComponent from './Components/TextareaComponent.vue';
import InputRadioComponent from './Components/InputRadioComponent.vue';
import InputCheckboxComponent from './Components/InputCheckboxComponent.vue';
import SelectComponent from './Components/SelectComponent.vue';
import { Inertia } from '@inertiajs/inertia';
import HeadingPageComponent from '../Components/HeadingPageComponent.vue';

const props = defineProps({
    encuesta: Object,
    secciones: Array,
    respuestas: Array,
    ponderado: Number,
    calificaciones: Object
});

const heading = {
    icon: 'bi bi-question-circle',
    title: props.encuesta.enc_titulo,
    description: props.encuesta.enc_descripcion
}

const form = useForm([]);

const submit = () => {
    Inertia.post('/user/respuestas', { secciones: form.values })
    //form.post('/user/respuestas')
}

const initialize = () => {
    //console.log(props.preguntas);
    form.values = props.secciones;

};

initialize();
</script>

<style lang="scss">
.card-result-test {
    max-width: 30rem;
    margin: 3rem auto;

    .icon {
        display: flex;
        justify-content: center;
        font-size: 6rem;
        color: #555;
    }

    .text-content {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        padding: 1rem 2rem;

        h1 {
            font-size: 1.8em;
        }
    }
}
</style>