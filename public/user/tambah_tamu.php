<?php
   session_start();

   
   if (!isset($_SESSION['SESSION_EMAIL'])) {
      header("Location: ./user_login.php");
      die();
   }
   
   
   require '../../config/connect.php';

   $query = mysqli_query($conn, "SELECT * FROM user_account WHERE email = '{$_SESSION['SESSION_EMAIL']}'");
   
   if (mysqli_num_rows($query) > 0) {
      $row = mysqli_fetch_assoc($query);
   }

   $pesan = "";
   
   if (isset($_POST['submit'])) {  
      $nama_tamu = mysqli_real_escape_string($conn, $_POST['nama_tamu']);        
      $email_tamu = mysqli_real_escape_string($conn, $_POST['email_tamu']);  
      
      if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_tamu WHERE email_tamu='$email_tamu'"))) {
         $pesan = "<div class='alert alert-danger'>$email_tamu Email ini sudah digunakan.</div>";   
      
          
         
      } else {
         $insert = "INSERT INTO `tb_tamu`(`id_tamu`, `id_undangan`, `id_user`, `nama_tamu`, `email_tamu`) VALUES ('','','{$row['id_user']}','$nama_tamu','$email_tamu')";

          mysqli_query($conn, $insert);
          echo "<script>alert('berhasil')</script>";
        
      }
   }
      
   
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Tambah Tamu</title>
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

      <form action="" method="POST" autocomplete="off">
         <div class="form-group">
            <label for="">Id Anda</label>
            <input type="text" class="form-control" id="" name="id_user" value="<?php echo $row['id_user'] ?>" disabled>            
         </div>
         <div class="form-group">
            <label for="">Nama Tamu</label>
            <input type="text" class="form-control" id="" name="nama_tamu" required>            
         </div>
         <div class="form-group">
            <label for="">Email Tamu</label>
            <input type="text" class="form-control" id="" name="email_tamu" required>            
         </div>
         <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </form>
      <a class="" href="./logout.php">Logout</a>
      <a href="./data_undangan.php">Tables</a>
      <a href="./data_tamu.php">Data Tamu</a>


      <script src="assets/js/jquery-3.5.1.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script src="assets/js/jquery.slimscroll.min.js"></script>
      <script src="assets/js/app.js"></script>
   </body>
</html>