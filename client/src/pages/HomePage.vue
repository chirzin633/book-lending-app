<script setup>
import { RouterLink } from "vue-router";
</script>

<template>
  <div class="py-12 text-center">
    <h1 class="mb-4 font-bold text-blue-600 text-4xl">
      Welcome Library System
    </h1>
    <p class="mb-6 text-gray-700">
      Selamat datang di sistem perpustakaan. Gunakan menu di sidebar untuk
      melihat katalog buku, kategori, dan daftar pinjaman.
    </p>
    <RouterLink
      to="/catalog"
      class="inline-block bg-blue-600 hover:bg-blue-700 shadow px-6 py-3 rounded-lg text-white transition"
      >Lihat Catalog Buku</RouterLink
    >
  </div>
</template>
