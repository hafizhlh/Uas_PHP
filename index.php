<?php
include "koneksi.php"; 
if (isset($_POST['proseslog'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM t_login WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $sql);

    $cek = mysqli_num_rows($result);
    if ($cek > 0) {
        $_SESSION['username'] = $username;
        header('Location: menu.html');
        exit();
    } else {
        echo "<script>
            alert('Username dan Password Salah!');
            window.location = 'index.php';
        </script>";
    }
}

if (isset($_POST['registrasi'])) {
    header('Location: RegistrationSession.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Uas</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    
    <div class="box">
        <span class="borderLine"></span>
        <form action="" method="POST">
            <h2>-LOGIN HERE-</h2>
            <div class="inputBox">
                <input type="text" required="required" name="username">
                <span>Username</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" required="required" name="password">
                <span>Password</span>
                <i></i>
            </div>
            <div class="button-container">
                <input type="submit" value="Login" name="proseslog">
                <input type="submit" value="Sign In" name="Sign In" onclick="location.href='RegistrationSession.php';">
            </div>
        </form>
    </div>
</body>

</html>
