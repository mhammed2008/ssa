<script setup>
import NavLink from "@/Components/NavLink.vue";
import Admin from "@/Components/Admin.vue";

defineProps({
  studentList: Array,
  app_url: String
});

</script>

<template>

  <div class="grid place-items-center h-screen">
    <div>
      <h1 v-if="!(studentList.grad === 'k1' || studentList.grad === 'k2') " class="text-xl font-medium mb-4"> جدول الصف{{studentList.grad}}</h1>
      <h1 v-if="studentList.grad === 'k1' " class="text-xl font-medium mb-4"> جدول كج1  </h1>
      <h1 v-if="studentList.grad === 'k2' " class="text-xl font-medium mb-4"> جدول كج2  </h1>

      <a :href="`${app_url}/storage/${studentList.img_url}`">
        <img :src="`/storage/${studentList.img_url}`" width="350" alt="">
      </a>

      <nav-link href="/" class="mt-8">
        عوده
      </nav-link>
      <Admin :auth="$page.props.auth">
        <nav-link :href="`/edit/student/list/${studentList.id}`">تعديل</nav-link>
      </Admin>
    </div>


  </div>
  <div class="w-full bg-gray-200 p-3 ">
    <NavLink href="#" >مبرمج الموقع محمد عبدالله</NavLink>
  </div>
</template>

<style scoped>

</style>