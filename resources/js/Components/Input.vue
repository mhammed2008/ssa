<script setup>
let props =defineProps({
  name: String,
  placeholder: String,
  type: String,
  required: Boolean
});

let require = props.required ? 'required' : 'f';
</script>

<template>
  <div class="mb-6 mt-8">
    <label class="block mb-2 uppercase font-bold text-s text-gray-700"
           :for="name">
      <slot/>
    </label>
    <input class="border border-gray-400 p-2 w-full rounded-lg"
           :type="type ? type : 'text'"
           :placeholder="placeholder ? placeholder : ''"
           :name="name"
           :id="name"
           {{ require }}
    >
  </div>
</template>

<style scoped>

</style>