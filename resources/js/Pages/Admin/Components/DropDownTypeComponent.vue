<template>
    <div class="dropdown">
        <div class="btn-group ms-2" role="group" data-bs-toggle="dropdown" aria-expanded="false">
            <button v-if="modelValue.icon" type="button" class="btn btn-outline-dark">
                <i :class="modelValue.icon"></i>
            </button>
            <button type="button" class="btn btn-dark">Tipo</button>

        </div>

        <ul class="dropdown-menu">
            <li v-for="(item, index) in types" :key="index" role="button">
                <div class="dropdown-item" @click="selectType(item)" :class="item.code == modelValue ? 'active' : ''">
                    <i :class="item.icon" class="me-2"></i> {{ item.name }}
                </div>
                <template v-if="item.divider">
                    <hr class="dropdown-divider">
                </template>
            </li>
        </ul>
    </div>
</template>
<script setup>
const props = defineProps({
    modelValue: Object
})

const emit = defineEmits(['update:modelValue']);

const selectType = (val) => {
    emit('update:modelValue', val)
}

const types = [
    {
        name: 'Respuesta Corta',
        icon: 'bi bi-filter-left',
        code: 'RC',
        input: 'TEXT'
    },

    {
        name: 'Respuesta Larga',
        icon: 'bi bi-text-left',
        code: 'RL',
        input: 'TEXTAREA',
        divider: true
    },
    {
        name: 'Opción unica',
        icon: 'bi bi-ui-radios',
        code: 'OU',
        input: 'RADIO'
    },
    {
        name: 'Opción multiple',
        icon: 'bi bi-ui-checks',
        code: 'OM',
        input: 'CHECKBOX'
    },
    {
        name: 'Desplegable',
        icon: 'bi bi-menu-app-fill',
        code: 'DD',
        input: 'SELECT',
        divider: true
    },
    {
        name: 'Escala',
        icon: 'bi bi-three-dots ',
        code: 'EL',
        divider: true
    },
    {
        name: 'Archivo',
        icon: 'bi bi-cloud-arrow-up-fill',
        code: 'AR'
    },
]

</script>
