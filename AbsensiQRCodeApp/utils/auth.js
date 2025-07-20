// AbsensiQRCodeApp/utils/auth.js
import AsyncStorage from "@react-native-async-storage/async-storage";

const TOKEN_KEY = "user_auth_token";

export const saveToken = async (token) => {
  try {
    await AsyncStorage.setItem(TOKEN_KEY, token);
  } catch (e) {
    console.error("Gagal menyimpan token.", e);
  }
};

export const getToken = async () => {
  try {
    const token = await AsyncStorage.getItem(TOKEN_KEY);
    return token;
  } catch (e) {
    console.error("Gagal mengambil token.", e);
    return null;
  }
};

export const removeToken = async () => {
  try {
    await AsyncStorage.removeItem(TOKEN_KEY);
  } catch (e) {
    console.error("Gagal menghapus token.", e);
  }
};
