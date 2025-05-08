<script setup>

import NavLink from "@/Components/NavLink.vue";
import Admin from "@/Components/Admin.vue";
import DangerButton from "@/Components/DangerButton.vue";
defineProps({
  grads: Object,
  user: Number
})
</script>

<template>
  <div class="lg:grid lg:place-items-center lg:mt-0 min-h-screen mt-20 p-6">
    <div class="flex flex-col">
      <h1 class="text-xl font-medium mb-8">درجات اختبرات {{grads[0].category}}</h1>
      <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
          <div class="overflow-scroll">
            <table class="min-w-full divide-y divide-gray-200">
              <thead>
              <tr>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium  uppercase">المواد</th>
                <th v-for="grad in grads" scope="col" class="px-6 py-3 text-start text-xs font-medium  uppercase">
                  {{ grad.material }}</th>
              </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
              <tr>

                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium ">الدرجات من 100%</td>
                <td  v-for="grad in grads" class="px-6 py-4 whitespace-nowrap text-sm ">{{ grad.grad }}</td>

              </tr>

              </tbody>
            </table>
            <Admin :auth="$page.props.auth">
              <Link method="DELETE" :href="`/grads/${user}/${grads[0].category}`" >
                <danger-button>
                  Delete
                </danger-button>
              </Link>
            </Admin>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="w-full bg-gray-200 p-3 ">
    <NavLink href="#" >مبرمج الموقع محمد عبدالله</NavLink>
  </div>
</template>

<style scoped>

</style>