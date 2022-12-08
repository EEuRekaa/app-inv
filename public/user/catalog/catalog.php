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
      <title>Catalog</title>
      <link rel="stylesheet" href="catalog.css">
      <link rel="shortcut icon" type="image/x-icon" href="../../user/assets/img/favicon.png">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
         crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
   <body>
      <?php @include 'header.php'; ?>
      <br>
      <div class="">
         <div class="container">
         <h1 class="display-6 text-center" style="color: #ddc190;">Catalog</h1>
            <br>
            <p class="lead text-center" style="color: #ffffff">
               Temukan dan bandingkan tema design undangan yang sesuai dengan gaya yang menurut kamu bagus.
            </p><hr>
         </div>
      </div>
      <br><br>
      <div class="container">
        <div class="row g-3">         
         <div class="row">
            <div class="col-md-4">
               <div class="card mb-4 shadow-sm border border-dark">
                  <img src="../image/tema1.PNG" alt="">
                  <div class="card-body">
                     <p class="card-text">Birthday Stylish Portfolio</p>
                     <hr>
                     <div class="d-flex justify-content-between align-items-center">
                        <a class="btn btn-sm"
                           style="background-color: #ddc190; color: black; border-radius: 30px; width: 100%"
                           href="./tema1/index.php" role="button">Lihat</a>
                     </div>
                  </div>
               </div>
            </div>                               
            <div class="col-md-4">
               <div class="card mb-4 shadow-sm border border-dark">
                  <img src="../image/tema3.PNG" alt="">
                  <div class="card-body">
                     <p class="card-text">Birthday Pink Theme</p>
                     <hr>
                     <div class="d-flex justify-content-between align-items-center">
                        <a class="btn btn-sm"
                           style="background-color: #ddc190; color: black; border-radius: 30px; width: 100%"
                           href="tema2/undangan2.php" role="button">Lihat</a>
                     </div>
                  </div>
               </div>
            </div>                               
            <div class="col-md-4">
               <div class="card mb-4 shadow-sm border border-dark">
                  <img src="../image/tema2.PNG" alt="">
                  <div class="card-body">
                     <p class="card-text">Birthday Simple Dark Theme</p>
                     <hr>
                     <div class="d-flex justify-content-between align-items-center">
                        <a class="btn btn-sm"
                           style="background-color: #ddc190; color: black; border-radius: 30px; width: 100%"
                           href="./tema3/index.php" role="button">Lihat</a>
                     </div>
                  </div>
               </div>
            </div>                         
         </div><hr>
         <br><br>
         </div>
      </div>
      <?php @include 'footer.php'; ?>
   </body>
</html>