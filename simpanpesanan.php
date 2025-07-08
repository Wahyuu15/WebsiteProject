<?php
include "Koneksi.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama      = $_POST["nama"];
    $no_wa     = $_POST["no_wa"];
    $nama_alat = $_POST["nama_alat"];
    $jumlah    = (int)$_POST["jumlah"];
    $catatan   = $_POST["catatan"];

    $sql = "INSERT INTO pemesanan (nama, no_wa, nama_alat, jumlah, catatan) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssis", $nama, $no_wa, $nama_alat, $jumlah, $catatan);

    if ($stmt->execute()) {
        echo "<script>alert('Pesanan berhasil dikirim!'); window.location='form_pemesanan.html';</script>";
    } else {
        echo "Gagal menyimpan pesanan: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
