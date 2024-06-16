<?php
  session_start();

  $username = $_SESSION['username'];

  if(empty($_SESSION['username'])){
    header("location: login_page.php?pesan=belum_login");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bukan Bima</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap');

    body{
      font-family: 'Poppins', sans-serif;
    }
  </style>

  <div class="d-flex justify-content-center align-items-center flex-column" style="height: 100vh; background-color: #61A3BA">
  <?php
    if(isset($_GET['ket'])){
      if($_GET['ket'] === 'success'){
        print'<div style="width: 60vh; margin-bottom: 16px; text-align: center; border-radius: 6px; background-color: #C7DCA7;">';
          print'<h5 class="p-2 m-0" style="font-size: 18px;">Proses Berhasil!</h5>';
          print'</div>';
        } else {
          print'<div style="width: 60vh; margin-bottom: 16px; text-align: center; border-radius: 6px; background-color: #f7dddc;">';
          print'<h5 class="p-2 m-0" style="font-size: 18px;">Proses Gagal!</h5>';
          print'</div>';
        }
      }
    ?>
    <div class="d-flex justify-content-center p-4 flex-column" style="border: 4px solid #D0D4CA; border-radius: 12px; background-color: white;">
      <h1 class="text-center mb-5"><b>Keranjang Anda</b></h1>
      <table class="table" style="width: 100vh;">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama barang</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Harga</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php
          include 'koneksi.php';
          $username = $_SESSION['username'];

          $sql_username = "SELECT * FROM user WHERE username = '$username'";
          $data_user = mysqli_query($connect, $sql_username) or die(mysqli_error($connect));
          while($row = $data_user->fetch_object()){
            $id_user = $row->user_id;
          }
          
          $sql = "SELECT product_id, name, SUM(quantity) as quantity, SUM(total_price) as total_price FROM cart WHERE user_id=$id_user GROUP BY product_id";
          $data = mysqli_query($connect, $sql)or die(mysqli_error($connect));
          $count=1;
          $total=0;
          while($row = $data->fetch_object()){
          ?>
          <tr>
            <th scope="row"><?php print $count++; ?></th>
            <td><?=$row->name?></td>
            <td><?=$row->quantity?></td>
            <td>Rp<?=$row->total_price?></td>
            <td>
              <a href="./hapus_keranjang.php?product_id=<?=$row->product_id?>&user_id=<?php echo $id_user ?>" class="btn btn-danger border-2" id="tombol-login">Hapus</a>
            </td>
          </tr>
          <?php
            $total += $row->total_price;
            }
          ?>
          <tr>
            <th scope="row"></th>
            <td><b class="fs-4">TOTAL HARGA</b></td>
            <td></td>
            <td><b class="fs-4">Rp<?=$total?></b></td>
            <td></td>
          </tr>
        </tbody>
      </table>
      <div class="d-flex align-items-center flex-column">
        <a href="checkout.php?id=<?=$id_user?>&total=<?=$total?>" class="mt-3 w-100">
          <button type="submit" class="btn btn-primary logb w-100">CHECKOUT</button>
        </a>
        <a href="index.php" class="mt-2 d-flex justify-content-center text-decoration-none">
          <button type="submit" class="btn btn-outline-danger loga">Kembali</button>
        </a>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>