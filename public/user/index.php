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

   $pesan = "";

   if (isset($_POST['submit'])) {
      $username = mysqli_real_escape_string($conn, $_POST['username']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $password = mysqli_real_escape_string($conn,md5($_POST['password']));
      $confrimpassword = mysqli_real_escape_string($conn, md5($_POST['confirmpassword']));
      $v_code = mysqli_real_escape_string($conn, md5(rand()));

      if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user_account WHERE email='$email'"))) {
         $pesan = "<div class='alert alert-danger'>$email Email ini sudah digunakan.</div>";
      } else {
         if ($password === $confrimpassword) {
            $sql = "INSERT INTO user_account (username, email, password, v_code) VALUES ('$username', '$email', '$password', '$v_code')";
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
               $mail->Subject = 'INVITATION';
               $mail->Body    = 'Click link untuk melihat undangan <b><a href="http://localhost/app-inv/public/user/user_login.php?verification='.$v_code.'">  http://localhost/app-inv/public/user/user_tema1.php?code='.$v_code.'</a></b>';

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

   $query = mysqli_query($conn, "SELECT * FROM user_account WHERE email = '{$_SESSION['SESSION_EMAIL']}'");

   if (mysqli_num_rows($query) > 0) {
      $row = mysqli_fetch_assoc($query);
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
    <form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
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