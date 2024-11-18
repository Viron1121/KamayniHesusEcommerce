<?php
	include("db-configuration.php");

  $update = false;


  if(isset($_GET['edit'])){
  		$sql = "SELECT * FROM products WHERE ID =" .$_GET['edit'];
  		$update = true;
  		$result = mysqli_query($mysqli, $sql);
  		$row = mysqli_fetch_array($result);
  		$id = $row['id'];
  		$product = $row['product'];
			$price = $row['price'];
			$description = $row['description'];



	}
 ?>
