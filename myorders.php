<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/myorders.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  </head>
  <?php

   include_once("dashboardprocess.php"); ?>

  <?php

  include_once("db-configuration.php");


  $result = $mysqli->query("SELECT * FROM users where number = '$number'") or die($mysqli->error);

  $row = $result-> fetch_assoc();

  $fullname = $row['fullname'];


  ?>


  <body>
    <div class="top">
      <div class="upper1">
        <h1> <span>K</span>amay Ni Hesus</h1>
      </div>
      <ul>
        <li><a href="logedindashboard.php" >HOME</a></li>
        <li><a href="logedinproducts.php">PRODUCTS</a></li>

        <li><a href="logedindashboard.php#about_us">ABOUT US</a></li>

        <li>
          <div class="dropdown">
            <div class="dropbtn"><a href="#"><?php echo $row['fullname']; ?></a> </div>
            <div class="dropdown-content">
              <a href="myorders.php">My Account</a>
              <a href="logout.php">Logout</a>
            </div>
          </div>
        </li>
      </ul>
    </div>

<div class="overall">
<div class="tabs">
  <div class="tablinks top"onclick="opentabs(event, 'option5')">
    <div class="pic">
      <h1><?php echo $row['fullname']; ?></h1>
      <p><?php echo $row['number']; ?></p>
    </div>
  </div>

  <ul>
    <li class="tablinks"onclick="opentabs(event, 'option1')" id="defaultOpen"><a href="#" ><img src="pictures/pending.png" alt="img">Pending Orders</a></li>
    <li class="tablinks"onclick="opentabs(event, 'option2')"><a href="#" ><img src="pictures/packed.png" alt="img">Packed Orders</a></li>
    <li class="tablinks"onclick="opentabs(event, 'option3')"><a href="#" ><img src="pictures/delivered.png" alt="img">Purchase History</a></li>
    <li class="tablinks"onclick="opentabs(event, 'option4')"><a href="#" ><img src="pictures/cart.png" alt="img">My Cart</a></li>
  </ul>
</div>


<div id="option1" class="display">
  <div class="option1">


<?php

  include("db-configuration.php");

  $result = $mysqli->query("SELECT * FROM recuerdos where fullname like '$fullname'") or die($mysqli->error);

?>



