<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "dbconn.php";
        $logout_id =  $_GET['logout_id'];
        if(isset($logout_id)){
            $status = "Offline now";
            $sql = mysqli_query($mysqli, "UPDATE users SET status = '{$status}' WHERE unique_id={$_GET['logout_id']}");
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../login.php");
            }
        }else{
            header("location: ../login.php");
        }
    }else{  
        header("location: ../login.php");
    }
?>