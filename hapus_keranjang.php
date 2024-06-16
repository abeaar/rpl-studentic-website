<?php
  session_start();
  include 'koneksi.php';

  $username = $_SESSION['username'];

  if(empty($_SESSION['username'])){
    header("location: login_page.php?pesan=belum_login");
  }

  $product_id = $_GET['product_id'];
  $user_id = $_GET['user_id'];

  $sql = "DELETE FROM cart WHERE product_id=$product_id AND user_id=$user_id";

  $data = mysqli_query($connect, $sql)or die(mysqli_error($connect));

  if($data){
    header("location: keranjang.php?ket=success");
  } else {
    header("location: keranjang.php?ket=gagal");
  }
?>