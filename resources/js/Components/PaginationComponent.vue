<template>
    <nav aria-label="navigation ">
        <ul class="pagination mb-0">
            <li
                class="page-item"
                :class="[
                    links[0].active ? 'active' : '',
                    links[0].url == null ? 'disabled' : '',
                ]"
            >
                <Link
                    class="page-link rounded-0"
                    :href="links[0].url"
                    v-html="links[0].label"
                />
            </li>

            <li
                v-for="(item, index) in pagination.numPages"
                :key="index"
                class="page-item"
                :class="[
                    item.active ? 'active' : '',
                    item.url == null ? 'disabled' : '',
                ]"
            >
                <template v-if="!pagination.dropDown">
                    <Link
                        class="page-link rounded-0"
                        :href="item.url"
                        v-html="item.label"
                    />
                </template>

                <template v-else>
                    <template v-if="item.length > 0">
                        <div class="dropdown">
                            <button
                                class="btn btn-light rounded-0"
                                type="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                {{  item.some( (val) => val.label ==  currentPage ) ? currentPage :  '...'   }}
                            </button>
                            <ul class="dropdown-menu rounded-0 border-0 shadow-sm" style="width: 100px">
                                <li v-for="(elem, j) in item" :key="j">
                                    <Link
                                        class="dropdown-item"
                                        :class="elem.active ? 'active' : ''"
                                        :href="elem.url"
                                    >
                                        Pag. {{ elem.label }}
                                    </Link>
                                </li>
                            </ul>
                        </div>
                    </template>
                    <template v-else>
                        <Link
                            class="page-link rounded-0"
                            :href="item.url"
                            v-html="item.label"
                        />
                    </template>
                </template>
            </li>

            <li
                class="page-item"
                :class="[
                    links[links.length - 1].active ? 'active' : '',
                    links[links.length - 1].url == null ? 'disabled' : '',
                ]"
            >
                <Link
                    class="page-link rounded-0"
                    :href="links[links.length - 1].url"
                    v-html="links[links.length - 1].label"
                />
            </li>
        </ul>
    </nav>
</template>
<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import { computed } from "vue";
const props = defineProps({
    links: Array,
    totalPages: {
        type: Number,
        required: true,
    },
    currentPage: {
        type: Number,
        required: true,
    },
    maxShowPage: {
        type: Number,
        default: 5,
    },
});

const pagination = computed(() => {
    let aux = {
        numPages: [...props.links],
        dropDown: false,
        dropDownPages: [],
    };

    aux.numPages.shift();
    aux.numPages.pop();

    if (props.maxShowPage < aux.numPages.length) {
        let temp = [];
        let tempDropDown = [];

        tempDropDown.push(
            ...aux.numPages.slice(
                parseInt(props.maxShowPage / 2),
                -parseInt(props.maxShowPage / 2)
            )
        );

        temp.push(...aux.numPages.slice(0, parseInt(props.maxShowPage / 2)));

        temp.push([...tempDropDown]);

        temp.push(...aux.numPages.slice(-parseInt(props.maxShowPage / 2)));

        console.log(temp);
        console.log(tempDropDown);

        aux = {
            numPages: [...temp],
            dropDown: true,
            dropDownPages: [...tempDropDown],
        };

        return aux;
    }

    console.log(aux);
    return aux;
});
</script>
