<?php
session_start();

// Hapus semua variabel sesi
$_SESSION = array();

// Hancurkan sesi
session_destroy();

// Arahkan pengguna ke halaman login (misalnya login.php)
header('Location: index.php');
exit();
?>