<form method="post,get" = action="myorders.php"   enctype = "multipart/form-data">

 <div class="control-group">

   <h1 style="padding-top: 5%;">Pending orders</h1>
   <table align="center">
     <tr>
       <th>ID &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
       <th>PRODUCT &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
       <th>QUANTITY &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
       <th>ADDRESS &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
       <th>PRICE &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
       <th>ACTION </th>
     </tr>
     <?php
       while($row = $result-> fetch_assoc()):?>
     <tr>
       <td><?php echo $row['id']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
       <td><?php echo $row['product']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
       <td><?php echo $row['quantity']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
       <td><?php echo $row['address']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>

       <td ><?php echo $row['price']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>






       <td>
         <a type="button" class="editBtn" name="cancel" value="<?php echo $row['id']; ?>"  data-bs-toggle="modal"  data-bs-target="#cancel" style="text-decoration: none;" >Cancel</a>
       </td>




       <form class="" action="myorders.php" method="get">
       <div class="modal" id="cancel">
         <div class="modal-dialog">
           <div class="modal-content">
             <div class="modal-body">
               <div class="modal-upper">
                 <button type="button" class="close" data-bs-dismiss="modal">X</button>
               </div>
                <div class="mid">

                  <h3>Reason of canceling order</h3>

                  <input type="hidden" id="cancelid" name="cancelid">
                  <textarea type="text" name="usercomment" rows="8" cols="80"> </textarea>
                  <br> <br>
                <button style="margin-left: 40%;" type="submit" name="cancel" value="<?php echo $row['id']; ?>">  Submit </button>

                </div>
             </div>
             </div>
           </div>
         </div>
        </form>
     <?php endwhile; ?>


     </table>
     </div>
     </form>
     </div>
     </div>


     <?php

     if (isset($_GET['cancel'])) {
       include("db-configuration.php");
       $usercomment = $_GET['usercomment'];
       $cancel = $_GET['cancelid'];


       $results = $mysqli->query("SELECT * FROM recuerdos where id = '$cancel'") or die($mysqli->error);

       $rows = $results-> fetch_assoc();

       $product =  $rows['product'];
       $price =  $rows['price'];
       $number =  $rows['number'];
       $fullname =  $rows['fullname'];
       $address =  $rows['address'];
       $quantity =  $rows['quantity'];
       $payment =  $rows['payment'];
       $uniqid =  uniqid();



       $package   = mysqli_query($mysqli, "INSERT INTO canceledorders(product,price,number,address,fullname,quantity,cancelreason) VALUES('$product','$price','$number','$address','$fullname','$quantity','$usercomment')");



       $delete = "DELETE FROM recuerdos where id = '$cancel'";
       if($mysqli->query($delete) === TRUE){
             echo'
             <script>
                 alert("The order has been canceled");
               window.location.href = "myorders.php";
             </script>';
         }
     }
     ?>



     <div id="option2" class="display">
       <div class="option2">
         <?php

           include("db-configuration.php");

           $result = $mysqli->query("SELECT * FROM packed where fullname like '$fullname'") or die($mysqli->error);

         ?>

         <h1 style="padding-top: 5%;">Packed Orders</h1>

         <table align="center">
            <tr>
              <th>ID &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
              <th>PRODUCT &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
              <th>QUANTITY &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
              <th>ADDRESS &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>

              <th>PRICE &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            </tr>
            <?php while($row = $result-> fetch_assoc()):?>
            <tr>

              <td><?php echo $row['id']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
              <td><?php echo $row['product']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
              <td><?php echo $row['quantity']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
              <td><?php echo $row['address']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
              <td><?php echo $row['price']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
            </tr>
             <?php endwhile; ?>
         </table>
       </div>
     </div>



     <div id="option3" class="display">
       <div class="option3">
         <?php

           include("db-configuration.php");

           $result = $mysqli->query("SELECT * FROM delivered where fullname like '$fullname'") or die($mysqli->error);

         ?>

         <h1 style="padding-top: 5%;">Purchase History</h1>

         <table align="center">
            <tr>
              <th>ID &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
              <th>PRODUCT &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
              <th>QUANTITY &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
              <th>ADDRESS &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>

              <th>PRICE &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
              <th>DATE DELIVERED &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
            </tr>
            <?php while($row = $result-> fetch_assoc()):?>
            <tr>

              <td><?php echo $row['id']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
              <td><?php echo $row['product']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
              <td><?php echo $row['quantity']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
              <td><?php echo $row['address']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
              <td><?php echo $row['price']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
              <td><?php echo $row['date']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
            </tr>
             <?php endwhile; ?>
         </table>
       </div>
     </div>




     <?php

       include("db-configuration.php");

       $result = $mysqli->query("SELECT * FROM cart where fullname like '$fullname'") or die($mysqli->error);

     ?>
     <div id="option4" class="display">
       <div class="option4">
         <h1>My Cart</h1>

         <form method="post,get" = action="myorders.php"   enctype = "multipart/form-data">
         <table align="center">
            <tr>

              <th>PRODUCT &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
              <th>Price &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
              <th colspan="4">Select Quantity &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>


            </tr>
            <?php while($row = $result-> fetch_assoc()):?>
            <tr>


              <td><?php echo $row['product']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
              <td><?php echo $row['price']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
              <td><input type="number"  name="quantity" min="1" max="1000" placeholder="1"> </td>
              <td> <select class="" name="payment">
                  <option value="1">Cash on Delivery</option>
              </select> </td>
              <td><button type="submit" name="delete" value="<?php echo $row['id'];?>">  Delete </button> </td>
              <td><button type="submit" name="checkout" value="<?php echo $row['id'];?>">  Checkout </button> </td>
            </tr>
             <?php endwhile; ?>
         </table>

         </form>
       </div>
     </div>

     <?php
     include("db-configuration.php");

     if (isset($_GET['checkout'])) {
       $checkout = $_GET['checkout'];

       $result = $mysqli->query("SELECT * FROM cart where id = '$checkout'") or die($mysqli->error);
       $row = $result-> fetch_assoc();

       $product =  $row['product'];
       $price =  $row['price'];
       $quantity = $_GET['quantity'];

       $results = $mysqli->query("SELECT * FROM users where fullname = '$fullname'") or die($mysqli->error);
       $rows = $results-> fetch_assoc();

       $number =  $rows['number'];
       $address =  $rows['address'];
       $fullname =  $rows['fullname'];
       $payment =  $_GET['payment'];

       $id =  uniqid();


       $order   = mysqli_query($mysqli, "INSERT INTO recuerdos(product,price,quantity,number,address,fullname,payment,unique_id)
                                                        VALUES('$product','$price','$quantity','$number','$address','$fullname','$payment','$id')");


    $delete = "DELETE FROM cart where id= $checkout";
    if($mysqli->query($delete) === TRUE){
    echo'
        <script>
              alert("Success");
              window.location.href = "myorders.php";
      </script>';
          }
    }

    if (isset($_GET['delete'])) {
      $delete = $_GET['delete'];

      $delete = "DELETE FROM cart where id= $delete";
      if($mysqli->query($delete) === TRUE){
      echo'
          <script>
                alert("Delete Successfully");
                window.location.href = "myorders.php";
        </script>';
            }
    }

     ?>

     <div id="option5" class="display">
       <div class="option5">
         <?php
         include_once("dashboardprocess.php");
         include_once("db-configuration.php");


         $result = $mysqli->query("SELECT * FROM users where number = '$number'") or die($mysqli->error);

         $row = $result-> fetch_assoc();

         $fullnamee = $row['fullname'];

         ?>

         <form class="" action="myorders.php" method="post">

         <div class="inputs-option5">
           <img src="pictures/logo.png" alt="">
           <h1>My Profile</h1>
           <h3>Fullname</h3>
           <input type="text" name="fullname" value="<?php echo $row['fullname']; ?>" placeholder="">
           <h3>Number</h3>
           <input type="text" name="number" value="<?php echo $row['number']; ?>" placeholder="">
           <br>
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
             				window.location.href = "myorders.php";
           			</script>';
       			}
         		if($mysqli->query($update) === TRUE){
           			echo'
           			<script>
             				alert("Updated!");
             				window.location.href = "myorders.php";
           			</script>';
       			}
       			else{
        				echo "Error" . $update . "<br/>" . $mysqli->error;
       			}

       	}









          ?>
       </div>
    </div>
    <script>
            //fetch from table to edit modal
            $(document).ready(function () {

                $('.editBtn').on('click', function () {

                    $('#cancel').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function () {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#cancelid').val(data[0]);

                  });
                  });

                </script>

     <script>
     function opentabs(evt, cityName) {
     var i, display, tablinks;
     display = document.getElementsByClassName("display");
     for (i = 0; i < display.length; i++) {
     display[i].style.display = "none";
     }
     tablinks = document.getElementsByClassName("tablinks");
     for (i = 0; i < tablinks.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" active", "");
     }
     document.getElementById(cityName).style.display = "block";
     evt.currentTarget.className += " active";
     }
     </script>

     <script>
     // Get the element with id="defaultOpen" and click on it
     document.getElementById("defaultOpen").click();
     </script>



       <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
       </script>
     </div>
  </body>
</html>
