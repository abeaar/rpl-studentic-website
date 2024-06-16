<?php
  include '../koneksi.php';
  $id_product=$_GET['id'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $img = $_POST['img'];
  $quantity = $_POST['quantity'];
  $desc = $_POST['desc'];

  $konek= mysqli_query($connect, "UPDATE products SET product_id = '$id_product', name='$name', image='$img', quantity='$quantity',  
  price='$price', product_description='$desc' WHERE product_id=$id_product; ") or die (mysqli_error($connect));

if($konek){
    header("location: indexadmin.php");
  } else{
    header("location: indexadmin.php");
  }
  ?>