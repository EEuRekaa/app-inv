<?php

include '../../../config/connect.php';

if (isset($_GET['id_susunan'])) 
{
    $id_susunan = $_GET['id_susunan'];
}else {
    die("ERROR");
}
mysqli_query($conn, "DELETE FROM susunan_acara WHERE id_susunan='$id_susunan'");


echo "<script>document.location.href='./susunan_table.php?'</script>/n";

?>