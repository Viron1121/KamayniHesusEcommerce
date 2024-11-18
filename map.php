
<?php
  session_start();
  include_once "include/dbconn.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>


<!DOCTYPE html>

<?php

include 'dbconn.php';
include 'include/map_location.php';


$query1 = mysqli_query($conn,"select * from incident");


?>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=11" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDRRMO-Quezon</title>
        <link rel="icon" type="image/ico" href="logo.png" />

    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">

        <script type="text/javascript" src="resource/jquery.min.js"></script>

          <script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

     <script type="text/javascript" src="plugins/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="plugins/js/plugins/jquery/jquery-ui.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css"  href="messagebox.css"/>
      <script type="text/javascript" src="js/plugins.js"></script>
      <script type="text/javascript" src="js/actions.js"></script>
  <style>

          #map {
              height: 500px;
              width: 850
          }
  select[type="text"]:focus{
      border-color: rgba(126, 239, 104, 0.8);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(126, 239, 104, 0.6);
  outline: 0 none;

  }
   input[type="text"]:focus{

border-color: rgba(126, 239, 104, 0.8);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(126, 239, 104, 0.6);
  outline: 0 none;
   }
 input[type="date"]:focus{
border-color: rgba(126, 239, 104, 0.8);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(126, 239, 104, 0.6);
  outline: 0 none;

}
    #btnmap:focus{


     outline: none;
    box-shadow: none;
    }

      </style>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQCMpJCsy9Ab1WfOLvq25DT7Vl86dR3NQ&callback=initMap"
    defer></script>


<script>
function initMap() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };

    map = new google.maps.Map(document.getElementById('map'), mapOptions);
    map.setTilt(100);


    // Multiple markers location, latitude, and longitude
    var markers = [
        <?php if($query1->num_rows > 0){
            while($row = $query1->fetch_assoc()){
                echo '["'.$row['id'].'", '.$row['lat'].', '.$row['lng'].', "'.$row['incident_date'].'", "'.$row['incident_type'].'"],';
            }
        }
        ?>
    ];

    // Info window content
    var infoWindowContent = [
        <?php if($query1->num_rows > 0){
            while($row = $query1->fetch_assoc()){ ?>
                ['<div class="info_content">' +
                '<h3><?php echo $row['name']; ?></h3>' +
                '<p><?php echo $row['info']; ?></p>' + '</div>'],
        <?php }
        }
        ?>
    ];

    var infoWindow = new google.maps.InfoWindow(), marker, i;

    // Place each marker on the map
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: "Incident id:" + " " + markers[i][0] + "\n" + "Incident type:" + " " + markers[i][4] + "\n" + "Incident date:" + " " + markers[i][3]
        });


        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        //to fit all markers on the screen
        map.fitBounds(bounds);
    }

    // for zoom level
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(10);
        google.maps.event.removeListener(boundsListener);
    });
}

// to load initialize
google.maps.event.addDomListener(window, 'load', initMap);
</script>


</head>
<body>
    <?php

      if(isset($_GET['map'])){
      if ($_GET['map'] == "error") {
        $_SESSION['status_message']="Coordinate not saved!";
        $_SESSION['status_code']="Failed";
      } else if ($_GET['map'] == "success") {
        $_SESSION['status_message']="Coordinate has been Added!";
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
               $pdrrmo="PDRRMO";
               $pnp="PNP";
                $mdrrmo="MDRRMO";
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
                        </li>
                    </ul>
                </div>
                <!-- /.nav-collapse -->
            </div>
        </div>
        <!-- /navbar-inner -->
    </div>

    <img src="images/hero.jpg">
    <!-- /navbar -->
      <div>
                <?php if (isset($_POST['savecoordinate'])) { echo $notif;  }?>
        </div>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="span3">
                    <div class="sidebar">
                                  <ul class="widget widget-menu unstyled">
                                <?php

if ($user_type == $pdrrmo){
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

 echo ' <li><a href="include/logout.php?logout_id=<?php echo $row2["unique_id"]; ?>"><i class="menu-icon icon-signout"></i>Logout</a></li>';



}elseif ($user_type == $mdrrmo) {
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
                  <div class="span3">
                    <div class="content">


                        <!--/.module-->

                        <div class="module">
                            <div class="module-head">
                           <h3>
                                    Insert Location</h3>
                            </div>
                            <div class="module-body">


                 <form  role="form" method="POST" action=""  class="row-fluid">

                    <div class="control-group">


                                            <label class="control-label">Incident Date</label>
                                            <div class="controls">
                                                <input type="date"  name="incident_date" required  class="span12" autocomplete="off">

                                            </div>
                                              <label class="control-label">Latitude</label>
                                             <div class="controls">
                                                <input type="text" placeholder="Enter Latitude" name="latitude" required style="text-transform: capitalize;" class="span12" autocomplete="off">

                                            </div>
                                             <label class="control-label">Longitude</label>
                                               <div class="controls">
                                                <input type="text" placeholder="Enter Longitude" name="longitude" required style="text-transform: capitalize;" class="span12" autocomplete="off">

                                            </div>
                                             <label class="control-label">Incident Type</label>
                                            <div class="controls">
                                                <select type="text" name="incident" class="span12" required >
                                                    <option value="">Select type of Incdident</option>
                                                     <option value="Stabbing">Stabbing</option>
                        <option value="Cardiac Arrest">Cardiac Arrest</option>
                        <option value="Road Crash">Road Crash</option>
                        <option value="Choking">Choking</option>
                        <option value="Poisoning">Poisoning</option>
                        <option value="Fall">Fall</option>
                        <option value="Electricution">Electricution</option>
                        <option value="Drowning">Drowning</option>
                        <option value="Gunshot">Gunshot</option>
                        <option value="Fire">Fire</option>
                        <option value="Explosion">Explosion</option>
                                                </select>

                                            </div>
                                            <hr style="border-top: 1px solid #d5d5d5">


                                                <button class="btn btn-success" type="submit" id="btnmap" name="savecoordinate" style="float: right;">Save Coordinate</button>

                                         </div>










                </form>

                            </div>
                        </div>


                        <!--/.module-->
                        <br />

                        <!--/.module-->
                    </div>
                    <!--/.content-->
                </div>
                <div class="span6">
                    <div class="content">


                        <!--/.module-->

                        <div class="module">
                            <div class="module-head">
                           <h3>
                                    Maps</h3>
                            </div>
                            <div class="module-body">
                             <div class="col-md-12 jumbotron" id = "map" >
                             </div>

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
            <b class="copyright">&copy; 2021 </b>All rights reserved.
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
