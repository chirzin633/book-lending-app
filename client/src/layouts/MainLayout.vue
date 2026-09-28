<script setup>
import { ref } from "vue";
import { RouterLink, useRoute } from "vue-router";

const route = useRoute();
const isSidebarOpen = ref(false);

const navItems = [
  { to: "/", label: "Home" },
  { to: "/catalog", label: "Catalog" },
  { to: "/category", label: "Category" },
  { to: "/loans", label: "Loans" },
];

const closeSidebar = () => {
  isSidebarOpen.value = false;
};
</script>

<template>
  <div
    class="flex flex-col bg-neutral-50 dark:bg-neutral-900 min-h-screen text-neutral-900 dark:text-neutral-100 antialiased"
  >
    <!-- Header -->
    <header
      class="top-0 z-40 sticky bg-white/70 dark:bg-neutral-900/70 backdrop-blur-lg border-neutral-200/50 dark:border-neutral-800/50 border-b"
    >
      <div class="mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <div class="flex justify-between items-center h-16">
          <div class="flex items-center gap-4">
            <!-- Hamburger Menu -->
            <button
              @click="isSidebarOpen = !isSidebarOpen"
              class="lg:hidden hover:bg-neutral-100 dark:hover:bg-neutral-800 p-2 rounded-lg transition-colors"
              aria-label="Toggle sidebar"
            >
              <svg
                class="w-5 h-5"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  v-if="!isSidebarOpen"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"
                />
                <path
                  v-else
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </button>
            <h1 class="font-bold text-xl">Library Sistem</h1>
          </div>
        </div>
      </div>
    </header>

    <!-- Body -->
    <div class="flex flex-row flex-1 mx-auto w-full max-w-7xl">
      <transition name="fade">
        <div
          v-if="isSidebarOpen"
          @click="closeSidebar"
          class="lg:hidden z-30 fixed inset-0 bg-black/30 backdrop-blur-sm"
        ></div>
      </transition>
      <!-- Sidebar -->
      <transition name="slide">
        <aside
          v-show="isSidebarOpen"
          class="lg:block left-0 z-40 lg:static fixed inset-y-0 bg-white dark:bg-neutral-900 border-neutral-200/50 dark:border-neutral-800/50 border-r lg:translate-x-0"
          :class="
            isSidebarOpen
              ? 'translate-x-0'
              : '-translate-x-full lg:translate-x-0'
          "
        >
          <nav class="top-16 sticky space-y-1 p-4 pt-20 lg:pt-4">
            <RouterLink
              v-for="item in navItems"
              :key="item.to"
              :to="item.to"
              @click="closeSidebar"
              class="block px-3 py-2 rounded-lg font-medium text-sm transition-colors duration-200"
              :class="
                route.path === item.to
                  ? 'bg-neutral-900 text-white dark:bg-white dark:text-neutral-900'
                  : 'text-neutral-600 hover:bg-neutral-100 hover:text-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-white'
              "
            >
              {{ item.label }}
            </RouterLink>
          </nav>
        </aside>
      </transition>

      <!-- Main Content -->
      <main class="flex-1 px-4 sm:px-6 lg:px-6 py-8">
        <!-- <RouterView /> -->
        <router-view v-slot="{ Component }">
          <transition name="fade" mode="out-in">
            <component :is="Component" />
          </transition>
        </router-view>
      </main>
    </div>
    <!-- Footer -->
    <footer
      class="bg-white/50 dark:bg-neutral-900/50 backdrop-blur-sm border-neutral-200/60 dark:border-neutral-800/60 border-t"
    >
      <div class="mx-auto px-4 sm:px-6 lg:px-8 py-4 max-w-7xl">
        <div
          class="flex sm:flex-row flex-col justify-between items-center gap-4"
        >
          <p class="text-neutral-500 dark:text-neutral-400 text-sm">
            &copy; {{ new Date().getFullYear() }} Library System
          </p>
          <div class="flex space-x-6 text-sm">
            <a
              href="#"
              class="text-neutral-500 hover:text-neutral-900 dark:hover:text-white transition-colors"
              >Privacy</a
            >
            <a
              href="#"
              class="text-neutral-500 hover:text-neutral-900 dark:hover:text-white transition-colors"
              >Terms</a
            >
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<style>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.25s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

.slide-enter-active,
.slide-leave-to {
  transition: transform 0.3s ease;
}

.slide-enter-from,
.slide-leave-to {
  transform: translateX(-100%);
}
</style>
