<?php
  include 'koneksi.php';
  session_start();


  $username = $_SESSION['username'];

  $name = $_GET['name'];
  $price = $_GET['price'];
  $quantitybuy = $_GET['quantitybuy'];
  $quantity = $_GET['quantity'];
  $quantity_final = $quantity-$quantitybuy;
  $total_price = $price*$quantitybuy;
  $id_product = $_GET['id'];

  if($quantity==0){
    header("location: details.php?id=".$id_product."&ket=gagal");
  }

  if(empty($_SESSION['username'])){
    header("location: details.php?id=".$id_product."&ket=belum_login");
  } else{
      $sql_username = "SELECT * FROM user WHERE username = '$username'";
      $data_user = mysqli_query($connect, $sql_username) or die(mysqli_error($connect));
      while($row = $data_user->fetch_object()){
        $id_user = $row->user_id;
      }
      
      $sql_cart = "INSERT INTO cart (user_id, product_id, name, quantity, total_price) VALUES ('$id_user', '$id_product', '$name', '$quantitybuy', '$total_price')";
      $sql_update = "UPDATE products SET quantity=$quantity_final WHERE product_id=$id_product";

      $data_user = mysqli_query($connect, $sql_cart) or die(mysqli_error($connect));

      $data = mysqli_query($connect, $sql_update) or die(mysqli_error($connect));
      
      if($data_user){
        header("location: details.php?id=".$id_product."&ket=success");
      } else{
        header("location: details.php?id=".$id_product."&ket=gagal");
      }
    }
?>