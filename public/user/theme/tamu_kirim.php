<?php

    session_start();

      if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: ../user_login.php");
        die();
     }

     require '../vendor/autoload.php';
         
     include '../../../config/connect.php';

     $id_undangan = $_GET['id_undangan'];
     $id_tamu2 = $_GET['id_tamu'];
   
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

   $query3 = mysqli_query($conn, "SELECT * FROM udn_ultah WHERE id_user = '{$gege['id_user']}' AND id_ultah = '$id_undangan'");
    
   if (mysqli_num_rows($query3) > 0) {
      $gege3 = mysqli_fetch_assoc($query3);
   }  
    

   $pesan = "";
   
   if (isset($_POST['submit']) ) {
    $namatamu = mysqli_real_escape_string($conn, $_POST['nama_tamu']);
    $emailtamu = mysqli_real_escape_string($conn, $_POST['email_tamu']);        
    $id_undangan = mysqli_real_escape_string($conn, $_POST['id_undangan']); 
   
        $insert = mysqli_query($conn, "INSERT INTO detail_tamu (`id_tamu`, `id_user`, `id_ultah`, `nama_tamu`, `email_tamu`) VALUES ( '{$gege2['id_tamu']}' , '{$gege['id_user']}', '$id_undangan', '$namatamu', '{$gege2['email_tamu']}' )");
        
         
        
   
        if ($insert) {
   
   $mail = new PHPMailer(true);
   
   try {
      //Server settings
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp-relay.sendinblue.com';                     //Set the SMTP server to send through
               $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
               $mail->Username   = 'rendering.fps88@gmail.com';                     //SMTP username
      $mail->Password   = 'xsmtpsib-336c0255d8f4ee646dea2f8c0c02f943f0d8bf23228a4580a5ec8c28ef264efa-akA9GmJn4HOyV7x2';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
   
      //Recipients
      $mail->setFrom('INVATE@invate.my.id');                            //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
   
      //Recipients
      $mail->setFrom('INVATE@invate.my.id');
      $mail->addAddress($emailtamu);
   
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Undangan';
      $mail->Body    = '<p style="text-align: center;">Click link untuk melihat undangan</p>
      
      <b style="text-align: center;><a style="text-align: href="http://localhost/app-inv/public/tema1/index.php?namatamuhehe='.$namatamu.'&id_undangan='.$id_undangan .'"> http://localhost/app-inv/public/tema1/index.php?namatamuhehe='.$namatamu.'&id_undangan='.$id_undangan .'</a></b>';
   
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
      <title>Kelola Data</title>
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
      <br>
      <div class="">
         <div class="container">
            <h2 class="text-center" style="color: #ddc190;">Edit Tamu</h2>
         </div>
      </div>
      <br><br>
      <div class="container px-4 py-5" id="">
         <?php
            echo $pesan;
            ?>
         <form action="" method="POST">
            <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Id Tamu</label>
               <input type="text" class="form-control" id="" name="id_user" value="<?php echo $row['id_user'] ?>" disabled>
               <br>
            </div>
            <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Nama Tamu</label>
               <input type="text" class="form-control" name="nama_tamu" required value="<?php echo $gege2['nama_tamu'] ?>">
               <br>
            </div>
            <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Email Tamu</label>
               <input type="text" class="form-control" name="email_tamu" required value="<?php echo $gege2['email_tamu'] ?>">
               <br>
            </div>
            <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Undangan Kamu</label>
               <input type="text" class="form-control" name="id_undangan" required value="<?php echo $gege3['judul_acara'] ?>">
               <br>
            </div>
            <button class="btn btn-primary" name="submit" type="submit">oke</button>
            
            
            <!-- Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Kirim</button>

                                          
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
         <h4 class="modal-title" id="exampleModalLabel">Kirim Undangan</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
         </div>
         <div class="modal-body">
         <h4>Kirim undangan ke <?php echo $gege2['nama_tamu']?> ?</h4>
         </div>
         <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
         <button type="submit" name="submit" class="btn btn-primary">Konfirmasi</button>
         </div>
      </div>
   </div>
</div>
<!-- MODAL -->
         </form>
      </div>
      <hr>
      <?php @include 'footer.php'; ?>
   </body>
</html>