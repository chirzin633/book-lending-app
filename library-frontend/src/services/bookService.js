import api from "./api";

const getBooks = async () => {
  return api.get("/books");
};

const getBook = async (id) => {
  return api.get(`/books/${id}`);
};

export { getBook, getBooks };
