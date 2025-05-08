<script setup>

import InputError from "@/Components/InputError.vue";
import {defineModel} from "vue";
const material = defineModel('material')
const grad = defineModel('grad')
defineProps({
  errorsMaterial: '',
  errorsGrad: ''
})
</script>

<template>
  <div class="mb-6 mt-6">
    <label class="block mb-2 uppercase font-bold text-s text-gray-700"
           for="material">
      الماده
    </label>
    <input class="border border-gray-400 p-2 w-full rounded-lg"
           type="text"
           id="material"
           v-model="material"
    >
    <input-error :message="errorsMaterial" />
  </div>

  <div class="mb-6 mt-6">
    <label class="block mb-2 uppercase font-bold text-s text-gray-700"
           for="grad">
      درجات {{ material }}
    </label>
    <input class="border border-gray-400 p-2 w-full rounded-lg"
           type="text"
           id="grad"
           v-model="grad"
    >
    <input-error :message="errorsGrad" />
  </div>

  <div class="w-full border border-gray-950 mb-4"></div>
</template>

<style scoped>

</style>