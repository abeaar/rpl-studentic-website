<?php
session_start();
include 'koneksi.php';

$username=$_POST['username'];
$password=$_POST['password'];

$data=mysqli_query($connect, "SELECT * FROM user WHERE username='$username' AND password='$password'")or die (mysqli_error($connect));
$dt=mysqli_fetch_array($data);
$cek=mysqli_num_rows($data);

if($cek > 0){
    $_SESSION['username']= $username;
    $_SESSION['status']= "login";
    if ($dt['jenis']=='admin') {
        header("location:admin/indexadmin.php");
    }

    else{
        header("location:index.php");}
}

else{
    header("location:login.php?pesan=gagal");
}
?>