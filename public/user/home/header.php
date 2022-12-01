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
    <title>Home</title>
    <link rel="stylesheet" href="header.css">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/line-awesome.min.css">
      <link rel="stylesheet" href="assets/css/style.css">
    
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
    
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #002939">
        <div class="container">
            <a class="navbar-brand" href="home.php" style="color: white;"><span
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
                        <a href="" class="me-2 text-decoration-none fa fa-user-circle" style="font-size: 19px; color: #ddc190;">  <?php echo $row['username'] ?></a>
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
            <ul class="nav nav-pills mb-5">
                <li class="nav-item mx-1">
                    <a href="home.php" class="nav-link" style="color: #ddc190;">Home</a>
                </li>
                <li class="nav-item mx-1">
                    <a href="../catalog/catalog.php" class="nav-link" style="color: #ddc190;">Catalog</a>
                </li>
                <li class="nav-item mx-1">
                    <a href="../theme/theme.php" class="nav-link" style="color: #ddc190;">Kelola Data</a>
                </li>
            </ul>
        </header>
    </div>
    <script src="assets/js/jquery-3.5.1.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script src="assets/js/jquery.slimscroll.min.js"></script>
      <script src="assets/js/app.js"></script>
</body>

</html>