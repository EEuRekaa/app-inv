<?php

include "../../config/connect.php";

if (isset($_POST['action'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    if (strlen ($username) > 15) {
        echo "<script>alert('Username tidak boleh lebih dari 15 karakter!');document.location.href='create.php'</script>";
    }else {
        if ($password) {
            $sql_get = mysqli_query($conn, "SELECT * FROM account WHERE username = '$username'");
            $num_rows = mysqli_num_rows($sql_get);

            if ($num_rows == 0) {
                $password = md5($password);
                $insert = mysqli_query($conn, "INSERT INTO account VALUES('', '$username', '$email', '$password', '$level')" );
                if ($insert == TRUE) {
                    echo "<script>alert('Berhasil ditambahkan!');document.location.href='index.php'</script>";
                }else {
                    echo "<script>alert('Gagal ditambahkan!');document.location.href='create.php'</script>";
                }
            }else {
                echo "<script>alert('Username telah digunakan!');document.location.href='create.php'</script>";
            }
        }else {
            echo "<script>alert('Password Gagal!');document.location.href='create.php'</script>";
        }
    }
}else {
    echo "<script>alert('Isi Data!');document.location.href='create.php'</script>";
} 

?>