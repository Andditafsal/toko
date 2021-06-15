<?php

include_once 'connection/koneksi.php';

if (isset($_POST['submit'])) {
    $user_id = $_POST['user_id'];
    $produk_id = $_POST['produkk_id'];
    $qty = $_POST['qty'];
    $sub_total = $_POST['sub_total'];

    $sql = $con_object->query("INSERT INTO checkout (user_id,produk_id,qty,sub_total) VALUES ($user_id,$produk_id,$qty,$sub_total)");
    if ($sql) {
        echo "<script>alert('Checkout Berhasil!')
        window.location.href = 'index.php'</script>";
        return;
    } else {
        echo "<script>alert('Checkout Gagal!')
        window.location.href = 'index.php'</script>";
        return;
    }
}
