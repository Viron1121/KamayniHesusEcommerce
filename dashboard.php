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
    <title>Kamay ni Hesus Lucban Quezon</title>
        <link rel="icon" type="image/ico" href="pictures/logo.png" />
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">

     <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <script type="text/javascript" src="resource/jquery.min.js"></script>
        <script type="text/javascript" src="resource/FileSaver.min.js"></script>
<script type="text/javascript" src="resource/Chart.min.js"></script>
<script type="text/javascript" src="resource/canvas-toBlob.js"></script>
</head>
<style type="text/css">
    #exportChart1:focus{


     outline: none;
    box-shadow: none;
    }
    #exportChart2:focus{


     outline: none;
    box-shadow: none;
    }
    #exportChart3:focus{


     outline: none;
    box-shadow: none;
    }

    #exportChart4:focus{


     outline: none;
    box-shadow: none;
    }

</style>
<body>
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
               $admin = "Admin";

                $seller="Seller";


            }
          ?>
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <i class="icon-reorder shaded"></i></a><a class="brand" href="#"><?php echo   $row2['usertype'];?></a>
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
      echo '<li><a href="backup.php"><i class="menu-icon icon-circle"></i> Backup </a></li>';
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

                        <!--/.widget-nav-->

                    </div>
                    <!--/.sidebar-->
                </div>
                <!--/.span3-->

<?php
  include_once("db-configuration.php");


  $query = "SELECT COUNT(*)AS count FROM recuerdos";

  $query_result = mysqli_query($mysqli, $query);

  while($row = mysqli_fetch_assoc($query_result)){
    $output = $row['count'];
  }
 ?>

 <?php
   include_once("db-configuration.php");


   $query = "SELECT COUNT(*)AS count FROM delivered";

   $query_result = mysqli_query($mysqli, $query);

   while($row = mysqli_fetch_assoc($query_result)){
     $delivered = $row['count'];
   }
  ?>

  <?php
    include_once("db-configuration.php");


    $query = "SELECT COUNT(*)AS count FROM products";

    $query_result = mysqli_query($mysqli, $query);

    while($row = mysqli_fetch_assoc($query_result)){
      $products = $row['count'];
    }
   ?>


   <?php
     include_once("db-configuration.php");


     $query = "SELECT COUNT(*)AS count FROM canceledorders";

     $query_result = mysqli_query($mysqli, $query);

     while($row = mysqli_fetch_assoc($query_result)){
       $cancel = $row['count'];
     }
    ?>



    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>


</body>
<div class="span9">
<div class="graph1">
<canvas id="graph1" style=""></canvas>

<script>
var xValues = ["Number of orders", "Delivered orders", "Number of products", "Number of canceled orders"];
var yValues = [<?php echo $output; ?>, <?php echo $delivered; ?>, <?php echo $products; ?>, <?php echo $cancel; ?>];
var barColors = ["#F7B103","#F7B103","#F7B103","#F7B103","#F7B103",];

new Chart("graph1", {
type: "bar",
data: {
  labels: xValues,
  datasets: [{
    backgroundColor: barColors,
    data: yValues
  }]
},
options: {
  legend: {display: false},
  title: {
    display: true,
    text: "Sales Graph"
  }
}
});
</script>
</div>
</div>
