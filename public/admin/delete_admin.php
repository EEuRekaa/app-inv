<?php

include '../../config/connect.php';

$id_admin = $_GET['id_admin'];

mysqli_query($conn, "DELETE FROM admin_account WHERE id_admin='$id_admin'");

echo "<script>alert('data berhasil di hapus');document.location.href='./tableadmin.php'</script>/n";

?>