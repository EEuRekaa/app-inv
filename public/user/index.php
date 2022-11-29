<?php
   session_start();
   
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;
   
   if (!isset($_SESSION['SESSION_EMAIL'])) {
      header("Location: ./user_login.php");
      die();
   }
   
   require '../../vendor/autoload.php';
   
   include '../../config/connect.php';

   $query = mysqli_query($conn, "SELECT * FROM user_account WHERE email = '{$_SESSION['SESSION_EMAIL']}'");
   
   if (mysqli_num_rows($query) > 0) {
      $row = mysqli_fetch_assoc($query);
   }
   
   $pesan = "";
   
   if (isset($_POST['submit'])) {
      $id_ultah = mysqli_real_escape_string($conn, $_POST['nama_tamu']);
      $id_user = mysqli_real_escape_string($conn, $_POST['email_tamu']);        
      $judul_acara = mysqli_real_escape_string($conn, $_POST['email_tamu']);        
      $deskripsi_acara = mysqli_real_escape_string($conn, $_POST['email_tamu']);        
      $hari = mysqli_real_escape_string($conn, $_POST['email_tamu']);        
      $tanggal = mysqli_real_escape_string($conn, $_POST['email_tamu']);        
      $jam = mysqli_real_escape_string($conn, $_POST['email_tamu']);        
      $tempat = mysqli_real_escape_string($conn, $_POST['email_tamu']);        
      $susunan_acara = mysqli_real_escape_string($conn, $_POST['email_tamu']);        
     
          $insert = mysqli_query($conn, "INSERT INTO udn_ultah (nama_tamu, email_tamu) 
              VALUES('$namatamu', '$emailtamu')");
     
          if ($insert) {
     
      $mail = new PHPMailer(true);
      
      try {
         //Server settings
         $mail->isSMTP();                                            //Send using SMTP
         $mail->Host       = 'smtp-relay.sendinblue.com';                     //Set the SMTP server to send through
         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
         $mail->Username   = 'anonymoyan@tutanota.com';                     //SMTP username
         $mail->Password   = 'xsmtpsib-1011b000e4813ba86e48f16a64f0d61afd31c15cd360e6072b5e5df94a2f65a3-UzsE3Ch6QtIRybJ4';                               //SMTP password
         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
         $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
      
         //Recipients
         $mail->setFrom('INVATE@foragikitsune.my.id');
         $mail->addAddress($emailtamu);
      
         //Content
         $mail->isHTML(true);                                  //Set email format to HTML
         $mail->Subject = 'Undangan';
         $mail->Body    = '<p style="text-align: center;">Click link untuk melihat undangan</p>
         
         <b><a href="http://localhost/app-inv/public/tema1/index.php?namatamuhehe='.$namatamu.'"> http://localhost/app-inv/public/tema1/index.php?namatamuhehe='.$namatamu.'</a></b>';
      
         $mail->send();
         echo '';
      } catch (Exception $e) {
         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
         echo "</div>";
         $pesan = "<div class='alert alert-info'>Undangan dikirim ke email tamu.</div>";
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
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/line-awesome.min.css">
      <link rel="stylesheet" href="assets/css/style.css">
   </head>
   <body>
      <h1>Welcome <?php echo $row['username'] ?></h1>
      <?php
         echo $pesan;
         
         ?>

      <form action="./tema1/index.php" method="POST">
         <div class="form-group">
            <label for="">Email address</label>
            <input type="text" class="form-control" id="" name="">            
         </div>
         <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <a class="" href="./logout.php">Logout</a>


      <script src="assets/js/jquery-3.5.1.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script src="assets/js/jquery.slimscroll.min.js"></script>
      <script src="assets/js/app.js"></script>
   </body>
</html>