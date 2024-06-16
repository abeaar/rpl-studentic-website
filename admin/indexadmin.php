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
          <a href="../logout.php" class="btn btn-danger border-2" id="tombol-login">Logout</a>
        </div>
      </div>
    </div>
  </nav>
<!-- bungkus semua konten produk -->
<div class="py-3 px-5">
  <!-- Tabel untuk menampilkan semua produk -->
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Nama Produk</th>
        <th scope="col">Harga</th>
        <th scope="col">Stock</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
        include '../koneksi.php';
        $sql = "SELECT * FROM products";

        if(isset($_GET['search'])){
          $cari = $_GET['search'];
          $sql = "SELECT * FROM products WHERE name LIKE '%$cari%'";
        } 

        $data = mysqli_query($connect, $sql) or die(mysqli_error($connect));
        while($row = $data->fetch_object()){
      ?>
      <tr>
        <td><?= $row->name ?></td>
        <td>Rp<?= $row->price ?></td>
        <td><?= $row->quantity ?></td>
        <td>
          <a role="button" class="btn btn-primary" href="editdata.php?id=<?= $row->product_id ?>">edit</a>
          <a role="button" class="btn btn-danger" href="hapus.php?id=<?= $row->product_id ?>" style="text-decoration:none" onClick="return confirm('Apakah anda yakin ingin menghapus tersebut??')">hapus</a>

        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
  <div class="d-flex flex-column gap-2" style="position: fixed; right: 0; bottom: 0; z-index: 2; margin-right: 100px; margin-bottom: 100px;">
    <a href="tambahdata.php">
      <div class="d-flex justify-content-center align-items-center" style="width: 60px; Height: 60px; position: fixed; background-color: #316CF4; border-radius: 50%;" id="animasi">
        <h1 style="color: white; font-size: 42px; padding: 0;">+</h1>
      </div>
    </a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
  <script src="main.js"></script>
  <script src="https://kit.fontawesome.com/626c318560.js" crossorigin="anonymous"></script>


</body>
</html>