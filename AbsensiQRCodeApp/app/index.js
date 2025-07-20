import { Redirect } from "expo-router";

// Ini akan mengarahkan pengguna ke halaman login saat aplikasi pertama kali dibuka.
export default function App() {
  return <Redirect href="/login" />;
}
