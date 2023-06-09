<?php
include "koneksi.php"; // Masukkan file koneksi.php sesuai dengan konfigurasi Anda

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM resep_makanan WHERE id = $id";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: lihatresep.php");
    } else {
        echo "Terjadi kesalahan saat menghapus resep.";
    }
}

mysqli_close($koneksi);
?>
