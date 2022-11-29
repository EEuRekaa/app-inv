<?php

include '../../config/connect.php';

if (isset($_GET['id_user'])) 
{
    $id_user = $_GET['id_user'];
}else {
    die("ERROR");
}
mysqli_query($conn, "DELETE FROM user_account WHERE id_user='$id_user'")or die(mysqli_error());

echo "<script>alert('data berhasil di hapus');document.location.href='./tablee.php'</script>/n";

?>