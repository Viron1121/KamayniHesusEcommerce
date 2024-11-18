<?php
if (isset($_POST['submitmiamore'])) {
  // code...
  $file = $_FILES['file'];

  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png');

  if (in_array($fileActualExt, $allowed)) {

    if ($fileError === 0) {
      // code...
      if ($fileSize < 100000000) {
        // code...
        $fileNameNew = uniqid('', true).".".$fileActualExt;
        $fileDestination = 'products/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);

        include("db-configuration.php");

       $result = $mysqli->query("SELECT * FROM miamore") or die($mysqli->error);



        $product =  $_POST['product'];
        $price =  $_POST['price'];
        $price =  $_POST['price'];
        $description =  $_POST['description'];





        $package   = mysqli_query($mysqli, "INSERT INTO miamore(product,price,img,description) VALUES('$product','$price','$fileNameNew','$description')");


        header("Location: miamore.php?uploadsuccess");
      }else {
        // code...
        echo "Your file is to big";
      }

    }else {
      // code...
      echo "There was an error uploading your file";
    }
  }else {
    header("location: miamore.php?signup=error");
  }
}
 ?>
