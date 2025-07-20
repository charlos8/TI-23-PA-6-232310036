import { useRouter } from "expo-router";
import { Button, StyleSheet, Text, View } from "react-native";

export default function Home() {
  const router = useRouter();

  const handleLogout = () => {
    // Navigasi ke halaman logout confirm atau langsung logout
    router.push("/logoutConfirm");
  };

  const handleScan = () => {
    // Navigasi ke halaman scanner
    router.push("/scanner");
  };

  return (
    <View style={styles.container}>
      <Text style={styles.title}>Dashboard</Text>
      <Text>Selamat datang di aplikasi absensi QR Code.</Text>

      <View style={styles.buttonContainer}>
        <Button title="Pindai QR Code" onPress={handleScan} />
        <Button title="Logout" onPress={handleLogout} color="red" />
      </View>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    justifyContent: "center",
    alignItems: "center",
    padding: 20,
  },
  title: {
    fontSize: 24,
    fontWeight: "bold",
    marginBottom: 20,
  },
  buttonContainer: {
    marginTop: 30,
    width: "100%",
    gap: 10,
  },
});
