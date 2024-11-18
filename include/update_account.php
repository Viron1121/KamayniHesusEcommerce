<?php
 require_once("dbconn.php");
session_start();
$user_id=$_SESSION['unique_id'];

   
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$accounttype=$_POST['usertype'];


$user_uname=$_POST['username'];
if(!$_POST['password'])
{



	

	$save_user=$mysqli->query("UPDATE users set username='$user_uname', fname = '$fname', lname = '$lname' where unique_id='$user_id'");
	
 header("location: ../profile.php?update=success");

}
else
{
	

	$user_pword= PASSWORD_HASH($_POST['password'], PASSWORD_DEFAULT);
	
	$save_user=$mysqli->query("UPDATE users set username='$user_uname',  usertype = '$accounttype', fname = '$fname', lname = '$lname', password = '$user_pword' where id='$user_id'");
	
	 	
 header("location: ../profile.php?update=success");
}
	
	 	
 header("location: ../profile.php?update=success");
?>
	