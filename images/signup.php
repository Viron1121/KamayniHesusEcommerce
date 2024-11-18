<?php

    include_once "config.php";
 $fname =  mysqli_real_escape_string($conn, $_POST['fname']);
    $lname =  mysqli_real_escape_string($conn, $_POST['lname']);
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
     $utype = mysqli_real_escape_string($conn, $_POST['usertype']);



            $sql = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$uname}'");
            if(mysqli_num_rows($sql) > 0){

                                         header("location: ../../account.php?signup=usernameExist");

            }else{
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];

                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);

                    $extensions = ["jpeg", "png", "jpg"];
                    if(in_array($img_ext, $extensions) === true){
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type, $types) === true){
                            $time = time();
                            $new_img_name = $time.$img_name;
                            if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
                                $ran_id = rand(time(), 100000000);
                                $status = "Active now";
                                $Password = $_POST['pass'];
                                $encrypt_pass = password_hash($Password, PASSWORD_DEFAULT);
                                $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, username, password, img, status, usertype)
                                VALUES ({$ran_id}, '{$fname}','{$lname}', '{$uname}', '{$encrypt_pass}', '{$new_img_name}', '{$status}', '{$utype}')");
                                if($insert_query){
                                    $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$uname}'");
                                    if(mysqli_num_rows($select_sql2) > 0){
                                        $result = mysqli_fetch_assoc($select_sql2);
                                        $_SESSION['unique_id'] = $result['unique_id'];

                                          header("location: ../../account.php?signup=success");
                                    }else{

                                           header("location: ../../account.php?signup=error");

                                    }
                                }else{

                                        header("location: ../../account.php?signup=error");

                                }
                            }
                        }else{

                                        header("location: ../../account.php?signup=error");

                        }
                    }else{

                                        header("location: ../../account.php?signup=error");
                    }
                }
            }




?>
