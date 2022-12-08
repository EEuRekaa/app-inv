<?php
   session_start();
   
      
      if (!isset($_SESSION['SESSION_EMAIL'])) {
         header("Location: ../user_login.php");
         die();
      }
      
      
      require '../../../config/connect.php';
   
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
         color: #000000;
         }
      </style>
   </head>
   <body style="background: #002939; color: #ffffff">
      <?php @include 'header.php'; ?>
      <br>
      <div class="container">
         <h2 class="text-center" style="color: #ddc190;">Undangan Kamu</h2>
      </div>
      <div class="container px-4 py-5" id="">
         <hr>
         <div class="row">
            <div class="col-sm-12">
               <div class="card mb-0">
                  <div class="card-header">
                     <h4 class="card-title mb-0 text-right"><a href="../catalog/catalog.php" class="btn btn-info"><i class="la la-plus-circle"></i> Buat Undangan</a></h4>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="datatable table table-stripped mb-0 text-center">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>Tema</th>
                                 <th>Nama Kamu</th>
                                 <th>Hari</th>
                                 <th>Tanggal</th>
                                 <th>Jam</th>
                                 <th>Tempat</th>
                                 <th>Susunan Acara</th>
                                 <th>Event</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php 
                                 $no="1";
                                 // $query = mysqli_query($conn, "SELECT * FROM tb_ultah WHERE id_user='{$row['id_user']}'ORDER BY id_ultah DESC");
                                 $query = mysqli_query($conn, "SELECT tb_ultah.* , tema.* FROM tb_ultah, tema WHERE tema.id_tema = tb_ultah.id_tema ORDER BY id_ultah DESC");
                                 while ($data=mysqli_fetch_array($query)) {
                                 
                                 
                                 ?>
                              <tr>
                                 <td><?php echo $no++;?></td>
                                 <td><?php echo $data['nama_tema']?></td>
                                 <td><?php echo $data['judul_acara']?></td>
                                 <td><?php echo $data['hari']?></td>
                                 <td><?php echo $data['tanggal']?></td>
                                 <td><?php echo $data['jam']?></td>
                                 <td><?php echo $data['tempat']?></td>
                                 <td>
                                 <a href="./susunan_table.php?id_ultah=<?php echo $data['id_ultah'];?>  "><button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal">
                                       Susunan Acara
                                    </button>
                                 </a>
                                 </td>
                                 <td class="text-center">
                                    <a href="table_tamu.php?id_ultah=<?php echo $data['id_ultah'];?>&id_tema=<?php echo $data['id_tema'];?>"><button class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
  <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
</svg></button></a>
                                    <a href="./tema<?php echo $data['id_tema'];?>/index.php?id_ultah2=<?php echo $data['id_ultah'];?>"><button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                          <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                          <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                       </svg>
                                    </button>
                                 </a>
                                    <a href="undangan_edit.php?id_ultah=<?php echo $data['id_ultah'];?>">
                                       <button class="btn btn-outline-warning">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                             <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                             <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                          </svg>
                                       </button>
                                    </a>
                                    <!-- Modal -->
                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                          <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                       </svg>
                                    </button>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                       <div class="modal-dialog">
                                          <div class="modal-content">
                                             <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">Hapus Undangan</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                             </div>
                                             <div class="modal-body">
                                                <h4>Anda yakin ingin menghapus Undangan ini?</h4>
                                             </div>
                                             <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <a href="undangan_delete.php?id_ultah=<?php echo $data['id_ultah'];?>"><button type="button" class="btn btn-primary">Konfirmasi</button></a>
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
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <hr>
      <?php @include 'footer.php'; ?>
   </body>
</html>