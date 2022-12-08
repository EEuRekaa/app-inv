<?php

include '../../config/connect.php';

$id_user = $_GET['id_user'];

mysqli_query($conn, "DELETE FROM user_account WHERE id_user='$id_user'");

echo "<script>alert('data berhasil di hapus');document.location.href='./tablee.php'</script>/n";

?>