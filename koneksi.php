<?php
$servername = "localhost";
$username = "root";
$password = "";

$database = "tokoh_bunga";

//create connetion
$con = mysqli_connect($servername, $username, $password, $database);

//checck connection
if(!$con) {
    die("Connection gagal: " . mysqli_connect_error());
}
// echo "Connection sukses!";


//create connection
$cnn = new mysqli($servername, $username, $password, $database);
//check connection
if ($cnn->connect_error) { 
    die("Connection gagal: " . $cnn->connect_error);
}
// echo "Connection sukses!";


try{
    $onn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    //set the PDO eror mode to exception
    $onn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connection sukses!";
}
catch(PDOException $_e)
{
    echo "Connection gagal: " . $e->getMassage();
}

?>