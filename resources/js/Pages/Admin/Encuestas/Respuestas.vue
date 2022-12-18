<template>

    <AdminLayout>
        <div class="container">
            <HeadingPagesComponent />
            <div class="card border-0 my-3">
                <div class="card-header border-0 bg-primary d-flex justify-content-between align-items-center">
                    <small class="text-light fw-bold">
                        50 Respuestas
                    </small>

                    <button class="btn btn-sm btn-outline-light" @click="getCalificaciones(encuesta.enc_id)">
                        <i class="bi bi-journal-check me-2"></i>
                        Calificaciones
                    </button>
                </div>
                <div class="card-body">
                    <div class="">

                        <h1 class="fs-3 mb-0">
                            {{ encuesta.enc_titulo }}
                        </h1>
                        <p>
                            {{ encuesta.enc_descripcion }}
                        </p>

                        <small>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="enc-estado"
                                    :checked="encuesta.enc_estado">
                                <label class="form-check-label" for="enc-estado">
                                    Se aceptan respuestas
                                </label>
                            </div>
                        </small>
                    </div>
                </div>
            </div>

            <div v-for="(item, index) in  preguntas" :key="index" class="v">
                <div class="card border-0 mb-3 ">
                    <div class="card-header border-0 ">
                        <div class="fw-bold fs-6">
                            <i class="bi bi-arrow-right-short me-2"></i>
                            {{ item.titulo }}
                        </div>
                    </div>
                    <div class="card-body">

                        <template v-if="item.labels === null">
                            <h2>RESPUESTAS LIBRES</h2>
                        </template>
                        <template v-else>
                            <div class="chart-container">
                                <PieChart :chartData="setDataPie(item)" :options="options" />
                            </div>
                        </template>
                    </div>
                </div>




            </div>
        </div>



    </AdminLayout>
</template>
<script setup >
import AdminLayout from '@/Layouts/AdminLayout.vue'
import HeadingPagesComponent from '@/Components/HeadingPagesComponent.vue';
import ModalFullComponent from '@/Components/ModalFullComponent.vue';
import { PieChart } from 'vue-chart-3';

import { Chart, registerables } from 'chart.js';
import { ref } from 'vue';
import CalificacionEncuestaComponent from '../Components/CalificacionEncuestaComponent.vue';
Chart.register(...registerables);

const props = defineProps({
    encuesta: Object,
    preguntas: Array
});

const dialog = ref(false);

const backgroundColor = ['#77CEFF', '#0079AF', '#123E6B', '#97B0C4', '#A5C8ED'];

const setDataPie = (item) => {

    let dataPie = {};
    let labels = item.labels?.labels.split(',');
    let data = item.data?.data.split(',');
    let bgColor = backgroundColor.slice(0, data.length);

    dataPie = {
        labels: labels,
        datasets: [
            {
                data: data,
                backgroundColor: bgColor,
            },
        ],

    };
    return dataPie;
}

const options = {
    plugins: {
        responsive: true,
        legend: {
            display: true,
            position: 'right',
        }
    }
};

const getCalificaciones = async (id_enc) => {

    let res = await axios.get('/admin/calificaciones/' + id_enc);
    console.log(res.data);
    console.log(id_enc);
};


</script>


<style lang="scss">
.chart-container {
    display: flex;
    justify-content: space-around;
    height: 18rem;
    align-items: center;
}
</style>