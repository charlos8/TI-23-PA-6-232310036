import { router } from "expo-router";
import { useState } from "react";
import { ActivityIndicator, Alert, Image, StyleSheet, Text, TextInput, View } from "react-native";
import API from "../api/api"; // Menggunakan instance axios default
import CustomButton from "../components/CustomButton"; // Asumsikan komponen ini ada
import { saveToken } from "../utils/auth"; // Utilitas untuk menyimpan token

// Cek apakah gambar tersedia. Pastikan jalur ini benar.
// Struktur file Anda [cite: uploaded:Screenshot (94).png] menunjukkan assets sejajar dengan app.
let logoSource;
try {
  logoSource = require("../assets/logo-ibik.png"); // Pastikan nama file logo sesuai
} catch (e) {
  console.warn("Logo tidak ditemukan di ../assets/logo-ibik.png", e);
  logoSource = null;
}

const LoginScreen = () => {
  const [username, setUsername] = useState("hutagaol"); // Ini akan menjadi email
  const [password, setPassword] = useState("12345678");
  const [loading, setLoading] = useState(false);

  const handleLogin = async () => {
    if (!username || !password) {
      Alert.alert("Input Salah", "Username (Email) dan password wajib diisi.");
      return;
    }
    setLoading(true);
    try {
      // Mengirim email dan password ke endpoint /api/login Laravel
      const response = await API.post("/login", {
        email: username, // Mengirim 'email' sesuai harapan backend
        password: password,
      });

      if (response.data && response.data.access_token) {
        await saveToken(response.data.access_token);
        Alert.alert("Login Berhasil", "Selamat datang!");
        router.replace("/home"); // Arahkan ke halaman home setelah login
      } else {
        Alert.alert(
          "Login Gagal",
          "Token tidak diterima atau format respons salah."
        );
      }
    } catch (error) {
      // Menangani berbagai jenis error dari API
      console.error("Login Error:", error.response?.data || error.message);
      Alert.alert(
        "Login Gagal",
        error.response?.data?.message || // Pesan dari Laravel jika ada
          "Terjadi kesalahan saat login. Periksa kredensial atau koneksi server."
      );
    } finally {
      setLoading(false);
    }
  };

  return (
    <View style={styles.container}>
      <View style={styles.card}>
        {logoSource ? (
          <Image source={logoSource} style={styles.logo} />
        ) : (
          <Text style={{ marginBottom: 20, color: "#7A33CC" }}>
            Logo Tidak Ditemukan
          </Text>
        )}
        <Text style={styles.title}>Login For Attendance</Text>
        <TextInput
          style={styles.input}
          placeholder="Email Pengguna" // Ubah placeholder menjadi Email
          value={username}
          onChangeText={setUsername}
          autoCapitalize="none"
          keyboardType="email-address" // Keyboard type untuk email
        />
        <TextInput
          style={styles.input}
          placeholder="Password"
          secureTextEntry
          value={password}
          onChangeText={setPassword}
        />
        {loading ? (
          <ActivityIndicator size="large" color="#7A33CC" />
        ) : (
          <CustomButton
            title="Login"
            onPress={handleLogin}
            disabled={loading}
          />
        )}
      </View>
      <View style={styles.instituteInfo}>
        <Text style={styles.instituteText}>INSTITUT BISNIS</Text>
        <Text style={styles.instituteText}>INFORMATIKA KESATUAN</Text>
      </View>
    </View>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: "#7A33CC",
    justifyContent: "center",
    alignItems: "center",
  },
  card: {
    backgroundColor: "#FFFFFF",
    borderRadius: 15,
    padding: 25,
    alignItems: "center",
    shadowColor: "#000",
    shadowOffset: { width: 0, height: 4 },
    shadowOpacity: 0.1,
    shadowRadius: 6,
    elevation: 8,
    width: "80%",
    maxWidth: 400,
  },
  logo: {
    width: 100,
    height: 100,
    resizeMode: "contain",
    marginBottom: 20,
  },
  title: {
    fontSize: 22,
    fontWeight: "bold",
    marginBottom: 20,
    color: "#333",
  },
  input: {
    width: "100%",
    padding: 12,
    borderWidth: 1,
    borderColor: "#DDD",
    borderRadius: 8,
    marginBottom: 15,
    fontSize: 16,
  },
  instituteInfo: {
    position: "absolute",
    bottom: 50,
    alignItems: "center",
  },
  instituteText: {
    color: "#FFFFFF",
    fontSize: 18,
    fontWeight: "bold",
  },
});

export default LoginScreen;
