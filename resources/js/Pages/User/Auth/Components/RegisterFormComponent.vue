<template>
    <form @submit.prevent="submit">
        <div class="mt-2 mb-4 mx-4 text-center">
            <label for="code" class="form-label">Ingrese su codigo de matricula</label>
            <input v-model="form.code" type="text" class="form-control w-75 mx-auto" id="code">
            <div v-if="form.errors.code" class="text-danger">
                <small> {{ form.errors.code }}</small>
            </div>

        </div>

        <div class="mb-3  d-grid gap-2 d-md-flex justify-content-center">
            <button class="btn btn-primary" type="submit" :disabled="form.processing">
                <template v-if="form.processing">
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                </template>
                <template v-else>
                    <i class="bi bi-search me-2"></i>
                </template>
                Buscar
            </button>
        </div>
    </form>
    <hr>

    <ModalComponent v-model="dialog">
        <template #content>

            <div class="fw-bold">ESTUDIANTE</div>
            <hr>

            <div class="alert alert-primary" role="alert">
                Se enviara un correo con los datos de acceso
            </div>
            <div class="fw-bold">Correo: {{ estudiate.correo }}</div>
            {{ estudiate.nombre }}

        </template>
        <template #footer>
            <hr>
            <div class="d-flex justify-content-between">
                <button class="btn btn-text text-danger" @click="dialog = !dialog">No soy yo</button>
                <button class="btn btn-primary" @click="sentEmail" :disabled="form.processing">
                    <template v-if="form.processing">
                        <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                    </template>
                    <template v-else>
                        <i class="bi bi-envelope-check me-2"></i>
                    </template>
                    Enviar correo
                </button>
            </div>
        </template>
    </ModalComponent>

</template>


<script setup>
import { ref, computed, onMounted } from 'vue';
import { useForm, usePage } from '@inertiajs/inertia-vue3'
import ModalComponent from '../../../../Components/ModalComponent.vue';

const props = defineProps({
    estudiante: Object
});

const form = useForm({
    code: '',
})

const dialog = ref(false)
const estudiate = ref({});

onMounted(() => {
    console.log('asd')// don't use this keyword
})

const submit = () => {
    form.post('/user/auth/val-code', {
        preserveScroll: true,
        onSuccess: (res) => {
            estudiate.value = res.props.flash.data;
            dialog.value = true;
        },
    });
}

const sentEmail = () => {

    form.post('/user/auth/send-email', {
        preserveScroll: true,
        onSuccess: (res) => {
            console.log(res);
            //estudiate.value = res.props.flash.data;
            dialog.value = false;
        },
    });
}
</script>