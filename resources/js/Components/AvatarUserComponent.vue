<template>
    <div class="wrap-avatar-user">

        <div class="avatar-img">
            A
        </div>
        <div class="user-details">
            <span class="user-name">{{user.name}}</span>
            <span class="user-rol">Administrador</span>
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
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 2.8rem;
        height: 2.8rem;
        border-radius: 50%;
        background-color: rgb(0, 0, 0);
        margin: 0rem .8rem 0rem .8rem;

    }

    .user-details {
        flex: auto;
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