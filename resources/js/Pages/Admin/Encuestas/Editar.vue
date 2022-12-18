<template>

    <AdminLayout>
        <div class="container">
           
            <HeadingPagesComponent />
        

            <hr>
            <form @submit.prevent="submit">
             

                <div class="d-flex mt-3 mb-2">
                    <input v-model="form.titulo" type="text" class="form-control" placeholder="Titulo de la encuesta">

                    <button type="submit" class="btn btn-dark ms-3">
                        Guardar
                    </button>
                </div>

                <div class="d-flex my-3">
                    <textarea v-model="form.descripcion" class="form-control" rows="2" placeholder="Descripcin de la encuesta"></textarea>
                </div>

                <VueDraggableNext :list="form.questions">

                    <div v-for="(item, index) in form.questions" :key="index" class="card mb-3">
                        <div class="card-header">
                            <div class="d-flex mt-3 mb-2">
                                <input v-model="item.title" type="text" class="form-control"
                                    :placeholder="'Pregunta ' + (index + 1)" :disabled="!item.type.code">

                                <DropDownTypeComponent v-model="item.type" />
                            </div>
                        </div>
                        <div class="card-body">
                            <TypeContentComponent :selected-type="item.type.code"  v-model="item.content" />
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-end">

                                <button type="button" class="btn btn-dark ms-2" @click="dublicateQuestion(item)">
                                    <i class="bi bi-collection"></i>
                                </button>
                                <button type="button" class="btn btn-dark ms-2" @click="reomoveQuestion(index)">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>


                </VueDraggableNext>


                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-success" @click="addQuestion()">
                        <i class="bi bi-plus-square-dotted"></i>
                    </button>
                </div>
            </form>
            {{encuesta}}

            <pre>
                {{preguntas}}
            </pre>

          
        </div>

    </AdminLayout>
</template>
<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Link, useForm } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
import { VueDraggableNext } from 'vue-draggable-next'
import HeadingPagesComponent from '../../../Components/HeadingPagesComponent.vue';
import DropDownTypeComponent from '../Components/DropDownTypeComponent.vue';
import TypeContentComponent from '../Components/TypeContentComponent.vue';



const props = defineProps({
    encuesta: Object,
    preguntas: Array
})


const form = useForm({
    titulo: null,
    descripcion: null,
    questions: [
        {
            title: '',
            type: {},
            content: {}
        },
    ],
})


function submit(e) {
    console.log(e.type);
    form.post('/admin/encuestas')
}


const question = {
    title: '',
    type: {},
    content: {}
}


const addQuestion = () => {
    form.questions.push({ ...question })
}

const dublicateQuestion = (item) => {
    form.questions.push({ ...item })
}

const reomoveQuestion = (index) => {
    form.questions.splice(index, 1)
}

const initialize = () =>{
    form.titulo =  props.encuesta.enc_tiutlo
    form.descripcion =  props.encuesta.enc_descripcion
    form.questions = props.preguntas
}

initialize();

</script>
