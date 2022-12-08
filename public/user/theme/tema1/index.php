<?php 

session_start();

include '../../../../config/connect.php';

if (!isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: ../user_login.php");
    die();
 }

    $query = mysqli_query($conn, "SELECT * FROM user_account WHERE email = '{$_SESSION['SESSION_EMAIL']}'");
    
   if (mysqli_num_rows($query) > 0) {
      $gege = mysqli_fetch_assoc($query);
   }

   $id_ultah = $_GET['id_ultah2'];
    $query2 = mysqli_query($conn, "SELECT * FROM tb_ultah WHERE id_ultah = '{$id_ultah}'");
    
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
      <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">
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
                <h1 class="mb-1">Hi! <p><?php echo $gege['username'] ?></p></h1>
                
            </div>
        </header>
        
        <!-- About-->
        
        <!-- Services-->
        <section class="content-section bg-primary text-white text-center" id="services">
            <div class="container px-4 px-lg-5">
                <div class="content-section-heading">
                    <h2 class="text mb-0">Kamu diundang ke pesta</h2>
                    <h1 class="text-secondary mb-0">ULANG TAHUN</h1>
                    <h1 class="text-secondary mb-0"> <?php echo $gege2['judul_acara'] ?></h1>
                   
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
                <h2 class="mb-4">Tempat</h2>
                <h2 class="mb-4"><?php echo $gege2['tempat'] ?></h2>
            </div>
        </section>

        <section id="map">
        <div class="bingkai">
        </div>

        <div class="map" id="contact">
        <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo $gege2['tempat'] ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            
        </div>
    </section>
        <section class="content-section bg-primary text-white">
            <div class="container px-4 px-lg-5 text-center">
                <h2 class="mb-4">Susunan Acara</h2>
                <?php 

$query = mysqli_query($conn, "SELECT * FROM susunan_acara WHERE id_undangan = $id_ultah");
while ($data=mysqli_fetch_array($query)) {
                
                ?>
                <h3 class="lead text-center">
                    <?php echo $data['susunan_acara']?>
</h3>

                <?php } ?>
            </div>
        </section>

        <section class="callout">
            <div class="container px-4 px-lg-5 text-center">
            <h2 class="mx-auto mb-5 text-white">QR Code tamu</h2>
            
            <img src="../images/NADITYA638d3f7925413.png" alt="">
                
            </div>
        </section>
        
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
