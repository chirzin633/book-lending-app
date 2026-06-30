import { createRouter, createMemoryHistory } from "vue-router";
import HomePage from "../pages/HomePage.vue";
import CatalogPage from "../pages/CatalogPage.vue";

const routes = [
  { path: "/", component: HomePage },
  { path: "/catalog", component: CatalogPage },
  { path: "/categories" },
  { path: "/loans" },
];

export const router = createRouter({
  history: createMemoryHistory(),
  routes,
});
