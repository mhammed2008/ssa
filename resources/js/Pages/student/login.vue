<script setup>

import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import NavLink from "@/Components/NavLink.vue";
import {useForm} from "@inertiajs/vue3";


let student = defineProps({
  name:String
})

let form = useForm({
  name: student.name,
  password: ''
})
let submit = () => {
  form.post('/login')
}
</script>

<template>
  <Head title="تسجيل دخول الطالب"/>
  <div class="grid place-items-center min-h-screen">
    <form @submit.prevent="submit" class="w-96 max-sm:w-full" >
      <h1 class="text-2xl font-bold">تسجيل الطالب</h1>

      <div class="mb-6 mt-6">
        <label class="block mb-2 uppercase font-bold text-s text-gray-700"
               for="name">
          اسم الطالب الكامل
        </label>
        <input class="border border-gray-400 p-2 w-full rounded-lg"
               type="text"
               name="name"
               id="name"
               v-model="form.name"
               required
        >
        <input-error :message="form.errors.name" />
      </div>

      <div class="mb-6 mt-6">
        <label class="block mb-2 uppercase font-bold text-s text-gray-700"
               for="password">
          رقم الطالب
        </label>
        <input class="border border-gray-400 p-2 w-full rounded-lg"
               type="text"
               name="password"
               id="password"
               v-model="form.password"
               required
        >
        <input-error :message="form.errors.password" />
      </div>

      <primary-button>تسجيل</primary-button>
      <nav-link href="/" class="mr-10">عوده</nav-link>
    </form>
  </div>
</template>

<style scoped>

</style>