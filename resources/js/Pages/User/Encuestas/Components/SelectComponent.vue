<template>

<CardPreguntaComponent :pregunta="pregunta.titulo">
        <template #card-body>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example"  v-model="respuesta">
                    <option value="null" disabled>- Seleccione una opcion - </option>
                    <option  v-for="(item, index) in pregunta.opciones" :key="index" :value="item"> {{item.detalle}} </option>
                </select>
            </div>
        </template>
    </CardPreguntaComponent>

</template>
<script setup>
import { computed } from 'vue';
import CardPreguntaComponent from '../../Components/CardPreguntaComponent.vue';

const props = defineProps({
    pregunta: Object,
    modelValue: Object
});
const emit = defineEmits(['update:modelValue']);

const respuesta = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value)
});



</script>