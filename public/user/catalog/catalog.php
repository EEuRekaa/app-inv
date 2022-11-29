<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="catalog.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>

    <?php @include 'header.php'; ?>

    <br>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4 text-center">Catalog</h1>
            <p class="lead text-center">
                Temukan dan bandingkan tema desain undangan yang sesuai dengan gaya yang menurut kamu bagus.
            </p>
        </div>
    </div>

    <br><br>

    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="card" style="width: 18rem; border-radius: 10px;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <p>
                            <a class="btn btn-sm" style="background-color: #ddc190; color: white; border-radius: 30px;"
                                href="theme.php" role="button">Theme</a>
                        </p>
                        <h5 class="card-title">Horror</h5>
                        <p class="card-text">
                            Memberikan kesan...
                        </p>
                    </div>
                    <hr class="mx-4">
                    <div class="card-body">
                        <a class="btn btn-sm"
                            style="background-color: #ddc190; color: white; border-radius: 30px; width: 100%"
                            href="theme.php" role="button">Lihat</a>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card" style="width: 18rem; border-radius: 10px;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <p>
                            <a class="btn btn-sm" style="background-color: #ddc190; color: white; border-radius: 30px;"
                                href="theme.php" role="button">Theme</a>
                        </p>
                        <h5 class="card-title">Animek</h5>
                        <p class="card-text">
                            Memberikan kesan...
                        </p>
                    </div>
                    <hr class="mx-4">
                    <div class="card-body">
                        <a class="btn btn-sm"
                            style="background-color: #ddc190; color: white; border-radius: 30px; width: 100%"
                            href="theme.php" role="button">Lihat</a>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card" style="width: 18rem; border-radius: 10px;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <p>
                            <a class="btn btn-sm" style="background-color: #ddc190; color: white; border-radius: 30px;"
                                href="theme.php" role="button">Theme</a>
                        </p>
                        <h5 class="card-title">Metal</h5>
                        <p class="card-text">
                            Memberikan kesan...
                        </p>
                    </div>
                    <hr class="mx-4">
                    <div class="card-body">
                        <a class="btn btn-sm"
                            style="background-color: #ddc190; color: white; border-radius: 30px; width: 100%"
                            href="theme.php" role="button">Lihat</a>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
    </div>

    <?php @include 'footer.php'; ?>

</body>

</html>