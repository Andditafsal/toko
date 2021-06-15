<section width="150%">
  
    <table border="1" cellpadding="10" cellspacing="0" width="115%" height="60%">
        <thead style="background-color:#cf31ff">
            <tr>
                <th>No.</th>
                <th>nama_bunga</th>
                <th>Gambar</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor = 0;
            $sql = "SELECT * FROM bunga ORDER BY id_bunga ASC";
            $result = $con_object->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo ++$nomor; ?>.</td>
                        <td><?php echo $row['nama']; ?></td>
                        <td>
                            <img src="pages/produk/gambar/<?php echo $row['gambar']; ?>" width="100" alt="">
                        </td>
                        <td><?php echo $row['harga'] ?></td>
                        <td>
                            <a href="?page=edit-data&id_bunga=<?php echo $row['id_bunga']; ?>"><button style="background-color:yellow; border-radius:25px; color:black">Edit</button></a> &bull;
                            <form style="display: inline;" method="POST">
                                <input type="hidden" name="id_bunga" value="<?php echo $row['id_bunga']; ?>">
                                <button style="background-color:red; border-radius:25px; color:white" onclick="return confirm('Yakin ? Anda Ingin Menghapus Data Ini ?')" type="submit" name="btn-hapus">
                                    Hapus
                                </button>
                            </form>
                        </td>
                     
                    </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='6'><b><i>Note : Data Tidak Ada</i></b></td></tr>";
            }
            ?>
        </tbody>
    </table>
        </section>

<?php
if (isset($_POST['btn-hapus'])) {
    $id_bunga = $_POST['id_bunga'];

    $sql = "DELETE FROM bunga WHERE id_bunga = $id_bunga";

    if ($con_object->query($sql) === TRUE) {
        echo "<script>alert('Data Berhasil di Hapus');</script>";
        echo "<script>window.location.replace('?page=produk');</script>";
        exit;
    } else {
        echo "<script>alert('Data Gagal di Hapus');</script>";
        echo "<script>window.location.replace('?page=produk');</script>";
        exit;
    }
}
?>