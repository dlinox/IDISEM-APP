<template>
    <div class="wrap-app" :class="positionDrawer ? 'phones' : ''">


        <div class="content-app">
            <nav class="nav-app">
                <div class="w-100 h-100 d-flex justify-content-between align-items-center px-3">

                    <Link href="/user" class="logo">
                    <img :src="Logo" alt="">
                    </Link>

                    <div>
                        <div class="dropdown">
                            <button class="btn btn-outline-dark" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-person"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item disabled" href="#">
                                        <i class="bi bi-person-bounding-box me-2"></i>
                                        Perfil
                                    </a>
                                </li>
                                <!-- <li><a class="dropdown-item" href="#"> <i class="bi bi-gear me-2"></i>
                                        Configuraciones</a></li>-->
                                <li>

                                    <Link class="dropdown-item text-danger" href="/user/auth/logout" method="delete"
                                        as="button">
                                    <i class="bi bi-box-arrow-left me-2"></i>
                                    Salir
                                    </Link>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </nav>
            <main class="main-app">
                <slot></slot>
            </main>

        </div>

    </div>

</template>
<script setup>
import { ref, computed } from 'vue';
import { Link, usePage } from '@inertiajs/inertia-vue3';
import Logo from '@/assets/images/logo.png'

const user = computed(() => usePage().props.value.auth)

const positionDrawer = computed(() => {
    if (widthScreen.value < 768) {

        drawer.value = false;
        return true;
    }
    else {
        drawer.value = drawer.value ? true : drawer.value;
        return false;
    }
});

const drawer = ref(true);

const widthScreen = ref(0);

const handleResize = () => {
    widthScreen.value = window.innerWidth;
}

const initialize = () => {
    window.addEventListener('resize', handleResize);
    handleResize();
}

initialize();

</script>

<style lang="scss" scoped>
.wrap-app {
    background-color: #f1f1f1;
    width: 100vw;
    height: 100vh;
    overflow: hidden;
    padding: 0;
    margin: 0;
    display: flex;
    position: relative;

    .content-app {
        height: 100vh;
        width: 100vw;
        position: relative;
        transition: all .3s ease;

        .nav-app {
            width: 100%;
            height: 4rem;
            background-color: #fafafa;
            position: absolute;
            top: 0;
            z-index: 1;
            box-shadow: 0px 1px 8px 1px rgba(200, 200, 200, 0.5);

            .logo {
                display: flex;
                width: 5rem;
                border-radius: .4rem;
                overflow: hidden;
                padding: .1rem;

                img {
                    width: 100%;
                }

            }
        }

        .main-app {
            width: 100%;
            height: calc(100% - 3.5rem);
            overflow-y: auto;
            margin-top: 3.5rem;
            overflow-x: hidden;

            /* width */
            &::-webkit-scrollbar {
                width: 10px;
            }

            /* Track */
            &::-webkit-scrollbar-track {
                background: #f1f1f1;
            }

            /* Handle */
            &::-webkit-scrollbar-thumb {
                background: #888;
            }

            /* Handle on hover */
            &::-webkit-scrollbar-thumb:hover {
                background: #555;
            }
        }
    }
}
</style>