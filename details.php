<?php
 session_start();
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Detail Product</title>
</head>
<body>
  <?php
  include 'koneksi.php';
  $id = $_GET['id'];

  $sql = "SELECT * FROM products WHERE product_id = $id";
  $data = mysqli_query($connect, $sql) or die(mysqli_error($connect));
  
  while($row = $data->fetch_object()){
  ?>
  <div class="z-2d d-flex flex-column" style="height: 100vh; align-items: center; justify-content: center; background-color: rgba(0, 0, 0, 0.8); top: 0; left: 0;" id="popup" name="namanya">
    <?php
    $id = $_GET['id'];
    $quantitybuy = 1;

    if(isset($_GET['ket'])){
      if($_GET['ket'] === 'belum_login'){
        print'<div style="width: 60vh; margin-bottom: 16px; text-align: center; border-radius: 6px; background-color: #f7dddc;">';
        print'<h5 class="p-2 m-0" style="font-size: 18px;">Anda perlu login dahulu!</h5>';
        print'</div>';
      } elseif($_GET['ket'] === 'success'){
        print'<div style="width: 60vh; margin-bottom: 16px; text-align: center; border-radius: 6px; background-color: #C7DCA7;">';
        print'<h5 class="p-2 m-0" style="font-size: 18px;">Berhasil Ditambahkan!</h5>';
        print'</div>';
      } else {
        print'<div style="width: 60vh; margin-bottom: 16px; text-align: center; border-radius: 6px; background-color: #f7dddc;">';
        print'<h5 class="p-2 m-0" style="font-size: 18px;">Gagal Ditambahkan!</h5>';
        print'</div>';
      }
    }
  ?>
        <div class="d-flex rounded align-items-center gap-4" style="width: 60%; height: 50vh; background-color: white; padding: 3rem;">
          <img src="<?= $row->image ?>" alt="" style="height: 100%; width: 50%; object-fit: cover;" class="rounded">
      <div class="h-100">
        <h1 class="fs-1 m-0"><?= $row->name ?></h1>
        <h1 class="fs-4 mb-2">Rp<?= $row->price ?></h1>
        <div class="">
          <p class="mb-0 mt-2">Detail:</p>
          <p><?= $row->product_description ?></p>
        </div>
        <div>
          <a href="addcart.php?name=<?=$row->name?>&price=<?=$row->price?>&id=<?=$id?>&quantitybuy=<?php echo $quantitybuy ?>&quantity=<?=$row->quantity?>" class="me-2 text-decoration-none">
            <button type="button" class="btn btn-primary">Tambah ke Keranjang</button>
          </a>
          <a href="./index.php">
            <button type="button" class="btn btn-danger">Kembali</button>
          </a>
        </div>
      </div>
    </div>
  </div>
  <?php
  }
  ?>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>