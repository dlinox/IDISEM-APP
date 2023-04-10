<template>
    <UserLayout>
        <!--<template v-if="!user.pass_state && !user.tyc_state && !user.info_state">
            <ChangePasswordComponent :cancel="false" />
        </template> -->
        <template v-if="!user.tyc_state && !user.info_state">
            <TerminosYCondicionesComponent />
        </template>
        <template v-else-if="user.tyc_state && !user.info_state">
            <HeadingPageComponent :heading="heading_info" />
            <div class="container py-4">
                <AlertCodeAccessComponent />

                <div class="card border-0">
                    <div class="card-body">
                        <div class="fw-bold">DATOS GENERALES</div>
                        <hr />
                        <FormularioDatosGeneral />
                    </div>
                </div>
            </div>
        </template>
        <template v-else-if="user.tyc_state && user.info_state">
            <HeadingPageComponent :heading="heading" />

            <div class="container py-4">
                <AlertCodeAccessComponent />
                <div class="row">
                    <div
                        v-if="encuestas.length == 0"
                        class="col-12 my-4 empty text-muted"
                    >
                        <i class="bi bi-folder2-open"></i>

                        <span>No hay encuestas disponibles</span>
                    </div>
                    <div
                        v-for="(item, index) in encuestas"
                        :key="index"
                        class="col-12 col-md-6 mb-4"
                    >
                        <CardEncuestaComponent :item="item" />
                    </div>
                </div>
            </div>
        </template>
    </UserLayout>
</template>

<script setup>
import { usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";
import UserLayout from "../../Layouts/UserLayout.vue";
import TerminosYCondicionesComponent from "./Auth/Components/TerminosYCondicionesComponent.vue";
import CardEncuestaComponent from "./Components/CardEncuestaComponent.vue";
import FormularioDatosGeneral from "./Components/FormularioDatosGeneral.vue";
import HeadingPageComponent from "./Components/HeadingPageComponent.vue";
import AlertCodeAccessComponent from "./Auth/Components/AlertCodeAccessComponent.vue";

const user = computed(() => usePage().props.value.auth.user);

const props = defineProps({
    encuestas: Array,
});

const heading_info = {
    title: "Completa tus datos",
    description: "DATOS GENERALES",
};

const heading = {
    title: "Encuestas",
    description: "Encuestas disponibles",
};
</script>

<style lang="scss">
.empty {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    i {
        font-size: 4.5rem;
    }
    span {
        font-size: 1rem;
        width: 100%;
        text-align: center;
    }
}
</style>
