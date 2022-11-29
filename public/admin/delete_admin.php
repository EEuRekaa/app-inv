<?php

include '../../config/connect.php';

if (isset($_GET['id_admin'])) 
{
    $id_admin = $_GET['id_admin'];
}else {
    die("ERROR");
}
mysqli_query($conn, "DELETE FROM admin_account WHERE id_admin='$id_admin'")or die(mysqli_error());

echo "<script>alert('data berhasil di hapus');document.location.href='./tableadmin.php'</script>/n";

?>