<?php

include "../../config/connect.php";

if (isset($_GET["id_udn"])) {
    $id_ultah = $_GET["id_udn"];
} else {
    die("ERROR");
}
mysqli_query($conn, "DELETE FROM tb_ultah WHERE id_ultah='$id_ultah'");

echo "<script>alert('data berhasil di hapus');document.location.href='./data_undangan.php'</script>/n";

?>
