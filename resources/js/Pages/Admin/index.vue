<template>

    <AdminLayout>
        <div class="container">

            <div class="card border-0 my-3">
                <div class="card-header border-0 bg-primary">

                </div>
                <div class="card-body">
                    <div class="">
                        <span class="text-secondary fw-bold mb-1">

                        </span>
                        <h1 class="fs-3 mb-0">
                            Dashboard
                        </h1>
                        <pre>{{ rutas }}</pre>
                    </div>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th v-for="(item, index) in header" :key="index" scope="col">
                            {{ item }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in data" :key="index">
                        <td v-for="(ele, index) in item" :key="index">
                            {{ ele }}
                        </td>
                    </tr>
                </tbody>
            </table>


        </div>
    </AdminLayout>
</template>
<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
const props = defineProps({
    data: Array,
    header: Array

})


const init = () => {
    Object.values(props.rutas).forEach(element => {
        console.log(JSON.parse(JSON.stringify(element)));
    });
}
//init();

/**
  <div class="card mb-3">
            <div class="card-header">
                <div class="d-flex mt-3 mb-2">
                    <input v-model="form.password" type="text" class="form-control" placeholder="Regunta">
                    <button class="btn btn-dark ms-2">
                        Tipo
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex  justify-content-center">

                    <div class="mx-2">

                        <div class="grid text-center">
                            <div>- </div>
                            <div>
                                bueno
                            </div>
                        </div>
                    </div>

                    <div class="mx-2">

                        <div class="grid text-center">
                            <div>1</div>
                            <div>
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault1">
                            </div>
                        </div>
                    </div>
                    <div class="mx-2">
                        <div class="grid text-center">
                            <div>2</div>
                            <div>
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault1">
                            </div>
                        </div>
                    </div>
                    <div class="mx-2">
                        <div class="grid text-center">
                            <div>3</div>
                            <div>
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault1">
                            </div>
                        </div>
                    </div>
                    <div class="mx-2">
                        <div class="grid text-center">
                            <div>4</div>
                            <div>
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault1">
                            </div>
                        </div>
                    </div>

                    <div class="mx-2">

                        <div class="grid text-center">
                            <div>- </div>
                            <div>
                                mano
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-dark ms-2">
                        <i class="bi bi-collection"></i>
                    </button>
                    <button class="btn btn-dark ms-2">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>

            </div>
        </div>
 * 
 * 
 */
</script>
