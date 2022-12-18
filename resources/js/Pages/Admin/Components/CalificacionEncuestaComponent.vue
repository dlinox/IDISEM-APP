<template>


    <button type="button" class="btn btn-outline-dark ms-3" @click="dialog = !dialog">
        <i class="bi bi-card-checklist me-2"></i> Añadir Calificaciones
    </button>

    <ModalComponent v-model="dialog">
        <template #content>

            <div class="fw-bold">AÑADIR CALIFICACIONES</div>
            <hr>

            <div v-for="(item, index) in calificaciones " :key="index" class="card rounded mb-3 shadow-sm border-0">


                <div class="card-header d-flex justify-content-between align-items-center border-0">
                    <span class="fw-bold ">Calificación {{ index + 1 }} </span>

                    <button v-if="index > 0" type="button" class="btn btn-sm btn-outline-danger"
                        @click="removeOption(index)">
                        <i class="bi bi-dash-square-dotted"></i>
                    </button>

                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <input v-model="item.detalle" type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Nivel de felicidad alto">
                    </div>

                    <div class="mb-3">
                        <textarea v-model="item.mensaje" class="form-control" cols="30" rows="2"
                            placeholder="Mensaje"></textarea>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <input v-model="item.min" type="number" class="form-control" id="exampleFormControlInput1"
                                placeholder="Nivel de felicidad alto">
                        </div>

                        <div class="col">
                            <input v-model="item.max" type="number" class="form-control" id="exampleFormControlInput1"
                                placeholder="Nivel de felicidad alto">
                        </div>
                    </div>
                    <div class="mb-1">
                        <input class="form-control" type="file" @input="item.img = $event.target.files[0]" />
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-text text-danger order-2 order-md-1" type="button" @click="dialog = !dialog">
                    Cerrar</button>
                <button class="btn btn-primary order-1 order-md-2" type="button" @click="addOption">
                    <i class="bi bi-plus me-2"></i> Añadir
                </button>
            </div>
        </template>
    </ModalComponent>
</template>
<script setup>
import { ref, computed } from 'vue';
import ModalComponent from '../../../Components/ModalComponent.vue';

const props = defineProps({
    modelValue: Array,

})

const emit = defineEmits(['update:modelValue']);
const dialog = ref(false);

const calificaciones = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value)
}, { deep: true });


const addOption = () => {
    calificaciones.value.push(
        {
            detalle: null,
            mensaje: null,
            img: null,
            min: null,
            max: null
        }
    );
}

const removeOption = (index) => {
    calificaciones.value.splice(index, 1);
}


</script>