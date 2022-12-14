<?php
session_start();

if (!isset($_SESSION["SESSION_EMAIL"])) {
    header("Location: .././user_login.php");
    die();
}

require "../../../config/connect.php";

$id_tema = $_GET["id_tema"];
$query = mysqli_query(
    $conn,
    "SELECT * FROM user_account WHERE email = '{$_SESSION["SESSION_EMAIL"]}'"
);

if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
}

$query2 = mysqli_query($conn, "SELECT * FROM tema WHERE id_tema = '$id_tema'");

if (mysqli_num_rows($query2) > 0) {
    $row2 = mysqli_fetch_assoc($query2);
}

$pesan = "";

if (isset($_POST["submit"])) {
    $judul_acara = mysqli_real_escape_string($conn, $_POST["judul_acara"]);
    $hari = mysqli_real_escape_string($conn, $_POST["hari"]);
    $tanggal = mysqli_real_escape_string($conn, $_POST["tanggal"]);
    $jam = mysqli_real_escape_string($conn, $_POST["jam"]);
    $tempat = mysqli_real_escape_string($conn, $_POST["tempat"]);
    $detail_tempat = mysqli_real_escape_string($conn, $_POST["detail_tempat"]);

    $insert = "INSERT INTO `tb_ultah`(`id_undangan`, `id_tema`, `id_user`, `judul_acara`, `hari`, `tanggal`, `jam`, `tempat`, `detail_tempat`) VALUES ('', '{$row2["id_tema"]}', '{$row["id_user"]}','$judul_acara','$hari','$tanggal','$jam','$tempat','$detail_tempat')";

    mysqli_query($conn, $insert);
    echo "<script>alert('undangan berhasil dibuat');document.location.href='.././theme/undangan_table.php'</script>/n</script>";
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

    <br>

    <div class="container">
        <div class="">
            <h2 class="text-center" style="color: #ddc190;">Buat Undangan</h2><hr>
        </div>
        <br>
        
        <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header">
                     <h4 class="card-title mb-0">Buat Undangan</h4>
                  </div>
                  <div class="card-body">
                     <?php echo $pesan; ?>
                     <form action="" method="POST">
                     <div class="form-group row">
                           <label class="col-form-label col-md-2">Nama Tema</label>
                           <div class="col-md-10">
                              <input class="form-control" type="text" value="<?php echo $row2[
                                  "nama_tema"
                              ]; ?>" name="id_tema" disabled>
                           </div>
                        </div>
                        
                        <div class="form-group row">
                           <label class="col-form-label col-md-2">Nama Kamu</label>
                           <div class="col-md-10">
                              <input class="form-control" type="text"  name="judul_acara" required>
                           </div>
                        </div>
                        
                        <div class="form-group row">
                           <label class="col-form-label col-md-2">Hari</label>
                           <div class="col-md-10">
                           <select name="hari" id="" class="form-control">
                           <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                            <option value="Minggu">Minggu</option>
                           </select>
      </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-form-label col-md-2">Tanggal</label>
                           <div class="col-md-10">
                              <input class="form-control" type="date"  name="tanggal" required>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-form-label col-md-2">Jam</label>
                           <div class="col-md-10">
                              <input class="form-control" type="time" name="jam" required>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-form-label col-md-2">Lokasi</label>
                           <div class="col-md-10">
                              <input class="form-control" type="text" placeholder="Masukan nama lokasi kamu sesuai dengan Google Map" name="tempat" required>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-form-label col-md-2">Detail Lokasi</label>
                           <div class="col-md-10">
                              <input class="form-control" type="text" placeholder="Detail Bangunan / Jalan" name="detail_tempat" required>
                           </div>
                        </div>
                        
                        <div class="form-group text-center">
                          <a href="../"></a>
                           <!-- Modal -->
                           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Buat</button>
                           <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h4 class="modal-title" id="exampleModalLabel">Buat Undangan</h4>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       <h4>Anda yakin ingin membuat undangan ini?</h4>
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
                     </form>
                  </div>
               </div>
            </div>
         </div>
    </div>

    <br><br>

    
<div>

</div>
  </div>

    <hr>


    <?php @include "footer.php"; ?>
</body>
</html>