<?php

include '../../config/connect.php';

$id_admin = $_GET['id_admin'];

$username = $_POST['username'];
$email = $_POST['email'];

$query = "UPDATE admin_account SET `id_admin`='".$id_admin."', `username`='".$username."', `email`='".$email."' WHERE `id_admin`='".$id_admin."' ";

$sql = mysqli_query($conn, $query);

if ($sql) {
    echo "<script>alert('Data berhasil di ubah');document.location.href='./tableadmin.php'</script>/n";
}else {
    echo "<script>alert('Data gagal di ubah');document.location.href='./adminedit.php'</script>/n";
}

?>