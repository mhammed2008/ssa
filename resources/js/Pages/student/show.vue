<script setup>
import NavLink from "@/Components/NavLink.vue";

defineProps({
  user: Object
})
</script>

<template>
  <div class="grid place-items-center min-h-screen font-medium w-full">
      <div class="space-y-6">
        <header class="flex items-center gap-3 ">
          <div class="rounded-full">
            <img :src="`/storage/${user.profile_img}`" :alt="`صوره الطالب : ${user.name}`" width="150" class="rounded-full" >
          </div>
          <div class="flex flex-col">
            <h1 class="text-2xl ">
              الطالب : {{ user.name }}
            </h1>

            <p>
              رقم الطالب : {{ user.password }}
            </p>
            <p> الصف {{ user.grad}}</p>

          </div>
        </header>

        <div>
          <h2>
            الملاحظات
          </h2>
          <p class="border-gray-200 shadow-xl border w-60 p-1 rounded-l-xl rounded-br-xl text-center">
            {{ user.description ?? 'لا يوجد' }}
          </p>
        </div>
        <div class="flex gap-6">
          <Link :href="`/studentList/${user.grad}`" class="text-blue-600 ">الجدول</Link>

          <Link :href="`/grads/${user.id}`" class="text-blue-600 ">الدرجات</Link>

          <Link :href="`/`" class="text-blue-600">العوده</Link>
        </div>
      </div>
  </div>
  <div class="w-full bg-gray-200 p-3">
    <NavLink href="#" >مبرمج الموقع محمد عبدالله</NavLink>
  </div>
</template>

<style scoped>

</style>