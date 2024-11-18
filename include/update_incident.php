
<?php
 session_start();
$connect=mysqli_connect("localhost","root","", "incident_report_db");
$clicked = "";

if (isset($_POST['update_report']))
{

$id = $_POST['idto'];



	$infodate = $_POST['date_incident'];
	$fnamed = $_POST['fnamed'];
	$mnamed = $_POST['mnamed'];
	$lnamed = $_POST['lnamed'];
	$aged = $_POST['age'];
	$gender = $_POST['gender'];
	$bdays = $_POST['bdays'];

		$patient = $_POST['patient'];
	$origin= $_POST['origin'];
	$destination = $_POST['destination'];
	$contactperson1 = $_POST['contactperson'];
	$runtime1 = $_POST['runtime'];
	$type_accident1 = $_POST['incident_type'];
	$note1 = $_POST['note'];
$cons = $_POST['cons'];
$airway1 = $_POST['airway'];
$breathing1 = $_POST['breathing'];
$circulation1 = $_POST['circulation'];

	$responsiveness1 = $_POST['responsiveness'];
$signandsymptoms1 = $_POST['signandsymptoms'];
$allergies1 = $_POST['allergies'];
$medication1 = $_POST['medication'];
$pastmedhistory1 = $_POST['pastmedhistory'];
	$lastmealtaken1 = $_POST['lastmealtaken'];
    




	$deformities1 = $_POST['deformities'];
$contusion1 = $_POST['contusion'];
$abrassion1 = $_POST['abrassion'];
$puncture1 = $_POST['puncture'];
$bleeding_burn1 = $_POST['bleedburn'];
	$tenderness1 = $_POST['tenderness'];
	$laceration1 = $_POST['laceration'];
	$swelling1 = $_POST['swelling'];




		$temperature_time = $_POST['temperature'];
$temperature_check = $_POST['temperaturetime'];


		$blood_pressure_time = $_POST['bloodpressuretime'];
$blood_pressure_check = $_POST['bloodpressure'];


		$pulse_rate_time = $_POST['pulseratetime'];
$pulse_rate_check = $_POST['pulserate'];

		$resperatory_rate_time = $_POST['respiratoryratetime'];
$resperatory_rate_check = $_POST['respiratoryrate'];



	$management= $_POST['manage'];
$endoby = $_POST['endoby'];
$receiveby = $_POST['receiveby'];

	$parts1 = $_POST['parts1'];
$before1= $_POST['before1'];
$after1 = $_POST['after1'];



	$parts2 = $_POST['parts2'];
$before2= $_POST['before2'];
$after2 = $_POST['after2'];

	$save_user=$connect->query("UPDATE personal_info set info_date='$infodate', firstname='$fnamed',  middle='$mnamed', lastname='$lnamed', birthdate='$bdays', birthdate='$bdays', age='$aged', gender='$gender', gender='$gender', patient='$patient', origin='$origin', distinaton='$destination', contactperson='$contactperson1', runtime='$runtime1', incident_type='$type_accident1', note='$note1' where incident_id='$id'");

$save_user=$connect->query("UPDATE primary_assessment set conciousness='$cons', airway = '$airway1', breathing= '$breathing1', circulation= '$circulation1'  where incident_id='$id'");
	
	

	$save_user=$connect->query("UPDATE secondary_assessment set responsiveness='$responsiveness1', signandsymptoms = '$signandsymptoms1', allergies= '$allergies1', medication= '$medication1',   medication= '$medication1', pastmedhistory = '$pastmedhistory1', lastmealtaken='$lastmealtaken1'  where incident_id='$id'");

	
$save_user=$connect->query("UPDATE found_injuries set deformities='$deformities1', contusion = '$contusion1', abrassion= '$abrassion1', puncture= '$puncture1',   bleeding_burn= '$bleeding_burn1', tenderness = '$tenderness1', laceration='laceration1', swelling='$swelling1' where incident_id='$id'");


$save_user=$connect->query("UPDATE temperature set temperature_time='$temperature_time', temperature_check = '$temperature_check' where incident_id='$id'");

$save_user=$connect->query("UPDATE blood_pressure set blood_pressure_time='$blood_pressure_time', blood_pressure_check = '$blood_pressure_check' where incident_id='$id'");



$save_user=$connect->query("UPDATE pulse_rate set pulse_rate_time='$pulse_rate_time', pulse_rate_check = '$pulse_rate_check' where incident_id='$id'");	

$save_user=$connect->query("UPDATE  resperatory_rate set resperatory_rate_time='$resperatory_rate_time', resperatory_rate_check = '$resperatory_rate_check' where incident_id='$id'");	

$save_user=$connect->query("UPDATE manage_incident set management='$management', endoby = '$endoby', receiveby ='$receiveby' where incident_id='$id'");	


$save_user=$connect->query("UPDATE pms_1 set parts='$parts1', before1='$before1', after ='$after1' where incident_id='$id'");	

$save_user=$connect->query("UPDATE pms_2 set parts='$parts2', before1='$before1', after ='$after2' where incident_id='$id'");	


	$save_user=$connect->query("UPDATE primary_assessment set conciousness='$cons', airway = '$airway1', breathing= '$breathing1', circulation= '$circulation1'  where incident_id='$id'");

	$save_user=$connect->query("UPDATE secondary_assessment set responsiveness='$responsiveness1', signandsymptoms = '$signandsymptoms1', allergies= '$allergies1', medication= '$medication1',   medication= '$medication1', pastmedhistory = '$pastmedhistory1', lastmealtaken='$lastmealtaken1'  where incident_id='$id'");

	
$save_user=$connect->query("UPDATE found_injuries set deformities='$deformities1', contusion = '$contusion1', abrassion= '$abrassion1', puncture= '$puncture1',   bleeding_burn= '$bleeding_burn1', tenderness = '$tenderness1', laceration='$laceration1', swelling='$swelling1' where incident_id='$id'");


$save_user=$connect->query("UPDATE temperature set temperature_time='$temperature_time', temperature_check = '$temperature_check' where incident_id='$id'");

$save_user=$connect->query("UPDATE blood_pressure set blood_pressure_time='$blood_pressure_time', blood_pressure_check = '$blood_pressure_check' where incident_id='$id'");

$save_user=$connect->query("UPDATE blood_pressure set blood_pressure_time='$blood_pressure_time', blood_pressure_check = '$blood_pressure_check' where incident_id='$id'");	

$save_user=$connect->query("UPDATE blood_pressure set pulse_rate_time='$pulse_rate_time', pulse_rate_check = '$pulse_rate_check' where incident_id='$id'");	

$save_user=$connect->query("UPDATE  resperatory_rate set resperatory_rate_time='$resperatory_rate_time', resperatory_rate_check = '$resperatory_rate_check' where incident_id='$id'");	

$save_user=$connect->query("UPDATE manage_incident set management='$management', endoby = '$endoby', receiveby ='$receiveby' where incident_id='$id'");	


$save_user=$connect->query("UPDATE pms_1 set parts='$parts1', before1='$before1', after ='$after1' where incident_id='$id'");	

$save_user=$connect->query("UPDATE pms_2 set parts='$parts2', before2='$before2', after ='$after2' where incident_id='$id'");	



		
 header("location: ../view_update.php?id=$id");
 $_SESSION['status_message']="Report Successfully Updated";
        $_SESSION['status_code']="Success";




	



}


	

 header("location: ../view_update.php?id=$id");

	







?>





















