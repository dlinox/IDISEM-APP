<template>
    <form @submit.prevent="submit">
        <div class="row">
            <div class="col-12 col-md-6 mb-3">
                <label for="fecha" class="form-label fw-bold"
                    >Fecha de nacimiento</label
                >
                <input
                    v-model="form.nacimiento"
                    type="date"
                    class="form-control"
                    id="fecha"
                    placeholder="día"
                    min="1"
                    max="31"
                    required
                />
            </div>

            <div class="col-12 col-md-6 mb-3">
                <div class="dropdown">
                    <label for="fecha" class="form-label fw-bold"
                        >Lugar de procedencia</label
                    >
                    <input
                        v-model="peruSearch"
                        type="text"
                        class="form-control"
                        placeholder="Lugar de procedencia"
                        id="peru"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        required
                    />
                    <ul
                        class="dropdown-menu autocomplete-menu w-100"
                        aria-labelledby="peru"
                    >
                        <template v-if="peruSearch.length < 3">
                            <li>
                                <a class="dropdown-item">
                                    Digite mas 2 dijitos pra iiciar la busqueda
                                </a>
                            </li>
                        </template>
                        <template v-else>
                            <li
                                v-for="(item, index) in peruSearchRes"
                                :key="index"
                                role="button"
                                @click="peruSearch = item.distrito"
                            >
                                <div class="dropdown-item border-bottom">
                                    <div class="d-flex w-">
                                        <h6 class="mb-1 fw-bold">
                                            {{ item.distrito }}
                                        </h6>
                                    </div>
                                    <small class="mb-0"
                                        >{{ item.departamento }} -
                                        {{ item.provincia }}</small
                                    >
                                </div>
                            </li>
                        </template>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <label for="sexo" class="form-label fw-bold">Sexo: </label>

                <div class="form-check mb-2">
                    <input
                        required
                        v-model="form.sexo"
                        class="form-check-input"
                        type="radio"
                        id="hombre"
                        value="Hombre"
                        name="sexo"
                    />
                    <label class="form-check-label" for="hombre">
                        Hombre
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input
                        required
                        v-model="form.sexo"
                        class="form-check-input"
                        type="radio"
                        id="mujer"
                        value="Mujer"
                        name="sexo"
                    />
                    <label class="form-check-label" for="mujer"> Mujer </label>
                </div>
            </div>

            <div class="col-12 col-md-6 mb-3">
                <label for="lengua" class="form-label fw-bold"
                    >Lengua materna</label
                >
                <select
                    v-model="form.lengua_mat"
                    class="form-select"
                    aria-label="Default select example"
                    id="lengua"
                    required
                >
                    <option selected disabled>Selecione una</option>
                    <option
                        v-for="(item, index) in lenguas"
                        :key="index"
                        :value="item"
                    >
                        {{ item }}
                    </option>
                </select>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <div class="dropdown">
                    <label for="unap" class="form-label fw-bold"
                        >Escuela Profecional</label
                    >
                    <input
                        v-model="escuelaSearch"
                        type="text"
                        class="form-control"
                        placeholder="Escuela Profecional"
                        id="unap"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        required
                    />
                    <ul
                        class="dropdown-menu autocomplete-menu w-100"
                        aria-labelledby="peru"
                    >
                        <template v-if="escuelaSearch.length < 3">
                            <li>
                                <a class="dropdown-item">
                                    Digite mas 2 dijitos pra iiciar la busqueda
                                </a>
                            </li>
                        </template>
                        <template v-else>
                            <li
                                v-for="(item, index) in escuelaSearchRes"
                                :key="index"
                                role="button"
                                @click="escuelaSearch = item.escuela"
                            >
                                <div class="dropdown-item border-bottom">
                                    <div
                                        class="w-100"
                                        style="overflow-wrap: break-word"
                                    >
                                        <h6 class="mb-1 fw-bold">
                                            {{ item.escuela }}
                                        </h6>
                                    </div>
                                    <small class="mb-0">{{
                                        item.facultad
                                    }}</small>
                                </div>
                            </li>
                        </template>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <label for="semestre" class="form-label fw-bold"
                    >Semestre Academico</label
                >
                <select
                    v-model="form.semestre"
                    class="form-select"
                    aria-label="Default select example"
                    id="semestre"
                    required
                >
                    <option selected disabled>Semestre</option>
                    <option v-for="item in 12" :key="item" :value="item">
                        <span class="me-3">{{ item }}° </span> Semestre
                    </option>
                </select>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <label for="rPropia" class="form-label fw-bold"
                    >Actualmente tu tipo de vivienda es:
                </label>

                <div class="form-check mb-3">
                    <input
                        v-model="form.vivienda"
                        class="form-check-input"
                        type="radio"
                        id="rPropia"
                        value="Propia"
                        name="vivienda"
                        required
                    />
                    <label class="form-check-label" for="rPropia">
                        Propia
                    </label>
                </div>
                <div class="form-check mb-1">
                    <input
                        v-model="form.vivienda"
                        class="form-check-input"
                        type="radio"
                        id="rAlquilada"
                        value="Alquilada"
                        name="vivienda"
                        required
                    />
                    <label class="form-check-label" for="rAlquilada">
                        Alquilada
                    </label>
                </div>
                <div class="form-check d-flex align-items-center">
                    <input
                        v-model="form.vivienda"
                        class="form-check-input"
                        type="radio"
                        id="rOtro"
                        value="otro"
                        name="vivienda"
                        required
                    />
                    <label
                        class="form-check-label d-flex align-items-center"
                        for="rOtro"
                    >
                        <span class="ms-2"> Otro </span>
                        <input
                            v-model="form.vivienda_otro"
                            :disabled="form.vivienda == 'otro' ? false : true"
                            type="text"
                            class="form-control ms-2"
                            placeholder="Especifique"
                        />
                    </label>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <label for="estudios" class="form-label fw-bold"
                    >Quién solventa tus estudios:
                </label>

                <div class="form-check mb-1">
                    <input
                        v-model="form.estudios"
                        class="form-check-input"
                        type="radio"
                        id="padres"
                        value="Mis padres"
                        name="estudios"
                        required
                    />
                    <label class="form-check-label" for="padres">
                        Mis padres
                    </label>
                </div>
                <div class="form-check mb-1">
                    <input
                        v-model="form.estudios"
                        class="form-check-input"
                        type="radio"
                        id="familiar"
                        value="Un familiar"
                        name="estudios"
                        required
                    />
                    <label class="form-check-label" for="familiar">
                        Un familiar
                    </label>
                </div>

                <div class="form-check mb-1">
                    <input
                        v-model="form.estudios"
                        class="form-check-input"
                        type="radio"
                        id="auto"
                        value="Me auto sostengo"
                        name="estudios"
                        required
                    />
                    <label class="form-check-label" for="auto">
                        Me auto sostengo
                    </label>
                </div>

                <div class="form-check mb-1">
                    <input
                        v-model="form.estudios"
                        class="form-check-input"
                        type="radio"
                        id="otros"
                        value="Otros no familiares"
                        name="estudios"
                        required
                    />
                    <label class="form-check-label" for="otros">
                        Otros no familiares
                    </label>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <label for="orientacion" class="form-label fw-bold"
                    >Cuál es tu orientación sexual:
                </label>

                <div class="form-check mb-2">
                    <input
                        v-model="form.orientacion"
                        class="form-check-input"
                        type="radio"
                        id="heterosexual"
                        value="Heterosexual"
                        name="orientacion"
                        required
                    />
                    <label class="form-check-label" for="heterosexual">
                        Heterosexual
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input
                        v-model="form.orientacion"
                        class="form-check-input"
                        type="radio"
                        id="homosexual"
                        value="Homosexual"
                        name="orientacion"
                        required
                    />
                    <label class="form-check-label" for="homosexual">
                        Homosexual
                    </label>
                </div>

                <div class="form-check mb-1">
                    <input
                        v-model="form.orientacion"
                        class="form-check-input"
                        type="radio"
                        id="bisexual"
                        value="Bisexual"
                        name="orientacion"
                        required
                    />
                    <label class="form-check-label" for="bisexual">
                        Bisexual
                    </label>
                </div>

                <div class="form-check d-flex align-items-center">
                    <input
                        v-model="form.orientacion"
                        class="form-check-input"
                        type="radio"
                        id="otro"
                        value="otro"
                        name="orientacion"
                        required
                    />
                    <label
                        class="form-check-label d-flex align-items-center"
                        for="otro"
                    >
                        <span class="ms-2"> Otro </span>
                        <input
                            v-model="form.orientacion_otro"
                            :disabled="
                                form.orientacion == 'otro' ? false : true
                            "
                            type="text"
                            class="form-control ms-2"
                            placeholder="Especifique"
                        />
                    </label>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <label for="vives" class="form-label fw-bold"
                    >Con quién vives:
                </label>

                <div class="form-check mb-2">
                    <input
                        v-model="form.vives"
                        class="form-check-input"
                        type="radio"
                        id="madre-padre"
                        value="Con mis padres (madre y/o padre)"
                        name="vives"
                        required
                    />
                    <label class="form-check-label" for="madre-padre">
                        Con mis padres (madre y/o padre)
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input
                        v-model="form.vives"
                        class="form-check-input"
                        type="radio"
                        id="cfamiliar"
                        value="Con un familiar"
                        name="vives"
                        required
                    />
                    <label class="form-check-label" for="cfamiliar">
                        Con un familiar
                    </label>
                </div>

                <div class="form-check mb-2">
                    <input
                        v-model="form.vives"
                        class="form-check-input"
                        type="radio"
                        id="Solo"
                        value="Solo"
                        name="vives"
                        required
                    />
                    <label class="form-check-label" for="Solo"> Solo </label>
                </div>

                <div class="form-check mb-2">
                    <input
                        v-model="form.vives"
                        class="form-check-input"
                        type="radio"
                        id="amigos"
                        value="Con amigos"
                        name="vives"
                        required
                    />
                    <label class="form-check-label" for="amigos">
                        Con amigos
                    </label>
                </div>
            </div>

            <div class="col-12 col-md-6 mb-3">
                <label for="ingreso" class="form-label fw-bold"
                    >¿Cuál es el promedio de ingreso familiar al mes?
                </label>

                <div class="form-check mb-2">
                    <input
                        v-model="form.ingreso"
                        class="form-check-input"
                        type="radio"
                        id="menos-500"
                        value="Menos de 500"
                        name="ingreso"
                        required
                    />
                    <label class="form-check-label" for="menos-500">
                        Menos de 500
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input
                        v-model="form.ingreso"
                        class="form-check-input"
                        type="radio"
                        id="501-1025"
                        value="501-1025"
                        name="ingreso"
                        required
                    />
                    <label class="form-check-label" for="501-1025">
                        501-1025
                    </label>
                </div>

                <div class="form-check mb-2">
                    <input
                        v-model="form.ingreso"
                        class="form-check-input"
                        type="radio"
                        id="1026-1500"
                        value="1026-1500"
                        name="ingreso"
                        required
                    />
                    <label class="form-check-label" for="1026-1500">
                        1026-1500
                    </label>
                </div>

                <div class="form-check mb-2">
                    <input
                        v-model="form.ingreso"
                        class="form-check-input"
                        type="radio"
                        id="1501-2000"
                        value="1501-2000"
                        name="ingreso"
                        required
                    />
                    <label class="form-check-label" for="1501-2000">
                        1501-2000
                    </label>
                </div>

                <div class="form-check mb-2">
                    <input
                        v-model="form.ingreso"
                        class="form-check-input"
                        type="radio"
                        id="mas-2000"
                        value="Más de 2000"
                        name="ingreso"
                        required
                    />
                    <label class="form-check-label" for="mas-2000">
                        Más de 2000
                    </label>
                </div>
            </div>

            <div class="col-12 d-flex justify-content-end">
                <button class="btn btn-primary" :disabled="form.processing">
                    <template v-if="form.processing">
                        <span
                            class="spinner-border spinner-border-sm me-2"
                            role="status"
                            aria-hidden="true"
                        ></span>
                    </template>
                    <template v-else>
                        <i class="bi bi-save me-2"></i>
                    </template>
                    Guardar
                </button>
            </div>
        </div>
    </form>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import peru from "@/assets/json/peru.json";
