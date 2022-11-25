<?php

$host = "localhost";
$user = "root";
$pass = "";
$database = "db_sekira";

$conn = mysqli_connect($host, $user, $pass, $database);

if (!$conn) {
    die("Error".mysqli_connect_error());
}

?>