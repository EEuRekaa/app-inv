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
        <p><?php echo $gege['username'] ?></p>
        <p><?php echo $gege['judul_acara'] ?></p>
        <p><?php echo $gege['deskripsi_acara'] ?></p>
        <p><?php echo $gege['hari'] ?></p>
        <p><?php echo $gege['tanggal'] ?></p>
        <p><?php echo $gege['jam'] ?></p>
        <p><?php echo $gege['tempat'] ?></p>
        <p><?php echo $gege['susunan_acara'] ?></p>
    </body>
</html>


<?php 

session_start();

include '../../../config/connect.php';

if (!isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: ./user_login.php");
    die();
 }

    $query = mysqli_query($conn, "SELECT * FROM user_account WHERE email = '{$_SESSION['SESSION_EMAIL']}'");
    
   if (mysqli_num_rows($query) > 0) {
      $gege = mysqli_fetch_assoc($query);
   }

   $id_ultah = $_GET['id_ultah2'];
    $query2 = mysqli_query($conn, "SELECT * FROM udn_ultah WHERE id_ultah = '{$id_ultah}'");
    
   if (mysqli_num_rows($query2) > 0) {
      $gege2 = mysqli_fetch_assoc($query2);
   }
   


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Undangan</title>
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
       
        
        <!-- Header-->
        <header class="masthead d-flex align-items-center">
            <div class="container px-4 px-lg-5 text-center">
                <h1 class="mb-1">Ulang tahun bang</h1>
                <h2 class="mb-5"><em><?php echo $gege['username'] ?></em></h2>
                
            </div>
        </header>
        <!-- About-->
        
        <!-- Services-->
        <section class="content-section bg-primary text-white text-center" id="services">
            <div class="container px-4 px-lg-5">
                <div class="content-section-heading">
                    <h2 class="text-secondary mb-0"><?php echo $gege2['judul_acara'] ?></h2>
                    <h3 class="mb-5"><?php echo $gege2['deskripsi_acara'] ?></h3>
                </div>
                
            </div>
        </section>
        <!-- Callout-->
        <section class="callout">
            <div class="container px-4 px-lg-5 text-center">
                <h2 class="mx-auto mb-5"><?php echo $gege2['hari'] ?></h2>
                <h2 class="mx-auto mb-5"><?php echo $gege2['tanggal'] ?></h2>
                <h2 class="mx-auto mb-5"><?php echo $gege2['jam'] ?></h2>
            </div>
        </section>
        <!-- Portfolio-->
        
        <!-- Call to Action-->
        <section class="content-section bg-primary text-white">
            <div class="container px-4 px-lg-5 text-center">
                <h2 class="mb-4">Tempat : <?php echo $gege2['tempat'] ?></h2>
                <h2 class="mb-4">Susunan Acara : <?php echo $gege2['susunan_acara'] ?></h2>
            </div>
        
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
