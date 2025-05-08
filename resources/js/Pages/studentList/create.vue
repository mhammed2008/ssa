<script setup>

import PictureInput from "vue-picture-input";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import NavLink from "@/Components/NavLink.vue";
import {useForm} from "@inertiajs/vue3";

let form = useForm({
  list: '',
  grad:'',
})

let submit= () => {
  form.post('/create/list')
}
</script>

<template>
  <Head title="ادخال الجدول"/>
  <div class="grid place-items-center min-h-screen">
    <form @submit.prevent="submit" class="w-96 max-sm:w-full" >
      <div class="mb-6 mt-6">
        <label class="block mb-2 uppercase font-bold text-s text-gray-700"
               for="grad">
          الجدول لصف
        </label>
        <select class="border border-gray-400 rounded-lg" v-model="form.grad"  required>
          <option value="k1"> كج 1 </option>
          <option value="k2"> كج 2</option>
          <option value="1"> الصف 1 </option>
          <option value="2"> الصف 2 </option>
          <option value="3"> الصف 3 </option>
          <option value="4"> الصف 4 </option>
          <option value="5"> الصف 5 </option>
          <option value="6"> الصف 6 </option>
          <option value="7"> الصف 7 </option>
          <option value="8"> الصف 8 </option>
          <option value="9"> الصف 9 </option>
        </select>
        <input-error :message="form.errors.grad" />

      </div>
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

      <primary-button>حفظ</primary-button>
      <nav-link href="/" class="mr-10">عوده</nav-link>
    </form>
  </div>
</template>

<style scoped>

</style>