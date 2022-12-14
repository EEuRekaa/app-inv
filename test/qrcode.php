<?php

include "vendor/phpqrcode/qrlib.php";
require_once "./config/connect.php";

$pname = $_POST["cname"];
$path = "images/";
$file = $path . uniqid() . ".png";

$ecc = "L";
$pixel_Size = 10;
$frame_Size = 10;

$query = "insert into test(code,img) values ('$pname','$file')";
if (mysqli_query($conn, $query) == true) {
    QRcode::png($pname, $file, $ecc, $pixel_Size, $frame_Size);
    header("location:testcodein.php?msg=data added successfully");
} else {
    header("location:testcodein.php?msg=data failed ");
}

?>
