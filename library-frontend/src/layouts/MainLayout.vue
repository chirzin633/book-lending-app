<script setup lang="ts">
import { RouterLink } from "vue-router";
</script>

<template>
  <div class="flex flex-col bg-gray-50 min-h-screen">
    <!-- Header -->
    <header class="bg-blue-600 shadow px-6 py-4 text-white">
      <h1 class="font-bold text-xl">Library Sistem</h1>
    </header>

    <!-- Body -->
    <div class="flex flex-1">
      <!-- Sidebar -->
      <aside class="bg-white p-4 border-r w-64">
        <nav class="space-y-2">
          <RouterLink to="/" class="block hover:bg-gray-100 px-3 py-2 rounded"
            >Home</RouterLink
          >
        </nav>
      </aside>

      <!-- Main Content -->
      <main class="flex-1 p-6">
        <RouterView />
      </main>
    </div>
    <!-- Footer -->
    <footer class="bg-gray-200 py-3 text-gray-600 text-sm text-center">
      © 2026 Library System
    </footer>
  </div>
</template>
