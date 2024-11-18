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
                                    Incdient Report</h3>
                            </div>
                            <div class="module-body">

                   <form method="post" = action="save_incident.php" class="row-fluid"  enctype = "multipart/form-data">

                    <div class="control-group">


                                            <div class="controls">

                                              <div class="span1">
                                            </div>

                                                <div class="span3">
                                                 <label class="control-label"  for="basicinput">Firstname</label>
                                                <input type="text" id="basicinput" placeholder="Enter Firstname" name="fnamed"   class="span12"  autocomplete="off" style="text-transform: capitalize;">
                                                  <label class="control-label" for="basicinput">Date of Incident</label>
                                                <input type="date" id="basicinput" name="date_incident"  class="span12">
                                                <label class="control-label" for="basicinput">Age</label>
                                                <input type="text" id="basicinput" name="age"  class="span12" placeholder="Enter Age" style="text-transform: capitalize;">
                                                 <label class="control-label" for="basicinput">Destination</label>
                                                <input type="text" id="basicinput" placeholder="Enter Destination" name="destination"  style="text-transform: capitalize;" class="span12"  autocomplete="off">
                                                 <label class="control-label" for="basicinput">Run Time</label>
                                                   <select type="text" name="runtime" id="basicinput" class="span12" >
                                                     <option value="">Select Run Time</option>
                                                     <option value="EQR">EQR</option>
                                                     <option value="PTS">PTS</option>

                                                   </select>
                                                      <hr style="">
                                                      <label class="control-label" for="basicinput" style="font-weight: bold;color: black;">Primary Assessment</label>
                                                   <label class="control-label" for="basicinput">Consciousness</label>
                                                     <select type="text" name="cons" id="basicinput" class="span12" >
                                                     <option value="">Select Consciousness</option>
                                                     <option value="Conscious">Conscious</option>
                                                     <option value="Unconscious">Unconscious</option>

                                                   </select>
                                                     <label class="control-label" for="basicinput">Airway</label>
                                                     <select type="text" name="airway" id="basicinput" class="span12" >
                                                     <option value="">Select Airway</option>
                                                     <option value="Clear">Airway Clear</option>
                                                     <option value="with Obstruction">Airway with Obstruction</option>

                                                   </select>
                                                     <label class="control-label" for="basicinput">Breathing</label>
                                                     <select type="text" name="breathing" id="basicinput" class="span12" >
                                                     <option value="">Select Breathing</option>
                                                     <option value="With">With Breathing</option>
                                                     <option value="Without">Without Breathing</option>

                                                   </select>
                                                     <label class="control-label" for="basicinput">Circulation</label>
                                                     <select type="text" name="circulation" id="basicinput" class="span12" >
                                                     <option value="">Select Circulation</option>
                                                     <option value="With sign ">With sign of Circulation</option>
                                                     <option value="Without sign">Without sign of circulation</option>

                                                   </select>
                                                   <hr style="">
                                                        <label class="control-label" for="basicinput" style="font-weight: bold;color: black;">Vital Signs</label>
                                                         <label class="control-label" for="basicinput">Blood Pressure</label>
                                                <input type="text" id="basicinput" placeholder="Enter Blood Pressure" name="bloodpressure"  style="text-transform: capitalize;" class="span12"  autocomplete="off">
                                                  <label class="control-label" for="basicinput">Temperature</label>
                                                <input type="text" id="basicinput" placeholder="Enter Temperature" name="temperature"  style="text-transform: capitalize;" class="span12"  autocomplete="off">
                                                  <label class="control-label" for="basicinput">Pulse Rate</label>
                                                <input type="text" id="basicinput" placeholder="Enter Pulse Rate" name="pulserate"  style="text-transform: capitalize;" class="span12"  autocomplete="off">
                                                  <label class="control-label" for="basicinput">Respiratory Rate</label>
                                                <input type="text" id="basicinput" placeholder="Enter Respiratory Rate" name="respiratoryrate"  style="text-transform: capitalize;" class="span12"  autocomplete="off">

                                                 <hr >
                                                 <label class="control-label" for="basicinput" style="font-weight: bold;color: black;">Immobilization(Splinting)</label>
                                                     <label class="control-label" for="basicinput">PMS Check 1</label>
                                                <input type="text" id="basicinput" placeholder="Enter Parts" name="parts1"  style="text-transform: capitalize;" class="span12"  autocomplete="off">
                                                  <input type="text" id="basicinput" placeholder="Enter Before" name="before1"  style="text-transform: capitalize;" class="span12"  autocomplete="off">
                                                    <input type="text" id="basicinput" placeholder="Enter After" name="after1"  style="text-transform: capitalize;" class="span12"  autocomplete="off">
                                                   <hr style="margin-bottom: 68px;">
                                                           <label class="control-label" for="basicinput" style="font-weight: bold;color: black;">Management</label>
                                                       <select type="text" name="manage" id="basicinput" class="span12" >
                                                    <option value="">Select Management</option>


                        <option value="FBAO Management">FBAO Management</option>
                        <option value="Rescue Breathing">Rescue Breathing</option>
                        <option value="CPR">CPR</option>
                        <option value="Stabilized the Head">Stabilized the Head</option>
                        <option value="Bleeding Control">Bleeding Control</option>
                        <option value="Dressing Application">Dressing Application</option>

                                                </select>

                                            </div>
                                            <div class="span1">
                                            </div>

                                            <div class="controls">
                                                <div class="span3">
                                                 <label class="control-label" for="basicinput">Middlename</label>
                                                <input type="text" id="basicinput" placeholder="Enter Middlename" name="mnamed"  style="text-transform: capitalize;" class="span12"  autocomplete="off">
                                                  <label class="control-label" for="basicinput">Birthday</label>
                                                <input type="date" id="basicinput" placeholder="Enter Origin" name="bdays"  style="text-transform: capitalize;" class="span12"  autocomplete="off">
                                                 <label class="control-label" for="basicinput">Patient</label>
                                                <input type="text" id="basicinput" placeholder="Enter Patient" name="patient"  style="text-transform: capitalize;" class="span12"  autocomplete="off">   <label class="control-label" for="basicinput">Contact Person</label>
                                                <input type="text" id="basicinput" placeholder="Enter Contact Person" name="contactperson"  style="text-transform: capitalize;" class="span12"  autocomplete="off">
                                                 <label class="control-label" for="basicinput">Type of Incident</label>
                                                <select type="text" name="incident_type" id="basicinput" class="span12" >
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

