<script setup>
import NavLink from "@/Components/NavLink.vue";
import Admin from "@/Components/Admin.vue";

 let lists = [
  {grad: 'kg 1' , url: 'k1'},
  {grad: 'kg 2' , url: 'k2'},
  {grad: 'جدول الصف 1' , url: '1'},
  {grad: 'جدول الصف 2' , url: '2'},
  {grad: 'جدول الصف 3' , url: '3'},
  {grad: 'جدول الصف 4' , url: '4'},
  {grad: 'جدول الصف 5' , url: '5'},
  {grad: 'جدول الصف 6' , url: '6'},
  {grad: 'جدول الصف 7' , url: '7'},
  {grad: 'جدول الصف 8' , url: '8'},
  {grad: 'جدول الصف 9' , url: '9'},
 ];
</script>

<template>
  <Head title="الأكاديمية الذكية السورية"/>
<!--  <img src="../images/logo.jpg" width="150" alt="">-->
  <div class="grid place-items-start font-medium">

    <div class="grid place-items-start p-6 space-y-5 w-full">

      <div class="flex gap-6">
        <h1 class="text-xl "> اختر الصف :</h1>
      </div>
        <Link v-for="list in lists " :href="`/studentList/${list.url}`" class="w-96 max-w-full">
        <div class="bg-[#ffbc09] p-2 rounded-full text-white hover:shadow-yellow-600 hover:shadow-sm hover:scale-105">
          <p>{{ list.grad }}</p>
        </div>
      </Link>
      <admin :auth="$page.props.auth">
        <nav-link href="/create/list">ادخل الجدول</nav-link>
      </admin>
      <nav-link href="/">عوده</nav-link>

    </div>
    <div class="w-full bg-gray-200 p-3 mt-20">
      <NavLink href="#" >مبرمج الموقع محمد عبدالله</NavLink>
    </div>
  </div>

</template>

<style scoped>

</style>