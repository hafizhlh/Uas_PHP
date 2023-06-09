<!DOCTYPE html>
<html>
<head>
    <title>Tambah Resep Makanan</title>
    <link rel="stylesheet" href="styless.css">
</head>
<body>
    <div class="container">
        <h1>Ciliwung memasak</h1>
        <div class="navbar">
            <ul>
                <li><a href="menu.html" target="_blank">Home</a></li>
                <li><a href="tambahresep.php">Tambahkan resep</a></li>
                <li><a href="lihatresep.php" target="_blank">Lihat resep</a></li>
                <li class="nav-item"><a class="nav-link active" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>

<?php
include "koneksi.php"; // Masukkan file koneksi.php sesuai dengan konfigurasi Anda

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mendapatkan data resep berdasarkan ID
    $query = "SELECT * FROM resep_makanan WHERE id = $id";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $bahan = $row['ingredients'];
        $langkahLangkah = $row['step'];
        $gambar = $row['gambar'] ?? '';

        // Tampilkan form untuk mengedit resep
        echo "<h1>Edit Resep</h1>";
        echo "<form method='POST' action='proses_edit.php'>";
        echo "<input type='hidden' name='id' value='$id'>";
        echo "<label>Nama Resep:</label>";
        echo "<input type='text' name='name' value='$name'><br>";
        echo "<label>Bahan:</label>";
        echo "<textarea name='Bahan'>$bahan</textarea><br>";
        echo "<label>Langkah-langkah:</label>";
        echo "<textarea name='Langkah_langkah'>$langkahLangkah</textarea><br>";
        echo "<label>Gambar:</label>";
        echo "<input type='file' name='gambar'><br>";
        echo "<input type='submit' name='submit' value='Simpan'>";
        echo "</form>";
    } else {
        echo "Resep tidak ditemukan.";
    }
}

mysqli_close($koneksi);
?>
</html>