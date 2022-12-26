<template>

    <button type="button" class="btn btn-icon btn-sm me-1" @click="dialog = !dialog">
        <i class="bi bi-share"></i>
    </button>

    <ModalComponent v-model="dialog">
        <template #content>

            <div class="fw-bold">Compartir encuesta</div>
            <hr>

            <div class="">
                <div class="mx-5 mb-2">
                    <small> * Selección multible (CONTROL + CLICK) </small>
                </div>

                <select class="form-control" v-model="form.admins" multiple>
                    <option v-for="(item, index) in admins" :key="index" :value="item">
                        {{ item.nombre }}
                    </option>
                </select>

                <ul class="pb-0 my-2 text-secondary">
                    <li v-for="(item, index) in form.admins" :key="index">
                        <small> {{ item.nombre }} - {{ item.correo }} </small>
                    </li>

                </ul>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                <button class="btn btn-text text-danger order-2 order-md-1" type="button" @click="dialog = !dialog">
                    Cancelar</button>
                <button class="btn btn-primary order-1 order-md-2" type="button" @click="shareEncuesta">
                    <i class="bi bi-share me-2"></i> Compartir
                </button>
            </div>
        </template>
    </ModalComponent>
</template>
<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
import ModalComponent from '../../../Components/ModalComponent.vue';

const props = defineProps({
    admins: Array,
    encuesta: Number
})

const form = useForm({
    encuesta: props.encuesta,
    admins: [],
})

const dialog = ref(false);

const shareEncuesta = () => {

    form.post('/admin/encuestas/share');

    dialog.value = false;
    form.reset();
}

</script>