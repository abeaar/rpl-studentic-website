<?php
  include '../koneksi.php';
  $user_id=$_GET['id'];
  $username = $_POST['username'];
  $password= $_POST['password'];
  $address = $_POST['address'];
  $jenis = $_POST['jenis'];

  $konek= mysqli_query($connect, "UPDATE user SET user_id = '$user_id', username='$username', password='$password', address='$address',
  jenis='$jenis' WHERE user_id = $user_id; ") or die (mysqli_error($connect));

if($konek){
    header("location: memberadmin.php");
  } else{
    header("location: memberadmin.php");
  }
  ?>