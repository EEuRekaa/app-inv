<?php

include "../../config/connect.php";

session_start();
if($_SESSION['level']=="admin") {
    header("Location: ../admin/index.php");
}

elseif ($_SESSION['level']=="") {
    header("Location: ../user/index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>

    <link rel="stylesheet" href="../../dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="../css/color.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&family=Open+Sans:wght@300&display=swap" rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body> 
    <div class="container">  
        
    </div>

    <script src="../../dist/js/bootstrap.bundle.min.js"></script>
</body>  
    
</html>