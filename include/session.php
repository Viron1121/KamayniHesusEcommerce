<?php

//pag hindi pa nakakalogin 
session_start();
if (isset($_SESSION['id'])) {
    include 'dbconn.php';

    $admin = $_SESSION['id'];

    $getrecord = mysqli_query($mysqli, "SELECT * FROM incident WHERE id = '$admin'");
    $row = mysqli_fetch_assoc($getrecord);

       
     
  

 
  
}
  else{
  header("Location:login.php");

  }


?>