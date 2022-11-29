<?php

   session_start();
   
   if (isset($_SESSION['SESSION_EMAIL'])) {
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
      <title>Invate Login</title>
      <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/style.css">
   </head>
   <body>
      <div class="main-wrapper">
         <div class="account-content">
            <div class="container">
               <div class="account-logo">
                  <img src="assets/img/logo.png" alt="Page User">
               </div>
               <div class="account-box">
                  <div class="account-wrapper">
                     <h3 class="account-title">USER LOGIN</h3>
                     <p class="account-subtitle">INVATE</p>

                     <?php echo $pesan; ?>

                     <form action="" method="POST">
                        <div class="form-group">
                           <label>Email Address</label>
                           <input class="form-control" type="email" name="email" placeholder="Email Address" required>
                        </div>
                        <div class="form-group">
                           <div class="row">
                              <div class="col">
                                 <label>Password</label>
                              </div>
                              <div class="col-auto">
                                 <a class="text-muted" href="lupapassword.php">
                                 Lupa password?
                                 </a>
                              </div>
                           </div>
                           <input class="form-control" type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group text-center">
                           <button class="btn btn-primary account-btn" name="submit" type="submit">Login</button>
                        </div>
                        <div class="account-footer">
                           <p>Belum memiliki akun? <a href="user_register.php">Register</a></p>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>

      
      <script src="assets/js/jquery-3.5.1.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script src="assets/js/app.js"></script>
   </body>
</html>