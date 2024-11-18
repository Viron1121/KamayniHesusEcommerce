<?php 
    session_start();
    include_once "config.php";
    $email = $_POST['username'];
    $password = $_POST['password'];
    if(!empty($email) && !empty($password)){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$email}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $pwdCheck = password_verify($password, $row['password']);
            if($pwdCheck == $password){
                $status = "Active now";
                $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                if($sql2){
                    $_SESSION['unique_id'] = $row['unique_id'];

                
                   header("location:../../dashboard.php");   
                }else{
            
                      header("location:../../dashboard.php?login=error");
                }
            }else{
              
                  header("location:../../login.php?login=username&passwordIncorrect");
            }
        }else{
          
              header("location:../../login.php?login=usernameNotxist");
        }
    }else{
        
          header("location:../..login.php?login=error");
    }
?>