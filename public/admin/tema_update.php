<?php

include "../../config/connect.php";

$id_tema = $_GET["id_tema"];

$nama_tema = $_POST["nama_tema"];
$file_tema = $_POST["file_tema"];

$query =
    "UPDATE tema SET `id_tema`='" .
    $id_tema .
    "', `nama_tema`='" .
    $nama_tema .
    "', `file_tema`='" .
    $file_tema .
    "' WHERE `id_tema`='" .
    $id_tema .
    "' ";

$sql = mysqli_query($conn, $query);

if ($sql) {
    echo "<script>alert('Data berhasil di ubah');document.location.href='./tabletema.php'</script>/n";
} else {
    echo "<script>alert('Data gagal di ubah');document.location.href='./tema_edit.php'</script>/n";
}

?>
