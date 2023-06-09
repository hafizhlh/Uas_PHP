<?php


require_once __DIR__ . "/koneksi.php";

if(isset($_POST)) {
    $query = mysqli_query($koneksi, "UPDATE resep_makanan SET name = '{$_POST['name']}', ingredients = '{$_POST['Bahan']}', step = '{$_POST['Langkah_langkah']}' WHERE id = {$_POST['id']}");
    
    if($query) {
        header("Location: lihatresep.php");
    } else {
        header("Location: edit.php?id={$_POST['id']}");
    }
}

header("Location: lihatresep.php");