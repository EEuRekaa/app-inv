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
      <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="assets/css/select2.min.css">
      <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
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
                  <div class="row align-items-center">
                     <div class="col-12">
                        <h3 class="page-title">Data Undangan</h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                           <li class="breadcrumb-item">Undangan</li>
                           <li class="breadcrumb-item active">Data Undangan</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="card mb-0">
                        <div class="card-header">
                           <h4 class="card-title mb-0 text-right"><a href="./adduser.php" class="btn btn-info"><i class="la la-plus-circle"></i> Tambahkan Data User</a></h4>
                        </div>
                        <div class="card-body">
                           <div class="table-responsive">
                              <table class="datatable table table-stripped mb-0">
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>ID Tema</th>
                                       <th>ID User</th>
                                       <th>Judul Acara</th>
                                       <th>Deskripsi Acara</th>
                                       <th>Hari</th>
                                       <th>Tanggal</th>
                                       <th>Jam</th>
                                       <th>Tempat</th>
                                       <th class="text-center">Event</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       include "../../config/connect.php";
                                       
                                       $no="1";
                                       $query = mysqli_query($conn, "SELECT * FROM tb_ultah ORDER BY id_ultah desc");
                                       while ($data=mysqli_fetch_array($query)) {                 
                                       
                                          $query2 = mysqli_query($conn, "SELECT * FROM user_account");
                                       
                                          if (mysqli_num_rows($query2) > 0) {
                                             $row2 = mysqli_fetch_assoc($query2);
                                          }
                                       
                                          $query3 = mysqli_query($conn, "SELECT * FROM tema ");
                                       
                                          if (mysqli_num_rows($query3) > 0) {
                                             $row3 = mysqli_fetch_assoc($query3);
                                          }
                                       
                                       ?>
                                    <tr>
                                       <td><?php echo $no++;?></td>
                                       <td><?php echo $row3['nama_tema']?></td>
                                       <td><?php echo $row2['username']?></td>
                                       <td><?php echo $data['judul_acara']?></td>
                                       <td><?php echo $data['deskripsi_acara']?></td>
                                       <td><?php echo $data['hari']?></td>
                                       <td><?php echo $data['tanggal']?></td>
                                       <td><?php echo $data['jam']?></td>
                                       <td><?php echo $data['tempat']?></td>
                                       <td class="text-center">
                                          <a href="undangan_edit.php?id_ultah=<?php echo $data['id_ultah'];?>">
                                             <button class="btn btn-outline-warning">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                   <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                   <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                </svg>
                                             </button>
                                          </a>
                                          <!-- Modal -->
                                          <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                             </svg>
                                          </button>
                                          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                             <div class="modal-dialog">
                                                <div class="modal-content">
                                                   <div class="modal-header">
                                                      <h4 class="modal-title" id="exampleModalLabel">Hapus Data Undangan</h4>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                      </button>
                                                   </div>
                                                   <div class="modal-body">
                                                      <h4>Anda yakin ingin menghapus undangan ini?</h4>
                                                   </div>
                                                   <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                      <a href="undangan_delete.php?id_ultah=<?php echo $data['id_ultah'];?>"><button type="button" class="btn btn-primary">Konfirmasi</button></a>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- MODAL -->
                                       </td>
                                    </tr>
                                    <?php } ?>
                                 </tbody>
                              </table>
                           </div>
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
      <script src="assets/js/select2.min.js"></script>
      <script src="assets/js/jquery.dataTables.min.js"></script>
      <script src="assets/js/dataTables.bootstrap4.min.js"></script>
      <script src="assets/js/moment.min.js"></script>
      <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
      <script src="assets/js/app.js"></script>
   </body>
</html>x