<script setup>
import { computed, onMounted, ref } from "vue";
import BookCard from "../components/BookCard.vue";
import { getBooks } from "../services/bookService.js";

const books = ref([]);
const searchQuery = ref("");
const selectedCategory = ref("");

onMounted(async () => {
  const res = await getBooks();
  books.value = res.data;
});

const filteredBooks = computed(() => {
  return books.value.filter((book) => {
    const matchSearch =
      book.title
        .toLowerCase()
        .includes(searchQuery.value.toLocaleLowerCase()) ||
      book.author
        .toLocaleLowerCase()
        .includes(searchQuery.value.toLocaleLowerCase());

    const matchCategory =
      !selectedCategory.value || book.category?.name === selectedCategory.value;

    return matchSearch && matchCategory;
  });
});

const categories = computed(() => {
  const names = books.value.map((book) => book.category?.name).filter(Boolean);
  return [...new Set(names)];
});
</script>

<template>
  <div>
    <h1 class="mb-4 font-bold text-2xl">Book Catalog</h1>

    <div class="flex gap-4 mb-6">
      <input
        type="text"
        v-model="searchQuery"
        placeholder="Cari judul atau penulis..."
        class="flex-1 px-4 border rounded-lg focus:ring focus:ring-blue-300"
      />

      <select
        v-model="selectedCategory"
        class="px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300"
      >
        <option value="">Semua Category</option>
        <option
          v-for="category in categories"
          :key="category"
          :value="category"
        >
          {{ category }}
        </option>
      </select>
    </div>

    <div class="gap-4 grid grid-cols-1 md:grid-cols-3">
      <BookCard v-for="book in filteredBooks" :key="book.id" :book="book" />
    </div>
  </div>
</template>
