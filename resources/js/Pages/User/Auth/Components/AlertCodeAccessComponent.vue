<template>
    <div v-if="!user.pass_state" class="mb-3">
        <div
            class="alert alert-warning d-flex justify-content-between align-items-center"
            role="alert"
        >
            <div>
                Bienvenido su código de acceso es :
                <b> {{ user.password }} </b>
            </div>

            <ChangePasswordComponent button />
        </div>
    </div>
</template>
<script setup>
import { usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";
import ChangePasswordComponent from "./ChangePasswordComponent.vue";
const user = computed(() => usePage().props.value.auth.user);
</script>
