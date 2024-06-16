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

    .container {
        width: 450px; /* Lebar div container */
        height: 500px; /* Tinggi div container */
        border: 1px solid #ccc; /* Border untuk div container */
        overflow: hidden; /* Mengatur overflow ke hidden agar gambar tidak keluar dari container */
    }
    
    .container img {
        width: 100%; /* Lebar gambar 100% dari lebar div container */
        height: auto; /* Menjaga aspek rasio gambar */
        display: block; /* Menghilangkan space di bawah gambar */
    }

  </style>

  <div class="d-flex justify-content-center align-items-center flex-column" style="height: 100vh; background-color: #61A3BA">
  <?php
    if(isset($_GET['ket'])){
      if($_GET['ket'] === 'success'){
        print'<div style="width: 60vh; margin-bottom: 16px; text-align: center; border-radius: 6px; background-color: #C7DCA7;">';
          print'<h5 class="p-2 m-0" style="font-size: 18px;">Proses Berhasil!</h5>';
          print'</div>';
        } 
      }
    ?>
    <div class="d-flex justify-content-center p-4 flex-column" style="border: 4px solid #D0D4CA; border-radius: 12px; background-color: white;">
      <h1 class="text-center mb-5"><b>Scan Untuk Pembayaran</b></h1>
      
      <div class="container">
        <img src="https://cms.dailysocial.id/wp-content/uploads/2023/03/QRIS.png" alt="Gambar" />
      </div>

      <div class="d-flex align-items-center flex-column">
        <a href="transaksi.php" class="mt-3 w-100">
          <button type="submit" class="btn btn-primary logb w-100">OK</button>
        </a>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>