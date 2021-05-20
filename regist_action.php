<?php 

include 'koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$username = $_POST['username'];
$password =md5($_POST['password']);

if($nama !='' && $email !=''&& $alamat !=''&& $username !='' && $password !='' ){

    $sql ="INSERT INTO user (nama , username, email , alamat, password ) VALUES ( '$nama' ,'$username', '$email' ,'$alamat', '$password')";
    
    $qry = mysqli_query($con , $sql);
    
    if($qry){
        header('location:login.php');
    }
}
else{
    echo "
    <script> alert('Data Harus Diisi!'); 
    window.location='register.php';
    </script>";
}

?>
