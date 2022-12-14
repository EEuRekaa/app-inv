<?php

$text = $_GET["text"]; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script defer src="node_modules/html5-qrcode/html5-qrcode.min.js"></script>
    <script defer src="./index.js"></script>
</head>
<body>

    <h1><?php echo $text; ?></h1>
    <div id="qr-reader" style="width: 100%;"></div>
</body>
</html>