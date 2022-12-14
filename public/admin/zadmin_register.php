<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (!isset($_SESSION["SESSION_EMAIL"])) {
    header("Location: ../A_admin_login/admin_login.php");
    die();
}

include "../../config/connect.php";

require "../../vendor/autoload.php";

$pesan = "";
$query = mysqli_query(
    $conn,
    "SELECT * FROM admin_account WHERE email = '{$_SESSION["SESSION_EMAIL"]}'"
);

if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
}

if (isset($_POST["submit"])) {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, md5($_POST["password"]));
    $confrimpassword = mysqli_real_escape_string(
        $conn,
        md5($_POST["confirmpassword"])
    );
    

    if (
        mysqli_num_rows(
            mysqli_query(
                $conn,
                "SELECT * FROM admin_account WHERE email='$email'"
            )
        )
    ) {
        $pesan = "<div class='alert alert-warning alert-dismissible fade show'role='alert'> Email <strong>$email</strong> sudah digunakan.</div>";
    } else {
        if ($password === $confrimpassword) {
            $sql = "INSERT INTO admin_account (username, email, password, v_code) VALUES ('$username', '$email', '$password', '')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<div style='display: none;'>";

                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->isSMTP(); //Send using SMTP
                    $mail->Host = "smtp-relay.sendinblue.com"; //Set the SMTP server to send through
                    $mail->SMTPAuth = true; //Enable SMTP authentication
                    $mail->Username = "rendering.fps88@gmail.com"; //SMTP username
                    $mail->Password =
                        "xsmtpsib-336c0255d8f4ee646dea2f8c0c02f943f0d8bf23228a4580a5ec8c28ef264efa-LKpq4bBskDFaT8Hx"; //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
                    $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom("INVATE@invate.my.id");
                    $mail->addAddress($email);

                    //Content
                    $mail->isHTML(true);
                    $mail->Subject = "VERIFICATION";
                    $mail->Body =
                        '<body class="bg-light">
                            <div class="container">
                                <div class="card p-6 p-lg-10 space-y-4">
                                    <p>
                                        Selamat datang di INVATE.
                                    </p>
                                </div>
                            </div>
                        </body>';

                    $mail->send();
                    echo "Message has been sent";
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                echo "</div>";
                $pesan = "<div class='alert alert-success alert-dismissible fade show'role='alert'> Admin berhasil ditambahkan. <a href='./tableadmin.php'>Kembali ke Data Admin</a></div>";
            } else {
                $pesan = "<div class='alert alert-warning alert-dismissible > .</div>";
            }
        } else {
            $pesan = "<div class='alert alert-warning alert-dismissible > Password tidak sama.</div>";
        }
    }
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
      $query = mysqli_query(
          $conn,
          "SELECT * FROM admin_account WHERE email = '{$_SESSION["SESSION_EMAIL"]}'"
      );

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
                     <div class="col">
                        <h3 class="page-title">Tambahkan Admin</h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="tablee.php">Data Admin</a></li>
                           <li class="breadcrumb-item active">Tambahkan Admin</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header">
                           <h4 class="card-title mb-0">Tambahkan Admin</h4>
                        </div>
                        <div class="card-body">
                           <?php
                                echo $pesan;
                               ?>
                           <form action="" method="POST">
                            
                        <div class="form-group">
                           <label>Username</label>
                           <input class="form-control" type="text" placeholder="Username" name="username" required value="<?php if (
                               isset($_POST["submit"])
                           ) {
                               echo $username;
                           } ?>">
                        </div>
                        <div class="form-group">
                           <label>Email</label>
                           <input class="form-control" type="email" placeholder="Email" name="email" required value="<?php if (
                               isset($_POST["submit"])
                           ) {
                               echo $email;
                           } ?>">
                        </div>
                        <div class="form-group">
                           <label>Password</label>
                           <input class="form-control" type="password" placeholder="Password" name="password" required>
                        </div>
                        <div class="form-group">
                           <label>Confirm Password</label>
                           <input class="form-control" type="password" placeholder="Confirm Password" name="confirmpassword" required>
                        </div>
                        <div class="form-group text-center">
                           <button class="btn btn-primary account-btn" name="submit" type="submit">Register</button>
                        </div>
                     </form>
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