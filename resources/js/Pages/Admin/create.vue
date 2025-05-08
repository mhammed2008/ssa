<script setup>

import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {useForm} from "@inertiajs/vue3";

let form = useForm({
  name: '',
  profile_img:'',
  password: '',
})
let submit = () => {
  form.post('login');
}
</script>

<template>
  <div class="grid place-items-center min-h-screen">
    <form @submit.prevent="submit" class="w-[400px] max-sm:w-full space-y-8 p-8 shadow-lg rounded-xl" enctype="multipart/form-data">
      <div class="flex flex-col items-center">
        <img src="../images/logo.jpg" alt="" width="150">
        <h1 class="text-2xl text-center mb-4">تسجيل دخول الطالب</h1>
      </div>
      <div >
        <label class="block mb-2 uppercase font-bold text-s text-gray-700"
               for="name">
          اسم الطالب كامل
        </label>
        <input class="border border-gray-400 p-2 w-full rounded-xl"
               type="text"
               name="name"
               id="name"
               v-model="form.name"
               required
        >
        <input-error :message="form.errors.name" />
      </div>
<!--      <div >-->
<!--        <label class="block mb-2 uppercase font-bold text-s text-gray-700"-->
<!--               for="profile_img">-->
<!--          اسم الطالب كامل-->
<!--        </label>-->
<!--        <input class="border border-gray-400 p-2 w-full rounded-xl"-->
<!--               type="file"-->
<!--               name="profile_img"-->
<!--               id="profile_img"-->
<!--               v-model="form.profile_img"-->
<!--               required-->
<!--        >-->
<!--        <input-error :message="form.errors.profile_img" />-->
<!--      </div>-->

      <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-s text-gray-700"
               for="password">
          رقم الطالب
        </label>
        <input class="border border-gray-400 p-2 w-full rounded-xl"
               type="text"
               name="password"
               v-model="form.password"
               id="password"
               required
        >
        <input-error :message="form.errors.password" />
      </div>
      <input-error :message="form.errors.all" />
      <PrimaryButton>
        حفض
      </PrimaryButton>
    </form>
  </div>
</template>

<style scoped>

</style>