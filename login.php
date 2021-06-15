<?php
require_once 'connection/koneksi.php';

if (isset($_SESSION['login'])) {
    if ($_SESSION['role'] == 1) {
        echo "<script>window.location.href = 'admin/index.php'</script>";
        return;
    }
    echo "<script>window.location.href = 'index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        form{
            display:flex;
            border-radius:20px;
           
        }
        .container{
            border-radius:20px;
        }
        .container label {
            text-align: left;
            color: black;
        }
        .container .form input {
            width: 100%;
            height: 40px;
            padding: 5px 0;
            border: none;
            background-color: #752bea;
            font-size: 18px;
            color: #fafafa;
            border-radius: 20px;
            text-align: left;
        }
        .btn_login{
            background:  #752bea;
            width:150px;
            margin:20px 120px;
            color:white;
            font-size:24px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>login</h1>

        <form action="" class="form" method="POST">
            <div class="konten">
            <label for="#username">Username</label>
            <input type="text" name="username" id="username" required><br>

            <label for="#username">Password</label>
            <input type="password" name="password" id="password"  required>

            <hr>
            <button class="btn_login" type="submit" name="btn-login" value="LOGIN">login</button>
            <!-- <input type="submit" class="tombol_login" name="btn-login" value="LOGIN"> -->
            <p>belum punya akun? <a href="register.php">Register disini</a></p>
        </form>
        </div>
    </div>

    <?php
        if (isset($_POST["btn-login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = $con_object->query("SELECT * FROM user WHERE username = '$username'  " );

        if (mysqli_num_rows($result) === 1) {
            $data = mysqli_fetch_assoc($result);
            if (password_verify($password, $data['password'])) {
                $_SESSION['username'] = $data['username'];
                $_SESSION['nama'] = $data['nama'];
                $_SESSION['role'] = $data['role'];
                $_SESSION['login'] = true;
                if ($data['role'] == 1) {
                    echo "<script>alert('Selamat Datang, Admin!');</script>";
                    echo "<script>window.location.replace('admin/index.php');</script>";
                    return;
                }

                echo "<script>alert('Berhasil Login');</script>";
                echo "<script>window.location.replace('index.php');</script>";
            } else {
                echo "<script>alert('Password Salah');</script>";
                echo "<script>window.location.replace('login.php');</script>";
            }
        } else {
            echo "<script>alert('Gagal Login')</script>";
            echo "<script>window.location.replace('login.php');</script>";
        }
    }

    ?>
</body>

</html>