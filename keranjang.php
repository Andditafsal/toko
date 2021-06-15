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
        <h1 class="logo">Toko<span> Bunga</span></h1>
        <ul class="navbar">
            <li><a href='index.php'>Home</a></li>
            <li><a href=''>keranjang</a></li>
            <li><a href=''>Kategori</a></li>
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
    <table border="1" cellpadding="10" cellspacing="0" style="witdth:1200;">
    
    <thead style="background:#c0c0c0;">
        <tr>
            <th>No.</th>
            <th>Nma Bunga</th>
            <th>Harga</th>
            <th>jumlah</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 0; ?>
        <?php foreach ($_SESSION["keranjang"] as $id_bunga => $jumlah): ?>
            <?php
				$ambil = $con_object->query("SELECT * FROM bunga ");
				$yoyo = $ambil->fetch_assoc();

				$subharga = $yoyo["harga"] * $jumlah;
			?>
            <tr>
                <td><?php echo ++$no; ?></td>
                <td><?php echo $yoyo["nama"]; ?></td>
                <td>Rp. <?php echo number_format($yoyo['harga']); ?></td>
                <td><?php echo $jumlah; ?></td>
                <td>
                    <a href="hapusKeranjang.php?id_bunga=<?php echo $id_bunga ?>"> Hapus </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
    <tfoot>
        <tr>
            <td>
                <a href="index.php">Lanjutkan Belanja</a>
            </td>
            <td>
                <a href="checkout.php"> Checkout </a>
            </td>
        </tr>       
    </tfoot>
</table>
</div>
    <br>
    <footer class="footer-distributed">

      <div class="footer-left">

        <h3>Home Bunga</h3>
        
      </div>    

      <div class="footer-center">
      <div>
          
          <p>Telp. (0876) 45256</p>
          </div>
  
          <div>
            
          <p><span>Ds.Lohbener Blok Jembatan Merah Rt/Rw 23/05 No.25 Indramayu</p>
          </div>
  

        <div>
          
          <p><a href="mailto:tokoBunga@gmail.com">Tokobunga@gmail.com</a></p>
        </div>

    </div>

    <div class="footer-right">

        <p class="footer-company-about">
        <span>About</span>
        <h2>Hub.kami</h2>
        </p>

        <div class="footer-icons">

        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-whatsapp"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>


        </div>

      </div>

    </footer>
</body>

</html>