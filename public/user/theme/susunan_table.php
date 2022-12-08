<?php
   session_start();
   
      
      if (!isset($_SESSION['SESSION_EMAIL'])) {
         header("Location: ../user_login.php");
         die();
      }
      
      
      require '../../../config/connect.php';

      $id_ultah = $_GET['id_ultah'];
   
      $query = mysqli_query($conn, "SELECT * FROM user_account WHERE email = '{$_SESSION['SESSION_EMAIL']}'");
      
      if (mysqli_num_rows($query) > 0) {
         $row = mysqli_fetch_assoc($query);
      }
   
      $pesan = "";
   
   if (isset($_POST['submit'])) {         
      $susunan_acara = mysqli_real_escape_string($conn, $_POST['susunan_acara']);                 
     
      $insert = "INSERT INTO `susunan_acara`(`id_susunan`, `id_undangan`, `susunan_acara`) VALUES ('','$id_ultah','$susunan_acara')";

          mysqli_query($conn, $insert);
          echo "<script>document.location.href='.././theme/susunan_table.php?id_ultah=$id_ultah'</script>/n</script>";
         
      }

   if (isset($_POST['delete'])) {         
      $id_susunan = mysqli_real_escape_string($conn, $_POST['id_susunan']);                 
     
      $insert = "DELETE FROM `susunan_acara` WHERE id_susunan = '$id_susunan'";

          mysqli_query($conn, $insert);
          echo "<script>document.location.href='.././theme/susunan_table.php?id_ultah=$id_ultah'</script>/n</script>";
         
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
         <h2 class="text-center" style="color: #ddc190;">Susunan Acara</h2>
      </div>
      <div class="container px-4 py-5" id="">
         <hr>
         <div class="row">
            <div class="col-sm-12">
            <div class="card mb-0">
                  <div class="card-header">

                  <?php 
                  
                  
                  
                  ?>

                  <form action="" method="POST">
                     <div class="form-group row">
                           
                        
                        <div class="form-group text-center">
                           <div class="">
                              <input class="form-control" type="text"  name="susunan_acara"><br>
                              <button class="btn btn-info" name="submit" id="submit" type="submit">Tambah Susunan</button>
                           </div>
                        </div>
                        
                        <div class="form-group text-center">
                          <a href="../"></a>
                        
                        </div>
                     </form>
                  </div>
                  <div class="card-body">
                     
                     <div class="table-responsive">
                        
                        <table class="datatable table table-stripped mb-0 text-center">
                           
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>Susunan Acara</th>
                                 <th>Event</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php 
                                 $no="1";
                                 // $query = mysqli_query($conn, "SELECT * FROM tb_ultah WHERE id_user='{$row['id_user']}'ORDER BY id_ultah DESC");
                                 $query = mysqli_query($conn, "SELECT * FROM susunan_acara WHERE id_undangan = $id_ultah");
                                 while ($data=mysqli_fetch_array($query)) {
                                 
                                 
                                 ?>
                              <tr>
                                 <td><?php echo $no++;?></td>
                                 <td><?php echo $data['susunan_acara']?></td>
                                 <td class="text-center">                                    
                                    
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
                                             <form action="" method="POST">
                                             <div class="modal-body">
                                                <h4>Anda yakin ingin menghapusnya?</h4>
                                                <input type="text" name="id_susunan" value="<?php echo $data['id_susunan']?>" id="" class="form-control" readonly>
                                             </div>
                                             <div class="modal-footer">
                                                
                                                <button type="button" name class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                
                                                <button name="delete" type="submit" class="btn btn-primary">Konfirmasi</button>
                                                
                                             </div>
                                             </form>
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
      </div>


      <hr>
      <?php @include 'footer.php'; ?>
   </body>
</html>