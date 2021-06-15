<?php
require_once 'connection/koneksi.php';
?>
<html>

<head>
    <title>Toko bunga</title>
    <link rel='stylesheet' href="css/index.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>

<body>

    <div class='header'>
        <h1 class="logo">Toko <span>Bunga</span> </h1>
        <ul class="navbar">
            <li><a href='index.php'>Home</a></li>
            <li><a href=''>katagori</a></li>
            <li><a href=''>Keranjang</a></li>
            <li>
                <?php
                if (isset($_SESSION['login'])) { ?>
                    <a href="logout.php"><?= $_SESSION['nama']; ?></a>
                <?php
                } else {
                ?>
                    <a href="login.php">Login</a>
                <?php
                }
                ?>
            </li>
        </ul>
    </div>

    <div class="gambar">

        <?php
        $sql = $con_object->query("SELECT * FROM bunga");
        $rows = $sql->num_rows;
        if ($rows > 0) {
            while ($data = mysqli_fetch_assoc($sql)) { ?>

                <div class='foto'>
                    <div style="width: 100%;height: 200px;background-image: url('<?php echo 'admin/pages/produk/gambar/' . $data['gambar']; ?>'); background-repeat: no-repeat;background-attachment: contain;background-position: center;background-size: contain;"></div>
                    <h1><?php echo $data['nama']; ?></h1>
                    <p>Harga <?php echo $data['harga']; ?></p>
                    <a href="beli.php?id_bunga=<?= $data['id_bunga']; ?>"> Beli Sekarang  </a>
                </div>

        <?php
            }
        }
        ?>

</div>
        
    <footer class="footer-distributed">

      <div class="footer-left">

        <h3>Home Bunga</h3>
        
      </div>

      <div class="footer-center">

      <div>
          
          <p><a href="mailto:tokoBunga@gmail.com">TokoBunga@gmail.com</a></p>
        </div>

        <div>
          
        <p>Telp. (0876) 45256</p>
        </div>

        <div>
          
        <p><span>Ds.Lohbener Blok Jembatan Merah Rt/Rw 23/05 No.25 Indramayu</p>
        </div>

      </div>

      <div class="footer-right">

        <p class="footer-company-about">
          <span>About</span>
        Hub.Kami
        </p>

        <div class="footer-icons">

          <a href="#"><i class="fab fa-whatsapp"></i></a>
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          

        </div>

      </div>

    </footer>
</body>

</html>