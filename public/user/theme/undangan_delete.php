<?php

include "../../../config/connect.php";

if (isset($_GET["id_ultah"])) {
    $id_ultah = $_GET["id_ultah"];
} else {
    die("ERROR");
}
mysqli_query($conn, "DELETE FROM tb_ultah WHERE id_ultah='$id_ultah'") or
    die(mysqli_error());

echo "<script>alert('data berhasil di hapus');document.location.href='./undangan_table.php'</script>/n";

?>
