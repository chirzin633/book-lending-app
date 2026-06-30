<script setup>
defineProps({
  categories: {
    type: Array,
    required: true,
  },
});
</script>

<template>
  <ul class="space-y-2">
    <li
      v-for="category in categories"
      :key="category.id"
      class="bg-gray-100 hover:bg-gray-200 px-3 py-2 cursor-pointer"
    >
      {{ category.name }}
    </li>
  </ul>
</template>
