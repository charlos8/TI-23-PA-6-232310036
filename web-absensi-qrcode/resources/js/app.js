import * as bootstrap from "bootstrap";

window.createQRCode = function (elementId, text) {
    const container = document.getElementById(elementId);
    if (container) {
        container.innerHTML = ""; // Membersihkan container sebelum menggambar QR baru

        // Gunakan QRCode global yang akan tersedia dari CDN
        // Penting: Pastikan qrcode.min.js dari CDN sudah dimuat sebelum app.js ini dieksekusi
        if (typeof QRCode === "function") {
            // Memastikan QRCode tersedia dan merupakan fungsi konstruktor
            new QRCode(container, {
                // Panggil konstruktor global QRCode
                text: text,
                width: 250,
                height: 250,
                colorDark: "#000000",
                colorLight: "#ffffff",
                correctLevel: QRCode.CorrectLevel.H, // Akses CorrectLevel dari global QRCode
            });
        } else {
            console.error(
                "Error: QRCode global constructor is not available. Check if qrcode.min.js is correctly loaded from CDN."
            );
        }
    } else {
        console.error("QR Code container element not found:", elementId);
    }
};
