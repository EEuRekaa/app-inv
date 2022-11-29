<?php 

   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;

   require '../../vendor/autoload.php';

   include '../../config/connect.php';
   $pesan = "";

   if (isset($_POST['submit'])) {
      $username = mysqli_real_escape_string($conn, $_POST['nama_tamu']);
      $email = mysqli_real_escape_string($conn, $_POST['email_tamu']);
      $v_code = mysqli_real_escape_string($conn, md5(rand()));

      if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user_account WHERE email='$email'"))) {
         $pesan = "<div class='alert alert-danger'>$email Email ini sudah digunakan.</div>";
      } else {
         if ($username == ) {
            $sql = "INSERT INTO user_account (nama_tamu, email_tamu, v_code) VALUES ('$username', '$email', '$v_code')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
               echo "<div style='display: none;'>";

               $mail = new PHPMailer(true);

            try {
               //Server settings
               $mail->isSMTP();                                            //Send using SMTP
               $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
               $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
               $mail->Username   = 'putputraxd88@gmail.com';                     //SMTP username
               $mail->Password   = 'neqtxyzsoyqzaehy';                               //SMTP password
               $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
               $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
               //Recipients
               $mail->setFrom('putputraxd88@gmail.com', 'INVATE');
               $mail->addAddress($email);

               //Content
               $mail->isHTML(true);                                  //Set email format to HTML
               $mail->Subject = 'VERIFICATION';
               $mail->Body    = 'Click link untuk verifikasi<b><a href="http://localhost/app-inv/public/user/user_login.php?verification='.$v_code.'">  http://localhost/app-inv/public/user/user_login.php?verification='.$v_code.'</a></b>';

               $mail->send();
               echo 'Message has been sent';
            } catch (Exception $e) {
               echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
               echo "</div>";
               $pesan = "<div class='alert alert-info'>Cek email anda untuk verifikasi.</div>";
            } else {
               $pesan = "<div class='alert alert-danger'>Masalah</div>";
            }
         } else {
            $pesan = "<div class='alert alert-danger'>Password tidak sama!</div>";
         }
      }
   }
   


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invate Register</title>

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
                     <h3 class="account-title">USER REGISTER</h3>
                     <p class="account-subtitle">INVATE</p>

                     <?php
                     
                     echo $pesan;
                     
                     ?>

                     <form action="" method="POST">
                        <div class="form-group">
                           <label>Username</label>
                           <input class="form-control" type="text" placeholder="Username" name="nama_tamu" required value="<?php if (isset($_POST['submit'])) { echo $username; }?>">
                        </div>
                        <div class="form-group">
                           <label>Email</label>
                           <input class="form-control" type="email" placeholder="Email" name="email_tamu" required value="<?php if (isset($_POST['submit'])) { echo $email; }?>">
                        </div>
                        <div class="form-group text-center">
                           <button class="btn btn-primary account-btn" name="submit" type="submit">Register</button>
                        </div>
                        <div class="account-footer">
                           <p>Sudah punya akun? <a href="user_login.php">Login</a></p>
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