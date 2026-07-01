import api from "./api";

const getLoans = () => {
  return api.get("/loans");
};

const getLoan = (id) => {
  return api.get(`/loans/${id}`);
};

export { getLoan, getLoans };
