<?php
include_once("../db-configuration.php");
session_start();
function itexmo($email,$password,$number,$message,$apicode)
{
	$ch = curl_init();
	$recipient = array();
	array_push($recipient, $number);
	$itexmo = array('Email' => $email,  'Password' => $password, 'ApiCode' => $apicode,'Recipients' => $recipient, 'Message' => $message);
	curl_setopt($ch, CURLOPT_URL,"https://api.itexmo.com/api/broadcast");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($itexmo));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	return curl_exec ($ch);
	curl_close ($ch);
}

if (isset($_POST['Register'])) {

    $lastname     = $_POST['lastname'];
    $firstname     = $_POST['firstname'];
    $fullname = $firstname." ".$lastname;
    $number    = $_POST['number'];
    $password = $_POST['password'];
    $password = password_hash($password,PASSWORD_DEFAULT);
    $address = $_POST['address'];
    $id =  uniqid();
    $msg = strval(rand(1000,9999));

    $_SESSION['$msg'] = $msg;
    $_SESSION['lastname'] = $lastname;
    $_SESSION['firstname'] = $firstname;
    $_SESSION['$fullname'] = $fullname;
    $_SESSION['number'] = $number;
    $_SESSION['$password'] = $password;
    $_SESSION['address'] = $address;
    $_SESSION['$id'] = $id;





    $email="jenno14mangulabnan@gmail.com";
    $name = "PWD PILA";

    $api = "TR-VIRON105159_3ORZU";
    $apiPassword = "Viron1121";


    $result = itexmo($email,$apiPassword,$number,$msg,$api);
    if ($result){
      echo '<script> alert("Message Sent"); </script>';
    }
    else{
      echo '<script> alert("Message not Sent Please check receiver mobile number"); </script>';
    }
  }





if (isset($_POST['confirm'])) {
    $otp   = $_POST['otp_code'];

    $msg =  $_SESSION['$msg'];
    $firstname =  $_SESSION['firstname'];
    $lastname =  $_SESSION['lastname'];
    $fullname =  $_SESSION['$fullname'];
    $number =  $_SESSION['number'];
    $password =  $_SESSION['$password'];
    $address =  $_SESSION['address'];
    $id =  $_SESSION['$id'];

    if ($otp = $msg) {

      $number_result = mysqli_query($mysqli, "select 'number' from users where number='$number'");

      $user_matched = mysqli_num_rows($number_result);


      if ($user_matched > 0) {
        echo'
        <script>
            alert("'.$number.' Number already exist");
            window.location.href = "../registration.php?";
        </script>';
      } else {
          mysqli_query($mysqli, "INSERT INTO users(fullname, number,password,address,unique_id, fname, lname, user_type) VALUES('$fullname','$number','$password','$address','$id','$firstname','$lastname','1')");

          echo'
          <script>
              alert("Registered successfully");
              window.location.href = "../index.php?";
          </script>';
      }
    }else {
      echo'
      <script>
          alert("code not matched");
          window.location.href = "sms.php?";
      </script>';
    }
}

?>



<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<div class="main-agileinfo">
			<div class="agileits-top">
				<h1>ENTER VERIFICATION</h1>
        <p>(verification code has been sent)</p>
				<form action="sms.php" method="post">

					<input style="text-align: center;" class="text email" type="text" name="otp_code"  required>

					<input type="submit" value="Confirm" name="confirm">
				</form>

			</div>
		</div>
		<!-- copyright -->
		<!-- <div class="colorlibcopy-agile">
			<p>© WEB AND DATABASE PROJECT</p>
		</div> -->
		<!-- //copyright -->
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
</body>
<script src="js/sweetalert.min.js"></script>
</html>
