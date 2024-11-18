

<?php

require('fpdf/fpdf.php');



require('dbconn.php');





   $id=$_GET['id'];


    $result=$mysqli->query("SELECT * from  personal_info where incident_id ='$id'"); 
    $row2 = mysqli_fetch_assoc($result);

    

    $result1=$mysqli->query("SELECT * from  primary_assessment where incident_id ='$id'"); 
    $row1 = mysqli_fetch_assoc($result1);


    $result3=$mysqli->query("SELECT * from  secondary_assessment where incident_id ='$id'"); 
    $row3 = mysqli_fetch_assoc($result3);

    $result4=$mysqli->query("SELECT * from  found_injuries where incident_id ='$id'"); 
    $row4 = mysqli_fetch_assoc($result4);
    $result5=$mysqli->query("SELECT * from  blood_pressure where incident_id ='$id'"); 
    $row5 = mysqli_fetch_assoc($result5);

 	  $result6=$mysqli->query("SELECT * from  temperature where incident_id ='$id'"); 
    $row6 = mysqli_fetch_assoc($result6);

 	  $result7=$mysqli->query("SELECT * from  pulse_rate where incident_id ='$id'"); 
    $row7 = mysqli_fetch_assoc($result7);


 	  $result8=$mysqli->query("SELECT * from resperatory_rate where incident_id ='$id'"); 
    $row8 = mysqli_fetch_assoc($result8);


 	  $result9=$mysqli->query("SELECT * from manage_incident where incident_id ='$id'"); 
    $row9 = mysqli_fetch_assoc($result9);


 	  $result10=$mysqli->query("SELECT * from pms_1 where incident_id ='$id'"); 
    $row10 = mysqli_fetch_assoc($result10);

  $result11=$mysqli->query("SELECT * from pms_2 where incident_id ='$id'"); 
    $row11 = mysqli_fetch_assoc($result11);
class PDF extends FPDF{

	function Header(){

	
	}


	function Mybody(){


	}



	function Mylayout(){


	}


	function Myfooter(){
  
	}

function moreinfo(){


	}


}






$pdf = new FPDF('p','mm','A4'); 
$pdf->AddPage();
$pdf->SetTitle('Document');

$pdf->Image('forms.jpg',10,10,189);
$pdf->SetFont('Times', '', 8);
$pdf->Cell(189 ,10,'',0,1);
$pdf->Cell(189 ,10,'',0,1);
$pdf->Cell(189 ,10,'',0,1);
$pdf->Cell(189 ,10,'',0,1);
$pdf->Cell(189 ,5,'',0,1);
$pdf->Cell(12 ,7,'',0,0);
$pdf->Cell(33 ,7,$row2 ['info_date'],0,0);
$pdf->Cell(30 ,7,$row2 ['firstname'],0,0);
$pdf->Cell(30 ,7,$row2 ['middle'],0,0);
$pdf->Cell(29 ,7,$row2 ['lastname'],0,0);
$pdf->Cell(13 ,7,$row2 ['age'],0,0);
$pdf->Cell(16 ,7,$row2 ['gender'],0,0);
$pdf->Cell(20 ,7,$row2 ['birthdate'],0,1);
$pdf->Cell(189 ,5,'',0,1);
$pdf->Cell(7 ,8,'',0,0);
$pdf->Cell(20 ,8,$row2 ['patient'],0,0);
$pdf->Cell(56 ,8,$row2 ['origin'],0,0);
$pdf->Cell(78 ,6,$row2 ['distinaton'],0,0);
$pdf->Cell(27 ,4,$row2 ['runtime'],0,1);
$pdf->Cell(118 ,2,'',0,0);
$pdf->Cell(44 ,7,$row2 ['contactperson'],0,0);
$pdf->Cell(27 ,5,'',0,1);
$pdf->Cell(189 ,5,'',0,1);
$pdf->Cell(20 ,3,'',0,0);
$pdf->Cell(20 ,3,'',0,0);
$pdf->Cell(132 ,3,$row2 ['incident_type'],0,1);
$pdf->Cell(20 ,2,'',0,0);
$pdf->Cell(37 ,2,'',0,0);
$pdf->Cell(132 ,2,'',0,1);
$pdf->Cell(20 ,3,'',0,0);
$pdf->Cell(37 ,3,'',0,0);
$pdf->Cell(132 ,3,'',0,1);
$pdf->Cell(20 ,2,'',0,0);
$pdf->Cell(37 ,2,'',0,0);
$pdf->Cell(132 ,2,'',0,1);
$pdf->Cell(20 ,3,'',0,0);
$pdf->Cell(37 ,3,'',0,0);
$pdf->Cell(132 ,3,'',0,1);
$pdf->Cell(189 ,2,'',0,1);
$pdf->Cell(17 ,3,'',0,0);

