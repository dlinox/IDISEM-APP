<template>
    <AuthLayout>
        <div class="card card-auth mx-auto">
            <div class="card-header">
                <img class="logo-img" :src="Logo" alt="Logo IDISEM APP">
            </div>
            <div class="card-body">
                <nav>
                    <div class="nav" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-login-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-login" type="button" role="tab" aria-controls="nav-login"
                            aria-selected="true">
                            Login
                        </button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane pt-4 fade show active" id="nav-login" role="tabpanel"
                        aria-labelledby="nav-login-tab" tabindex="0">
                        <LoginFormComponent />
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
import LoginFormComponent from "./Components/LoginFormComponent.vue";
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
        //background-color: $color-primario;
        padding: 1.2rem;
        border-radius: 0;
        border: none;

        .logo-img {
            height: 6rem;
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