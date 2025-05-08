<script setup>
import {router} from "@inertiajs/vue3";
import NavLink from "@/Components/NavLink.vue";
import {ref, watch} from "vue";
import {debounce} from "lodash";
import Admin from "@/Components/Admin.vue";


let props = defineProps({
  students: Object,
  filters: Object,
});

let search = ref(props.filters.search);



watch(search, debounce(function (value) {
  router.get('/', { search : value }, {
    preserveState:true,
    replace:true
  });
}, 300));
</script>

<template>
  <Head title="الأكاديمية الذكية السورية"/>
  <div class="grid place-items-center p-6 space-y-5">

    <img src="../images/logo.jpg" width="150" alt="logo">

    <Admin :auth="$page.props.auth">
      <NavLink href="/create">ادخل طالب</NavLink>
    </Admin>
    <NavLink href="/studentList">الجداول</NavLink>

    <input type="text" name="search" v-model="search" placeholder="ابحث" class="rounded-lg w-96 max-sm:w-full">

    <div v-for="student in students.data" class="flex p-4 w-96 max-sm:w-full bg-gray-50 justify-between  shadow-xl rounded-sm">

      <Link :href="`/${ $page.props.auth.user ?
       ($page.props.auth.user.id === student.id || $page.props.auth.user.Admin ?`student/${student.id}`: `student/${student.id}/login` ) :`student/${student.id}/login`
      }`" >
        <h1 class="text-lg">{{ student.name }}</h1>
      </Link>

      <Admin :auth="$page.props.auth">
        <Link :href="`/create/${student.id}/grads`" class="text-blue-500"> ادخل درجات الطالب </Link>
      </Admin>
      <Admin :auth="$page.props.auth">
      <Link :href="`/student/${student.id}/edit`" class="text-blue-500"> Edit </Link>
    </Admin>
    </div>
    <div class="w-full bg-gray-200 p-3 mt-20">
      <NavLink href="#" >مبرمج الموقع محمد عبدالله</NavLink>
    </div>
  </div>


</template>

<script >
export default {
  layout: false
}
</script>