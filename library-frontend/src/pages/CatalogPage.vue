<script setup>
import { onMounted, ref } from "vue";
import BookCard from "../components/BookCard.vue";
import { getBooks } from "../services/bookService.js";

const books = ref([]);

onMounted(async () => {
  const res = await getBooks();
  books.value = res.data;
});
</script>

<template>
  <div>
    <h1 class="mb-4 font-bold text-2xl">Book Catalog</h1>
    <div class="gap-4 grid grid-cols-1 md:grid-cols-3">
      <BookCard v-for="book in books" :key="book.id" :book="book" />
    </div>
  </div>
</template>
