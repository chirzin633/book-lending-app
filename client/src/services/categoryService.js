import api from "./api.js";

const getCategories = () => {
  return api.get("/categories");
};

const getCategory = (id) => {
  return api.get(`/categories/${id}`);
};

export { getCategory, getCategories };
