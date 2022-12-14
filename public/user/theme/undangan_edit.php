<?php
session_start();

if (!isset($_SESSION["SESSION_EMAIL"])) {
    header("Location: .././user_login.php");
    die();
}

require "../../../config/connect.php";

$id_udn = $_GET["id_udn"];

$query = mysqli_query(
    $conn,
    "SELECT * FROM user_account WHERE email = '{$_SESSION["SESSION_EMAIL"]}'"
);

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
            <h2 class="text-center" style="color: #ddc190;">Ubah Isi Undangan</h2><hr>
        </div>
        <br>
        
        <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header text-right ">
                     <a href="undangan_table.php" class="btn btn-outline-warning">Kembali</a>
                  </div>
                  <div class="card-body">
                     <?php
                     echo $pesan;

                     if (isset($_GET["id_udn"])) {
                         $id_udn = $_GET["id_udn"];

                         if (empty($id_udn)) {
                             echo "ID tidak ada";
                         }
                     } else {
                         die("id tidak ada");
                     }

                     $query = "SELECT tb_ultah.*, tema.* FROM tb_ultah, tema WHERE tema.id_tema = tb_ultah.id_tema AND tb_ultah.id_undangan = $id_udn";
                     $sql = mysqli_query($conn, $query);
                     while ($hasil = mysqli_fetch_array($sql)) {

                         $id_udn = $hasil["id_undangan"];
                         $tema = $hasil["nama_tema"];
                         $judul_acara = $hasil["judul_acara"];
                         $hari = $hasil["hari"];
                         $tanggal = $hasil["tanggal"];
                         $jam = $hasil["jam"];
                         $tempat = $hasil["tempat"];
                         ?>
                     <form action="undangan_update.php?id_udn=<?php echo $id_udn; ?>" method="POST">
                     <div class="form-group row">
                           <label class="col-form-label col-md-2">Nama Tema</label>
                           <div class="col-md-10">
                              <input class="form-control" type="text" value="<?php echo $hasil[
                                  "nama_tema"
                              ]; ?>" name="id_tema" disabled>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-form-label col-md-2">Nama Kamu</label>
                           <div class="col-md-10">
                              <input class="form-control" type="text"  name="judul_acara" value="<?php echo $hasil[
                                  "judul_acara"
                              ]; ?>" required>
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
                              <input class="form-control" type="date"  name="tanggal" value="<?php echo $hasil[
                                  "tanggal"
                              ]; ?>" required>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-form-label col-md-2">Jam</label>
                           <div class="col-md-10">
                              <input class="form-control" type="time" name="jam" value="<?php echo $hasil[
                                  "jam"
                              ]; ?>" required>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-form-label col-md-2">Lokasi</label>
                           <div class="col-md-10">
                              <input class="form-control" type="text"  name="tempat" value="<?php echo $hasil[
                                  "tempat"
                              ]; ?>" required>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-form-label col-md-2">Detail Lokasi</label>
                           <div class="col-md-10">
                              <input class="form-control" type="text"  name="detail_tempat" value="<?php echo $hasil[
                                  "detail_tempat"
                              ]; ?>" required>
                           </div>
                        </div>
                        
                        <div class="form-group text-center">
                          <a href="../"></a>
                           <!-- Modal -->
                           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ubah</button>
                           <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h4 class="modal-title" id="exampleModalLabel">Ubah Undangan</h4>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       <h4>Anda yakin ingin mengubah undangan ini?</h4>
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
                     <?php
                     }
                     ?>
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