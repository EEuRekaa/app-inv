<?php
session_start();

if (!isset($_SESSION["SESSION_EMAIL"])) {
    header("Location: ../user_login.php");
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

if (isset($_POST["submit"])) {
    $susunan_acara = mysqli_real_escape_string($conn, $_POST["susunan_acara"]);
    $jam = mysqli_real_escape_string($conn, $_POST["jam"]);

    $insert = "INSERT INTO `susunan_acara`(`id_susunan`, `id_undangan`, `susunan_acara`, `jam`) VALUES ('','$id_udn','$susunan_acara','$jam')";

    mysqli_query($conn, $insert);
    echo "<script>document.location.href='.././theme/susunan_table.php?id_udn=$id_udn'</script>/n</script>";
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

         <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
         
         
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
      <div class="container">
         <h2 class="text-center" style="color: #ddc190;">Susunan Acara</h2>
      </div>
      <div class="container px-4 py-5" id="">
         <hr>
         <div class="row">
            <div class="col-sm-12">
            <div class="card mb-0">
                  <div class="card-header">

                  <?php  ?>
<div class="text-right py-3">
                     <a href="./undangan_table.php" class="btn btn-outline-warning">Kembali</a>
                     </div>
                  <form action="" method="POST">
                     <div class="form-group row">                        
                        
                        <div class="col">
                           <label for="">Acara</label>
                           <input class="form-control" type="text" placeholder="Acara" required name="susunan_acara">
                        </div>
                        <div class="col">
                           <label for="">Jam</label>
                           <input class="form-control" type="time"  name="jam" required>
                        </div>                                                                           
                     </div>
                     <div class="text-center">
                     <button class="btn btn-info" name="submit" id="submit" type="submit">Tambah Susunan</button>
                     </div>
                     
                        <div class="form-group text-center">
                          <a href="../"></a>
                        
                        </div>
                     </form>
                  </div>
                  <div class="card-body">
                     
                     <div class="table-responsive">
                     
                           
                        <?php
                        $rows = mysqli_query($conn, "SELECT * FROM susunan_acara WHERE id_undangan = '$id_udn'");
                        ?>
                        <table class="datatable table table-stripped mb-0 text-center" border = 1 cellspacing = 0 cellpadding = 10>
                           <tr>
                           <th>#</th>
                           <th>Susunan Acara</th>
                           <th>Jam</th>
                           <th>Action</th>
                           </tr>
                              <?php
         
                                 $no = "1";

                                 foreach($rows as $row) : ?>
                                    <tr id = "<?php echo $row["id_susunan"]; ?>">
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row["susunan_acara"]; ?></td>
                                    <td><?php echo $row["jam"]; ?></td>
                                    <td> <button type="button" name="button" class="btn btn-outline-danger" onclick = "deletedata(<?php echo $row['id_susunan']; ?>);">
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
      </div>
      <script type="text/javascript">
      // Function
      function deletedata(id){
        $(document).ready(function(){
          $.ajax({
            // Action
            url: 'susunan_delete.php',
            // Method
            type: 'POST',
            data: {
              // Get value
              id_susunan: id,
              action: "delete"
            },
            success:function(response){
              // Response is the output of action file
              if(response){
                alert("Susunan Berhasil Dihapus");
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