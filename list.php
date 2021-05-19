<?php
    include "koneksi.php";
    $sql = "SELECT * FROM ol_bunga";
$result = mysqli_query($cnn, $sql);

mysqli_close($cnn);
?>
<div>
    <a href="pendaftaran.php">Pendaftaran</a>
    <table border="1">
        <thead>
            <tr>
                <th>no_order</th>
                <th>tgl_order</th>
                <th>nama_pemesan</th>
                <th>alamat</th>
                <th>telp</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <body>
        <?php
            while($row = mysqli_fetch_assoc($result)) {
            
                ?>
            <tr>
                <td><?php echo $row["no_order"]?></td>
                <td><?php echo $row["tgl_order"]?></td>
                <td><?php echo $row["nama_pemesan"]?></td>
                <td><?php echo $row["alamat"]?></td>
                <td><?php echo $row["telp"]?></td>

                <td>
                    <a href="edit.php?id=<?php echo $row["no_order"]?>">Edit</a>
                    <a href="#">Hapus</a>
                </td>
            </tr>
            <?php
                }
            ?>
        </body>
    </table>
</div>