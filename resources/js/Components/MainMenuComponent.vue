<template>

    <ul class="menu">
        <span class="menu-heading">Menu</span>

        <li v-for="(item, index) in user.menu" :key="index" class="menu-item"
            :class="!item.childrens ? '' : 'collapse'">
            <template v-if="!item.childrens">
                <Link :href="item.route">
                <span>
                    <i :class="item.icon + ' me-2'"></i>
                    {{ item.label }}
                </span>
                </Link>
            </template>
            <template v-else>

                <Link :href="item.route" data-bs-toggle="collapse" :data-bs-target="'#item-menu-' + index"
                    aria-expanded="true" :aria-controls="'item-menu-' + index">
                <span>
                    <i :class="item.icon + ' me-2'"></i> {{ item.label }}
                </span>

                <i class="bi bi-caret-down-fill"></i>
                </Link>
                <ul :id="'item-menu-' + index" class="sub-menu collapse">
                    <li v-for="(elemet, i) in item.childrens" :key="i" class="menu-item">
                        <Link :href="elemet.route">
                        <span>
                            <i class="bi bi-record me-2"></i> {{ elemet.label }}
                        </span>
                        </Link>
                    </li>
                </ul>
            </template>
        </li>
    </ul>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/inertia-vue3';
import { computed } from '@vue/reactivity';

const user = computed(() => usePage().props.value.auth.user)



const listMenu = [
    {
        name: 'Dashboard',
        route: '/admin',
        icon: 'bi bi-layout-wtf',
        childrens: false,
    },
    {
        name: 'Encuestas',
        route: '#',
        icon: 'bi bi-clipboard',
        childrens: [
            {
                name: 'Lista',
                route: '/admin/encuestas',
            },
            {
                name: 'Nuevo',
                route: '/admin/encuestas/create',
            }
        ]
    },

    {
        name: 'Administradores',
        route: '/admin/administradores',
        icon: 'bi bi-layout-wtf',
        childrens: false,
    },
    {
        name: 'Usuarios',
        route: '/admin/usuarios',
        icon: 'bi bi-layout-wtf',
        childrens: false,
    },
    {
        name: 'Estudiantes',
        route: '/admin/estudiantes',
        icon: 'bi bi-layout-wtf',
        childrens: false,
    },
    {
        name: 'Autorización',
        route: '#',
        icon: 'bi bi-person-lock',
        childrens: [
            {
                name: 'Roles',
                route: '/admin/roles',
            },
            {
                name: 'Permisos',
                route: '/admin/permisos/',
            }
        ]
    },
];



</script>
<style scoped lang="scss">
$color-primario: #0E2940;
$color-item-menu: #FFF;
$bg-item-menu: #F2CB05;

.menu {
    list-style: none;
    width: 100%;
    padding: 0;

    .menu-heading {
        display: block;
        padding: 1rem .8rem .5rem .8rem;
        text-transform: uppercase;
        font-size: .8em;
        color: rgba($color-item-menu, .5);
    }

    .menu-item {
        display: block;
        width: 100%;

        &.collapse a {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        a {
            text-decoration: none;
            padding: .8rem 1rem;
            display: block;
            color: rgba($color: $color-item-menu, $alpha: .8);

            &:focus {
                color: rgba($color-item-menu, 1);
                background-color: rgba($color: $bg-item-menu, $alpha: .05);
                border-left: 4px solid #F2CB05;
            }

            &:hover {
                color: rgba($color-item-menu, 1);
            }
        }

    }

    .sub-menu {
        width: 100%;
        background-color: rgba($color: $bg-item-menu, $alpha: .03);
        padding: 0;

        a {
            text-decoration: none;
            padding: .8rem 1rem .8rem 2rem;


            i {
                color: rgba($color: $bg-item-menu, $alpha: .8);
            }

            &:hover {
                color: rgba($color-item-menu, 1);
            }
        }
    }
}
</style>