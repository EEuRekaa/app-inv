<?php
session_start();

if (!isset($_SESSION["SESSION_EMAIL"])) {
    header("Location: ../user_login.php");
    die();
}

require "../../../config/connect.php";

$id_udn = $_GET['id_udn'];

$query = mysqli_query(
    $conn,
    "SELECT * FROM user_account WHERE email = '{$_SESSION["SESSION_EMAIL"]}'"
);

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
      <?php @include "header.php"; ?>
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
                     <h4 class="card-title mb-0 text-right">
                        <a href="./undangan_table.php"><button  class="btn btn-outline-warning">Kembali</button></a>
                        <a href="./tambah_tamu.php?id_udn=<?php echo $id_udn?>" class="btn btn-info"><i class="la la-plus-circle"></i> Tambahkan Data Tamu</a></h4>
                  </div>
                  <div class="card-body">
                     
                     <div class="table-responsive">
                     
                           
                        <?php
                        $rows = mysqli_query($conn, "SELECT * FROM tb_tamu WHERE id_undangan = '$id_udn'");
                        ?>
                        <table class="datatable table table-stripped mb-0 text-center" border = 1 cellspacing = 0 cellpadding = 10>
                           <tr>
                           <th>#</th>
                           <th>Nama Tamu</th>
                           <th>Email Tamu</th>
                           <th>Kirim</th>
                           <th>Action</th>
                           </tr>
                              <?php
         
                                 $no = "1";

                                 foreach($rows as $row) : ?>
                                    <tr id = "<?php echo $row["id_tamu"]; ?>">
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row["nama_tamu"]; ?></td>
                                    <td><?php echo $row["email_tamu"]; ?></td>
                                    <td>
                                    
                                    <a href="tamu_kirim.php?id_udn=<?php echo $id_udn ?>&id_tamu=<?php echo $row['id_tamu']?>">
                                    <button class="btn btn-outline-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
  <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
</svg>
                                       </button>
                                    </a>
                                    </td>
                                    <td>
                                       
                                    <a href="edit_tamu.php?id_tamu=<?php echo $row["id_tamu"]; ?>&id_udn=<?php echo $id_udn?>">
                                    <button class="btn btn-outline-warning">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                             <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                             <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                          </svg>
                                       </button>
                                    </a>   
                                    <button type="button" name="button" class="btn btn-outline-danger" onclick = "deletedata(<?php echo $row['id_tamu']; ?>);">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                              <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                                           </svg></button> </td>
                                    </tr>
                                 <?php endforeach; ?>
                           </table>    
                                                
                     </div>
                  </div>
                  
               </div>
            </div>
         </div>
      </div>
      <script type="text/javascript">
      // Function
      function deletedata(id){
        $(document).ready(function(){
          $.ajax({
            // Action
            url: 'tamu_delete.php',
            // Method
            type: 'POST',
            data: {
              // Get value
              id_tamu: id,
              action: "delete"
            },
            success:function(response){
              // Response is the output of action file
              if(response){
                alert("Berhasil Dihapus");
                document.getElementById(id).style.display = "none";
              }
              else if(response){
                alert("MALASSSS");
              }
            }
          });
        });
      }
    </script>
      <hr>
      <?php @include "footer.php"; ?>
   </body>
</html>