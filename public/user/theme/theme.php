<?php

session_start();

   
   if (!isset($_SESSION['SESSION_EMAIL'])) {
      header("Location: ../user_login.php");
      die();
   }
   
   
   require '../../../config/connect.php';

   $query = mysqli_query($conn, "SELECT * FROM user_account WHERE email = '{$_SESSION['SESSION_EMAIL']}'");
   
   if (mysqli_num_rows($query) > 0) {
      $row = mysqli_fetch_assoc($query);
   }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Data</title>
    <link rel="shortcut icon" type="image/x-icon" href="../../user/assets/img/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <style>
        .content{
            background-color: #ddc190;
        }

        .text-content{
            color: #000000;
        }
    </style>

</head>

<body style="background: #002939; color: #ffffff">

    <?php @include 'header.php'; ?>

    <br>

    
        <div class="container">
            <h1 class="display-6 text-center" style="color: #ddc190;">Kelola Data Undangan Kamu</h1>
        </div>


    <div class="container px-4 py-5" id="">
    <hr>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">      
      <div class="col d-flex align-items-start">
        <div class="">
          <svg class="bi" width="1em" height="1em"><use xlink:href="#cpu-fill"/></svg>
        </div>
        <div>
          <h2>Buat Undangan</h2>
          <p>Buat undangan di sini.</p>
          <a href=".././catalog/catalog.php" class="btn" style="background-color: #ddc190; color: #002939; font-weight: bold;">
            Buat
          </a>
        </div>
      </div>
      <div class="col d-flex align-items-start">
        <div class="">
          <svg class="bi" width="1em" height="1em"><use xlink:href="#cpu-fill"/></svg>
        </div>
        <div>
          <h2>Lihat Daftar Tamu</h2>
          <p>Kelola daftar tamu kamu.</p>
          <a href="./tamu_tablesend.php" class="btn" style="background-color: #ddc190; color: #002939; font-weight: bold;">
            Lihat
          </a>
        </div>
      </div>
      <div class="col d-flex align-items-start">
        <div class="">
          <svg class="bi" width="1em" height="1em"><use xlink:href="#tools"/></svg>
        </div>
        <div>
          <h2>Lihat Undangan</h2>
          <p>Lihat data undangan kamu.</p>
          <a href="./undangan_table.php" class="btn" style="background-color: #ddc190; color: #002939; font-weight: bold;">
            Lihat
          </a>
        </div>
      </div>
    </div>
  </div>

    


    <?php @include 'footer.php'; ?>
</body>

</html>