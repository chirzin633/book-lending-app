import { createRouter, createMemoryHistory } from "vue-router";
import HomePage from "../pages/HomePage.vue";

const routes = [
  { path: "/", component: HomePage },
  { path: "/catalog" },
  { path: "/categories" },
  { path: "/loans" },
];

export const router = createRouter({
  history: createMemoryHistory(),
  routes,
});
