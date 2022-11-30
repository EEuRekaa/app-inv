<?php 

session_start();

include '../../config/connect.php';


$namatamu = $_GET['namatamuhehe'];
$id_undangan = $_GET['id_undangan'];
    $query = mysqli_query($conn, "SELECT * FROM udn_ultah WHERE id_ultah = '{$id_undangan}'");
    
   if (mysqli_num_rows($query) > 0) {
      $gege = mysqli_fetch_assoc($query);
   }

    $query = mysqli_query($conn, "SELECT * FROM tb_tamu WHERE id_tamu = '{$namatamu}'");
    
   if (mysqli_num_rows($query) > 0) {
      $gege = mysqli_fetch_assoc($query);
   }


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Stylish Portfolio - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Simple line icons-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <p></p>
        <p><?php echo $namatamu ?></p>
        <p><?php echo $gege['judul_acara'] ?></p>
        <p><?php echo $gege['deskripsi_acara'] ?></p>
        <p><?php echo $gege['hari'] ?></p>
        <p><?php echo $gege['tanggal'] ?></p>
        <p><?php echo $gege['jam'] ?></p>
        <p><?php echo $gege['tempat'] ?></p>
        <p><?php echo $gege['susunan_acara'] ?></p>
    </body>
</html>
