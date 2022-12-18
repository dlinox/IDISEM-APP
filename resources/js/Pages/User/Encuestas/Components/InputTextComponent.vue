<template>
    <CardPreguntaComponent :pregunta="pregunta.titulo">
        <template #card-body>
            <div class="mb-3">
                <label :for="'opcion-' + pregunta.id" class="form-label">Respuesta</label>
                <input type="text" class="form-control" :id="'opcion-' + pregunta.id" placeholder="Escriba su respuesta"
                    v-model="respuesta">
            </div>
        </template>
    </CardPreguntaComponent>
</template>
<script setup>

import { computed } from 'vue';
import CardPreguntaComponent from '../../Components/CardPreguntaComponent.vue';

const props = defineProps({
    pregunta: Object,
    modelValue: String
});
const emit = defineEmits(['update:modelValue']);

const respuesta = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value)
});


</script>