import unap from "@/assets/json/unap.json";
import { ref, watch } from "vue";

const form = useForm({
    nacimiento: null,
    sexo: null,
    lengua_mat: null,
    semestre: null,
    vivienda: null,
    vivienda_otro: null,
    estudios: null,
    orientacion: null,
    orientacion_otro: null,
    vives: null,
    procedencia: null,
    escuela_pro: null,
    ingreso: null,
});

const lenguas = ["Quechua", "Aymara", "Castellano"];

const submit = () => {
    form.escuela_pro = escuelaSearch.value;
    form.procedencia = peruSearch.value;
    form.post("/user/save-info-add");
};

const peruSearch = ref("");
const peruSearchRes = ref([]);
const escuelaSearch = ref("");
const escuelaSearchRes = ref([]);

watch(peruSearch, (val) => {
    let valor = val.toUpperCase();
    if (val.length < 3) return;
    peruSearchRes.value = peru.filter((item) => {
        return (
            item.departamento.indexOf(valor) > -1 ||
            item.provincia.indexOf(valor) > -1 ||
            item.distrito.indexOf(valor) > -1
        );
    });
});

watch(escuelaSearch, (val) => {
    let valor = val.toUpperCase();
    if (val.length < 3) return;
    escuelaSearchRes.value = unap.filter((item) => {
        return (
            item.escuela.toUpperCase().indexOf(valor) > -1 ||
            item.facultad.toUpperCase().indexOf(valor) > -1
        );
    });
});
</script>

<style lang="scss">
.autocomplete-menu {
    max-height: 20rem;
    overflow-x: hidden;
    overflow-y: auto;
}
</style>
