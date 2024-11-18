<?php

$connect=mysqli_connect("localhost","root","", "incident_report_db");
$clicked = "";

if (isset($_POST['savecoordinate']))
{
	$doi = date("Y-m-d", strtotime($_POST['incident_date']));
	$lat = $_POST['latitude'];
	$lng = $_POST['longitude'];
	$incident_type = $_POST['incident']; 
	
	
    

	$query_insert = "INSERT INTO incident (incident_type,incident_date,lat,lng) VALUES ('$incident_type','$doi','$lat','$lng')";
	$mysql_run = mysqli_query($connect, $query_insert);

	if ($mysql_run) {

header("location: map.php?map=success");

	}else {

header("location: map.php?map=error");


	}

				
}




?>