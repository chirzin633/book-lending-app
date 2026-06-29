<script setup>
import { ref } from "vue";
const count = ref(0);

const tambah = () => {
  count.value++;
};

const kurang = () => {
  if (count.value === 0) {
    return;
  }
  count.value--;
};
</script>

<template>
  <div class="flex flex-col justify-center items-center gap-3 min-h-screen">
    <h1 class="font-bold text-teal-600 text-3xl text-center uppercase">
      Ini halaman front end
    </h1>

    <p class="font-bold text-center">
      Count : <span class="text-red-400">{{ count }}</span>
    </p>

    <div class="flex justify-center gap-2">
      <button
        @click="tambah"
        class="bg-slate-400 px-3 py-1 w-10 cursor-pointer"
      >
        +
      </button>
      <button
        @click="kurang"
        class="bg-slate-400 px-3 py-1 w-10 cursor-pointer"
      >
        -
      </button>
    </div>
  </div>
</template>
