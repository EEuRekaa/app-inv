<?php 
    session_start();

      if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: ./user_login.php");
        die();
     }


     $id_tamu2 = $_GET['id_ultah'];
   
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;
   
   require '../../vendor/autoload.php';
         
   include '../../config/connect.php';

   

   $query = mysqli_query($conn, "SELECT * FROM user_account WHERE email = '{$_SESSION['SESSION_EMAIL']}'");
    
   if (mysqli_num_rows($query) > 0) {
      $gege = mysqli_fetch_assoc($query);
   }  
    

   $pesan = "";
   
   if (isset($_POST['submit']) ) {
    $namatamu = mysqli_real_escape_string($conn, $_POST['nama_tamu']);
    $emailtamu = mysqli_real_escape_string($conn, $_POST['email_tamu']);        
   
        $insert = mysqli_query($conn, "UPDATE `tb_tamu` SET `id_undangan`='$id_tamu2',`nama_tamu`='$emailtamu',`email_tamu`='$emailtamu' WHERE id_tamu = '25'");
        
        ;
   
        if ($insert) {
   
   $mail = new PHPMailer(true);
   
   try {
      //Server settings
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp-relay.sendinblue.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'rendering.fps88@gmail.com';                     //SMTP username
      $mail->Password   = 'xsmtpsib-336c0255d8f4ee646dea2f8c0c02f943f0d8bf23228a4580a5ec8c28ef264efa-NM0bfakQ7w2mnVvS';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
   
      //Recipients
      $mail->setFrom('INVATE@invate.my.id');
      $mail->addAddress($emailtamu);
   
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Undangan';
      $mail->Body    = '<p style="text-align: center;">Click link untuk melihat undangan</p>
      
      <b><a href="http://localhost/app-inv/public/tema1/index.php?namatamuhehe='.$namatamu.'&id_undangan='.$id_tamu2 .'"> http://localhost/app-inv/public/tema1/index.php?namatamuhehe='.$namatamu.'&id_undangan='.$id_tamu2 .'</a></b>';
   
      $mail->send();
      echo '';
   } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
   }
      echo "</div>";
      $pesan = "<div class='alert alert-info'>Undangan dikirim ke email tamu.</div>";
   } else {
      $pesan = "<script>HAHAHAHAHAAH</script>";
   }
   }
   
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>kirim Undangan</title>
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
                     <h3 class="account-title">Kirim</h3>
                     <p class="account-subtitle">_______</p>
                     <?php
                        echo $pesan;

                        $query2 = mysqli_query($conn, "SELECT * FROM tb_tamu WHERE id_tamu = '$id_tamu2'");

                     if (mysqli_num_rows($query2) > 0) {
                        $wkwk = mysqli_fetch_assoc($query2);
                     }
                        
                        ?>
                     <form action="" method="POST">
                     <div class="form-group">
                           <label>Nama Tamu</label>
                           <input class="form-control" type="text" placeholder="Nama Tamu" name="nama_tamu" required >
                        </div>
                        <div class="form-group">
                           <label>Email</label>
                           <input class="form-control" type="email" placeholder="Email Tamu" name="email_tamu" required >
                        </div>
                        <div class="form-group text-center">
                           <button class="btn btn-primary account-btn" name="submit" type="submit">Kirim</button>
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