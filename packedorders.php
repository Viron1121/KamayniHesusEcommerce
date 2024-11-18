<?php
  session_start();
  include_once "include/dbconn.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>



<!DOCTYPE html>


<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDRRMO-Quezon</title>
        <link rel="icon" type="image/ico" href="logo.png" />

      <link href="resource/css/all.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">

        <script type="text/javascript" src="resource/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css"  href="messagebox.css"/>
        <script type="text/javascript" src="js/plugins.js"></script>
      <script type="text/javascript" src="js/actions.js"></script>


<style type="text/css">
    select[type="text"]:focus{
      border-color: rgba(126, 239, 104, 0.8);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(126, 239, 104, 0.6);
  outline: 0 none;

  }
#note:focus{

border-color: rgba(126, 239, 104, 0.8);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(126, 239, 104, 0.6);
  outline: 0 none;
   }
 input[type="date"]:focus{
border-color: rgba(126, 239, 104, 0.8);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(126, 239, 104, 0.6);
  outline: 0 none;

   }
    input[type="text"]:focus{
border-color: rgba(126, 239, 104, 0.8);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(126, 239, 104, 0.6);
  outline: 0 none;

   }
    #save_report:focus{


     outline: none;
    box-shadow: none;
    }

</style>
</head>
<body>
        <?php

      if(isset($_GET['report'])){
      if ($_GET['report'] == "error") {
        $_SESSION['status_message']="Report not saved!";
        $_SESSION['status_code']="Failed";
      } else if ($_GET['report'] == "success") {
        $_SESSION['status_message']="Report has been Added!";
        $_SESSION['status_code']="Success";
      }

      }
      ?>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                              <?php
   $admin = $_SESSION['unique_id'];
              $sql = mysqli_query($mysqli, "SELECT * FROM users WHERE unique_id= '$admin'");
            if(mysqli_num_rows($sql) > 0){
              $row2 = mysqli_fetch_assoc($sql);
               $user_type = $row2['usertype'];
                $img= $row2['img'];
               $admin="Admin";

                $seller="Seller";


            }
          ?>
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <i class="icon-reorder shaded"></i></a><a class="brand" href="#"><?php echo  $user_type;?></a>
                <div class="nav-collapse collapse navbar-inverse-collapse">


                   <ul class="nav pull-right">


                        <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                             <img src="chat/php/images/<?php echo $row2['img']; ?>"  class="nav-avatar" />
                            <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="profile.php">Your Profile</a></li>

                                <li class="divider"></li>
                              <li><a href="include/logout.php?logout_id=<?php echo $row2['unique_id']; ?>">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.nav-collapse -->
            </div>
        </div>
        <!-- /navbar-inner -->
    </div>


    <!-- /navbar -->
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="span3">
                    <div class="sidebar">
                              <ul class="widget widget-menu unstyled">
                                <?php

if ($user_type == $admin){
    echo ' <li class="active"><a href="dashboard.php"><i class="menu-icon icon-dashboard"></i>Dashboard</a></li>';
     echo   '<li><a href="chat/chat.php"><i class="menu-icon icon-envelope"></i>Chat</a></li>';
    echo '<li><a href="map.php"><i class="menu-icon icon-map-marker"></i>Maps </a></li>';
    echo '<li><a href="report.php"><i class="menu-icon icon-file-alt"></i>Report</a>';
    echo '<li><a href="narration.php"><i class="menu-icon icon-comment"></i>Narration</a></li>';
    echo '<li><a href="account.php"><i class="menu-icon icon-user"></i>Account </a></li>';




}


elseif ($user_type == $seller) {
  echo ' <li class="active"><a href="dashboard.php"><i class="menu-icon icon-dashboard"></i>Dashboard</a></li>';
 echo '<li><a href="chat/chat.php"><i class="menu-icon icon-envelope"></i>Chat</a></li>';
 echo '<li><a href="orders.php"><i class="menu-icon icon-file-alt"></i>Orders</a>';
 echo '<li><a href="canceledorders.php"><i class="menu-icon icon-file-alt"></i>Canceled orders</a></li>';
 echo '<li><a href="packedorders.php"><i class="menu-icon icon-file-alt"></i>Packed orders</a>';
 echo '<li><a href="deliveredorders.php"><i class="menu-icon icon-file-alt"></i>Delivered Orders</a>';
 echo '<li><a href="recuerdosprod.php"><i class="menu-icon icon-file-alt"></i>Products</a></li>';




}





