<script setup>
defineProps({
  loan: {
    type: Object,
    required: true,
  },
});
</script>

<template>
  <div class="bg-white mb-2 p-3 border border-gray-200 rounded">
    <p class="font-medium text-gray-800">{{ loan.book?.title }}</p>
    <p class="text-gray-600">{{ loan.member?.name }}</p>
    <p
      class="text-sm"
      :class="loan.return?.date ? 'text-green-600' : 'text-red-600'"
    >
      Status : {{ loan.return_date ? "Dikembalikan" : "Dipinjam" }}
    </p>
  </div>
</template>
