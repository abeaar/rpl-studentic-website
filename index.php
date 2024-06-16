<?php
 session_start();

 if(empty($_SESSION['username'])){
  $ket_login = "";
  $ket_keranjang = "d-none";
 } else{
  $ket_login = "d-none";
  $ket_keranjang = "";
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
  <nav class="navbar navbar-expand-lg bg-body-tertiary px-5 py-2 fs-5" style="background-color: #e3f2fd; box-shadow: 0px 8px 25px rgba(0,0,0,0.4); z-index: 1; position: fixed; width: 100%;">
    <div class="container-fluid justify-content-between">
      <a class="navbar-brand fs-3 text-primary" href="#"><b>Studentic</b></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="d-flex mx-auto w-50" role="search" action="./index.php" method="GET">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
          <button class="btn btn-outline-secondary" type="submit">Search</button>
        </form>
        
        <div>
          <!-- <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Menu lainnya
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Riwayat Pesanan</a></li>
                <li><a class="dropdown-item" href="#"></a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
          </ul> -->

          </div>
          <a href="./transaksi.php" class="btn btn-outline-primary border-0 <?=$ket_keranjang?>" id="tombol-login">Transaksi</a>
          <a href="./login.php" class="btn btn-outline-primary border-0 <?=$ket_login ?>" id="tombol-login">Login</a>
          <a href="./logout.php" class="btn btn-danger border-2 <?=$ket_keranjang?>" id="tombol-login">Logout</a>
        </div>
      </div>
    </div>
  </nav>
  
  <!-- Banner corousel (auto slide/geser sendiri wwkwk) -->
  <div id="carouselExampleCaptions" class="carousel slide z-0" style="" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./img/bg_tas.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h3>Student Bag</h3>
          <p>Tas dengan 7 compartment untuk menunjang kebutuhan</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./img/tas_biru.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h3>Student Bag</h3>
          <p>Tas dengan 7 compartment untuk menunjang kebutuhan</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./img/tas_hitam.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h3>Student Bag</h3>
          <p>Tas dengan 7 compartment untuk menunjang kebutuhan</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- bungkus semua konten produk -->
  <div class="py-3 px-5">
    <h1 class="m-0 mb-4 pb-2 border-bottom border-dark" style="font-size: 4rem;"><b class="disini-txts"></b></h1>

    <!-- Kotak buat semua produk -->
    <div class="all-card d-flex flex-wrap gap-3 justify-content-center">
      <?php
        include 'koneksi.php';
        $sql = "SELECT * FROM products WHERE quantity>0";
        $cek=0;
        $display = "d_flex";

        if(isset($_SESSION['username'])){
          $username=$_SESSION['username'];
          
          $sql_username = "SELECT * FROM user WHERE username='$username'";
          $data_user = mysqli_query($connect, $sql_username)or die(mysqli_error($connect));

          while($row = $data_user->fetch_object()){
            $id_user = $row->user_id;
          }

          $data=mysqli_query($connect, "SELECT * FROM cart WHERE user_id='$id_user'")or die (mysqli_error($connect));
          $dt=mysqli_fetch_array($data);
          $cek=mysqli_num_rows($data);
        }

        if(isset($_GET['search'])){
          $search = $_GET['search'];
          $sql = "SELECT * FROM products WHERE quantity>0 AND name LIKE '%$search%'";
        }


        if($cek>0){
          $display = "d-flex";
        } else{
          $display = "d-none";
        }

        $data = mysqli_query($connect, $sql) or die(mysqli_error($connect));
        while($row = $data->fetch_object()){
      ?>
      <a href="details.php?id=<?= $row->product_id ?>" class="text-muted text-decoration-none">
        <!-- produk satu satu (card) -->
        <div class="card" style="width: 18rem;" id="product-card">
          <img src="<?= $row->image ?>" class="card-img-top" alt="<?= $row->name ?>" style="object-fit: cover;">
          <div class="card-body py-2 px-3">
            <h5 class="card-title fs-4 mb-1"><?= $row->name?></h5>
            <h5 class="card-title" style="font-size: 18px;">Rp<?= $row->price ?></h5>
          </div>
        </div>
      </a>
      <?php } ?>
      
    </div> <!-- akhir kotak semua produk -->
  </div> <!-- akhir bungkus semua konten produk -->

  <div class="d-flex flex-column gap-2 <?=$display?>" style="position: fixed; right: 0; bottom: 0; z-index: 2; margin-right: 32px; margin-bottom: 50px;">
    <a href="keranjang.php">
      <div class="d-flex justify-content-center align-items-center <?php echo $ket_keranjang ?>" style="width: 60px; Height: 60px; background-color: #316CF4; border-radius: 50%;" id="animasi">
        <img src="img/cart.png" alt="" style="width: 24px;">
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