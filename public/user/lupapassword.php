<?php

    session_start();

    if (isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: ./home/home.php");
        die();       
    }

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    include '../../config/connect.php';
    require '../../vendor/autoload.php';

    $pesan = "";

    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $v_code = mysqli_real_escape_string($conn, md5(rand()));

        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user_account WHERE email = '{$email}'")) > 0) {
            
            $query = mysqli_query($conn, "UPDATE user_account SET v_code = '{$v_code}' WHERE email = '{$email}'");

            if ($query) {            

                echo "<div style='display: none;'>";

                $mail = new PHPMailer(true);

                try {
                //Server settings
                $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp-relay.sendinblue.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'rendering.fps88@gmail.com';                     //SMTP username
      $mail->Password   = 'xsmtpsib-336c0255d8f4ee646dea2f8c0c02f943f0d8bf23228a4580a5ec8c28ef264efa-IN3DtZr6gwya0TPS';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
   
      //Recipients
      $mail->setFrom('INVATE@invate.my.id');
                $mail->addAddress($email);

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Reset Password';
               $mail->Body    = '


                  <body class="bg-light">
  <div class="container">
    <div class="card p-6 p-lg-10 space-y-4">
      <p>
      Click link untuk reset password 
        
      </p>
    </div>
    <div class="text-muted text-center my-6">
    <b style="text-align: center;><a style="text-align: center; text-decoration: italy;" href="http://localhost/app-inv/public/user/ubahpassword.php?reset='.$v_code.'"> http://localhost/app-inv/public/user/ubahpassword.php?reset='.$v_code.'</a></b>
    </div>
  </div>
</body>
';

                $mail->send();
                echo 'Message has been sent';
                } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                echo "</div>";   
                $pesan = "<div class='alert alert-info'>Kami mengirimkan verifikasi ke email anda</div>";
            }
        } else {
            $pesan = "<div class='alert alert-danger'>Email $email tidak ditemukan</div>";
        }
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
                     <h3 class="account-title">Lupa Password</h3>
                     <p class="account-subtitle">INVATE</p>

                     <?php echo $pesan; ?>

                     <form action="" method="POST">
                        <div class="form-group">
                           <label>Masukkan Email Anda</label>
                           <input class="form-control" type="email" name="email" placeholder="Email Address">
                        </div>                        
                        <div class="form-group text-center">
                           <button class="btn btn-primary account-btn" name="submit" type="submit">Kirim Link Reset</button>
                        </div>
                        <div class="account-footer">
                           <a href="user_login.php">Kembali ke Login</a>
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