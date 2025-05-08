<script setup>

import NavLink from "@/Components/NavLink.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {useForm} from "@inertiajs/vue3";
import MaterialGradInput from "@/Components/materialGrad-input.vue";
import InputError from "@/Components/InputError.vue";

let prop =defineProps({
  user: Object
});


let form = useForm({
  category: '',
  material1: '',
  grad1: '',
  material2: '',
  grad2: '',
  material3: '',
  grad3: '',
  material4: '',
  grad4: '',
  material5: '',
  grad5: '',
  material6: '',
  grad6: '',
  material7: '',
  grad7: '',
  material8: '',
  grad8: '',
  material9: '',
  grad9: '',
  material10: '',
  grad10: '',
})

let submit= () => {
  form.post(`/create/${prop.user.id}/grad/`)
}
</script>

<template>
  <div v-if="$page.props.flash.success" class="absolute bg-blue-500 text-white rounded-l-xl rounded-b-xl p-4 m-6 ">
    {{ $page.props.flash.success }}
  </div>
  <div class="grid place-items-center min-h-screen">
    <form @submit.prevent="submit" class="w-96 max-sm:w-full mb-4" >
      <h1 class="text-2xl font-bold">ادخل درجات الطالب {{ user.name}}</h1>

      <div class="w-full border border-gray-950 mb-4"></div>

      <label class="block mb-2 uppercase font-bold text-s text-gray-700"
             for="category">
        فترة الاختبار
      </label>

      <select v-model="form.category" id="category" class="border border-gray-400  w-full rounded-lg mb-4" required>

        <option value="شهر1">شهر1</option>
        <option value="شهر2">شهر2</option>
        <option value="شهر3">شهر3</option>
        <option value="شهر4">شهر4</option>
        <option value="شهر5">شهر5</option>
        <option value="شهر6">شهر6</option>
        <option value="شهر7">شهر7</option>
        <option value="شهر8">شهر8</option>
        <option value="شهر9">شهر9</option>
        <option value="شهر10">شهر10</option>
        <option value="شهر11">شهر11</option>
        <option value="شهر12">شهر12</option>
        <option value="اخر السنة">اخر السنة</option>
        <option value="نص السنة">نص السنة</option>
      </select>

      <div class="w-full border border-gray-950 mb-4"></div>

       <material-grad-input v-model:material="form.material1" v-model:grad="form.grad1" :errorsMaterial="form.errors.material1" :errorsGrad="form.errors.grad1" />

       <material-grad-input v-model:material="form.material2" v-model:grad="form.grad2" :errorsMaterial="form.errors.material2" :errorsGrad="form.errors.grad2" />

       <material-grad-input v-model:material="form.material3" v-model:grad="form.grad3" :errorsMaterial="form.errors.material3" :errorsGrad="form.errors.grad3" />

       <material-grad-input v-model:material="form.material4" v-model:grad="form.grad4" :errorsMaterial="form.errors.material4" :errorsGrad="form.errors.grad4" />

       <material-grad-input v-model:material="form.material5" v-model:grad="form.grad5" :errorsMaterial="form.errors.material5" :errorsGrad="form.errors.grad5" />

       <material-grad-input v-model:material="form.material6" v-model:grad="form.grad6" :errorsMaterial="form.errors.material6" :errorsGrad="form.errors.grad6" />

       <material-grad-input v-model:material="form.material7" v-model:grad="form.grad7" :errorsMaterial="form.errors.material7" :errorsGrad="form.errors.grad7" />

       <material-grad-input v-model:material="form.material8" v-model:grad="form.grad8" :errorsMaterial="form.errors.material8" :errorsGrad="form.errors.grad8" />

       <material-grad-input v-model:material="form.material9" v-model:grad="form.grad9" :errorsMaterial="form.errors.material9" :errorsGrad="form.errors.grad9" />

      <material-grad-input v-model:material="form.material10" v-model:grad="form.grad10" :errorsMaterial="form.errors.material10" :errorsGrad="form.errors.grad10" />


      <primary-button>حفظ</primary-button>
      <nav-link href="/" class="mr-10">عوده</nav-link>
    </form>
  </div>
</template>

<style scoped>

</style>