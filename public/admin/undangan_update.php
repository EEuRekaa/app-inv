<?php

include "../../config/connect.php";

$id_ultah = $_GET["id_ultah"];

$judul_acara = $_POST["judul_acara"];
$hari = $_POST["hari"];
$tanggal = $_POST["tanggal"];
$jam = $_POST["jam"];
$tempat = $_POST["tempat"];
$detail_tempat = $_POST["detail_tempat"];

$query =
    "UPDATE tb_ultah SET `id_ultah`='" .
    $id_ultah .
    "', `judul_acara`='" .
    $judul_acara .
    "', `hari`='" .
    $hari .
    "', `tanggal`='" .
    $tanggal .
    "', `jam`='" .
    $jam ."', `tempat`='" . $tempat ."', `detail_tempat`='" . $detail_tempat ."' WHERE `id_ultah`='" .
    $id_ultah .
    "' ";

$sql = mysqli_query($conn, $query);

if ($sql) {
    echo "<script>alert('Data berhasil di ubah');document.location.href='./data_undangan.php'</script>/n";
} else {
    echo "<script>alert('Data gagal di ubah');document.location.href='./undangan_edit.php'</script>/n";
}

?>
