<?php
require "../../../config/connect.php";

if(isset($_POST["action"])){
  // Choose a function depends on value of $_POST["action"]
  if($_POST["action"] == "delete"){
    delete();
  }
}

function delete(){
  global $conn;

  $id = $_POST["id_tamu"];

  $rows = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_tamu WHERE id_tamu = $id"));

  // Data with female gender
  if($rows["test"] == "test"){
    echo 0;
    exit;
  }

  mysqli_query($conn, "DELETE FROM tb_tamu WHERE id_tamu = $id");
  echo 1;
}