<script setup>
  defineProps({
    auth: Object
  })
</script>

<template>
<div v-if="auth.user ? auth.user.Admin : false">
    <slot/>
</div>
</template>

<style scoped>

</style>