<?php

include '../../config/connect.php';

$id_user = $_GET['id_user'];

$username = $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);

$query = "UPDATE user_account SET `id_user`='".$id_user."', `username`='".$username."', `email`='".$email."', `password`='".$password."' WHERE `id_user`='".$id_user."' ";

$sql = mysqli_query($conn, $query);

if ($sql) {
    echo "<script>alert('Data berhasil di ubah');document.location.href='./tablee.php'</script>/n";
}else {
    echo "<script>alert('Data gagal di ubah');document.location.href='./form-add.php'</script>/n";
}

?>