<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="styless.css">

<head>
    <meta charset="UTF-8">
    <title>Tabel Resep Makanan</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: rgba(47, 49, 47, 0.6);
        }

        tr:nth-child(even) {
            background-color: rgba(47, 49, 47, 0.6);
        }
    </style>
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
    <h1>Tabel Resep Makanan</h1>
    <table>
        <tr>
            <th>NO</th>
            <th>Nama Resep</th>
            <th>Bahan</th>
            <th>Langkah-langkah</th>
            <th>Aksi</th>
        </tr>
        <?php
        include "koneksi.php";

        $query = "SELECT * FROM resep_makanan";
        $result = mysqli_query($koneksi, $query);

        if (mysqli_num_rows($result) > 0) {
            // $i = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                // $i++;
                $id = $row['id'];
                $name = $row['name'];
                $bahan = $row['ingredients'];
                $langkahLangkah = $row['step'];
                

                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$name</td>";
                echo "<td>";
                echo "<ul>";
                $bahanList = explode("\n", $bahan);
                foreach ($bahanList as $bahanItem) {
                    echo "<li>$bahanItem</li>";
                }
                echo "</ul>";
                echo "</td>";
                echo "<td>";
                echo "<ol>";
                $langkahList = explode("\n", $langkahLangkah);
                foreach ($langkahList as $langkahItem) {
                    echo "<li>$langkahItem</li>";
                }
                echo "</ol>";
                echo "</td>";
                echo "<td>";
                echo "<button onclick=\"window.location.href='edit.php?id=$id'\">Edit</button>";
                echo "<button onclick=\"hapusResep($id)\">Hapus</button>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Tidak ada resep makanan yang tersedia.</td></tr>";
        }

        mysqli_close($koneksi);
        ?>
    </table>

    <script>
        function hapusResep(id) {
            if (confirm("Apakah Anda yakin ingin menghapus resep ini?")) {
                window.location.href = "hapus.php?id=" + id;
            }
        }
    </script>
</body>

</html>
