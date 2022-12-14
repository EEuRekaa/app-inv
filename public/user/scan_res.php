<?php
session_start();

if (!isset($_SESSION["SESSION_EMAIL"])) {
    header("Location: ./user_login.php");
    die();
}

require "../../config/connect.php";

$query = mysqli_query(
    $conn,
    "SELECT * FROM user_account WHERE email = '{$_SESSION["SESSION_EMAIL"]}'"
);

if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
}
$text = $_GET["text"];
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Scan</title>
      <link rel="stylesheet" href="catalog.css">
      <link rel="shortcut icon" type="image/x-icon" href="./home/assets/img/favicon.png">
      
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
         crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      
   </head>
   <body>
      <?php @include "header.php"; ?>
      <div class="fab">
        <i class="fa fa-close fa-2x1 text-dark"></i>
    </div>
      <br>
      <div class="">
         <div class="container">
         <h1 class="display-6 text-center" style="color: #ddc190;">Selamat Datang</h1>
            <br>
         </div>
      </div>
      <br><br>
      <div class="container">
        <div class="row g-3">         
         <div class="">
         <h2 class="display-6 text-center text-light"><?php echo $text; ?></h2>                      
         </div><hr>
         <br><br>
         </div>
      </div>
      <?php @include "footer.php"; ?>
   </body>
</html>