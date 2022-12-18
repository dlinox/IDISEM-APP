<template>

    <template v-if="selectedType == 'TEXT'">
        <input type="text" class="form-control" readonly placeholder="Texto de respuesta corta">
    </template>
    <template v-else-if="selectedType == 'TEXTAREA'">
        <input type="text" class="form-control" readonly placeholder="Texto de respuesta Larga">
    </template>

    <template v-else-if="selectedType == 'RADIO'">
        <SingleOptionComponent v-model="opciones" />
    </template>

    <template v-else-if="selectedType == 'CHECKBOX'">
        <SingleOptionComponent v-model="opciones" />
    </template>

    <template v-else-if="selectedType == 'SELECT'">
        <SingleOptionComponent :otros="false" v-model="opciones" />
    </template>

    <template v-else-if="selectedType == 'EL'">
        <LinearScaleComponent />
    </template>

    <template v-else>
        <div class="d-flex justify-content-center text-secondary">
            <small>Seleccione un tipo de pregunta</small>
        </div>

    </template>

</template>
<script setup>

import { ref, watch, computed } from 'vue';
import SingleOptionComponent from '../Components/SingleOptionComponent.vue'
import LinearScaleComponent from '../Components/LinearScaleComponent.vue'

const props = defineProps({
    modelValue: Array,
    selectedType: {
        String,
        required: true,
    }
})

const emit = defineEmits(['update:modelValue'])

const opciones = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value)
}, { deep: true })


watch(() => props.selectedType, (val) => {
    switch (val) {
        case 'TEXT':
            emit('update:modelValue', [])
            break;

        case 'TEXTAREA':
            emit('update:modelValue', [])
            break;
        default:
            break;
    }
});

</script>
