<?php 
session_start();

if (isset($_SESSION['login'])) {
    echo "<script>alert('Logout Dahulu');</script>";
    echo "<script>window.location.replace('index.php');</script>";
}
include "config.php";

if(isset($_POST["login"])){
    $email = $_POST['Email'];
    $password= $_POST['Password'];

    // $sql = "SELET* FROM login WHERE email = '$email' AND password = '$password'";

    // $query = $cnn->query($sql);

    // $result = $query->fetch_assoc(); 

    $ambil = $con->query("SELECT * FROM login WHERE Email ='$email' AND Password = '$password'");

    if (mysqli_num_rows($ambil) === 1) {
        $row = mysqli_fetch_assoc($ambil);
        
        $_SESSION['login'] = true;
        $_SESSION['email'] = $row['Email'];
        echo "<script>alert('Berhasil Login');</script>";
        echo "<script>window.location.replace('index.php');</script>";
    } else {
        echo "<script>alert('Gagal Login');</script>";
        echo "<script>window.location.replace('login.php');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <form action="" method="post">
            <label>Email</label><br>
            <input type="text" name="Email"><br>
            <label>Password</label><br>
            <input type="password" name="Password"><br>
            <button type="submit" name="login">Log in</button>
        </form>
    </div>     
</body>
</html>