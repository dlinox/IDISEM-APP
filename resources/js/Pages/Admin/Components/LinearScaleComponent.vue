<template>
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="input-group mb-3">
                <span class="input-group-text" id="i-hasta">Desde 1 hasta </span>
                <input v-model="content.range" min="2" max="12" type="number" class="form-control" placeholder="10" aria-label="Hasta"
                    aria-describedby="i-hasta">
            </div>
        </div>
        <div class="col-6 col-md-4">
            <input  v-model="content.tag1" class="form-control" type="text" placeholder="Etiqueta 1 (opcional)" aria-label="Etiqueta 1">
        </div>
        <div class="col-6 col-md-4">
            <input  v-model="content.tag2" class="form-control" type="text" placeholder="Etiqueta 2 (opcional)" aria-label="Etiqueta 2">
        </div>
    </div>
</template>

<script setup>
import { ref, watch } from 'vue';

const props = defineProps({
    modelValue: Object,
})
const emit = defineEmits(['update:modelValue'])

const content = ref({
    range: 2,
    tag1: null,
    tag2: null,
})


watch(() => content.value, (val) => {
    console.log(val);

    emit('update:modelValue', val)
},
    { deep: true }
);



</script>