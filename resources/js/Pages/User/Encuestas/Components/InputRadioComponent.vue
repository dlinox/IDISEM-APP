<template>

    <CardPreguntaComponent :pregunta="pregunta.titulo">
        <template #card-body>

            <div class="form-check mt-2" v-for="(item, index) in pregunta.opciones" :key="index">
                <input :name="'radio-' + pregunta.id" class="form-check-input" type="radio"
                    :id="'opcion-r-' + pregunta.id + '-' + index" v-model="respuesta" :value="item">
                <label class="form-check-label" :for="'opcion-r-' + pregunta.id + '-' + index">
                    {{ item.detalle }}
                </label>
            </div>

            <!-- <div v-if="opciones.optionsOthers" class="mb-3">
                <hr>
                <input class="form-check-input me-2" type="checkbox" value="" :id="'checkbox-o-' + pregunta.id"
                    @click="respuesta.otra = !respuesta.otra">
                <label class="form-check-label" :for="'checkbox-o-' + pregunta.id">
                    Otra Respuesta
                </label>
                <input type="text" class="form-control mt-2" :id="'input-o-' + pregunta.id"
                    placeholder="Escriba su respuesta" v-model="respuesta.otraRespuesta" :disabled="!respuesta.otra">
            </div>-->
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