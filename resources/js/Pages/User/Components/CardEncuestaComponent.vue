<template>
    <div class="card card-encuesta">
        <div class="card-header">

        </div>
        <div class="card-body">

            <h3 class="title"> {{ item.titulo }}</h3>
            <span class="descripcion">{{ item.descripcion }}</span>
            <img class="img-bg" :src="ImgBgCard" alt="">

            <div class="mt-3 text-secondary text-small">


                <small>
                    <i class="bi bi-question-circle text-info me-1"></i>
                    {{item.num_preguntas}}
                </small>
                <small class="ms-3">
                    <i class="bi bi-calendar2-event me-1"></i>
                    {{ item.fecha }}
                </small>


            </div>

        </div>
        <div class="card-footer">
            <Link :href="'/user/encuestas/' + item.id" class="btn btn-secondary">
            Ver <i class="bi bi-arrow-right-short ms-2"></i>
            </Link>
        </div>
    </div>
</template>
<script setup>
import ImgBgCard from '@/assets/images/card-quiz-bg.svg';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
    item: Object,
});
</script>
<style lang="scss" >
$color-primario: #0E2940;

.card.card-encuesta {
    border: none;
    transition: all .3s ease;

    &:hover {
        box-shadow: 1px 1px 10px 1px rgba(#0E2940, .2);
    }

    .card-header {
        display: flex;
        justify-content: end;
        align-items: flex-end;
        padding: .5rem .5rem 0 .5rem;
        background-color: rgba($color-primario, 0.8);

        .img-bg {
            height: 80%;
        }
    }

    .card-body {
        position: relative;

        .img-bg {
            position: absolute;
            height: 80%;
            opacity: .5;
            bottom: 0;
            right: 0;
            z-index: 0;
        }
    }

    .card-footer {
        border: none;
        display: flex;
        justify-content: flex-end;
    }
}
</style>