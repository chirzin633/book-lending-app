<script setup>
import { onMounted, ref } from "vue";
import CategoryList from "../components/CategoryList.vue";
import { getCategories } from "../services/categoryService.js";

const categories = ref([]);

onMounted(async () => {
  const res = await getCategories();
  categories.value = res.data;
});
</script>

<template>
  <div>
    <h1 class="mb-4 font-bold text-2xl">Categories</h1>
    <CategoryList :categories="categories" />
  </div>
</template>
