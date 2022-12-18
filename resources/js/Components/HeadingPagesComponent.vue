<template>
    <div class="heading">
        <ul class="heading-ul">
            <li class="heading-li">
                <Link href="/admin">
                <i class="bi bi-house"></i>
                </Link>
            </li>
            <li class="heading-li">
                <Link :href="content.father.route">
                {{ content.father.title }}
                </Link>
            </li>
            <li class="heading-li">
                {{ content.title }}
            </li>
        </ul>
    </div>
</template>
<script setup>
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
    content: {
        type: Object,
        default: {
            title: 'tilulo Heading',
            father: {
                title: 'Encuestas', route: '/encuestas'
            }
        }

    },
});



</script>
<style lang="scss" scoped>
.heading {

    .heading-ul {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
        color: #888;

        .heading-li {
            padding-right: .5rem;

            a {
                text-decoration: none;
                color: #333;

                &:hover {
                    color: #000;
                }
            }

            &::after {
                content: ' /';
            }

            &:last-child {
                &::after {
                    content: '';
                }
            }
        }
    }

}
</style>