
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


   <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css"  href="messagebox.css"/>
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">



    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <link rel="stylesheet" href="resource/css/animation.min.css">

      <link href="resource/css/all.css" rel="stylesheet">


  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
    <script
      src="https://use.fontawesome.com/releases/v5.15.2/js/all.js"
      data-auto-a11y="true"
    ></script>

      <link rel="stylesheet" type="text/css"  href="messagebox.css"/>
        <script type="text/javascript" src="js/plugins.js"></script>
      <script type="text/javascript" src="js/actions.js"></script>
      <style type="text/css">html, body {
  /* IE 10-11 didn't like using min-height */
  height: 100%;
}
</style>


</head>
<body >
        <?php

      if(isset($_GET['update'])){
      if ($_GET['update'] == "error") {
        $_SESSION['status_message']="Update not saved!";
        $_SESSION['status_code']="Failed";
      } else if ($_GET['update'] == "success") {
        $_SESSION['status_message']="Your Profile has been Updated!";
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
               $pnp="PNP";
                $seller="Seller";
               $bfp="BFP";
               $med="Medical";

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
                </div>
                <!-- /.nav-collapse -->

            </div>
        </div>
        <!-- /navbar-inner -->
    </div>

    <img src="images/hero.jpg">
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




}elseif ($user_type == $pnp) {
   echo '<li class="active"><a href="dashboard.php"><i class="menu-icon icon-dashboard"></i>Dashboard</a></li>';
    echo   '<li><a href="chat/chat.php"><i class="menu-icon icon-envelope"></i>Chat</a></li>';
    echo '<li><a href="map.php"><i class="menu-icon icon-map-marker"></i>Maps</a></li>';



}elseif ($user_type == $bfp) {
   echo '<li class="active"><a href="dashboard.php"><i class="menu-icon icon-dashboard"></i>Dashboard</a></li>';
    echo   '<li><a href="chat/chat.php"><i class="menu-icon icon-envelope"></i>Chat</a></li>';
    echo '<li><a href="report.php"><i class="menu-icon icon-file-alt"></i>Report</a>';
    echo '<li><a href="narration.php"><i class="menu-icon icon-comment"></i>Narration</a></li>';





}elseif ($user_type == $med) {
   echo ' <li class="active"><a href="dashboard.php"><i class="menu-icon icon-dashboard"></i>Dashboard</a></li>';
    echo   '<li><a href="chat/chat.php"><i class="menu-icon icon-envelope"></i>Chat</a></li>';
    echo '<li><a href="report.php"><i class="menu-icon icon-file-alt"></i>Report</a>';
    echo '<li><a href="narration.php"><i class="menu-icon icon-comment"></i>Narration</a></li>';




}elseif ($user_type == $seller) {
     echo ' <li class="active"><a href="dashboard.php"><i class="menu-icon icon-dashboard"></i>Dashboard</a></li>';
    echo '<li><a href="chat/chat.php"><i class="menu-icon icon-envelope"></i>Chat</a></li>';
    echo '<li><a href="report.php"><i class="menu-icon icon-file-alt"></i>Report</a>';
    echo '<li><a href="narration.php"><i class="menu-icon icon-comment"></i>Narration</a></li>';




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

                                 <div class="span9" >
                      <div class="content" >
  <div class="module">
                            <div class="module-head">
                               <h3>Incident Reports</h3>
                            </div>
                            <div class="module-body">

                  <?php



                                              require_once("include/incident_table.php");


                                            ?>


   </div>
            </div>


                    <!--/.content-->
                </div>
                <!--/.span9-->
            </div>
                        <!--/.module-->
                    </div>

     </div>
        <!--/.container-->
          <br>
   <br>
            <br>
   <br>
           <br>

 <br>
 <br>


   </div>
    <div class="footer">
        <div class="container">
            <b class="copyright">&copy; 2021 </b>All rights reserved.
        </div>
    </div>
    <!--/.wrapper-->



<script>
    $(document).ready( function () {
    $('#myTable').DataTable( {

        "bLengthChange": false,
        "pageLength": 4
    } );


} );
    </script>



    <script src="js/view_Updates.js"></script>
    <script src="js/delete_reports.js"></script>
     <script src="js/print_pdf.js"></script>
</body>
</html>
