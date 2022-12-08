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

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aku & Kamu</title>
    <link rel="stylesheet" href="undangan2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <div class="navbars">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container">
                <a class="navbar-brand" href="#"><strong>To, </strong>Tamu</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link" style="color: #ecafad;" href="#tujuan">Acara</a>
                        <a class="nav-link" style="color: #ecafad;" href="#resepsi">Waktu</a>
                        <a class="nav-link" style="color: #ecafad;" href="#map">Map</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="hero">
        <h2>Happy Birthday</h2>
        <h1><?php echo $gege2['judul_acara'] ?></h1>
        <h3> <?php echo $gege2['hari']?>, <?php echo $gege2['tanggal']?>
        </h3>
    </div>


    <section id="tujuan">
        <div class="bingkai">
            <div class="line"></div>
            <h1>Acara</h1>
            <div class="line"></div>
        </div>

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-6">
                    <img src="image/bismillah.png" class="bismillah" alt="bismillah">
                </h1>
                <p class="lead text-center"> Assalamu'alaikum Warahmatullahi Wabarakatuh.
                    <br />
                    Dengan memohon rahmat dan ridha Allah swt,
                    <br />
                    kami bermaksud mengundang teman-teman pada acara ulang tahun.
                </p>
            </div>
        </div>

        <br><br><br>

        <div class="inv">
            <h2>
                Birthday Invitaion
                <br>
                __
                <br>
                <?php echo $gege2['judul_acara']?>
            </h2>
        </div>

        <br><br><br>
    </section>

    <!-- <div class="bouquet_container">
        <img class="bouquet" src="https://cdn.pixabay.com/photo/2020/09/01/18/13/background-5535928_960_720.png"
            alt="" />
    </div> -->

    <section id="resepsi">
        <div class="bingkai">
            <div class="line"></div>
            <h1>Waktu</h1>
            <div class="line"></div>
        </div>
        <div class="jumbotron">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <section class="resepsi_img"></section>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="section_container_akad container">
                            <h3><?php echo $gege2['hari']?>, <?php echo $gege2['tanggal']?></h3>
                            <h3>Pukul: <?php echo $gege2['jam']?></h3>
                            <h4><?php echo $gege2['tempat']?> </h4>
                            <br>
                            <p class="text-center lead">Merupakan suatu kebahagiaan bagi kami apabila Teman-teman
                                berkenan untuk hadir untuk memeriahkan acara.
                                <br><br>Wassalamu'alaikum Warahmatullahi Wabarakatuh
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
    </section>


    <section id="map">
        <div class="bingkai">
            <div class="line"></div>
            <h1>Map</h1>
            <div class="line"></div>
        </div>

        <div class="map" id="contact">
        <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo $gege2['tempat'] ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            <br />
        </div>
        <br><br><br>
    </section>

    <section id="tujuan">
        <div class="bingkai">
            <div class="line"></div>
            <h1>Susunan Acara</h1>
            <div class="line"></div>
        </div>

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
            <?php 

$query = mysqli_query($conn, "SELECT * FROM susunan_acara WHERE id_undangan = $id_ultah");
while ($data=mysqli_fetch_array($query)) {
                
                ?>
                <p class="lead text-center">
                    <?php echo $data['susunan_acara']?>
                </p>

                <?php } ?>
            </div>
        </div>

        <br><br><br>

        <div class="inv">
            <h2>
                QR Code Tamu <br>
                <br>
            <div class="container px-4 px-lg-5 text-center">
            
            <img src="../images/NADITYA638d3f7925413.png" alt="">           
                
            </div>
            </h2>
        </div>

        <br><br><br>
    </section>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>