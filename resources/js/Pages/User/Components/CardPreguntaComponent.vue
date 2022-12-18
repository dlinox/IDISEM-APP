<template>
    <div class="card card-pregunta">
        <div class="card-header pb-0">
            <i class="bi bi-arrow-right-short mx-2"></i> {{ pregunta }}
        </div>
        <div class="card-body pt-1 pb-4 px-5">
            <slot name="card-body">

            </slot>

        </div>
    </div>
</template>

<script setup>
const props = defineProps(
    {
        pregunta: String
    }
);
</script>

<style lang="scss">
.card.card-pregunta{
    border: none;
    background-color: rgba(#FFF, .5);
    border-radius: 0;
    .card-header{
        border: none;
        background-color: transparent;
        font-size: 1.2em;
        font-weight: 600;
    }
    .card-body{
        border: none;
        background-color: transparent;
        background-color: rgba(#FFF, .3);
    }
}
</style>