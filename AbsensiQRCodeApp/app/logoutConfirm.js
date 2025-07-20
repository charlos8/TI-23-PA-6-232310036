import { useRouter } from "expo-router";
import { Button, StyleSheet, Text, View } from "react-native";

export default function LogoutConfirm() {
  const router = useRouter();

  const handleConfirmLogout = () => {
    // Logika logout sesungguhnya di sini
    // (misalnya: menghapus token dari storage)

    // Setelah logout, arahkan kembali ke halaman login
    router.replace("/login");
  };

  const handleCancel = () => {
    // Kembali ke halaman sebelumnya (home/dashboard)
    router.back();
  };

  return (
    <View style={styles.container}>
      <Text style={styles.title}>Konfirmasi Logout</Text>
      <Text>Apakah Anda yakin ingin keluar?</Text>

      <View style={styles.buttonContainer}>
        <Button title="Ya, Keluar" onPress={handleConfirmLogout} color="red" />
        <Button title="Batal" onPress={handleCancel} />
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
    flexDirection: "row",
    justifyContent: "space-around",
    width: "100%",
  },
});
