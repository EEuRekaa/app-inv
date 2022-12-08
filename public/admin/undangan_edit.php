<?php
   session_start();
   
   if (!isset($_SESSION['SESSION_EMAIL'])) {
      header("Location: ../A_admin_login/admin_login.php");
      die();
   }
   
   
   
   include '../../config/connect.php';
   
   $query = mysqli_query($conn, "SELECT * FROM admin_account WHERE email = '{$_SESSION['SESSION_EMAIL']}'");
   
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
      <link rel="stylesheet" href="assets/css/style.css">
   </head>
   <body>
      <?php 
         $query = mysqli_query($conn, "SELECT * FROM admin_account WHERE email = '{$_SESSION['SESSION_EMAIL']}'");
         
         if (mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
         }
         
         ?>
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
                  <span><?php echo $row['username'] ?></span>
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
                     <div class="col">
                        <h3 class="page-title">Edit Data User</h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="tablee.php">Data User</a></li>
                           <li class="breadcrumb-item active">Data Undangan</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header">
                           <h4 class="card-title mb-0">Edit Data Undangan</h4>
                        </div>
                        <div class="card-body">
                           <?php
                              if (isset($_GET['id_ultah'])) {
                                 $id_ultah = $_GET['id_ultah'];
                              
                                 if (empty($id_ultah)) {
                                    echo "ID tidak ada";
                                 }
                              }else {
                                 die("id tidak ada");
                              }
                              
                              $query = "SELECT * FROM `tb_ultah` WHERE `id_ultah`='$id_ultah'";
                              $sql = mysqli_query($conn, $query);
                              while ($hasil = mysqli_fetch_array($sql)){
                                  
                                 $id_ultah = $hasil['id_ultah'];
                                 $judul_acara = $hasil['judul_acara'];
                                 $deskripsi_acara = $hasil['deskripsi_acara'];
                                 $hari = $hasil['hari'];
                                 $tanggal = $hasil['tanggal'];
                                 $jam = $hasil['jam'];
                                 $tempat = $hasil['tempat'];
                              
                                  $query2 = mysqli_query($conn, "SELECT * FROM user_account");
                              
                                          if (mysqli_num_rows($query2) > 0) {
                                             $row2 = mysqli_fetch_assoc($query2);
                                          }
                              
                                  $query3 = mysqli_query($conn, "SELECT * FROM tema");
                              
                                          if (mysqli_num_rows($query3) > 0) {
                                             $row3 = mysqli_fetch_assoc($query3);
                                          }
                              
                              ?>
                           <form action="undangan_update.php?id_ultah=<?php echo $id_ultah ?>" method="POST">
                              <div class="form-group row">
                                 <label class="col-form-label col-md-2">Nama Tema</label>
                                 <div class="col-md-10">
                                    <input class="form-control" type="text"  readonly value="<?php echo $row3['nama_tema'] ?>">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label class="col-form-label col-md-2">Username</label>
                                 <div class="col-md-10">
                                    <input class="form-control" type="text"  readonly value="<?php echo $row2['username'] ?>">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label class="col-form-label col-md-2">Judul Acara</label>
                                 <div class="col-md-10">
                                    <input class="form-control" type="text" name="judul_acara" required value="<?php echo $hasil['judul_acara'] ?>">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label class="col-form-label col-md-2">Deskripsi Acara</label>
                                 <div class="col-md-10">
                                    <input class="form-control" type="text" name="deskripsi_acara" required value="<?php echo $hasil['deskripsi_acara'] ?>">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label class="col-form-label col-md-2">Hari</label>
                                 <div class="col-md-10">
                                    <select name="hari" id="" class="form-control">
                                       <option value="Senin">Senin</option>
                                       <option value="Selasa">Selasa</option>
                                       <option value="Rabu">Rabu</option>
                                       <option value="Kamis">Kamis</option>
                                       <option value="Jumat">Jumat</option>
                                       <option value="Sabtu">Sabtu</option>
                                       <option value="Minggu">Minggu</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label class="col-form-label col-md-2">Tanggal</label>
                                 <div class="col-md-10">
                                    <input class="form-control" type="date" name="tanggal" required value="<?php echo $hasil['tanggal'] ?>">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label class="col-form-label col-md-2">jam</label>
                                 <div class="col-md-10">
                                    <input class="form-control" type="time" name="jam" required value="<?php echo $hasil['jam'] ?>">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label class="col-form-label col-md-2">Tempat</label>
                                 <div class="col-md-10">
                                    <input class="form-control" type="text" name="tempat" required value="<?php echo $hasil['tempat'] ?>">
                                 </div>
                              </div>
                              <div class="form-group text-center">
                                 <!-- Modal -->
                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Edit Data</button>
                                 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h4 class="modal-title" id="exampleModalLabel">Edit Data Undangan</h4>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                             </button>
                                          </div>
                                          <div class="modal-body">
                                             <h4>Anda yakin ingin mengubah data ini?</h4>
                                          </div>
                                          <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                             <button type="submit" name="submit" class="btn btn-primary">Konfirmasi</button>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- MODAL -->
                              </div>
                           </form>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="assets/js/jquery-3.5.1.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script src="assets/js/jquery.slimscroll.min.js"></script>
      <script src="assets/js/app.js"></script>
   </body>
</html>