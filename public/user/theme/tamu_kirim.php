<?php
   session_start();
   
     if (!isset($_SESSION['SESSION_EMAIL'])) {
       header("Location: ../user_login.php");
       die();
    }
   
    require '../vendor/autoload.php';
    require './phpqrcode/qrlib.php';
        
    include '../../../config/connect.php';
   
    $id_undangan = $_GET['id_undangan'];
    $id_tamu2 = $_GET['id_tamu'];
    $tema = $_GET['id_tema'];
   
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;   
   
   
   
   
   $query = mysqli_query($conn, "SELECT * FROM user_account WHERE email = '{$_SESSION['SESSION_EMAIL']}'");
   
   if (mysqli_num_rows($query) > 0) {
     $gege = mysqli_fetch_assoc($query);
   } 
   
   $query2 = mysqli_query($conn, "SELECT * FROM tb_tamu WHERE id_tamu = '$id_tamu2'");
   
   if (mysqli_num_rows($query2) > 0) {
     $gege2 = mysqli_fetch_assoc($query2);
   }  
   
   $query3 = mysqli_query($conn, "SELECT * FROM tb_ultah WHERE id_user = '{$gege['id_user']}' AND id_ultah = '$id_undangan'");
   
   if (mysqli_num_rows($query3) > 0) {
     $gege3 = mysqli_fetch_assoc($query3);
   }  

   $query4 = mysqli_query($conn, "SELECT * FROM tema WHERE id_tema = '$tema'");
   
   if (mysqli_num_rows($query4) > 0) {
     $gege4 = mysqli_fetch_assoc($query4);
   }  
   
   
   $pesan = "";
   
   if (isset($_POST['submit']) ) {

      $code = $gege2['nama_tamu'];
      $path = 'images/';
      $file = $path.uniqid($code).".png";

      $ecc = 'L';
      $pixel_size = 10;
      $frame_size = 10;

         
       $insert = mysqli_query($conn, "INSERT INTO `detail_tamu`(`id_detail`, `id_tamu`, `id_ultah`, `qr_code`) VALUES ('','$id_tamu2','$id_undangan', '$file')");

       if ($insert) {
         QRcode::png($code, $file, $ecc, $pixel_size, $frame_size);
   
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
     $mail->setFrom('INVATE@invate.my.id');                            //SMTP password
     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
     $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
   
     //Recipients
     $mail->setFrom('INVATE@invate.my.id');
     $mail->addAddress($gege2['email_tamu']);
   
     //Content
     $mail->isHTML(true);                                  //Set email format to HTML
     $mail->Subject = 'Undangan';
     $mail->Body    = '   
     
     
     
     <body class="bg-light">
  <div class="container">
    <div class="card p-6 p-lg-10 space-y-4">
      <h1 class="h3 fw-700">
        Hai '.$gege2['nama_tamu'].'
      </h1>
      <p>
        Kamu mendapatkan undangan dari '.$gege['username'].' 

      </p>
      <p class="btn btn-primary p-3 fw-700">Klik link di bawah untuk melihat undangan kamu   .</p>
    </div>
    <div class="text-muted text-center my-6">
    <b style="text-align: center;><a style="text-align: center;" href="http://localhost/app-inv/public/user/theme/index'.$gege4['id_tema'].'.php?namatamuhehe='.$gege2['nama_tamu'].'&id_undangan='.$id_undangan.'&qr_code='.$file.'"> http://localhost/app-inv/public/user/theme/index'.$gege4['id_tema'].'.php?namatamuhehe='.$gege2['nama_tamu'].'&id_undangan='.$id_undangan.'&qr_code='.$file.'</a></b>
    </div>
  </div>
</body>

';
     
   
     $mail->send();
     echo '';
   } catch (Exception $e) {
     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
   }
     echo "</div>";
     $pesan = "<div class='alert alert-info'>Undangan dikirim ke email tamu. <a href='undangan_table.php'>Kembali</a></div>";
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
      <title>Kirim</title>
      <link rel="shortcut icon" type="image/x-icon" href="../../user/assets/img/favicon.png">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
         crossorigin="anonymous"></script>
      <style>
         .content{
         background-color: #ddc190;
         }
         .text-content{
         color: black;
         }
      </style>
   </head>
   <body style="background: #002939; color: #ffffff">
   <?php @include 'header.php'; ?>
      </form>
      <div class="account-content">
         <div class="container">
            
            <div class="account-box">
               <div class="account-wrapper">
                  <h3 class="account-title">INVATE</h3>
                  <p class="account-subtitle">Kirim Undangan</p>
                  <?php
                     echo $pesan;
                     
                     ?>
                  <form action="" method="POST">
                     
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Tamu</label>
                        <input type="text" class="form-control"  required value="<?php echo $gege2['nama_tamu'] ?>" disabled>
                        <br>
                     </div>
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email Tamu</label>
                        <input type="text" class="form-control"  required value="<?php echo $gege2['email_tamu'] ?>" disabled>
                        <br>
                     </div>
                     <div class="form-group text-center">
                        <button class="btn btn-primary account-btn" name="submit" type="submit">Kirim</button>
                     </div>
                     <div class="account-footer">
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      </div>
      <hr>
      <?php @include 'footer.php'; ?>
   </body>
</html>