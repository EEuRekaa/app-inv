<?php

session_start();

include "../../../../config/connect.php";

$id_tamu = $_GET["id_tamu"];
$id_undangan = $_GET["id_undangan"];

$query = mysqli_query($conn,"SELECT tb_ultah.* , detail_tamu.* FROM tb_ultah, detail_tamu WHERE detail_tamu.id_undangan = tb_ultah.id_undangan AND id_tamu = '$id_tamu'"
);

if (mysqli_num_rows($query) > 0) {
    $gege2 = mysqli_fetch_assoc($query);
}

$query = mysqli_query($conn,"SELECT * FROM tb_tamu WHERE id_tamu = '$id_tamu'"
);

if (mysqli_num_rows($query) > 0) {
    $tamu = mysqli_fetch_assoc($query);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Undangan</title>
    <meta name="description" content="Core HTML Project">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/favicon.png">
    <link rel="stylesheet" href="../tema3/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../tema3/vendor/select2/select2.min.css">
    <link rel="stylesheet" href="../tema3/vendor/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="../tema3/vendor/lightcase/lightcase.css">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400|Work+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="../tema3/css/style.min.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link href="https://file.myfontastic.com/7vRKgqrN3iFEnLHuqYhYuL/icons.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

</head>
<body data-spy="scroll" data-target="#navbar-nav-header" class="static-layout">
	<div class="boxed-page">
		<nav id="gtco-header-navbar" class="navbar navbar-expand-lg py-4">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#" style="color: white;">
            <span class="lnr lnr-moon"></span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-nav-header" aria-controls="navbar-nav-header" aria-expanded="false" aria-label="Toggle navigation">
            <span class="lnr lnr-menu"></span>
        </button>
        
    </div>
    
</nav>		<div class="jumbotron d-flex align-items-center" style="background-image: url(../tema3/img/hitam.jpg)">
  <div class="container text-center">
  </div>
</div>		<section id="gtco-who-we-are" class="bg-white">
    <div class="container">
        <div class="section-content">
            <div class="title-wrap">
                <h1 class="display-2 mb-4">Hi <?php echo $tamu['nama_tamu'] ?></h1>
    <p>
        aku <?php echo $gege2['judul_acara']?> akan mengadakan pesta untuk merayakan ulang tahunku. Acaranya akan berlangsung pada hari <?php echo $gege2['hari']?>, <?php echo $gege2['tanggal']?>. <br>
        Aku harap kamu dapat datang bersama teman-teman lainnya. Sampai jumpa!
    </p><br>

    <h2 class="mb-4">Waktu</h2>
    <p>
    <?php echo $gege2['hari']?>
    </p>
    <p>
    <?php echo $gege2['tanggal']?>
    </p>
    <p>
    <?php echo $gege2['jam']?>
    </p><br>

    <h2 class="mb-4">Lokasi</h2>
    <p>
    <?php echo $gege2['tempat']?>
    </p>
    <p>
    <?php echo $gege2['detail_tempat']?>
    </p>
            </div>
            
            
        </div>
    </div>
</section>		
<section id="map"><br><br><br>
    <div class="bingkai">
        <div class="line"></div>
        <div class="line"></div>
    </div>

    <div class="map" id="contact">
    <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo $gege2[
            "tempat"
        ]; ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        <br />
    </div>
    <br><br><br>
</section>
<section id="gtco-blog" class="bg-grey">
    <div class="container">
        <div class="section-content">
            <div class="title-wrap mb-5">
                <h2 class="section-title">Susunan Acara</b></h2>
                <p class="section-sub-title"><?php
            $query = mysqli_query(
                $conn,
                "SELECT * FROM susunan_acara WHERE id_undangan = $id_undangan"
            );
            while ($data = mysqli_fetch_array($query)) { ?>
                <p class="text-center">
                    <?php echo $data["susunan_acara"]; ?>
                    - <?php echo $data["jam"]; ?>
                </p>

                <?php }
            ?></p>
            </div>
            <div class="row">
                <div class="col-md-12 blog-holder">
                    <div class="row">
                        <div class="col-md-4 blog-item-wrapper">
                            
                        </div>
                        <div class="col-md-4 blog-item-wrapper">
                            <div class="blog-item">
                                <div class="blog-img">
                                <img src="../<?php echo $gege2["qr_code"]; ?>" alt="">  
                                </div>
                                <div class="blog-text">
                                    <div class="blog-title">
                                        <a href="#" class="text-center"><h4>QR Code tamu</h4></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



	
</div>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
	<script src="../tema3/vendor/bootstrap/popper.min.js"></script>
	<script src="../tema3/vendor/bootstrap/bootstrap.min.js"></script>
	<script src="../tema3/vendor/select2/select2.min.js "></script>
	<script src="../tema3/vendor/owlcarousel/owl.carousel.min.js"></script>
	<script src="../tema3/vendor/isotope/isotope.min.js"></script>
	<script src="../tema3/vendor/lightcase/lightcase.js"></script>
	<script src="../tema3/vendor/waypoints/waypoint.min.js"></script>
	<script src="../tema3/vendor/countTo/jquery.countTo.js"></script>

	<script src="../tema3/js/app.min.js "></script>
	<script src="//localhost:35729/livereload.js"></script>
</body>
</html>
