<?php
   session_start();

   
   if (!isset($_SESSION['SESSION_EMAIL'])) {
      header("Location: ./user_login.php");
      die();
   }
   
   
   require '../../config/connect.php';
   $pesan = "";

   $query = mysqli_query($conn, "SELECT * FROM user_account WHERE email = '{$_SESSION['SESSION_EMAIL']}'");
   
   if (mysqli_num_rows($query) > 0) {
      $row = mysqli_fetch_assoc($query);
   }
   

   

   $sql2 = "SELECT * FROM tb_tamu Where id_user='{$row['id_user']}'";
   $result2 = mysqli_query($conn,$sql2);
while ($query2 = mysqli_fetch_array($result2))
{
      


   
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
   <?php }?>
      <h1>Welcome <?php echo $row['username'] ?></h1>
      <?php
         echo $pesan;         

         ?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Judul Acara</th>
      <th scope="col">Deskripsi Acara</th>
      <th scope="col">Hari</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Jam</th>
      <th scope="col">Tempat</th>
      <th scope="col">Susunan Acara</th>
      <th scope="col">Event</th>
    </tr>
  </thead>  
  <tbody>
  <?php
  
  $no="1";
  $query = mysqli_query($conn, "SELECT * FROM udn_ultah WHERE id_user='{$row['id_user']}' ORDER BY id_ultah DESC");
  while ($data=mysqli_fetch_array($query)) {
  
  ?>
    <tr>
      <td><?php echo $no++;?></td>
      <td><?php echo $data['judul_acara']?></td>
      <td><?php echo $data['deskripsi_acara']?></td>
      <td><?php echo $data['hari']?></td>
      <td><?php echo $data['tanggal']?></td>
      <td><?php echo $data['jam']?></td>
      <td><?php echo $data['tempat']?></td>
      <td><?php echo $data['susunan_acara']?></td>
      <td>
      <a href="./tema1/index.php?id_ultah2=<?php echo $data['id_ultah'];?>"><button class="btn btn-outline-primary">Lihat undangan</button></a>
      <a href="./tamu_kirim.php?id_ultah=<?php echo $data ['id_ultah'];  ?> "><button class="btn btn-outline-primary">Kirim ke tamu</button></a>
                                          
                                          <!-- Modal -->
                                          <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal">DELETE</button>

                                          
                                          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                             <div class="modal-dialog">
                                                <div class="modal-content">
                                                   <div class="modal-header">
                                                   <h4 class="modal-title" id="exampleModalLabel">Hapus Data User</h4>
                                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                   </button>
                                                   </div>
                                                   <div class="modal-body">
                                                   <h4>Anda yakin ingin menghapus data user ini?</h4>
                                                   </div>
                                                   <div class="modal-footer">
                                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                   <a href="delete_user.php?id_user=<?php echo $data['id_user'];?>"><button type="button" class="btn btn-primary">Konfirmasi</button></a>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- MODAL -->
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

