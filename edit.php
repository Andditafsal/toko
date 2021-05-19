<?php
include "koneksi.php";
$sql = "SELECT * FROM pendaftaran WHERE No_order = '$_GET[id]'";
$result = mysqli_query($cnn, $sql);
$row = mysqli_fetch_assoc($result);

// echo

mysqli_close($cnn);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form daftar</title>
</head>
<body>
<form action="" method="POST">
        <fieldset>
        <legend>Pendaftaran</legend>
        <p>
            <label>no_order:</label>
            <input type="text" name="no_order" placeholder="no_order..." value="<?php echo $row["no_order"]?>" />
        </p>
        <p>
            <label>tgl_order:</label>
            <input type="text" name="tgl_order" placeholder="tgl_order... "value="<?php echo $row["tgl_order"]?>" />
        </p>

        <p>
        <label>nama_pemesan:</label>
            <input type="text" name="nama_pemesan" placeholder="nama_pemesan..."value="<?php echo $row["nama_pemesan"]?>"  />
        </p>

        <p>
        <label>alamat:</label>
            <input type="text" name="alamat" placeholder="alamat..."value="<?php echo $row["alamat"]?>" />
        </p>

        <p>
        <label>telp:</label>
            <input type="text" name="telp" placeholder="telp..."value="<?php echo $row["telp"]?>"  />
        </p>
        <p>
            <input type="submit" name="submit" value="Daftar" />
        </p>
        </fieldset>
    </form>
</body>
</html>

<?php
include "koneksi.php";

if (isset($_POST['submit'])) {
    $no_order = $_POST["no_order"];
    $tgl_order = $_POST["tgl_order"];
    $nama_pemesan = $_POST["nama_pemesan"];
    $alamat = $_POST["alamat"];
    $telp = $_POST["telp"];

    $sql = "INSERT INTO pendaftaran (no_order, tgl_order,nama_pemesan,alamat,telp) VALUES ('$no_order', '$tgl_order','$nama_pemesan','$alamat','$telp')";

    if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

mysqli_close($con);
?>