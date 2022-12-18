<template>
    <CardPreguntaComponent :pregunta="pregunta.titulo">
        <template #card-body>
            <div class="form-check mb-3" v-for="(item, index) in pregunta.opciones" :key="index">
                <input :name="'checkbox-' + pregunta.id" class="form-check-input" type="checkbox"
                    :id="'checkbox-' + pregunta.id + '-' + index" v-model="respuesta" :value="item">
                <label class="form-check-label" :for="'checkbox-' + pregunta.id + '-' + index">
                    {{ item.detalle }}
                </label>
            </div>
            <!--    <div v-if="opciones.optionsOthers" class="mb-3">
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
import { ref, watch } from 'vue';
import CardPreguntaComponent from '../../Components/CardPreguntaComponent.vue';

const props = defineProps({
    pregunta: Object,
    modelValue: Array
});
const emit = defineEmits(['update:modelValue']);

const respuesta = ref([]);

watch(() => respuesta.value, (val) => {
    emit('update:modelValue', JSON.parse(JSON.stringify(val)))
});


</script>