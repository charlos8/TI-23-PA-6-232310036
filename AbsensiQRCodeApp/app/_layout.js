import {
  DarkTheme,
  DefaultTheme,
  ThemeProvider,
} from "@react-navigation/native";
import { useFonts } from "expo-font";
import { Stack } from "expo-router";
import { StatusBar } from "expo-status-bar";
import { useColorScheme } from "../hooks/useColorScheme"; // Pastikan hooks/useColorScheme.js ada

export default function RootLayout() {
  const colorScheme = useColorScheme();
  const [loaded] = useFonts({
    SpaceMono: require("../assets/fonts/SpaceMono-Regular.ttf"),
  });

  if (!loaded) {
    return null;
  }

  return (
    <ThemeProvider value={colorScheme === "dark" ? DarkTheme : DefaultTheme}>
      <StatusBar style="auto" />
      <Stack>
        {/* Atur nama rute Anda di sini */}
        <Stack.Screen name="index" options={{ headerShown: false }} />
        {/* <Stack.Screen
          name="login"
          options={{ title: "Login", headerShown: false }}
        /> */}
        <Stack.Screen
          name="home"
          options={{ title: "Dashboard", headerShown: false }}
        />
        <Stack.Screen
          name="scanner"
          options={{ title: "QR Scanner", headerShown: false }}
        />
        <Stack.Screen
          name="userProfile"
          options={{ title: "Profile", headerShown: false }}
        />
        {/* <Stack.Screen
          name="logoutConfirm"
          options={{ title: "Logout", headerShown: false }}
        /> */}
        <Stack.Screen name="(tabs)" options={{ headerShown: false }} />
        <Stack.Screen name="+not-found" />
      </Stack>
    </ThemeProvider>
  );
}
