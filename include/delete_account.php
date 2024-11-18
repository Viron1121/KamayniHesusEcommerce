<?php
require_once("dbconn.php");


$id=$_GET['id'];

$mysqli->query("DELETE from users where unique_id ='$id'");


header("location:../account.php");  
         exit();

?>