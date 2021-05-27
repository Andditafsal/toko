<?php
    session_start();
    if (!isset($_SESSION['login'])) {
        echo "<script>alert('Login Dahulu');</script>";
        echo "<script>window.location.replace('login.php');</script>";
    }
?>

<b>Selamat Datang di Toko Bunga</b> <b><?php echo $_SESSION['email']; ?></b> <br><a href="logout.php"> Logout </a></br>