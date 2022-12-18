<template>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Menu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">


                    <li v-for="(item, index) in menuItems" :key="index" class="nav-item">
                        <Link class="nav-link" :class="[pathname == item.route ? 'active' : '']" :href="item.route"> {{
                                item.name
                        }} </Link>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</template>

<script setup>

import { computed } from 'vue';
import { Link } from '@inertiajs/inertia-vue3'
const pathname = computed(() => window.location.pathname)
const menuItems = [
    {
        'name': 'Admin',
        'route': '/admin'
    },
    {
        'name': 'Admin Login',
        'route': '/admin/auth/login'
    },
    {
        'name': 'Admin Register',
        'route': '/admin/auth/register'
    },
    {
        'name': 'User',
        'route': '/user'
    },
    {
        'name': 'User login',
        'route': '/user/auth/login'
    },
    {
        'name': 'User register',
        'route': '/user/auth/register'
    },
]


</script>