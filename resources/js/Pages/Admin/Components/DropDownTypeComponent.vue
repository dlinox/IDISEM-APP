<template>
    <div class="dropdown">
        <div class="btn-group ms-2" role="group" data-bs-toggle="dropdown" aria-expanded="false">
            <button v-if="icono.icon" type="button" class="btn btn-outline-dark">
                <i :class="icono.icon"></i>
            </button>
            <button type="button" class="btn btn-dark">Tipo</button>

        </div>

        <ul class="dropdown-menu">
            <li v-for="(item, index) in types" :key="index" role="button">
                <div class="dropdown-item " @click="selectType(item.input)"
                    :class="[item.input == modelValue ? 'active' : '', item.active ? '' : 'disabled']">
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
import { ref } from 'vue';

const props = defineProps({
    modelValue: String
})

const emit = defineEmits(['update:modelValue']);


const icono = ref('null');


const selectType = (val) => {
    icono.value = types.filter((el) => el.input == val)[0];
    emit('update:modelValue', val)
}

const types = [
    // {
    //     name: 'Respuesta Corta',
    //     icon: 'bi bi-filter-left',
    //     input: 'TEXT',
    //     active: true,
    // },

    // {
    //     name: 'Respuesta Larga',
    //     icon: 'bi bi-text-left',
    //     input: 'TEXTAREA',
    //     active: true,
    //     divider: true
    // },
    {
        name: 'Opción unica',
        icon: 'bi bi-ui-radios',
        input: 'RADIO',
        active: true,

    },
    {
        name: 'Opción multiple',
        icon: 'bi bi-ui-checks',
        active: true,
        input: 'CHECKBOX'
    },
    {
        name: 'Desplegable',
        icon: 'bi bi-menu-app-fill',
        active: true,
        input: 'SELECT',
        divider: true
    },
    /*  {
          name: 'Escala',
          icon: 'bi bi-three-dots ',
          code: 'EL',
          divider: true
      },
      {
          name: 'Archivo',
          icon: 'bi bi-cloud-arrow-up-fill',
          code: 'AR'
      },*/
]

</script>
