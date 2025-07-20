import axios from "axios";

// Ganti IP di bawah sesuai IP komputer Anda!
const API_URL = "http://192.168.1.5:8000/api";

const api = axios.create({
  baseURL: API_URL,
  headers: {
    Accept: "application/json",
    "Content-Type": "application/json",
  },
});

export default api;
