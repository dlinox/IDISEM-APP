<template>
    <UserLayoutVue>
        <HeadingPageComponent :heading="heading" />
        <div class="container my-3">
            <div class="row">
                <div v-for="(item, index) in encuestas" :key="index" class="col-12 col-md-6 mb-4">
                    <CardEncuestaComponent :item="item" />
                </div>
            </div>
        </div>
    </UserLayoutVue>
</template>

<script setup>
import UserLayoutVue from '@/Layouts/UserLayout.vue';
import CardEncuestaComponent from '../Components/CardEncuestaComponent.vue';
import HeadingPageComponent from '../Components/HeadingPageComponent.vue';

const props = defineProps({
    encuestas: Array
})

const heading = {
    title: 'Encuesntas',
    description: 'Todas las encuestas'
}

</script>