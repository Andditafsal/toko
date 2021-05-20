<?php
    include "koneksi.php";
    $sql = "SELECT * FROM pendaftaran";
$result = mysqli_query($cnn, $sql);

mysqli_close($cnn);
?>
<div>
    <a href="pendaftaran.php">Pendaftaran</a>
    <table border="1">
        <thead>
            <tr>
                <th>Jenis_bunga</th>
                <th>Harga</th>
                <th>Jml_pesan</th>
                <th>Ongkos_kirim</th>
                <th>Total_bayar</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <body>
        <?php
            while($row = mysqli_fetch_assoc($result)) {
            
                ?>
            <tr>
                <td><?php echo $row["Jenis_bunga"]?></td>
                <td><?php echo $row["Harga"]?></td>
                <td><?php echo $row["Jml_pesan"]?></td>
                <td><?php echo $row["Ongkos_kirim"]?></td>
                <td><?php echo $row["Total_bayar"]?></td>

                <td>
                    <a href="edit.php?id=<?php echo $row["No_order"]?>">Edit</a>
                    <a href="hapus.php?id=<?php echo $row["No_order"]?>">Hapus</a>
                </td>
            </tr>
            <?php
                }
            ?>
        </body>
    </table>
</div>