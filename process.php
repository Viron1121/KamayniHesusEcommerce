<?php

	include("db-configuration.php");
	$id = 0;
	$fullname = '';
	$address = '';
	$number = '';
	$password = '';
	$product = '';



	$update = false;
	if(isset($_POST['submit'])){

		$fullname = mysqli_real_escape_string($mysqli, $_POST['fullname']);
		$number = mysqli_real_escape_string($mysqli, $_POST['number']);
		$password = mysqli_real_escape_string($mysqli, $_POST['password']);
		$address = mysqli_real_escape_string($mysqli, $_POST['address']);



			$sql_u = "SELECT * FROM users WHERE number='$number'";
	  	$sql_e = "SELECT * FROM users WHERE password='$password'";
	  	$res_u = mysqli_query($mysqli, $sql_u);
	  	$res_e = mysqli_query($mysqli, $sql_e);




		if(!empty($number)&&!empty($password)){
			$sql = "INSERT INTO users (number,password) VALUES ('$number','$password')";


			if ($password !== $confirmPassword) {
  				echo'
    			<script>
      				alert("Password does not match!");
      			window.location.href = "login.php";
    			</script>';
			}
			else if($mysqli->query($sql) == TRUE){
    			echo'
    			<script>
      				alert("You have successfully registration!");
      			window.location.href = "registration.php";
    				</script>';
			}
			else if (mysqli_num_rows($res_u) > 0) {
  	  			echo'
    				<script>
      					alertalert("Sorry... number already taken");
      					window.location.href = "registration.php";
    				</script>';
  			}
  			else if(mysqli_num_rows($res_e) > 0){
  	  			echo'
    				<script>
      					alert("Sorry... email already taken");
      					window.location.href = "registration.php";
    				</script>';
  			}
			else{
 				echo "Error" . $sql . "<br/>" . $mysqli->error;
			}
		}
		else{
			echo'
    			<script>
      				alert("Complete all field");
      				window.location.href = "admin.php";
    			</script>';
		}
		$mysqli->close();
	}

	if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$delete = "DELETE FROM users WHERE id=$id";
		if($mysqli->query($delete) === TRUE){
    			echo'
    			<script>
      				alert("You have delete successfully !");
      			window.location.href = "registration.php";
    			</script>';
			}
	}

	if(isset($_GET['edit'])){
  		$sql = "SELECT * FROM users WHERE ID =" .$_GET['edit'];
  		$update = true;
  		$result = mysqli_query($mysqli, $sql);
  		$row = mysqli_fetch_array($result);
  		$id = $row['id'];
  		$fullname = $row['fullname'];
			$number = $row['number'];
			$password = $row['password'];
			$address = $row['address'];
	}

	if(isset($_POST['update'])){
		$id = $_POST['id'];
		$fullname = $_POST['fullname'];
		$number = $_POST['number'];
		$password = $_POST['password'];
		$address = $_POST['address'];


		$sql_u = "SELECT * FROM users WHERE number='$number'";
	  $sql_e = "SELECT * FROM users WHERE password='$password'";
	 	$res_u = mysqli_query($mysqli, $sql_u);
	 	$res_e = mysqli_query($mysqli, $sql_e);


		if(!empty($number)&&!empty($password)){
			$update = "UPDATE users SET number='$number',password='$password' WHERE id=$id";

			if ($password == $password) {
					echo'
    			<script>
      				alert("Edit successfully!");
      				window.location.href = "registration.php";
    			</script>';
			}

			if (mysqli_num_rows($res_u) > 0) {
  	  			echo'
    				<script>
      					alertalert("Sorry... number already taken");
      					window.location.href = "registration.php";
    				</script>';
  			}
  			if(mysqli_num_rows($res_e) > 0){
  	  			echo'
    				<script>
      					alert("Sorry... email already taken");
      					window.location.href = "registration.php";
    				</script>';
  			}
  			else if($mysqli->query($update) === TRUE){
    			echo'
    			<script>
      				alert("Updated!");
      				window.location.href = "registration.php";
    			</script>';
			}
			else{
 				echo "Error" . $update . "<br/>" . $mysqli->error;
			}
		}
	}
?>
