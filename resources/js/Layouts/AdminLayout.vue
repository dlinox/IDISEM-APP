<template>
    <div class="wrap-app" :class="positionDrawer ? 'phones' : ''">
        <div class="drawer-app" :class="[drawer ? 'show' : 'hide', positionDrawer ? 'hide' : '']">
            <div class="drawer-header px-3 ">
                <button v-if="positionDrawer" class="btn btn-dark drawer-btn-close me-3" @click="drawer = !drawer">
                    <i v-if="drawer" class="bi bi-window"></i>
                </button>

                <div class="logo-app ">
                    <img :src="Logo" alt="Logo IDISEM">
                </div>
            </div>

            <div class="drawer-body">
                <AvatarUserComponent :user="user" />
                <MainMenuComponent />

            </div>
            <div class="drawer-footer px-3">
            </div>
        </div>

        <div class="content-app" :class="!drawer ? 'full' : ''">

            <nav class="nav-app">
                <div class="w-100 h-100 d-flex justify-content-between align-items-center px-3">
                    <div>
                        <button class="btn btn-dark" @click="drawer = !drawer">


                            <i v-if="!drawer" class="bi bi-window-sidebar"></i>
                            <i v-else class="bi bi-window"></i>

                        </button>
                    </div>
                    <div>
                        <div class="dropdown">
                            <button class="btn btn-outline-dark" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-person"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>

                                    <Link class="dropdown-item text-danger" href="/admin/auth/logout" method="delete"
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
import Logo from '../assets/images/logo.png'
import MainMenuComponent from '@/Components/MainMenuComponent.vue'
import AvatarUserComponent from '@/Components/AvatarUserComponent.vue';
import { Link, usePage } from '@inertiajs/inertia-vue3';

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

const user = computed(() => usePage().props.value.auth.user)



const alerta = computed(() => usePage().props.value)


const initialize = () => {
    window.addEventListener('resize', handleResize);
    handleResize();
}
initialize();

</script>

<style lang="scss" scoped>
$color-primario: #0A254C;

.wrap-app {
    background-color: #f1f1f1;
    width: 100vw;
    height: 100vh;
    overflow: hidden;
    padding: 0;
    margin: 0;
    display: flex;
    position: relative;

    .drawer-app {
        z-index: 3;
        height: 100vh;
        background-color: $color-primario;
        width: 15rem;
        overflow-x: hidden;
        overflow-y: auto;
        transition: all .3s ease;
        position: relative;

        &.hide {
            transform: translateX(- 15rem);
            width: 0;
        }

        &.show {
            transform: translateX(0rem);
            width: 15rem;
        }

        .drawer-header {
            height: 7rem;
            width: 100%;
            display: flex;
            align-items: center;
            background-color: rgba(#fff, .8);

            .logo-app {
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100%;
                width: 100%;
                display: flex;
                padding: 1rem;

                img {
                    height: 100%;
                }
            }

        }

        .drawer-footer {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3.5rem;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }
    }

    .content-app {
        height: 100vh;
        width: calc(100vw - 15rem);
        position: relative;
        transition: all .3s ease;

        &.full {
            width: 100vw;
        }

        .nav-app {
            width: 100%;
            height: 3.5rem;
            background-color: #fafafa;
            position: absolute;
            top: 0;
            z-index: 1;
            box-shadow: 0px 1px 8px 1px rgba(200, 200, 200, 0.5);
        }

        .main-app {
            width: 100%;
            height: calc(100% - 3.5rem);
            overflow-y: auto;
            margin-top: 3.5rem;
            padding: 1.5rem 0rem;

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

    &.phones {
        .drawer-app {
            position: absolute;
        }

        .content-app {
            width: 100vw;
        }
    }
}
</style>