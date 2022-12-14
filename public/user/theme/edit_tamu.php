<?php
session_start();

if (!isset($_SESSION["SESSION_EMAIL"])) {
    header("Location: .././user_login.php");
    die();
}

require "../../../config/connect.php";

$query = mysqli_query(
    $conn,
    "SELECT * FROM user_account WHERE email = '{$_SESSION["SESSION_EMAIL"]}'"
);

if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
}

$pesan = "";

$id_tamu = $_GET["id_tamu"];
$id_udn = $_GET["id_udn"];
if (isset($_POST["submit"])) {
    # code...

    $namatamu = $_POST["nama_tamu"];
    $emailtamu = $_POST["email_tamu"];

    $query =
        "UPDATE tb_tamu SET `nama_tamu`='" .
        $namatamu .
        "', `email_tamu`='" .
        $emailtamu .
        "' WHERE `id_tamu`='" .
        $id_tamu .
        "' ";

    $sql = mysqli_query($conn, $query);

    if ($sql) {
        $pesan =
            "<div class='alert alert-info'>Data berhasil diubah. <a href='tamu_tablesend.php?id_udn=$id_udn'> kembali ke datfar tamu.</a></div>";
    } else {
        $pesan = "<div class='alert alert-danger'>Data gagal diubah.</div>";
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
      <?php @include "header.php"; ?>
      <div class="main-wrapper">
         <div class="account-content">
            <div class="container">
               <div class="account-box">
                  <div class="account-wrapper">
                     <h3 class="account-title">Ubah Data Tamu</h3>
                     <p class="account-subtitle"></p>
                     <?php
                     echo $pesan;

                     $query = "SELECT * FROM `tb_tamu` WHERE `id_tamu`='$id_tamu'";
                     $sql = mysqli_query($conn, $query);
                     while ($hasil = mysqli_fetch_array($sql)) {

                         $id_tamu = $hasil["id_tamu"];
                         $nama_tamu = $hasil["nama_tamu"];
                         $emailtamu = $hasil["email_tamu"];
                         ?>
                     <form action="" method="POST">
                        <div class="form-group">
                           <label>Nama Tamu</label>
                           <input class="form-control" type="text" name="nama_tamu" value="<?php echo $nama_tamu; ?>" >
                        </div>
                        <div class="form-group">
                           <label>Email Tamu</label>
                           <input class="form-control" type="email" name="email_tamu" placeholder="Email"  value="<?php echo $emailtamu; ?>">
                        </div>
                        <div class="form-group text-center">
                           <!-- Modal -->
                           <button type="button" class="btn btn-primary account-btn" data-toggle="modal" data-target="#exampleModal">Ubah Data</button>
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
                                       <h4>Anda yakin ingin mengubah data <?php echo $hasil[
                                           "nama_tamu"
                                       ]; ?> ?</h4>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                       <button type="submit" name="submit" class="btn btn-primary">Konfirmasi</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- MODAL -->
                        </div>
                        <div class="account-footer">
                           <p><a href="./tamu_tablesend.php?id_udn=<?php echo $id_udn?>">Kembali</a></p>
                        </div>
                     </form>
                     <?php
                     }
                     ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <br><br>
      <hr>
      <?php @include "footer.php"; ?>
   </body>
</html>