$pdf->Cell(70 ,3,$row2 ['note'],0,0);


$pdf->Cell(189 ,8,'',0,1);
$pdf->Cell(10 ,3,'',0,0);
$pdf->Cell(60 ,4,'',0,0);
$pdf->Cell(110 ,3,'',0,1);
$pdf->Cell(10 ,3,'',0,0);
$pdf->Cell(60 ,4,'',0,0);
$pdf->Cell(110 ,2,'',0,1);
$pdf->Cell(10 ,3,'',0,0);
$pdf->Cell(60 ,4,'',0,0);
$pdf->Cell(110 ,4,'',0,1);
$pdf->Cell(8 ,3,'',0,0);
$pdf->Cell(60 ,3,$row1 ['conciousness'],0,0);
$pdf->Cell(110 ,1,'',0,1);
$pdf->Cell(10 ,3,'',0,0);
$pdf->Cell(52 ,3,'',0,0);
$pdf->Cell(74 ,3,$row3 ['responsiveness'],0,0);
$pdf->Cell(110 ,3,'',0,1);
$pdf->Cell(10 ,3,'',0,0);
$pdf->Cell(60 ,3,'',0,0);
$pdf->Cell(110 ,3,'',0,1);
$pdf->Cell(10 ,3,'',0,0);
$pdf->Cell(56 ,3,'',0,0);
$pdf->Cell(114 ,3,'',0,1);
$pdf->Cell(7 ,3,'',0,0);
$pdf->Cell(56 ,4,$row1 ['airway'],0,0);
$pdf->Cell(114 ,3,'',0,1);
$pdf->Cell(10 ,3,'',0,0);
$pdf->Cell(57 ,3,'',0,0);
$pdf->Cell(114 ,3,$row3 ['signandsymptoms'],0,1);
$pdf->Cell(10 ,4,'',0,0);
$pdf->Cell(57 ,2,'',0,0);
$pdf->Cell(114 ,3,$row3 ['allergies'],0,1);
$pdf->Cell(6 ,5,'',0,0);
$pdf->Cell(60 ,7,$row1 ['breathing'],0,0);
$pdf->Cell(58 ,3,$row3 ['medication'],0,0);
$pdf->Cell(65 ,3,'',0,1);
$pdf->Cell(66 ,3,'',0,0);
$pdf->Cell(123 ,4,$row3 ['pastmedhistory'],0,1);
$pdf->Cell(66 ,4,'',0,0);
$pdf->Cell(123 ,4,$row3 ['lastmealtaken'],0,1);
$pdf->Cell(189 ,4,'',0,1);
$pdf->Cell(8 ,4,'',0,0);
$pdf->Cell(120,4,$row1 ['circulation'],0,0);
$pdf->Cell(60 ,4,$row4 ['deformities'],0,1);
$pdf->Cell(120 ,4,'',0,0);
$pdf->Cell(9 ,4,'',0,0);
$pdf->Cell(60 ,4,$row4 ['contusion'],0,1);
$pdf->Cell(120 ,4,'',0,0);
$pdf->Cell(9 ,4,'',0,0);
$pdf->Cell(60 ,4,$row4 ['abrassion'],0,1);
$pdf->Cell(120 ,4,'',0,0);
$pdf->Cell(9 ,4,'',0,0);
$pdf->Cell(60 ,4,$row4 ['puncture'],0,1);
$pdf->Cell(28 ,4,'',0,0);
$pdf->Cell(18 ,4,$row5['blood_pressure_check'],0,0);
$pdf->Cell(83 ,4,$row5['blood_pressure_time'],0,0);
$pdf->Cell(60 ,4,$row4 ['bleeding_burn'],0,1);
$pdf->Cell(28 ,4,'',0,0);
$pdf->Cell(18 ,4,$row6['temperature_check'],0,0);
$pdf->Cell(83 ,4,$row6['temperature_time'],0,0);;
$pdf->Cell(60 ,4,$row4 ['tenderness'],0,1);
$pdf->Cell(28 ,4,'',0,0);
$pdf->Cell(18 ,4,$row7['pulse_rate_check'],0,0);
$pdf->Cell(83 ,4,$row7['pulse_rate_time'],0,0);
$pdf->Cell(60 ,4,$row4 ['laceration'],0,1);
$pdf->Cell(28 ,4,'',0,0);
$pdf->Cell(18 ,4,$row8['resperatory_rate_check'],0,0);
$pdf->Cell(83 ,4,$row8['resperatory_rate_time'],0,0);
$pdf->Cell(60 ,4,$row4['swelling'],0,1);
$pdf->Cell(189 ,13,'',0,1);
$pdf->Cell(7 ,6,'',0,0);
$pdf->Cell(98 ,6,$row9['management'],0,0);
$pdf->Cell(13 ,6,$row10['parts'],0,0);
$pdf->Cell(22 ,6,$row10['before1'],0,0);
$pdf->Cell(50,6,$row10['after'],0,1);
$pdf->Cell(105 ,4,'',0,0);
$pdf->Cell(13 ,4,$row11['parts'],0,0);
$pdf->Cell(22 ,4,$row11['before2'],0,0);
$pdf->Cell(50,4,$row11['after'],0,1);
$pdf->Cell(189 ,15,'',0,1);
$pdf->Cell(20 ,6,'',0,0);
$pdf->Cell(95 ,6,$row9['endoby'],0,0);
$pdf->Cell(74,6,$row9['receiveby'],0,1);




















