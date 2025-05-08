<script setup>

import NavLink from "@/Components/NavLink.vue";

defineProps({
  categories: Object,
  user_id: Number
})
</script>

<template>
  <div class="grid place-items-center min-h-screen p-8">
    <Link v-for="category in categories" :href="`/grads/${category}/${user_id}`">
      <div class="bg-gray-500 shadow-xl w-96 p-1 rounded-xl text-white font-medium text-2xl">
        <p>{{ category }}</p>
      </div>
    </Link>
    <div class="w-full bg-gray-200 p-3 mt-20">
      <NavLink href="#" >مبرمج الموقع محمد عبدالله</NavLink>
    </div>
  </div>
</template>

<style scoped>

</style>