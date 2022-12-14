<?php

session_start();

error_reporting(0);

require "../../config/connect.php";

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
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="./home/fab.css">
    <link rel="shortcut icon" type="image/x-icon" href="../../user/assets/img/favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <style>
        

        .main {
            background: #ddc190;
        }
    </style>


</head>

<body style="background: #002939; color: white;">

    <?php @include "headerhome.php"; ?>

    <br>
    <div class="">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <h1 class="display-4" style="color: #ddc190">Website Undangan
                        Digital</h1>
                    <!-- <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra
                        attention to featured content or information.</p> -->
                    <hr class="my-4">
                    <p>Undang orang-orang terdekat dalam momen kebahagiaan kamu dengan cara yang unik dan
                        menarik. Coba sekarang juga, GRATIS.</p>
                    <p class="lead">
                        <a class="btn btn-sm" style="background-color: #ddc190; color: #002939;" href="./catalog/catalog.php"
                            role="button">Buat Sekarang</a>
                    </p>
                </div>
                <div class="col-12 col-lg-6">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="./image/2.png" class="d-block " style="width: 550px;" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="./image/caro2.png" class="d-block" style="width: 520px;" alt="...">
                            </div>
                        </div>
                    </div>
                    <!-- <img src="../image/2.png" alt="#" style="width: 600px;"> -->
                </div>
            </div>
        </div>
    </div>

    <br><br><br><br><br><br>

    <div class="main">
        <br><br><br>
        <?php @include "about.php"; ?>
        <!-- <div class="jumbotron">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <img src="../image/ipad.png" alt="iped" style="width: 0px; margin-right: 100px;">
                    </div>

                    <div class="col-6">
                        <p class="h2 textil">Website Undangan no. 69</p>
                        <p class="display-5">Website Undangan No. 69</p>
                        <p class="textil">website pembuatan undangan secara online dan gratis terbaik yang sudah
                            terpercaya. Inilah alasan mereka memilih website ini.</p>
                        <br><br>
                        <p class="lead textil">Smart sistem</p>
                        <p class="lead textil">memiliki sistem yang mudah digunakan dan mendukung kustomisasi yang
                            sangat
                            fleksibel. Anda bisa mengatur undangan sesuai keinginan dan keperluan
                            i.</p>
                        <hr class="my-4 textil">
                        <p class="lead textil">Memiliki banyak tema</p>
                        <p class="lead textil">Tersedia banyak pilihan tema siap pakai yang dapat di sesuaikan dengan
                            selera Anda kapan saja
                            tanpa batas.</p>
                        <hr class="my-4 textil">
                        <p class="lead"></p>
                        <p></p>
                    </div>
                </div>

            </div>
        </div> -->
        </div>
    </div>

 

    <?php @include "footerhome.php"; ?>
</body>

</html>