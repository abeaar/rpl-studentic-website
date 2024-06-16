<?php
  include './koneksi.php';

  $order_id = $_GET['order_id'];

  $sql = "UPDATE `order` SET status='selesai' WHERE order_id='$order_id'";
  if (mysqli_query($connect, $sql)) {
    header("Location: transaksi.php?ket=success");
  } else {
    header("Location: transaksi.php?ket=gagal");
  }
?>