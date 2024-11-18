<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reg.css?v=<?php echo time(); ?>">
    <title></title>

  </head>


  <body>
    <?php require_once 'process.php'; ?>
    <form class="" action="sms/sms.php" method="post">

    <div class="mid">
        <div class="midtext">
          <img src="pictures/logo.jpg" alt="img">
          <h1>Welcome!</h1>
          <p>Kamay Ni Hesus Account Registration</p>
          <p>Signup and be with us now for free</p>
        <a href="index.php#login">  <button type="button" name="button">HOME</button> </a>
        </div>

        <div class="midinfo">
          <p>Register Here</p>
          <input type="hidden" name="id" value="<?php echo $id?>">
          <input type="text" required name="lastname" value="" placeholder="Last Name"><br>
          <input type="text" required name="firstname" value="" placeholder="First Name"><br>
          <input  type="text" required name="number" value="" placeholder="Phone Number">
          <br>
          <input  type="password" required name="password" value="<?php echo $password ?>" placeholder="Password"><br>
          <input  type="text" required name="address" value="<?php echo $address ?>" placeholder="Address">
          <br><br>
          <input type="submit" name="Register" value="Register">
        </div>


    </div>




    <?php
    //include_once("db-configuration.php");


    //if (isset($_POST['Register'])) {

        //$fullname     = $_POST['fullname'];
        //$number    = $_POST['number'];
        //$password = $_POST['password'];
        //$address = $_POST['address'];
        //$id =  uniqid();


        //$number_result = mysqli_query($mysqli, "select 'number' from users where number='$number'");


        //$user_matched = mysqli_num_rows($number_result);


        //if ($user_matched > 0) {
          //echo'
          //<script>
            //  alert("'.$number.' Number already exist");
            //  window.location.href = "registration.php?";
        //  </script>';
      //  } else {

        //  $sql = "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'ecommerce' AND TABLE_NAME = 'users'";
          //  $results = $mysqli->query($sql);
          //  while($row = $results->fetch_assoc()) {
          //      $lastID = $row['AUTO_INCREMENT'];
          //  }

          //  mysqli_query($mysqli, "INSERT INTO users(fullname,number,password,address,unique_id) VALUES('$fullname','$number','$password','$address','$id')");

          //  mysqli_query($mysqli, "INSERT INTO user_type(id,usertype_id,user_type) VALUES('$lastID','$lastID','client')");

          //  echo'
          //  <script>
          //      alert("Registered successfully");
          //      window.location.href = "registration.php?";
          //  </script>';
        //}
    //}



    ?>


</form>

  </body>

</html>
