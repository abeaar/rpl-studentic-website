<?php
  include 'koneksi.php';
  session_start();

  $username = $_SESSION['username'];

  if(empty($_SESSION['username'])){
    header("location: login_page.php?pesan=belum_login");
  }

  $id_user = $_GET['id'];
  $total_harga = $_GET['total'];

  $sql = "SELECT product_id, name, SUM(quantity) as quantity, SUM(total_price) as total_price FROM cart WHERE user_id=$id_user GROUP BY product_id";

  $data = mysqli_query($connect, $sql)or die(mysqli_error($connect));


  $date = date('Y/m/d H:i:s');
  $datefix = str_replace([' ', '/', ':'], '', $date);

  $order_id = $id_user.$datefix;

  $sql_add = "INSERT INTO `order` VALUES ('$order_id', $id_user, $total_harga, 'menunggu')";

  $cek = mysqli_query($connect, $sql_add)or die(mysqli_error($connect));

  $input_date = date("Y-m-d");
  // $input_date_fix = str_replace('/', '-', $input_date);

  if($data){
    while($row = $data->fetch_object()){
      $sql_add_item = "INSERT INTO order_item VALUES ($order_id, $row->product_id, '$row->name', $row->quantity, $row->total_price, '$input_date')";

      $add = mysqli_query($connect, $sql_add_item)or die(mysqli_error($connect));
    }

    $sql_delete = "DELETE FROM cart WHERE user_id=$id_user";

    mysqli_query($connect, $sql_delete)or die(mysqli_error($connect));

    //ganti ke qris
    header("location: qris.php?ket=success");

  } else {
    header("location: keranjang.php?ket=gagal");
  }