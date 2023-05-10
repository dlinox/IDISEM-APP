<template>

    <AdminLayout>
        <div class="container">
            <HeadingPagesComponent />
            <div class="card border-0 my-3">
                <div class="card-header border-0 bg-primary d-flex justify-content-between align-items-center">
                    <small class="text-light fw-bold">
                        {{total_respuestas}} Respuestas
                    </small>

                    <button class="btn btn-sm btn-outline-light" @click="downloadExcelEncuesta(encuesta.enc_id)">
                        <i class="bi bi-file-earmark-arrow-down me-2"></i> Excel
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

            <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="btn btn-outline-secondary rounded-0  active" id="preguntas-tab" data-bs-toggle="tab"
                        data-bs-target="#preguntas-tab-pane" type="button" role="tab" aria-controls="preguntas-tab-pane"
                        aria-selected="true">

                        <strong> <i class="bi bi-question-circle me-2"></i> Preguntas</strong>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="btn btn-outline-secondary rounded-0 " id="calificaciones-tab" data-bs-toggle="tab"
                        data-bs-target="#calificaciones-tab-pane" type="button" role="tab"
                        aria-controls="calificaciones-tab-pane" aria-selected="false"
                        @click="getCalificaciones(encuesta.enc_id)">

                        <strong> <i class="bi bi-journal-check me-2"></i>
                            Calificaciones</strong>
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="btn btn-outline-secondary rounded-0 " id="respuestas-tab" data-bs-toggle="tab"
                        data-bs-target="#respuestas-tab-pane" type="button" role="tab"
                        aria-controls="respuestas-tab-pane" aria-selected="false"
                        @click="getRespuestasUser(encuesta.enc_id)">
                        <strong> <i class="bi bi-journal-check me-2"></i>
                            Respuestas
                        </strong>
                    </button>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="preguntas-tab-pane" role="tabpanel"
                    aria-labelledby="preguntas-tab" tabindex="0">
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
                <div class="tab-pane fade" id="calificaciones-tab-pane" role="tabpanel"
                    aria-labelledby="calificaciones-tab" tabindex="0">
                    <div class="card border-0 mb-3 ">
                        <div class="card-header border-0 ">
                            <div class="fw-bold fs-6">
                                <i class="bi bi-arrow-right-short me-2"></i>
                                Calificaiones
                            </div>
                        </div>
                        <div class="card-body">

                            <template v-if="calificacionesChart === null">
                                <h2>cargando</h2>
                            </template>
                            <template v-else>
                                <div class="chart-container">
                                    <PieChart :chartData="calificacionesChart" :options="options" />
                                </div>
                            </template>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="respuestas-tab-pane" role="tabpanel" aria-labelledby="respuestas-tab"
                    tabindex="0">
                    <div class="card border-0 mb-3 ">
                        <div class="card-header border-0 ">
                            <div class="fw-bold fs-6">
                                <i class="bi bi-arrow-right-short me-2"></i>
                                Respuestas
                            </div>
                        </div>
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Puntaje</th>
                                    <th scope="col">Calificaión</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="( item, index) in respuestas" :key="index">
                                    <th scope="row">
                                        {{ item.res_use_id }}
                                    </th>
                                    <td>
                                        {{ item.name }}
                                    </td>
                                    <td> {{ item.res }}</td>
                                    <td> {{ item.nivel }} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </AdminLayout>
</template>
<script setup >
import AdminLayout from '@/Layouts/AdminLayout.vue'
import HeadingPagesComponent from '@/Components/HeadingPagesComponent.vue';
import { PieChart } from 'vue-chart-3';
import { Chart, registerables } from 'chart.js';
import ChartDataLabels from 'chartjs-plugin-datalabels';
import { ref } from 'vue';


Chart.register(ChartDataLabels);

Chart.register(...registerables);

const props = defineProps({
    encuesta: Object,
    preguntas: Array,
    total_respuestas: Number
});

const backgroundColor = ['#77CEFF', '#0079AF', '#123E6B', '#97B0C4', '#A5C8ED'];
const options = {

    plugins: {
        datalabels: {
            /* anchor puede ser "start", "center" o "end" */
            anchor: "center",
            /* Podemos modificar el texto a mostrar */
            formatter: (value, ctx) => {

                let sum = 0;
                let dataArr = ctx.chart.data.datasets[0].data;
                dataArr.map(data => {
                    sum += parseInt(data);
                });
                let percentage = (value * 100 / sum).toFixed(2) + "%";

                if (value > 0) {
                    return percentage;
                }
                else {
                    return '';
                }

            },
            /* Color del texto */
            color: "white",
            /* Formato de la fuente */
            font: {
                family: '"Times New Roman", Times, serif',
                size: "14",
                weight: "bold",
            },
            /* Formato de la caja contenedora */
            //padding: "4",
            //borderWidth: 2,
            //borderColor: "darkblue",
            //borderRadius: 8,
            //backgroundColor: "lightblue"
        },
        responsive: true,
        legend: {
            display: true,
            position: 'right',
        }
    }
};
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
const calificaciones = ref(null);
const respuestas = ref(null);
const calificacionesChart = ref(null);

const setDatacalificacionesChart = async (data) => {
    let _labels = [];
    let _data = [];

    data.forEach(item => {
        _labels.push(item.cal_detalle);
        _data.push(item.cant);
    });

    let _bgColor = backgroundColor.slice(0, _data.length);

    calificacionesChart.value = {
        labels: _labels,
        datasets: [
            {
                data: _data,
                backgroundColor: _bgColor,
            },
        ],

    };
    console.log(calificacionesChart.value);
};

const getCalificaciones = async (id_enc) => {
    if (calificaciones.value === null) {
        let res = await axios.get('/admin/calificaciones/' + id_enc);

        await setDatacalificacionesChart(res.data.calificaciones);
        calificaciones.value = res.data.datos;
    }
};

const getRespuestasUser = async (id_enc) => {
    if (respuestas.value === null) {
        let res = await axios.get('/admin/respuestas/' + id_enc);
        respuestas.value = res.data.datos;
    }
};

const downloadExcelEncuesta = async (id_enc) => {
    window.location.href = '/admin/reportes/excel-encuesta/' + id_enc;
    //let res=  await axios.get('/admin/reportes/excel-encuesta/' + id_enc);
    //console.log(res.data);
}
</script>


<style lang="scss">
.chart-container {
    display: flex;
    justify-content: space-around;
    height: 18rem;
    align-items: center;
}
</style>