<template>
    <AuthLayout>
        <div class="card card-auth mx-auto">
            <div class="card-header">
                <img class="logo-img" :src="Logo" alt="Logo app">
               
            </div>
            <div class="card-body">
                <nav>
                    <div class="nav" id="nav-tab" role="tablist">
                        <Link href="/user/auth/login" class="nav-link">
                            Login
                        </Link>
                        <Link href="/user/auth/register" class="nav-link show active" id="nav-register-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-register" type="button" role="tab" aria-controls="nav-register"
                            aria-selected="false">
                            Register
                        </Link>

                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane pt-4 fade show active" id="nav-register" role="tabpanel" aria-labelledby="nav-register-tab"
                        tabindex="0">
                        <RegisterFormComponent />
                    </div>

                </div>
            </div>
            <div class="card-footer">
                ENCUESTA © 2022
            </div>
        </div>

    </AuthLayout>

</template>
<script setup>
import Logo from "@/assets/images/logo.png"
import AuthLayout from '@/Layouts/AuthLayout.vue';
import { Link } from "@inertiajs/inertia-vue3";
import RegisterFormComponent from "./Components/RegisterFormComponent.vue";
</script>

<style lang="scss">
$color-primario: #0E2940;

.card.card-auth {
    width: 30rem;
    border-radius: 0;
    border: none;

    .card-header {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        padding: 1.2rem;
        border-radius: 0;
        border: none;

        .logo-img {
            width: 8.5rem;
            border-radius: 10px;
        }


    }

    .card-body {
        .nav {
            border-bottom: 1px dashed #eee;

            .nav-link {
                background-color: transparent;
                border: none;
                transform: translateY(2px);
                color: #888;
                font-weight: 500;

                &.active {
                    border-radius: 0;
                    background-color: transparent;
                    border: none;
                    border-bottom: 2px solid $color-primario;
                    color: $color-primario ;

                }
            }
        }
    }

    .card-footer {
        border-radius: 0;
        border: none;
        background-color: #fafafa;
        text-align: center;
        color: #777;
        font-size: .9em;
    }
}

@media (max-width: 600px) {
    .card.card-auth {
        min-height: 100vh;
        width: 100vw;
    }
}
</style>