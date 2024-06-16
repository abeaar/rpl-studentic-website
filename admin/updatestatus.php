<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $order_id = $_POST['order_id'];
  $status = $_POST['status'];

  $sql = "UPDATE `order` SET status='$status' WHERE order_id='$order_id'";
  if (mysqli_query($connect, $sql)) {
    header("Location: orderadmin.php");
  } else {
    echo "Error updating record: " . mysqli_error($connect);
  }
}
?>
