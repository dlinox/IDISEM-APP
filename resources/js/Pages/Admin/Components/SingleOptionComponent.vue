<template>
    <div v-for="(item, index) in content.options" :key="index" class="d-flex mb-2">
        <input type="number" class="form-control w-25 me-2"  v-model="item.ponderado" >
        <input type="text" class="form-control" :placeholder="'Opción ' + (index + 1)" v-model="item.name">
        <button type="button" class="btn btn-light ms-2" @click="removeOption(index)"
            :disabled="(content.options.length === 1)">
            <i class="bi bi-dash-square-dotted"></i>
        </button>
    </div>

    <div v-if="content.optionsOthers" class="d-flex mb-2">
        <input type="text" class="form-control" placeholder="Otros" disabled>
        <button type="button" class="btn btn-light ms-2" @click="(content.optionsOthers = !content.optionsOthers)">
            <i class="bi bi-dash-square-dotted"></i>
        </button>
    </div>

    <div class="d-flex justify-content-between mb-2">

        <button type="button" v-if="otros" :disabled="content.optionsOthers" class="btn btn-outline-dark"
            @click="(content.optionsOthers = !content.optionsOthers)">
            Agregar "Otros"
        </button>

        <div></div>

        <button type="button" class="btn btn-primary ms-2" @click="addOption">
            <i class="bi bi-plus-square-dotted"></i>
        </button>

    </div>
</template>

<script setup>
import { computed } from 'vue';
const props = defineProps({
    modelValue: Object,
    otros: {
        type: Boolean,
        default: true
    }
})

const emit = defineEmits(['update:modelValue']);

const content = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value)
}, { deep: true })

const addOption = () => {
    content.value.options.push({ name: '' });
}

const removeOption = (index) => {
    content.value.options.splice(index, 1);
}

</script>