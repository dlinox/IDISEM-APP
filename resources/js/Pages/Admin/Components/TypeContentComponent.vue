<template>

    <template v-if="selectedType == 'RC'">
        <input type="text" class="form-control" readonly placeholder="Texto de respuesta corta">
    </template>
    <template v-else-if="selectedType == 'RL'">
        <input type="text" class="form-control" readonly placeholder="Texto de respuesta Larga">
    </template>
    <template v-else-if="selectedType == 'OU'">
        <SingleOptionComponent v-model="content.structure" />
    </template>

    <template v-else-if="selectedType == 'OM'">
        <SingleOptionComponent v-model="content.structure" />
    </template>

    <template v-else-if="selectedType == 'DD'">
        <SingleOptionComponent  :otros="false" v-model="content.structure" />
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
    modelValue: Object,
    contenido: Object,
    selectedType: {
        String,
        required: true,
    }
})

const emit = defineEmits(['update:modelValue'])

const content = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value)
}, { deep: true })

const selectType = (val) => {
    emit('update:modelValue', val)
}

watch(() => props.selectedType, (val) => {

    switch (val) {
        case 'RC':
            setDataRC();
            break;

        case 'RL':
            setDataRL();
            break;

        case 'OU':
            setDataOU();
            break;

        case 'OM':
            setDataOM();
            break;

        case 'DD':
            setDataDD();
            break;

        case 'EL':
            setDataEL();
            break;

        case 'AR':
            setDataAR();
            break;

        default:
            break;
    }


});

const setDataRC = () => {
    content.value.type = 'input-text';
    selectType(content)
}

const setDataRL = () => {
    content.value.type = 'textarea';
    selectType(content)
}

const setDataOU = () => {
    content.value.type = 'input-radio';
    content.value.structure = {};
    content.value.structure.options = []
    selectType(content)
}

const setDataOM = () => {
    content.value.type = 'input-checkbox';
    content.value.structure = {};
    content.value.structure.options = []
    selectType(content)
}

const setDataDD = () => {
    content.value.type = 'input-select';
    content.value.structure = {};
    content.value.structure.options = []
    selectType(content)
}

const setDataEL = () => {
    content.value.type = 'range';
    selectType(content)
}

const setDataAR = () => {
    content.value.type = 'input-file';
    selectType(content)
}
</script>
