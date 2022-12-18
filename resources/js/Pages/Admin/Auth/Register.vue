<template>
    <MenuComponent />
    <main>
        <div class="container">
            <div class="mx-auto w-75 mt-5">
                <h2>Admin - Register</h2>
                <hr>
                <form @submit.prevent="submit">

                    <div class="mb-3">
                        <label for="i-name" class="form-label">Full Name</label>
                        <input v-model="form.name" type="text" class="form-control" id="i-name">
                        <div v-if="form.errors.name" class="text-danger">
                            {{ form.errors.name }}
                        </div>

                    </div>

                    <div class="mb-3">
                        <label for="i-email" class="form-label">Email address</label>
                        <input v-model="form.email" type="email" class="form-control" id="i-email">

                        <div v-if="form.errors.email" class="text-danger">
                            {{ form.errors.email }}
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="i-password" class="form-label">Password</label>
                        <input v-model="form.password" type="password" class="form-control" id="i-password">

                        <div v-if="form.errors.password" class="text-danger">
                            {{ form.errors.password }}
                        </div>
                    </div>

                    <div class="mb-3  d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary" type="submit" :disabled="form.processing">Submit</button>
                    </div>
                </form>

            </div>

        </div>
    </main>
</template>
<script setup>

import MenuComponent from '@/Components/MenuComponent.vue';
import { useForm } from '@inertiajs/inertia-vue3'

const form = useForm({
    name: null,
    email: null,
    password: null,

})


function submit() {
    form.post('/admin/auth/register')
}
</script>