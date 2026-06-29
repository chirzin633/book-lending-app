import api from "./api";

const getBooks = () => {
  return api.get("/books");
};

const getBook = (id) => {
  return api.get(`/books/${id}`);
};
