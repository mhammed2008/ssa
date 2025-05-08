<script setup>

import PictureInput from "vue-picture-input";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import NavLink from "@/Components/NavLink.vue";
import {useForm} from "@inertiajs/vue3";
import {list} from "postcss";

let form = useForm({
  list: '',
})

let prop = defineProps({
  list: Array
});
let image = prop.list.img_url;
let submit= () => {
  form.post(`/edit/student/list/${prop.list.id}`)
}
</script>

<template>
  <Head title="ادخال الجدول"/>
  <div class="grid place-items-center min-h-screen">
    <form @submit.prevent="submit" class="w-96 max-sm:w-full mb-24" >
      <h1 class="text-xl font-medium">تعديل جدول الصف {{$page.props.list.grad}} </h1>
      <div class="mb-6 mt-6">
        <label class="block mb-2 uppercase font-bold text-s text-gray-700"
               for="list">
          صوره للجدول
        </label>

        <picture-input  width="600" height="500" radius="0"
                        type="file"
                        name="list"
                        id="list"
                        @input="form.list = $event.target.files[0]"
                        required
        >
        </picture-input>

        <input-error :message="form.list" />

      </div>
      <label class="block mb-2 uppercase font-bold text-xl text-gray-700"
             for="list">
        الجدول
      </label>
      <img :src="`/storage/${image}`" width="600" alt="" class="mt-8 mb-8">

      <primary-button>حفظ</primary-button>
      <nav-link href="/" class="mr-10">عوده</nav-link>
    </form>
  </div>
</template>

<style scoped>

</style>