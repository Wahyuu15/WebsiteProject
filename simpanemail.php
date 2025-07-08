<?php
// Panggil koneksi
include 'Koneksi.php';

// Ambil email dari form
$email = $_POST['email'];

// Masukkan ke tabel newsletter pakai prepared statement
$sql = "INSERT INTO newsletter (email) VALUES (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);

if ($stmt->execute()) {
    echo "Terima kasih! Email Anda berhasil didaftarkan.";
} else {
    echo "Terjadi kesalahan: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
