<?php
 session_start();

 if(empty($_SESSION['username'])){
  header("location: login.php?pesan=belum_login");
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Studentic</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="./indexstyle.css">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary px-5 py-2 fs-5" style="background-color: #e3f2fd; box-shadow: 0px 8px 25px rgba(0,0,0,0.4); z-index: 1; width: 100%;">
    <div class="container-fluid justify-content-between">
      <a class="navbar-brand fs-3 text-primary" href="indexadmin.php"><b>Studentic</b></a>
      <a href="orderadmin.php" class="btn border-2" id="tombol-order">order</a>
      <a href="memberadmin.php" class="btn border-2" id="tombol-member">member</a>
      <a href="report.php" class="btn border-2" id="tombol-report">report</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>  
        <div>
          <a href="../../logout.php" class="btn btn-danger border-2" id="tombol-login">Logout</a>
        </div>
      </div>
    </div>
  </nav>
<!-- bungkus semua konten produk -->
<?php 
include '../koneksi.php';

$total_harga_hari=0;
$total_penjualan_hari=0;

$total_harga_bulan=0;
$total_penjualan_bulan=0;

$current_date = date('Y-m-d');

$query = mysqli_query($connect, "SELECT * FROM order_item WHERE date='$current_date'")or die(mysqli_error($connect));
while($data=mysqli_fetch_array($query)){
  $total_harga_hari+=$data['total_price']; 
  $total_penjualan_hari+=$data['quantity'];
}

$current_month = date('Y-m');

$query = mysqli_query($connect, "SELECT * FROM order_item WHERE date LIKE '$current_month%'")or die(mysqli_error($connect));
while($data=mysqli_fetch_array($query)){
  $total_harga_bulan+=$data['total_price'];
  $total_penjualan_bulan+=$data['quantity'];
}
?>

    <div class="py-3 px-5">

    <!-- PENDAPATAN HARI INI -->
      <div class="d-flex gap-3">
        <div class="kartu">
          <div class="card mt-2" style="width: 15rem; ">
            <div class="card-body">
              <h5 class="card-title">Pendapatan Hari Ini: </h5>
              <h5 class="card-title"><?=$total_harga_hari?></h5>
            </div>
          </div>
        </div>
        <div class="kartu2">
          <div class="card mt-2" style="width: 15rem; ">
            <div class="card-body">
              <h5 class="card-title">Penjualan Hari Ini: </h5>
              <h5 class="card-title"><?=$total_penjualan_hari?></h5>
            </div>
          </div>
        </div>
      </div>

      <!-- PENDAPATAN BULAN INI -->
      <div class="d-flex gap-3">
        <div class="kartu">
          <div class="card mt-2" style="width: 15rem; ">
            <div class="card-body">
              <h5 class="card-title">Pendapatan Bulan Ini: </h5>
              <h5 class="card-title"><?=$total_harga_bulan?></h5>
            </div>
          </div>
        </div>
        <div class="kartu2">
          <div class="card mt-2" style="width: 15rem; ">
            <div class="card-body">
              <h5 class="card-title">Penjualan Bulan Ini: </h5>
              <h5 class="card-title"><?=$total_penjualan_bulan?></h5>
            </div>
          </div>
        </div>
      </div>
        <!-- Tabel untuk menampilkan semua produk -->
  <table class="table">
    <thead>
      <tr>
        <th scope="col">order id</th>
        <th scope="col">product id</th>>
        <th scope="col">name</th>
        <th scope="col">quantity</th>
        <th scope="col">total price</th>
      </tr>
    </thead>
    <tbody>
      <?php
        include '../koneksi.php';
        $sql = "SELECT * FROM order_item";

        $data = mysqli_query($connect, $sql) or die(mysqli_error($connect));
        while($row = $data->fetch_object()){
      ?>
      <tr>
        <td><?= $row->order_id ?></td>
        <td><?= $row->product_id ?></td>
        <td><?= $row->name ?></td>
        <td><?= $row->quantity ?></td>
        <td><?= $row->total_price ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
  

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
  <script src="main.js"></script>
  <script src="https://kit.fontawesome.com/626c318560.js" crossorigin="anonymous"></script>


</body>
</html>