import { createRouter, createWebHistory } from "vue-router";
import HomePage from "../pages/HomePage.vue";
import CatalogPage from "../pages/CatalogPage.vue";
import CategoryPage from "../pages/CategoryPage.vue";
import LoanPage from "../pages/LoanPage.vue";

const routes = [
  { path: "/", component: HomePage },
  { path: "/catalog", component: CatalogPage },
  { path: "/categories", component: CategoryPage },
  { path: "/loans", component: LoanPage },
];

export const router = createRouter({
  history: createWebHistory(),
  routes,
});
