<template>
    <div class="heading-page">
        <div class="container">
            <div class="icon">
                <i :class="heading.icon ? heading.icon : 'bi bi-clipboard-fill'"></i>
            </div>
            <div class="title">
                <h3>{{ heading.title }} </h3>
                <span> {{ heading.description }}</span>
            </div>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    heading: Object,
});
</script>

<style lang="scss" scoped>
$color-primario: #0E2940;

.heading-page {
    width: 100vw;
    background-color: $color-primario;
    padding: 1.5rem 0rem;

    .container {
        display: flex;

        .icon {
            background-color: rgba(#eee, .3);
            width: 3.5rem;
            height: 3.5rem;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;

            i {
                color: #e1e1e1;
                font-size: 2em;
            }
        }

        .title {
            display: flex;
            flex-wrap: wrap;
            align-items: center;

            margin-left: 1rem;

            h3 {
                width: 100%;
                font-size: 1.5em;
                color: #e1e1e1;
                margin-bottom: 0em;
            }

            span {
                width: 100%;
                font-size: 1em;
                color: #a1a1a1;
            }
        }
    }
}
</style>