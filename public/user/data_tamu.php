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
<a href="./tambah_tamu.php?"><h4 class="text-right px-5">tambah tamu</h4></a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Tamu</th>
      <th scope="col">Email Tamu</th>
      <th scope="col">Event</th>
    </tr>
  </thead>  
  <tbody>
  <?php
  
  $no="1";
  $query = mysqli_query($conn, "SELECT * FROM tb_tamu WHERE id_user='{$row['id_user']}' ORDER BY id_tamu DESC");
  while ($data=mysqli_fetch_array($query)) {
  
  ?>
    <tr>
      <td><?php echo $no++;?></td>
      <td><?php echo $data['nama_tamu']?></td>
      <td><?php echo $data['email_tamu']?></td>
      <td>
         <a href="./tamu_kirim.php?id_tamu=<?php echo $data['id_tamu'];?>"><button class="btn btn-outline-primary">Kirim Undangan</a></button>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
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