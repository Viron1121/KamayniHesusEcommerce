<?php
header('Content-Type: application/json');

include 'dbconn.php';

  
            $sqlQuery = "SELECT incident_type as incident,COUNT(*) as totalcount FROM incident
            GROUP BY incident_type ORDER BY totalcount DESC";

            $result = mysqli_query($conn,$sqlQuery);
          

            $data = array();
            foreach ($result as $row) {
            $data[] = $row;
            }

            mysqli_close($conn);
            echo json_encode($data);
           


?>