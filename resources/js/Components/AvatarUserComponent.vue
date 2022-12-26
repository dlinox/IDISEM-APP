<template>
    <div class="wrap-avatar-user">

        <div class="avatar-img">
            <span>
                {{ user.name.substring(0, 1) }}
            </span>
        </div>
        <div class="user-details">
            <span class="user-name">{{ user.name }}</span>
            <small class="user-rol"> {{ user.rol_name }} </small>
        </div>
    </div>
</template>
<script setup>

const props = defineProps({
    user: Object
});

</script>
<style lang="scss" scoped>
.wrap-avatar-user {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 95%;
    border-bottom: 1px dashed rgba(#fff, .3);
    margin: 0 auto;


    .avatar-img {
        span {
            border-radius: 50%;
            background-color: rgb(0, 0, 0);
            width: 2.5rem;
            height: 2.5rem;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        display: flex;
        justify-content: center;
        align-items: center;
        width: 2.8rem;
        height: 2.8rem;

        margin: 0rem .8rem 0rem .8rem;

    }

    .user-details {

        display: flex;
        flex-wrap: wrap;
        padding: .8rem 0rem;

        .user-name {
            display: block;
            font-weight: 700;
            color: white;
        }

        .user-rol {
            display: block;
            color: rgb(200, 200, 200);
            font-weight: 400;
        }

    }
}
</style>