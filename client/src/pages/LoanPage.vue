<script setup>
import { onMounted, ref } from "vue";
import LoanItem from "../components/LoanItem.vue";
import { getLoans } from "../services/loanService.js";

const loans = ref([]);

onMounted(async () => {
  const res = await getLoans();
  loans.value = res.data;
});
</script>

<template>
  <div>
    <h1 class="mb-4 font-bold text-2xl">Loans</h1>
    <div class="space-y-3">
      <LoanItem v-for="loan in loans" :key="loan.id" :loan="loan" />
    </div>
  </div>
</template>
