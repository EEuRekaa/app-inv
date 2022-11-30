<?php
 
session_start();
   
   
   require 'connect.php';
   

   if (isset($_POST['submit'])) {  

      $judul_acara = mysqli_real_escape_string($conn, $_POST['judul_acara']);        
      $deskripsi_acara = mysqli_real_escape_string($conn, $_POST['deskripsi_acara']);        
      $hari = mysqli_real_escape_string($conn, $_POST['hari']);        
      $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);        
      $jam = mysqli_real_escape_string($conn, $_POST['jam']);        
      $tempat = mysqli_real_escape_string($conn, $_POST['tempat']);        
      $susunan_acara = mysqli_real_escape_string($conn, $_POST['susunan_acara']);        
     
          $insert = "INSERT INTO `udn_ultah`(`id_ultah`, `judul_acara`, `deskripsi_acara`, `hari`, `tanggal`, `jam`, `tempat`, `susunan_acara`) VALUES ('','$judul_acara','$deskripsi_acara','$hari','$tanggal','$jam','$tempat','$susunan_acara')";

          

          mysqli_query($conn, $insert);
          echo "<script>alert('awokaowkoawk')</script>";
         
      }
      
   
   
   ?>

   <!DOCTYPE html>
   <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   </head>
   <body>
   <form action="" method="POST">
         <div class="form-group">
            <label for="">Judul Acara</label>
            <input type="text" class="form-control" id="" name="judul_acara">            
         </div>
         <div class="form-group">
            <label for="">Deskripsi Acara</label>
            <input type="text" class="form-control" id="" name="deskripsi_acara">            
         </div>
         <div class="form-group">
            <label for="">Hari</label>
            <select name="hari" id="">
               <option value="Senin">Senin</option>
               <option value="Selasa">Selasa</option>
               <option value="Rabu">Rabu</option>
               <option value="Kamis">Kamis</option>
               <option value="Jumat">Jumat</option>
               <option value="Sabtu">Sabtu</option>
               <option value="Minggu">Minggu</option>
            </select>            
         </div>
         <div class="form-group">
            <label for="">Tanggal</label>
            <input type="date" class="form-control" id="" name="tanggal">            
         </div>
         <div class="form-group">
            <label for="">Jam</label>
            <input type="time" class="form-control" id="" name="jam">            
         </div>
         <div class="form-group">
            <label for="">Tempat</label>
            <input type="text" class="form-control" id="" name="tempat">            
         </div>
         <div class="form-group">
            <label for="">Susunan Acara</label>
            <input type="text" class="form-control" id="" name="susunan_acara">            
         </div>
         <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </form>
   </body>
   </html>

