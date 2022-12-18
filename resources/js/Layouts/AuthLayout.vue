<template>
<div class="auth-layout">
    <main class="">
        <slot></slot>

    </main>
</div>    
</template>
<script setup>

</script>
<style lang="scss">
$color-primario:#0E2940;
.auth-layout{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100vw;
    height: 100vh;
    background-color: #f1f1f1;
}
</style>