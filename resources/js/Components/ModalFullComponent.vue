<template>
    <Transition name="fade">
        <div v-if="show" class="dialog">
            <div class="card border-0 rounded-0">
                <div class="card-body ">
                    <div class="header">
                        <slot name="header"></slot>
                    </div>
                    <div class="content">
                        <slot name="content"></slot>
                    </div>
                    <div class="footer">
                        <slot name="footer"></slot>
                    </div>
                </div>
            </div>
        </div>
    </Transition>
</template>

<script setup>

import { computed } from 'vue';


const props = defineProps({
    modelValue: Boolean
})

const emit = defineEmits(['update:modelValue']);

const show = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value)
})
</script>

<style lang="scss">
.dialog {
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    width: 100vw;
    background-color: rgba($color: #000000, $alpha: .4);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 10;

    .card {
        width: 100%;
        height: 100%;
    }
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>