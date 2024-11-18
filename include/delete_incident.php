<?php
require_once("dbconn.php");


$id=$_GET['id'];

$mysqli->query("DELETE from personal_info where incident_id ='$id'");
$mysqli->query("DELETE from blood_pressure where incident_id ='$id'");
$mysqli->query("DELETE from found_injuries where incident_id ='$id'");
$mysqli->query("DELETE from manage_incident where incident_id ='$id'");
$mysqli->query("DELETE from pms_1 where incident_id ='$id'");
$mysqli->query("DELETE from pms_2 where incident_id ='$id'");
$mysqli->query("DELETE from primary_assessment where incident_id ='$id'");
$mysqli->query("DELETE from pulse_rate where incident_id ='$id'");
$mysqli->query("DELETE from resperatory_rate where incident_id ='$id'");
$mysqli->query("DELETE from secondary_assessment where incident_id ='$id'");
$mysqli->query("DELETE from temperature where incident_id ='$id'");
header("location:../narration.php");  
         exit();

?>