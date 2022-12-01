<?php

include '../../../config/connect.php';

if (isset($_GET['id_tamu'])) 
{
    $id_tamu = $_GET['id_tamu'];
}else {
    die("ERROR");
}
mysqli_query($conn, "DELETE FROM tb_tamu WHERE id_tamu='$id_tamu'")or die(mysqli_error());

echo "<script>alert('data berhasil di hapus');document.location.href='./table_tamu.php'</script>/n";

?>