<?php

require '../../config/connect.php';

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $verification_code){
    require '../../config/phpmailer/Exception.php';
    require '../../config/phpmailer/PHPMailer.php';
    require '../../config/phpmailer/SMTP.php';

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'putputraxd88@gmail.com';                     //SMTP username
        $mail->Password   = 'neqtxyzsoyqzaehy';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('putputraxd88@gmail.com', 'INVATE');
        $mail->addAddress($email);
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email Verification INVATE';
        $mail->Body    = "Click the link below to verifiy your email address <a href='http://localhost/app-inv/public/register/verify.php?email=$email&verification_code=$verification_code'>Verify</a>";
    
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }   
}

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $level = $_POST['level'];

    if (strlen ($username) > 15) {
        echo "<script>alert('Username tidak boleh lebih dari 15 karakter!');document.location.href='index.php'</script>";
    }else {
        if ($password) {
            $sql_get = mysqli_query($conn, "SELECT * FROM account WHERE email = '$email'");
            $num_rows = mysqli_num_rows($sql_get);

            if ($num_rows == 0) {
                $password = md5($password);
                $verification_code = bin2hex(random_bytes(16));
                $insert = "INSERT INTO account VALUES('', '$username', '$email', '$password', '$level', '$verification_code','0')";
                if (mysqli_query($conn, $insert) && sendMail($_POST['email'], $verification_code)) {
                    echo "<script>alert('Register Berhasil!');document.location.href='../login/index.php'</script>";
                }else {
                    echo "<script>alert('Register Gagal!');document.location.href='index.php'</script>";
                }
            }else {
                echo "<script>alert('Email telah digunakan!');document.location.href='index.php'</script>";
            }
        }else {
            echo "<script>alert('Password Gagal!');document.location.href='index.php'</script>";
        }
    }
}else {
    echo "<script>alert('Anda belum register!');document.location.href='index.php'</script>";
}

?>