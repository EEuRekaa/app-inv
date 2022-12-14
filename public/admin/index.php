<?php
session_start();

if (!isset($_SESSION["SESSION_EMAIL"])) {
    header("Location: ../A_admin_login/admin_login.php");
    die();
}

include "../../config/connect.php";

$query = mysqli_query(
    $conn,
    "SELECT * FROM admin_account WHERE email = '{$_SESSION["SESSION_EMAIL"]}'"
);

if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <meta name="description" content="Smarthr - Bootstrap Admin Template">
      <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
      <meta name="author" content="Dreamguys - Bootstrap Admin Template">
      <meta name="robots" content="noindex, nofollow">
      <title>Admin</title>
      <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/line-awesome.min.css">
      <link rel="stylesheet" href="assets/plugins/morris/morris.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.min.js"></script>
      <script src="assets/js/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
      <div class="main-wrapper">
         <div class="header">
            <div class="header-left">
               <a href="index.php" class="logo">
               <img src="assets/img/logo.png" width="40" height="40" alt="">
               </a>
            </div>
            <a id="toggle_btn" href="javascript:void(0);">
            <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
            </span>
            </a>
            <div class="page-title-box">
               <h3>Admin Dashboard</h3>
            </div>
            <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu">
               <li class="nav-item">
                  <div class="top-nav-search">
                  </div>
               </li>
               <li class="nav-item dropdown has-arrow main-drop">
                  <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <span class="user-img"><img src="assets/img/user.jpg" alt=""></span>
                  <span><?php echo $row["username"]; ?></span>
                  </a>
                  <div class="dropdown-menu">
                     <a class="dropdown-item" href="../admin/logout.php">Logout</a>
                  </div>
               </li>
            </ul>
            <div class="dropdown mobile-user-menu">
               <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
               <div class="dropdown-menu dropdown-menu-right">                    
                  <a class="dropdown-item" href="../admin/logout.php">Logout</a>
               </div>
            </div>
         </div>
         <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
               <div id="sidebar-menu" class="sidebar-menu">
                  <ul>
                     <li class="menu-title">
                        <span>Main</span>
                     </li>
                     <li class="submenu">
                        <a href="#"><i class="la la-dashboard"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                           <li><a class="active" href="index.php">Admin Dashboard</a></li>
                        </ul>
                     </li>
                     <li class="submenu">
                        <a href="#"><i class="la la-user"></i> <span> User </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                           <li><a href="tablee.php"> Data User </a></li>
                           <li><a href="tableadmin.php"> Data Admin </a></li>
                        </ul>
                        <a href="#"><i class="la la-image"></i> <span> Tema </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                           <li><a href="tabletema.php"> Data Tema </a></li>
                           <li><a href="tema_add.php"> Tambah Tema </a></li>
                        </ul>
                        <a href="#"><i class="la la-book"></i> <span> Undangan </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                           <li><a href="data_undangan.php"> Data Undangan </a></li>
                        </ul>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="page-wrapper">
            <div class="content container-fluid">
               <div class="page-header">
                  <div class="row">
                     <div class="col-sm-12">
                        <h3 class="page-title">Welcome Admin <?php echo $row[
                            "username"
                        ]; ?></h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                     <div class="card dash-widget">
                        <div class="card-body">
                           <span class="dash-widget-icon"><i class="fa fa-plus"></i></span>
                           <div class="dash-widget-info">
                              <h3><?php
                              $query = mysqli_query(
                                  $conn,
                                  "SELECT COUNT(1) FROM tb_ultah "
                              );

                              if (mysqli_num_rows($query) > 0) {
                                  $row = mysqli_fetch_array($query);
                              }

                              $total = $row[0];
                              echo $total;
                              ?>
                              </h3>
                              <span>Undangan dibuat</span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                     <div class="card dash-widget">
                        <div class="card-body">
                           <span class="dash-widget-icon"><i class="fa fa-image"></i></span>
                           <div class="dash-widget-info">
                              <h3>
                                 <?php
                                 $query = mysqli_query($conn,"SELECT COUNT(1) FROM tema "
                                 );

                                 if (mysqli_num_rows($query) > 0) {
                                     $row = mysqli_fetch_array($query);
                                 }

                                 $total = $row[0];
                                 echo $total;
                                 ?>
                              </h3>
                              <span>Tema</span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                     <div class="card dash-widget">
                        <div class="card-body">
                           <span class="dash-widget-icon"><i class="fa fa-users"></i></span>
                           <div class="dash-widget-info">
                              <h3>
                                 <?php
                                 $query = mysqli_query($conn, "SELECT COUNT(1) FROM user_account ");

                                 if (mysqli_num_rows($query) > 0) {
                                     $row = mysqli_fetch_array($query);
                                 }

                                 $total = $row[0];
                                 echo $total;
                                 ?>
                              </h3>
                              <span>Pengguna</span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                     <div class="card dash-widget">
                        <div class="card-body">
                           <span class="dash-widget-icon"><i class="fa fa-users"></i></span>
                           <div class="dash-widget-info">
                              <h3>
                                 <?php
                                 $query = mysqli_query(
                                     $conn,
                                     "SELECT COUNT(1) FROM tb_tamu "
                                 );

                                 if (mysqli_num_rows($query) > 0) {
                                     $row = mysqli_fetch_array($query);
                                 }

                                 $total = $row[0];
                                 echo $total;
                                 ?>
                              </h3>
                              <span>Tamu</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.5.1.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script src="assets/js/jquery.slimscroll.min.js"></script>
      <script src="assets/plugins/morris/morris.min.js"></script>
      <script src="assets/plugins/raphael/raphael.min.js"></script>
      <script src="assets/js/chart.js"></script>
      <script src="assets/js/app.js"></script>
   </body>
</html>