<script setup>
import {useForm} from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import NavLink from "@/Components/NavLink.vue";
import InputError from "@/Components/InputError.vue";
import PictureInput from 'vue-picture-input';
import DangerButton from "@/Components/DangerButton.vue";
import {ref} from "vue";

let props = defineProps({
  user: Object,
  password: String
});

let form = useForm({
  name: '',
  profile_img:'',
  password: '',
  grad: props.user.grad,
  birth_date: props.user.birth_date,
  description: props.user.description
})

let submit= () => {
  form.post(`/edit/${props.user.id}`)
};



</script>

<template>
  <Head :title="`تعديل معلومات الطالب `"/>
  <div class="grid place-items-center min-h-screen">
    <form @submit.prevent="submit" class="w-96 max-sm:w-full" >
      <h1 class="text-2xl font-bold"> تعديل معلومات الطالب: {{ $page.props.user.name }} </h1>

      <div class="mb-6 mt-6">
        <label class="block mb-2 uppercase font-bold text-s text-gray-700"
               for="name">
          اسم الطالب الكامل
        </label>
        <input class="border border-gray-400 p-2 w-full rounded-lg"
               type="text"
               name="name"
               id="name"
               :placeholder="$page.props.user.name"
               v-model="form.name"

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
               :placeholder="$page.props.password "
               v-model="form.password"

        >
        <input-error :message="form.errors.password" />
      </div>

      <div class="mb-6 mt-6">
        <label class="block mb-2 uppercase font-bold text-s text-gray-700"
               for="profile_img">
          صوره لطالب
        </label>
        <picture-input   width="200" height="200" radius="100"
                        type="file"
                        name="profile_img"
                        id="profile_img"
                        @input="form.profile_img = $event.target.files[0]"
        >
          <img :src="`/storage/${form.profile_img}`" alt="">
        </picture-input>
        <input-error :message="form.errors.profile_img" />
      </div>

      <div class="mb-6 mt-6">
        <label class="block mb-2 uppercase font-bold text-s text-gray-700"
               for="grad">
          المرحله الدراسيه لطالب
        </label>
        <select class="border border-gray-400 rounded-lg" v-model="form.grad" name="grad" required>
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
               for="description">
          ملاحظات على الطالب
        </label>
        <textarea class="border border-gray-400 p-2 w-full rounded-lg"
                  type="text"
                  name="description"
                  id="description"
                  v-model="form.description"
        ></textarea>
        <input-error :message="form.errors.description" />
      </div>
      <div class="mb-6 mt-6">
        <label class="block mb-2 uppercase font-bold text-s text-gray-700"
               for="birth_date">
          تاريخ الميلاد لطالب
        </label>
        <input class="border border-gray-400 p-2  rounded-lg"
               type="text"
               name="birth_date"
               id="birth_date"
               v-model="form.birth_date"
               required
        >
        <input-error :message="form.errors.birth_date" />

      </div>
      <primary-button>حفظ</primary-button>
      <Link  method="post" :href="`/student/delete/${user.id}`" class="p-8 mx-8">
        <danger-button>
          Delete
        </danger-button>
      </Link>
      <nav-link href="/" class="mr-10">عوده</nav-link>
    </form>
  </div>

</template>

<style scoped>

</style>