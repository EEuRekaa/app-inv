<?php 

    include '../../config/connect.php';

    $pesan = "";

    if (isset($_GET['reset'])) {
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user_account WHERE v_code = '{$_GET['reset']}'")) > 0) {
            if (isset($_POST['confirmpassword'])) {
                $password = mysqli_real_escape_string($conn, md5($_POST['password']));
                $confirmpassword = mysqli_real_escape_string($conn, md5($_POST['confirmpassword']));                                   

                if ($password === $confirmpassword) {
                    $query = mysqli_query($conn, "UPDATE user_account SET password='{$password}', v_code='' WHERE v_code='{$_GET['reset']}'");
    
                    if ($query) {
                        header("Location: user_login.php");
                    }
                } else {
                    $pesan = "<div class='alert alert-danger'>Password tidak sama.</div>";
                }
            }
        } else {
            $pesan = "<div class='alert alert-danger'>Reset Link do not match.</div>";
        }
    } else {
        header("Location: lupapassword.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
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
                     <h3 class="account-title">Ubah Password</h3>
                     <p class="account-subtitle">INVATE</p>

                     <?php echo $pesan; ?>

                     <form action="" method="POST">
                        <div class="form-group">
                           <label>Password</label>
                           <input class="form-control" type="password" name="password" placeholder="Password">
                        </div>                        
                        <div class="form-group">
                           <label>Confirm Password</label>
                           <input class="form-control" type="password" name="confirmpassword" placeholder="Confirm Password">
                        </div>                        
                        <div class="form-group text-center">
                           <button class="btn btn-primary account-btn" name="submit" type="submit">Ubah Password</button>
                        </div>
                        <div class="account-footer">
                           <a href="login.php">Kembali ke Login</a>
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