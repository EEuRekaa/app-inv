<?php

   session_start();
   
   if (isset($_SESSION['SESSION_NAMATAMU'])) {
      header("Location: ./index.php");
      die();
   }

   include '../../config/connect.php';

   $pesan = "";

   if (isset($_GET['verification'])) {
      if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user_account WHERE v_code='{$_GET['verification']}'")) > 0) {
         $query = mysqli_query($conn, "UPDATE user_account SET v_code='' WHERE v_code='{$_GET['verification']}'");

         if ($query) {
            $pesan = "<div class='alert alert-success'>Email telah berhasil diverifikasi</div>";
         }

      } else {
         header("Location: user_login.php");
      } 
   }
   if (isset($_POST['submit'])) {
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $password = mysqli_real_escape_string($conn, md5($_POST['password']) );

      $query2 = "SELECT * FROM user_account WHERE email = '$email' AND password = '$password'";
      $result = mysqli_query($conn, $query2);

      if (mysqli_num_rows($result) === 1) {
         $row = mysqli_fetch_assoc($result);

         if (empty($row['v_code'])) {
            $_SESSION['SESSION_EMAIL'] = $email;
            header("Location: ./index.php");
         } else {
            $pesan = "<div class='alert alert-info'>Verifikasi email anda terlebih dahulu.</div>";
         }
      } else {
         $pesan = "<div class='alert alert-danger'>Email atau password salah.</div>";
      }
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kirim Undangan</title>

    <link rel="shortcut icon" type="image/x-icon" href="../user/assets/img/favicon.png">
      <link rel="stylesheet" href="../user/assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="../user/assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="../user/assets/css/style.css">
</head>
<body>
<div class="main-wrapper">
         <div class="account-content">
            
            <div class="container">
               <div class="account-logo">
                  <img src="../user/assets/img/logo.png" alt="Page User">
               </div>
               <div class="account-box">
                  <div class="account-wrapper">
                     <h3 class="account-title">TEST</h3>
                     <p class="account-subtitle">INVATE</p>

                     <?php
                     
                     echo $pesan;
                     
                     ?>

                     <form action="send.php?id_user=<?php echo $data['id_user'];?>" method="POST">
                        <div class="form-group">
                           <label>Username</label>
                           <input class="form-control" type="text" placeholder="Username" name="nama_tamu" required value="">
                        </div>
                        <div class="form-group">
                           <label>Email</label>
                           <input class="form-control" type="email" placeholder="Email" name="email_tamu" required value="">
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

            <script src="../user/assets/js/jquery-3.5.1.min.js"></script>
      <script src="../user/assets/js/popper.min.js"></script>
      <script src="../user/assets/js/bootstrap.min.js"></script>
      <script src="../user/assets/js/app.js"></script>
</body>
</html>