<hr style="">
                                                 <label class="control-label" for="basicinput" style="font-weight: bold;color: black;">Secondary Assessment</label>
                                                   <label class="control-label" for="basicinput">Responsiveness</label>
                                                     <select type="text" name="responsiveness" id="basicinput" class="span12" >
                                                         <option value="">Select Responsiveness</option>
                                                     <option value="Alert">Alert</option>
                                                     <option value="Verba">Verbal</option>
                                                     <option value="Pain">Pain</option>
                                                     <option value="Unconsious">Unconsious</option>
                                                   </select>

                                                   <label class="control-label" for="basicinput" style="font-weight: bold;color: black;margin-top: 40px;">Sample</label>

                                                    <label class="control-label" for="basicinput">Sign and Symptoms</label>
                                                <input type="text" id="basicinput" placeholder="Enter Sign and Symptoms" name="signandsymptoms"  style="text-transform: capitalize;" class="span12"  autocomplete="off">
                                                  <label class="control-label" for="basicinput">Allergies</label>
                                                <input type="text" id="basicinput" placeholder="Enter Allergies" name="allergies"  style="text-transform: capitalize;" class="span12"  autocomplete="off">

                                                <hr style="">

                                    <label class="control-label" for="basicinput" style="font-weight: bold;color: black;">Time</label>

                                                  <label class="control-label" for="basicinput">Blood Pressure Time</label>
                                                <input type="text" id="basicinput" placeholder="Enter Blood Pressure Time" name="bloodpressuretime"  style="text-transform: capitalize;" class="span12"  autocomplete="off">
                                                  <label class="control-label" for="basicinput">Temperature Time</label>
                                                <input type="text" id="basicinput" placeholder="Enter Temperature Time" name="temperaturetime"  style="text-transform: capitalize;" class="span12"  autocomplete="off">
                                                  <label class="control-label" for="basicinput">Pulse Rate Time</label>
                                                <input type="text" id="basicinput" placeholder="Enter Pulse Rate Time" name="pulseratetime"  style="text-transform: capitalize;" class="span12"  autocomplete="off">
                                                  <label class="control-label" for="basicinput">Respiratory Rate Time</label>
                                                <input type="text" id="basicinput" placeholder="Enter Respiratory Rate Time" name="respiratoryratetime"  style="text-transform: capitalize;" class="span12"  autocomplete="off">

                                                 <hr style="margin-bottom: 45px;">
                                                   <label class="control-label" for="basicinput">PMS Check 2</label>
                                                <input type="text" id="basicinput" placeholder="Enter Parts" name="parts2"  style="text-transform: capitalize;" class="span12"  autocomplete="off">
                                                  <input type="text" id="basicinput" placeholder="Enter Before" name="before2"  style="text-transform: capitalize;" class="span12"  autocomplete="off">
                                                    <input type="text" id="basicinput" placeholder="Enter After" name="after2"  style="text-transform: capitalize;" class="span12"  autocomplete="off">
                                                    <hr style="margin-bottom: 68px;">
                                                     <label class="control-label" for="basicinput" style="font-weight: bold;color: black;">Endorsed By</label>
                                                <input type="text" id="basicinput" placeholder="Enter PDRRMO Staff" name="endoby"   style="text-transform: capitalize;" class="span12"  autocomplete="off" required>



                                               </div>
                                            </div>
                                              <div class="span1">
                                            </div>

                                     <div class="controls">
                                                <div class="span3">
                                                       <label class="control-label" for="basicinput">Lastname</label>
                                                <input type="text" placeholder="Enter Lastname" name="lnamed"  style="text-transform: capitalize;" class="span12"  autocomplete="off">
                                                  <label class="control-label" for="basicinput">Gender</label>
                                               <select type="text" name="gender" id="basicinput" class="span12" >
                                                         <option value="">Select Gender</option>
                                                     <option value="Male">Male</option>
                                                     <option value="Female">Female</option>

                                                   </select>
                                                    <label class="control-label" for="basicinput">Origin</label>
                                                <input type="text" id="basicinput" placeholder="Enter Origin" name="origin"  style="text-transform: capitalize;" class="span12"  autocomplete="off">
                                                   <label class="control-label" for="basicinput">Note</label>
                                                 <textarea name="note" rows="8" id="note" cols="50" class="span12" placeholder="Enter Note ..."></textarea>

                                                 <hr style="margin-top: 35px;">
                                                     <label class="control-label" for="basicinput">Medication</label>
                                                <input type="text" id="basicinput" placeholder="Enter Medication" name="medication"  style="text-transform: capitalize;" class="span12"  autocomplete="off">
                                                   <label class="control-label" for="basicinput">Past Medical History</label>
                                                <input type="text" id="basicinput" placeholder="Enter Past Medical History" name="pastmedhistory"  style="text-transform: capitalize;" class="span12"  autocomplete="off">
                                                  <label class="control-label" for="basicinput">Last Meal Taken</label>
                                                <input type="text" id="basicinput" placeholder="Enter Last Meal Taken" name="lastmealtaken"  style="text-transform: capitalize;" class="span12"  autocomplete="off">
                                                <hr style="">
                                                <label class="control-label" for="basicinput" style="font-weight: bold;color: black;">Found Injuries</label>
                                                <label class="control-label" for="basicinput">Deformities</label>
                                                <input type="text" id="basicinput" placeholder="Enter Deformities Location" name="deformities"  style="text-transform: capitalize;" class="span12"  autocomplete="off">
                                                  <label class="control-label" for="basicinput">Contusion</label>
                                                <input type="text" id="basicinput" placeholder="Enter Contusion Location" name="contusion"  style="text-transform: capitalize;" class="span12"  autocomplete="off">
                                                  <label class="control-label" for="basicinput">Abrasion</label>
                                                <input type="text" id="basicinput" placeholder="Enter Abrasion Location" name="abrassion"  style="text-transform: capitalize;" class="span12"  autocomplete="off">
                                                  <label class="control-label" for="basicinput">Functure</label>
                                                <input type="text" id="basicinput" placeholder="Enter Fucnture Location" name="puncture"  style="text-transform: capitalize;" class="span12"  autocomplete="off">
                                                 <label class="control-label" for="basicinput">Bleeding/Burn</label>
                                                <input type="text" id="basicinput" placeholder="Enter Bleeding/Burn Location" name="bleedburn"  style="text-transform: capitalize;" class="span12"  autocomplete="off">
                                                <label class="control-label" for="basicinput">Tenderness</label>
                                                <input type="text" id="basicinput" placeholder="Enter Tenderness Location" name="tenderness"  style="text-transform: capitalize;" class="span12"  autocomplete="off">
                                                  <label class="control-label" for="basicinput">Laceration</label>
                                                <input type="text" id="basicinput" placeholder="Enter Laceration Location" name="laceration"  style="text-transform: capitalize;" class="span12"  autocomplete="off">
                                                <label class="control-label" for="basicinput">Swelling</label>
                                                <input type="text" id="basicinput" placeholder="Enter Swelling Location" name="swelling"  style="text-transform: capitalize;" class="span12"  autocomplete="off">
                                                 <hr >
                                                  <label class="control-label" for="basicinput" style="font-weight: bold;color: black;">Receive By</label>
                                                <input type="text" id="basicinput" placeholder="Enter Physsician/Nurse" name="receiveby"  style="text-transform: capitalize;" class="span12"  autocomplete="off">
                                                <hr>
                                                <button class="btn btn-success" type="submit" id="save_report" name="save_report" style="float: right;">Save Report</button>
                                               </div>


                                               </div>
                                            </div>





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
