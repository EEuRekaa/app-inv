<?php

session_start();

   
   if (!isset($_SESSION['SESSION_EMAIL'])) {
      header("Location: ../user_login.php");
      die();
   }
   
   
   require '../../../config/connect.php';

   $query = mysqli_query($conn, "SELECT * FROM user_account WHERE email = '{$_SESSION['SESSION_EMAIL']}'");
   
   if (mysqli_num_rows($query) > 0) {
      $row = mysqli_fetch_assoc($query);
   }

?>



<link rel="stylesheet" href="about.css">
<section class="about">
    <div class="content">
        <img src="../image/iped.png" alt="">
        <div class="text text-dark">
            <h1>About Us</h1>
            <h5>Website Undangan no. 99</h5>
            <p>
                Website pembuatan undangan secara online dan gratis terbaik yang sudah
                terpercaya. Inilah alasan mereka memilih website ini. memiliki sistem yang mudah digunakan dan mendukung
                kustomisasi yang sangat fleksibel. Anda bisa mengatur undangan sesuai keinginan dan keperluan.
                Tersedia banyak pilihan tema siap pakai yang dapat di sesuaikan dengan selera Anda kapan saja tanpa batas.
            </p>
        </div>
    </div>
</section>