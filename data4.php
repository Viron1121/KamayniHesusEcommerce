<?php
header('Content-Type: application/json');

include 'dbconn.php';

$months = "";

if(isset($_POST["months"]) && $_POST["months"] != "default" ){  
    $months = $_POST["months"]; 
 }  else {  
    $months = date('m');  
    echo $months;
}  


        $sqlQuery = "SELECT incident_type as incident, COUNT(*) as totalcount FROM incident WHERE MONTH(incident_date) = ".$months."
        GROUP BY incident_type ORDER BY totalcount DESC";
        $result = mysqli_query($conn,$sqlQuery);

        $data = array();
        foreach ($result as $row) {
        $data[] = $row;
        }

            mysqli_close($conn);
            echo json_encode($data);
           


?>