<script setup>
defineProps({
  book: {
    type: Object,
    required: true,
  },
});
</script>

<template>
  <div class="bg-white shadow hover:shadow-md p-4 rounded-lg transition">
    <h3 class="font-semibold text-gray-800 text-lg">{{ book.title }}</h3>
    <p class="text-gray-600">{{ book.author }}</p>
    <span class="text-blue-600 text-sm"
      >Kategori : {{ book.category?.name }}</span
    >
  </div>
</template>
