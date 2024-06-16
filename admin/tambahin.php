<?php
  include '../koneksi.php';

  $name = $_POST['name'];
  $price = $_POST['price'];
  $img = $_POST['img'];
  $desc = $_POST['desc'];
  $quantity = $_POST['quantity'];

  $sql = "INSERT INTO products VALUES ('', '$name', '$img', '$price', '$quantity', '$desc')";

  $data = mysqli_query($connect, $sql) or die(mysqli_error($connect));

  if($data){
    header("location: tambahdata.php?ket=success");
  } else{
    header("location: tambahdata.php?ket=gagal");
  }
?>