<?php

require ("../../config/connect.php");

if (isset($_GET['email']) && isset($_GET['verification_code'])) {
    
    $query = "SELECT * FROM account WHERE email = '$_GET[email]' AND verification_code = '$_GET[verification_code]'";
    $result = mysqli_query($conn, $query);
    if ($result) 
    {
        if (mysqli_num_rows($result)==1) 
        {
            $result_fetch=mysqli_fetch_assoc($result);
            if ($result_fetch['is_verified']==0) 
            {
                $update = "UPDATE account SET is_verified = '1' WHERE email = '$result_fetch[email]'";
                if (mysqli_query($conn, $update)) 
                {
                    echo "<script>alert('Verifikasi Email Berhasil');document.location.href='index.php'</script>";
                }else 
                {
                    echo "<script>alert('cannot run');document.location.href='index.php'</script>";
                }
            }else 
            {
                echo "<script>alert('Email Sudah ter-verifikasi');document.location.href='index.php'</script>";
            }
        }
    }else {
        echo "<script>alert('cannot run');document.location.href='index.php'</script>";
    }
}

?>