import api from "./api.js";

export const getCategories = () => {
  return api.get("/categories");
};

export const getCategory = (id) => {
  return api.get(`/categories/${id}`);
};