else
{
         echo ' <li><a href="include/logout.php?logout_id=<?php echo $row2["unique_id"]; ?>"><i class="menu-icon icon-signout"></i>Logout</a></li>';
}


                     ?>

                        </ul>
                        <!--/.widget-nav-->

                    </div>
                    <!--/.sidebar-->
                </div>
                <!--/.span3-->
                <div class="span9">
                    <div class="content">


                        <!--/.module-->

                        <div class="module">
                            <div class="module-head">
                           <h3>
                                    Packed Orders</h3>
                            </div>
                            <div class="module-body">
                              <?php

                                include("db-configuration.php");

                                $result = $mysqli->query("SELECT packed.id, packed.address, packed.fullname, packed.number,
                                                                 packed.product, packed.price, packed.quantity, packed.payment,
                                                                 mode_of_payment.payment
                                                                 FROM packed INNER JOIN mode_of_payment ON packed.payment = mode_of_payment.id") or die($mysqli->error);




                              ?>
                              <style media="screen">
                                .table-fluid th{
                                  text-align: center;
                                }
                                .table-fluid td{
                                  text-align: center;
                                }
                              </style>
                   <form method="get" = action="packedorders.php" class="row-fluid"  enctype = "multipart/form-data">

                    <div class="control-group">


                      <table class="table table-fluid" align="center">
                        <tr>
                          <th>ID &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                          <th>PRODUCT &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                          <th>QUANTITY &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                          <th>ADDRESS &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                          <th>BUYER &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                          <th>PRICE &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                          <th>PAYMENT &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                        </tr>
                        <?php
                          while($row = $result-> fetch_assoc()):?>
                        <tr>
                          <td><?php echo $row['id']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                          <td><?php echo $row['product']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                          <td><?php echo $row['quantity']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                          <td><?php echo $row['address']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                          <td><?php echo $row['fullname']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                          <td><?php echo $row['price']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                          <td><?php echo $row['payment']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>

                          <td>
                            <a class="btn  btn-rounded btn-sm  delete-button mb-control" href="packedorders.php?deliver=<?php echo $row['id'];?> ">deliver</a>
                          </td>


                        <?php endwhile; ?>

                        </tr>

                      </table>





                    </div>
              </form>

              <?php
              if (isset($_GET['deliver'])) {
                include("db-configuration.php");

                $deliver = $_GET['deliver'];

                $result = $mysqli->query("SELECT * FROM packed where id = '$deliver'") or die($mysqli->error);

                $row = $result-> fetch_assoc();

                $product =  $row['product'];
                $price =  $row['price'];
                $number =  $row['number'];
                $fullname =  $row['fullname'];
                $address =  $row['address'];




                $delivered   = mysqli_query($mysqli, "INSERT INTO delivered(product,price,number,address,fullname) VALUES('$product','$price','$number','$address','$fullname')");


            		$delete = "DELETE FROM packed WHERE id=$deliver";
            		if($mysqli->query($delete) === TRUE){
                			echo'
                			<script>
                  				alert("The order sent to delivered table!");
                  			window.location.href = "packedorders.php";
                			</script>';
            			}
              }
              ?>

                            </div>
                        </div>


                        <!--/.module-->
                        <br />

                        <!--/.module-->
                    </div>
                    <!--/.content-->
                </div>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->
    </div>

    <!--/.wrapper-->
    <div class="footer">
        <div class="container">
            <b class="copyright">&copy; 2022 </b>All rights reserved.
        </div>
    </div>
    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>

 <?php

if(isset($_SESSION['status_code'])){?>
 <?php if($_SESSION['status_code']=='Failed'){ ?>
       <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn open" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle" style="color:gray">
                    <div class="mb-title"><span class="fa fa-exclamation"></span> <strong>Error</strong></div>
                    <div class="mb-content">
                        <?php echo $_SESSION['status_message']; ?>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                              <button class="btn btn-default btn-lg mb-control-close"  id="closebtn">Exit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <?php } else if($_SESSION['status_code']=='failed'){ ?>
         <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn open"  id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                         <div class="mb-title">Error!</div>
                    <div class="mb-content">
                        <?php echo $_SESSION['status_message']; ?>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                        <button class="btn btn-default btn-lg mb-control-close"  id="closebtn">Exit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- END MESSAGE BOX-->
         <?php } else if($_SESSION['status_code']=='Success'){ ?>
         <!-- MESSAGE BOX-->
        <div class="message-box  animated fadeIn open"  id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle" style="color:gray">
                    <div class="mb-title">Success!</div>
                    <div class="mb-content">
                        <?php echo $_SESSION['status_message']; ?>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                        <button class="btn btn-default btn-lg mb-control-close" id="mbtn">Exit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

 <?php } unset($_SESSION['status_code']);unset($_SESSION['status_message']);  } ?>
