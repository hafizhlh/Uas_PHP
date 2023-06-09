<?php
include "koneksi.php";

if (isset($_POST['daftar'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek_user = mysqli_query($koneksi, "SELECT * FROM t_login WHERE username = '$username'");
    $cek_login = mysqli_num_rows($cek_user);

    if ($cek_login > 0) {
        echo "<script>
            alert('Username telah terdaftar');
            window.location = 'RegistrationSession.php';
        </script>";
    } else {
        $query = "INSERT INTO t_login (username, password) VALUES ('$username', '$password')";
        if (mysqli_query($koneksi, $query)) {
            echo "<script>
                alert('Registrasi telah berhasil');
                window.location = 'index.php';
            </script>";
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    }
}
?>

<head>
    <meta charset="UTF-8">
    <title>Project Uas</title>
    <link rel="stylesheet" href="style.css">
</head>

<div class="box">
    <span class="borderLine"></span>
    <form action="RegistrationSession.php" method="POST">
        <h2>-SIGN IN-</h2>
        <div class="inputBox">
            <input type="text" required="required" name="username">
            <span>Username</span>
            <i></i>
        </div>
        <div class="inputBox">
            <input type="password" required="required" name="password">
            <span>password</span>
            <i></i>
        </div>
        <input type="submit" value="sign in" name="daftar">
    </form>
</div>
