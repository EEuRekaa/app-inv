<?php
   session_start();

   
   if (!isset($_SESSION['SESSION_EMAIL'])) {
      header("Location: .././user_login.php");
      die();
   }
   
   
   require '../../../config/connect.php';

   $query = mysqli_query($conn, "SELECT * FROM user_account WHERE email = '{$_SESSION['SESSION_EMAIL']}'");
   
   if (mysqli_num_rows($query) > 0) {
      $row = mysqli_fetch_assoc($query);
   }

   $pesan = "";
   
   if (isset($_POST['submit'])) {  
      $nama_tamu = mysqli_real_escape_string($conn, $_POST['nama_tamu']);        
      $email_tamu = mysqli_real_escape_string($conn, $_POST['email_tamu']);  
      
      if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_tamu WHERE email_tamu='$email_tamu'"))) {
        echo "<script>alert('Email {$email_tamu} sudah digunakan')</script>";   
      
          
         
      } else {
         $insert = "INSERT INTO `tb_tamu`(`id_tamu`, `id_undangan`, `id_user`, `nama_tamu`, `email_tamu`) VALUES ('','','{$row['id_user']}','$nama_tamu','$email_tamu')";

          mysqli_query($conn, $insert);
          echo "<script>alert('Berhasil ditambahkan');document.location.href='./table_tamu.php</script>";
        
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
            <h2 class="text-center" style="color: #ddc190;">Tambahkan Tamu</h2>
        </div>
    </div>

    <br><br>

    <div class="container px-4 py-5" id="">
    <?php
         echo $pesan;
         
         ?>
    <form method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Id Kamu</label>
    <input type="text" class="form-control" id="" name="id_user" value="<?php echo $row['id_user'] ?>" disabled>
    <br>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama Tamu</label>
    <input type="text" class="form-control" name="nama_tamu" required>
    <br>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email Tamu</label>
    <input type="email" class="form-control" name="email_tamu" required>
    <br>
  </div>

<!-- Modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambahkan</button>

                                          
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
         <h4 class="modal-title" id="exampleModalLabel">Edit Data User</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
         </div>
         <div class="modal-body">
         <h4>Anda yakin ingin menambah data ini?</h4>
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
<div>

</div>
  </div>

    <hr>


    <?php @include 'footer.php'; ?>
</body>
</html>