<?php  
    session_start();

    include '../../config/connect.php';

    if (!isset($_SESSION['SESSION_EMAIL'])) {
      header("Location: ./user_login.php");
      die();
   }
   $query = mysqli_query($conn, "SELECT * FROM user_account WHERE email = '{$_SESSION['SESSION_EMAIL']}'");
    
   if (mysqli_num_rows($query) > 0) {
      $gege = mysqli_fetch_assoc($query);
   } 
   
   $query2 = mysqli_query($conn, "SELECT * FROM tb_tamu WHERE id_user = '9'");
    
   if (mysqli_num_rows($query2) > 0) {
      $gege2 = mysqli_fetch_assoc($query2);
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
    <select name="" id="">
        <option value="<?php echo $gege2['id_user'] ?>"><?php echo $gege2['id_user'] ?></option>
    </select>
</body>
</html>