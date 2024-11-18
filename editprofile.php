<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php
    include_once("dashboardprocess.php");
    include_once("db-configuration.php");


    $result = $mysqli->query("SELECT * FROM users where number = '$number'") or die($mysqli->error);

    $row = $result-> fetch_assoc();

    $fullnamee = $row['fullname'];

    ?>

    <form class="" action="editprofile.php" method="post">

    <div class="inputs">
      <h3>Fullname</h3>
      <input type="text" name="fullname" value="<?php echo $row['fullname']; ?>" placeholder="">
      <h3>Number</h3>
      <input type="text" name="number" value="<?php echo $row['number']; ?>" placeholder="">
      <br><br>
      <h3>Password</h3>
      <input type="password" name="password" value="<?php echo $row['password']; ?>" placeholder="">
      <h3>Address</h3>
      <input type="text" name="address" value="<?php echo $row['address']; ?>" placeholder="">
      <br> <br>
      <button type="submit" name="update" value="">Update</button>
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    </div>
    </form>

    <?php
    include_once("db-configuration.php");

    if(isset($_POST['update'])){
  		$id = $_POST['id'];
  		$fullname = $_POST['fullname'];
  		$numberr = $_POST['number'];
  		$password = $_POST['password'];
  		$address = $_POST['address'];



      $update = "UPDATE users SET number='$numberr',password='$password',fullname='$fullname',address='$address' WHERE id=$id";

  	 	$results = mysqli_query($mysqli, $update);






  			if ($results) {
  					echo'
      			<script>
        				alert("Edit successfully!");
        				window.location.href = "editprofile.php";
      			</script>';
  			}
    		if($mysqli->query($update) === TRUE){
      			echo'
      			<script>
        				alert("Updated!");
        				window.location.href = "editprofile.php";
      			</script>';
  			}
  			else{
   				echo "Error" . $update . "<br/>" . $mysqli->error;
  			}

  	}









     ?>

  </body>
</html>