$pdf->AddPage();
$pdf->Image('AUTHORIZATION.jpg',10,10,189);
$pdf->SetFont('Times', '', 11);
$pdf->Cell(189 ,10,'',0,1);
$pdf->Cell(189 ,10,'',0,1);
$pdf->Cell(189 ,10,'',0,1);
$pdf->Cell(189 ,10,'',0,1);
$pdf->Cell(189 ,10,'',0,1);
$pdf->Cell(189 ,10,'',0,1);
$pdf->Cell(189 ,10,'',0,1);
$pdf->Cell(189, 6, '', 0, 1);
$pdf->Cell(25, 5, '', 0, 0);
$pdf->Cell(58, 5, '', 0, 0);
$pdf->Cell(54, 5, '', 0, 0);
$pdf->Cell(52, 5, '', 0, 1);
$pdf->Cell(189 ,10,'',0,1);
$pdf->Cell(189 ,10,'',0,1);
$pdf->Cell(189 ,6,'',0,1);
$pdf->Cell(189 ,5,'',0,1);
$pdf->Cell(54 ,6,'',0,0);
$pdf->Cell(55 ,7,'',0,1);
$pdf->Cell(189 ,10,'',0,1);
$pdf->Cell(189 ,10,'',0,1);
$pdf->Cell(189 ,10,'',0,1);
$pdf->Cell(189 ,10,'',0,1);
$pdf->Cell(189 ,10,'',0,1);
$pdf->Cell(189 ,6,'',0,1);
$pdf->Cell(189, 5, '', 0, 1);
$pdf->Cell(25, 5, '', 0, 0);
$pdf->Cell(63, 6, '', 0, 0);
$pdf->Cell(49, 6, '', 0, 0);
$pdf->Cell(52, 6, '', 0, 1);
$pdf->Output();




?>
