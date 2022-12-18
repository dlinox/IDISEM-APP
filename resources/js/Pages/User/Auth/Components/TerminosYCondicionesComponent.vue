<template>
    <ModalComponent v-model="dialog">
        <template #content>

            <div class="d-flex justify-content-center mb-2">
                <img :src="Logo" alt="Logo" srcset="">
            </div>

            <p>
                Hola, estamos realizando un estudio sobre el nivel de felicidad de los estudiantes de la Universidad
                Nacional del Altiplano de Puno; por ello queremos conocer tu opinión al respecto, te hacemos conocer que
                no hay respuestas buenas ni malas, todas son valiosas. La información facilitada es de carácter
                confidencial y anónima. Te agradecemos nos concedas unos minutos para contestar el presente
                cuestionario.
                Muchas Gracias.

            </p>
            <hr>
            <div class="fw-bold">CONSENTIMIENTO INFORMADO</div>

            <p>
                Declaro que he sido informado/a e invitado/a a participar en la investigación “Nivel de felicidad de los
                estudiantes de la Universidad Nacional del Altiplano validado a través de un instrumento confiable”,
                entiendo que este estudio busca conocer los niveles de felicidad de los estudiantes de la UNA Puno.
                Tengo conocimiento que los datos no me serán entregados y que no habrá retribución por la participación
                en este estudio.
            </p>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-text text-danger order-2 order-md-1" type="button">
                    No acepto</button>

                <button class="btn btn-primary order-1 order-md-2" type="button" @click="iagree"> Sí acepto </button>
            </div>


        </template>
    </ModalComponent>
</template>

<script setup>
import ModalComponent from '@/Components/ModalComponent.vue';
import Logo from '@/assets/images/logo.png'
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
const props = defineProps({
    cancel: {
        type: Boolean,
        default: true,
    }
})

const dialog = ref(true);

const iagree = () => {
    Inertia.post('/user/auth/agree-tyc')
}

</script>