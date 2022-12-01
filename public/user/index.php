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
      $judul_acara = mysqli_real_escape_string($conn, $_POST['judul_acara']);        
      $deskripsi_acara = mysqli_real_escape_string($conn, $_POST['deskripsi_acara']);        
      $hari = mysqli_real_escape_string($conn, $_POST['hari']);        
      $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);        
      $jam = mysqli_real_escape_string($conn, $_POST['jam']);        
      $tempat = mysqli_real_escape_string($conn, $_POST['tempat']);        
      $susunan_acara = mysqli_real_escape_string($conn, $_POST['susunan_acara']);        
     
      $insert = "INSERT INTO `udn_ultah`(`id_ultah`, `id_user`, `judul_acara`, `deskripsi_acara`, `hari`, `tanggal`, `jam`, `tempat`, `susunan_acara`) VALUES ('', '{$row['id_user']}','$judul_acara','$deskripsi_acara','$hari','$tanggal','$jam','$tempat','$susunan_acara')";

          mysqli_query($conn, $insert);
          echo "<script>alert('Berhasil di tambahkan')</script>";
         
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

      <form action="" method="POST" autocomplete="off">
         <div class="form-group">
            <label for="">Id Anda</label>
            <input type="text" class="form-control" id="" name="id_user" value="<?php echo $row['id_user'] ?>" disabled>            
         </div>
         <div class="form-group">
            <label for="">Judul Acara</label>
            <input type="text" class="form-control" id="" name="judul_acara">            
         </div>
         <div class="form-group">
            <label for="">Deskripsi Acara</label>
            <input type="text" class="form-control" id="" name="deskripsi_acara">            
         </div>
         <div class="form-group">
            <label for="">Hari</label>
            <select name="hari" id="">
               <option value="Senin">Senin</option>
               <option value="Selasa">Selasa</option>
               <option value="Rabu">Rabu</option>
               <option value="Kamis">Kamis</option>
               <option value="Jumat">Jumat</option>
               <option value="Sabtu">Sabtu</option>
               <option value="Minggu">Minggu</option>
            </select>            
         </div>
         <div class="form-group">
            <label for="">Tanggal</label>
            <input type="date" class="form-control" id="" name="tanggal">            
         </div>
         <div class="form-group">
            <label for="">Jam</label>
            <input type="time" class="form-control" id="" name="jam">            
         </div>
         <div class="form-group">
            <label for="">Tempat</label>
            <input type="text" class="form-control" id="" name="tempat">            
         </div>
         <div class="form-group">
            <label for="">Susunan Acara</label>
            <input type="text" class="form-control" id="" name="susunan_acara">            
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