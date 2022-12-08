<?php

session_start();

   
   if (!isset($_SESSION['SESSION_EMAIL'])) {
      header("Location: ./user_login.php");
      die();
   }
   
   
   require '../../config/connect.php';

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
    <title>Invate</title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="./home/fab.css">
    <link rel="shortcut icon" type="image/x-icon" href="./home/assets/img/favicon.png">
    <link rel="stylesheet" href="./home/assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="./home/assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="./home/assets/css/line-awesome.min.css">
      <link rel="stylesheet" href="./home/assets/css/style.css">
      <script defer src="../../node_modules/html5-qrcode/html5-qrcode.min.js"></script>
    <script defer src="./index.js"></script>
    
    <style>
    

        .h {
            width: 50%;
            height: 7px;
            border: 0 none;
            margin-right: auto;
            margin-left: auto;
            margin-bottom: 5px;
            background-color: #ddc190;
        }

        
    </style>

</head>

<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #002939">
        <div class="container">
            <a href=""><img src="./home/assets/img/favicon.png" class="d-inline-block align-bottom" alt=""></a>                
            <a class="navbar-brand ml-2 mt-2" href="home.php" style="color: white; font-size: 26px; font-weight:bold;"><span
                    style="color: #ddc190;">IN</span>VATE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <form class="d-flex">
                <div>
                        <a href="" class="text-decoration-none px-3 mt-5" style="font-size: 20px; color: #ddc190; font-weight: bold;"> <span>Hi <?php echo $row['username'] ?></span></a>
                        <a href="../logout.php"><button type="button" class="btn"
                        style="background-color: #ddc190; color: #002939; font-weight: bold;">Logout</button></a>
                    </div>
                </form>
            </div>
        </div>
    </nav>

    <hr class="h">

    <div class="container">
        <header class="d-flex justify-content-center py-2 pt-5">
            <ul class="nav nav-pills mb-5" style="font-size: 18px;">
                <li class="nav-item mx-1">
                    <a href="./home/home.php" class="nav-link" style="color: #ddc190;">Home</a>
                </li>
                <li class="nav-item mx-1">
                    <a href="./catalog/catalog.php" class="nav-link" style="color: #ddc190;">Catalog</a>
                </li>
                <li class="nav-item mx-1">
                    <a href="./theme/theme.php" class="nav-link" style="color: #ddc190;">Kelola Data</a>
                </li>
            </ul>
        </header>
    </div>
    <div class="fab">
        <i class="fa fa-close fa-2x1 text-dark"></i>
    </div>

    <div class="box">
        <a href="scan.php" class="item awok1"><i class="fa fa-qrcode fa-2xl text-white"></i></a>
        <a href="" class="item awok2"><i class="fa fa-qrcode"></i></a>
        <a href="" class="item awok3"><i class="fa fa-qrcode"></i></a>
        <a href="" class="item awok4"><i class="fa fa-qrcode"></i></a>
    </div>

    <script>
        document.querySelector('.fab').addEventListener('click', function(e){
            document.querySelector('.box').classList.toggle('box-active')
            document.querySelector('.fab').classList.toggle('fab-active')
        })
    </script>
    <script src="assets/js/jquery-3.5.1.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script src="assets/js/jquery.slimscroll.min.js"></script>
      <script src="assets/js/app.js"></script>
</body>

</html>