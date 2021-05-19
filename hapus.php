<?php
include "../koneksi.php";

$id = $_GET['id'];

$sql = "DELETE FROM pendaftaran WHERE No_order = '$id'";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}