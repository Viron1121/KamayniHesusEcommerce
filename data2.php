<?php
header('Content-Type: application/json');

include 'dbconn.php';

  
            $sqlQuery = "SELECT YEAR(incident_date) as yearly,COUNT(*) as totalcount FROM incident
            GROUP BY yearly Order by incident_date";

            $result = mysqli_query($conn,$sqlQuery);


            $data = array();
            foreach ($result as $row) {
            $data[] = $row;
            }

            mysqli_close($conn);
            echo json_encode($data);



?>
