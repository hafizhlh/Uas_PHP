<?php
include "koneksi.php"; // Masukkan file koneksi.php sesuai dengan konfigurasi Anda

if (isset($_POST['submit'])) {
    $name = $_POST['nama'];
    $bahan = $_POST['bahan'];
    $step = $_POST['langkah'];

    $query = "INSERT INTO resep_makanan (`name`, `ingredients`, `step`) VALUES ('{$name}', '{$bahan}', '{$step}')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "Resep berhasil ditambahkan.";
    } else {
        echo "Terjadi kesalahan saat menambahkan resep.";
    }
}
?>
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
    <h1>Tambah Resep Makanan</h1>
    
    <form method="POST" action="tambahresep.php" enctype="multipart/form-data">
        <div class="form-row">
            <label>Nama Resep:</label>
            <input type="text" name="nama" required>
        </div>
        
        <div class="form-row">
            <label>Bahan:</label>
            <textarea name="bahan" required></textarea>
        </div>
        
        <div class="form-row">
            <label>Langkah-langkah:</label>
            <textarea name="langkah" required></textarea>
        </div>
        
        <div class="form-row">
            <input type="submit" name="submit" value="Tambah Resep">
        </div>
    </form>
</body>
</html>
