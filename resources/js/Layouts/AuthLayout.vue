<template>
    <div class="auth-layout">
        
        <main class="">
            <div v-if="respuesta.status == false" class="point-estatus">
            </div>
            <slot></slot>
        </main>
    </div>
</template>
<script setup>

import { computed, watch, ref } from 'vue';
import { usePage } from '@inertiajs/inertia-vue3';
import { useToast } from "vue-toastification";
const toast = useToast();

const alert = ref({});

const respuesta = computed(() => {
    alert.value = usePage().props.value.flash;
    return usePage().props.value.flash;
});

watch(alert, (val) => {
    showToast();
}, { deep: true })

const showToast = () => {
    if (alert.value.message) {
        if (alert.value.status) {
            toast.success(alert.value.message, {
                position: "bottom-center",
                timeout: 3000,
                draggable: true,
            });
        }
        else {
            toast.error(alert.value.message, {
                position: "bottom-center",
                timeout: 3000,
                draggable: true,
            });
        }

    }
}

</script>
<style lang="scss">
$color-primario: #0E2940;

.auth-layout {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100vw;
    height: 100vh;
    background-color: #f1f1f1;
}
</style>