<?php
   session_start();
   
      
      if (!isset($_SESSION['SESSION_EMAIL'])) {
         header("Location: ../user_login.php");
         die();
      }
      
      
      
      require '../../../config/connect.php';

      $id_ultah2 = $_GET['id_ultah'];
      
   
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
      <div class="">
         <div class="container">
            <h2 class="text-center" style="color: #ddc190;">Data Tamu</h2>
         </div>
      </div>
      <br><br>
      <div class="container px-4 py-5" id="">
         
         
         <div class="row">
            <div class="col-sm-12">
               <div class="card mb-0">
                  <div class="card-header">
                     <h4 class="card-title mb-0 text-right"><a href="./tambah_tamu.php" class="btn btn-info"><i class="la la-plus-circle"></i> Tambahkan Data Tamu</a></h4>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="datatable table table-stripped mb-0 text-center">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>Username</th>
                                 <th>Email</th>
                                 <th>Event</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php 
                                 $no="1";
                                 $query = mysqli_query($conn, "SELECT * FROM tb_tamu WHERE id_user='{$row['id_user']}' ORDER BY id_tamu DESC");
                                 while ($data=mysqli_fetch_array($query)) { ?>
                              <tr>
                                 <td><?php echo $no++;?></td>
                                 <td><?php echo $data['nama_tamu']?></td>
                                 <td><?php echo $data['email_tamu']?></td>
                                 <td class="text-center">
                                    <a href="tamu_kirim.php?id_tamu=<?php echo $data['id_tamu']?>&id_undangan=<?php echo $id_ultah2 ?>"><button class="btn btn-outline-primary">Kirim Undangan</button></a>
                                    <a href="edit_tamu.php?id_tamu=<?php echo $data['id_tamu'];?>"><button class="btn btn-outline-warning">EDIT</button></a>
                                    <!-- Modal -->
                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal">DELETE</button>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                       <div class="modal-dialog">
                                          <div class="modal-content">
                                             <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">Hapus Data Tamu</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                             </div>
                                             <div class="modal-body">
                                                <h4>Anda yakin ingin menghapus <?php echo $data['nama_tamu']?>?</h4>
                                             </div>
                                             <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <a href="tamu_delete.php?id_tamu=<?php echo $data['id_tamu'];?>"><button type="button" class="btn btn-primary">Konfirmasi</button></a>
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