<?php

include '../../../config/connect.php';

$id_tamu = $_GET['id_tamu'];

$namatamu = $_POST['nama_tamu'];
$emailtamu = $_POST['email_tamu'];

$query = "UPDATE tb_tamu SET `nama_tamu`='".$namatamu."', `email_tamu`='".$emailtamu."' WHERE `id_tamu`='".$id_tamu."' ";

$sql = mysqli_query($conn, $query);

if ($sql) {
    echo "<script>alert('Data berhasil di ubah');document.location.href='./table_tamu.php'</script>/n";
}else {
    echo "<script>alert('Data gagal di ubah');document.location.href='./edit_tamu.php'</script>/n";
}

?>