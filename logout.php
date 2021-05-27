<?php
    session_start();

    if (!isset($_SESSION['login'])) {
        echo "<script>alert('Login Dahulu');</script>";
        echo "<script>window.location.replace('login.php');</script>";
    }
    
    session_destroy();

    echo "<script>alert('Berhasil Logout');</script>";
    echo "<script>window.location.replace('login.php');</script>";
?>