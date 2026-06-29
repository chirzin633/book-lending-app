import api from "./api.js";

const getMembers = () => {
  return api.get("/members");
};

const getMember = (id) => {
  return api.get(`/members/${id}`);
};
