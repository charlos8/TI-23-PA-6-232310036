import { StyleSheet, Text, View } from "react-native";

export default function Scanner() {
  // Ini adalah placeholder untuk pemindai QR Code.
  // Implementasi kamera dan pemindaian akan ditambahkan di sini.

  return (
    <View style={styles.container}>
      <Text style={styles.title}>Pemindai QR Code</Text>
      <Text>
        Akan mengimplementasikan kamera untuk memindai QR code di sini.
      </Text>
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
});
