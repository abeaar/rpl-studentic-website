<?php

include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$repassword=$_POST['repassword'];
$address=$_POST['address'];

$cek = 0;

$sql = "INSERT INTO user VALUES('', '$username', '$password', '$address', 'customer')";
$cek_username = "SELECT username FROM user WHERE username='$username'";

$data_user = mysqli_query($connect, $cek_username) or die(mysqli_error($connect));
while($row = $data_user->fetch_object()){
    $cek = 1;
}
    
if ($password==$repassword && $cek==0) {
    $konek = mysqli_query($connect, $sql) or die (mysqli_error($connect));
    header("location: login.php");
}
else {
    header("location: register.php?pesan=gagal");
}