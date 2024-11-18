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

</style>
</head>
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
    <!-- /navbar -->
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
                <div class="span9">
                    <div class="content">


                        <!--/.module-->

                        <div class="module">
                            <div class="module-head">
                           <h3>
                                    Incdient Report</h3>
                            </div>
                            <div class="module-body">

<?php




   $id=$_GET['id'];



    $getrecord3 = mysqli_query($mysqli, "SELECT * FROM personal_info WHERE incident_id = '$id'");
    $row3 = mysqli_fetch_assoc($getrecord3);



    $getrecord4 = mysqli_query($mysqli, "SELECT * FROM primary_assessment WHERE incident_id = '$id'");
    $row4 = mysqli_fetch_assoc($getrecord4);


    $getrecord5 = mysqli_query($mysqli, "SELECT * FROM secondary_assessment WHERE incident_id = '$id'");
    $row5 = mysqli_fetch_assoc($getrecord5);


    $getrecord6 = mysqli_query($mysqli, "SELECT * FROM blood_pressure WHERE incident_id = '$id'");
    $row6 = mysqli_fetch_assoc($getrecord6);

    $getrecord7 = mysqli_query($mysqli, "SELECT * FROM temperature WHERE incident_id = '$id'");
    $row7 = mysqli_fetch_assoc($getrecord7);


    $getrecord8 = mysqli_query($mysqli, "SELECT * FROM pulse_rate WHERE incident_id = '$id'");
    $row8 = mysqli_fetch_assoc($getrecord8);


    $getrecord9 = mysqli_query($mysqli, "SELECT * FROM resperatory_rate WHERE incident_id = '$id'");
    $row9 = mysqli_fetch_assoc($getrecord9);


    $getrecord10 = mysqli_query($mysqli, "SELECT * FROM found_injuries WHERE incident_id = '$id'");
    $row10 = mysqli_fetch_assoc($getrecord10);


    $getrecord11 = mysqli_query($mysqli, "SELECT * FROM pms_1 WHERE incident_id = '$id'");
    $row11 = mysqli_fetch_assoc($getrecord11);

    $getrecord12 = mysqli_query($mysqli, "SELECT * FROM pms_2 WHERE incident_id = '$id'");
    $row12 = mysqli_fetch_assoc($getrecord12);

        $getrecord13 = mysqli_query($mysqli, "SELECT * FROM manage_incident WHERE incident_id = '$id'");
    $row13 = mysqli_fetch_assoc($getrecord13);
?>


                   <form method="post" = action="include/update_incident.php" class="row-fluid"  enctype = "multipart/form-data" autocomplete="off">

                    <div class="control-group">


                                            <div class="controls">
                                                <div class="span3">
                                                 <label class="control-label"  for="basicinput">Firstname</label>
                                                <input type="text" id="basicinput" placeholder="Enter Firstname" name="fnamed"  value="<?php echo $row3['firstname'];?>"  class="span12"   style="text-transform: capitalize;">
                                                  <label class="control-label" for="basicinput">Date of Incident</label>
                                                <input type="date" id="basicinput"  value="<?php echo $row3['info_date'];?>" name="date_incident"  class="span12">
                                                <label class="control-label"  for="basicinput">Age</label>
                                                <input type="text" id="basicinput" value="<?php echo $row3['age'];?>" name="age"  class="span12" placeholder="Enter Age" style="text-transform: capitalize;">
                                                 <label class="control-label" for="basicinput">Destination</label>
                                                <input type="text" id="basicinput" value="<?php echo $row3['distinaton'];?>" placeholder="Enter Destination" name="destination"  style="text-transform: capitalize;" class="span12"  >
                                                 <label class="control-label"  for="basicinput">Run Time</label>
                                                   <select type="text" name="runtime" id="basicinput" class="span12" >
                                                     <option value="<?php echo $row3['runtime'];?>"><?php echo $row3['runtime'];?></option>
                                                     <option value="EQR">EQR</option>
                                                     <option value="PTS">PTS</option>

                                                   </select>
                                                      <hr style="">
                                                      <label class="control-label" for="basicinput" style="font-weight: bold;color: black;">Primary Assessment</label>
                                                   <label class="control-label" for="basicinput">Consciousness</label>
                                                     <select type="text" name="cons" id="basicinput" class="span12" >
                                                     <option value="<?php echo $row4['conciousness'];?>"><?php echo $row4['conciousness'];?></option>
                                                     <option value="Conscious">Conscious</option>
                                                     <option value="Unconscious">Unconscious</option>

                                                   </select>
                                                     <label class="control-label" for="basicinput">Airway</label>
                                                     <select type="text" name="airway" id="basicinput" class="span12" >
                                                     <option  value="<?php echo $row4["airway"]; ?>"><?php echo $row4["airway"] ?></option>
                                                     <option value="Clear">Clear</option>
                                                     <option value="with Obstruction"> with Obstruction</option>

                                                   </select>
                                                     <label class="control-label" for="basicinput">Breathing</label>
                                                     <select type="text" name="breathing" id="basicinput" class="span12" >
                                                     <option  value="<?php echo $row4["breathing"]; ?>"><?php echo $row4["breathing"] ?></option>
                                                     <option value="With">With</option>
                                                     <option value="Without">Without</option>

                                                   </select>
                                                     <label class="control-label" for="basicinput">Circulation</label>
                                                     <select type="text" name="circulation" id="basicinput" class="span12" >
                                                     <option value="<?php echo $row4["circulation"]; ?>"><?php echo $row4["circulation"] ?></option>
                                                     <option value="With sign ">With sign</option>
                                                     <option value="Without sign">Without sign</option>

                                                   </select>
                                                   <hr style="">
                                                        <label class="control-label" for="basicinput" style="font-weight: bold;color: black;">Vital Signs</label>
                                                         <label class="control-label" for="basicinput">Blood Pressure</label>
                                                <input type="text" id="basicinput" placeholder="Enter Blood Pressure" name="bloodpressure" value="<?php echo $row6["blood_pressure_check"] ?>"  style="text-transform: capitalize;" class="span12"  >
                                                  <label class="control-label" for="basicinput">Temperature</label>
                                                <input type="text" id="basicinput" placeholder="Enter Temperature" name="temperature" value="<?php echo $row7["temperature_check"]; ?>"  style="text-transform: capitalize;" class="span12"  >
                                                  <label class="control-label" for="basicinput">Pulse Rate</label>
                                                <input type="text" id="basicinput" placeholder="Enter Pulse Rate" name="pulserate" value="<?php echo $row8["pulse_rate_check"]; ?>"  style="text-transform: capitalize;" class="span12"  >
                                                  <label class="control-label" for="basicinput">Respiratory Rate</label>
                                                <input type="text" id="basicinput" placeholder="Enter Respiratory Rate" name="respiratoryrate"  value="<?php echo $row9["resperatory_rate_check"]; ?>"  style="text-transform: capitalize;" class="span12"  >

                                                 <hr >
                                                 <label class="control-label" for="basicinput" style="font-weight: bold;color: black;">Immobilization(Splinting)</label>
                                                     <label class="control-label" for="basicinput">PMS Check 1</label>
                                                <input type="text" id="basicinput" placeholder="Enter Parts" name="parts1"  style="text-transform: capitalize;" value="<?php echo $row11["parts"]; ?>" class="span12"  >
                                                  <input type="text" id="basicinput" placeholder="Enter Before" name="before1" value="<?php echo $row11["before1"]; ?>"  style="text-transform: capitalize;" class="span12"  >
                                                    <input type="text" id="basicinput" placeholder="Enter After" name="after1" value="<?php echo $row11["after"]; ?>"  style="text-transform: capitalize;" class="span12"  >
                                                   <hr style="margin-bottom: 68px;">
                                                           <label class="control-label" for="basicinput" style="font-weight: bold;color: black;">Management</label>
                                                       <select type="text" name="manage" id="basicinput" class="span12" >
                                                    <option value="<?php echo $row13["management"]; ?>"><?php echo $row13["management"]; ?></option>


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
                                                <input type="text" id="basicinput" placeholder="Enter Middlename" name="mnamed" value="<?php echo $row3['middle'];?>"  style="text-transform: capitalize;" class="span12"  >
                                                  <label class="control-label" for="basicinput">Birthday</label>
                                                <input type="date" id="basicinput" placeholder="Enter Origin" name="bdays"  style="text-transform: capitalize;" value="<?php echo $row3["birthdate"] ?>" class="span12"  >
                                                 <label class="control-label" for="basicinput">Patient</label>
                                                <input type="text" id="basicinput" value="<?php echo $row3['patient'];?>" placeholder="Enter Patient" name="patient"  style="text-transform: capitalize;" class="span12"  >   <label class="control-label" for="basicinput">Contact Person</label>
                                                <input type="text" id="basicinput" placeholder="Enter Contact Person" name="contactperson" value="<?php echo $row3['contactperson'];?>"  style="text-transform: capitalize;" class="span12"  >
                                                 <label class="control-label" for="basicinput">Type of Incident</label>
                                                <select type="text" name="incident_type" id="basicinput" class="span12" >
                                                    <option value="<?php echo $row3['incident_type'];?>"><?php echo $row3['incident_type'];?></option>
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
                                                         <option value="<?php echo $row5["responsiveness"]; ?>"><?php echo $row5["responsiveness"] ?></option>
                                                     <option value="Alert">Alert</option>
                                                     <option value="Verbal">Verbal</option>
                                                     <option value="Pain">Pain</option>
                                                     <option value="Unconsious">Unconsious</option>
                                                   </select>

                                                   <label class="control-label" for="basicinput" style="font-weight: bold;color: black;margin-top: 40px;">Sample</label>

                                                    <label class="control-label" for="basicinput">Sign and Symptoms</label>
                                                <input type="text" id="basicinput" value="<?php echo $row5["signandsymptoms"] ?>" placeholder="Enter Sign and Symptoms" name="signandsymptoms"  style="text-transform: capitalize;" class="span12"  >
                                                  <label class="control-label" for="basicinput">Allergies</label>
                                                <input type="text" id="basicinput" placeholder="Enter Allergies" name="allergies" value="<?php echo $row5["allergies"]; ?>"  style="text-transform: capitalize;" class="span12"  >

                                                <hr style="">

                                    <label class="control-label" for="basicinput" style="font-weight: bold;color: black;">Time</label>

                                                  <label class="control-label" for="basicinput">Blood Pressure Time</label>
                                                <input type="text" id="basicinput" placeholder="Enter Blood Pressure Time" name="bloodpressuretime" value="<?php echo $row6["blood_pressure_time"]; ?>"  style="text-transform: capitalize;" class="span12"  >
                                                  <label class="control-label" for="basicinput">Temperature Time</label>
                                                <input type="text" id="basicinput" placeholder="Enter Temperature Time" name="temperaturetime" value="<?php echo $row7["temperature_time"]; ?>"  style="text-transform: capitalize;" class="span12"  >
                                                  <label class="control-label" for="basicinput">Pulse Rate Time</label>
                                                <input type="text" id="basicinput" placeholder="Enter Pulse Rate Time" name="pulseratetime" value="<?php echo $row8["pulse_rate_time"] ?>"  style="text-transform: capitalize;" class="span12"  >
                                                  <label class="control-label" for="basicinput">Respiratory Rate Time</label>
                                                <input type="text" id="basicinput" placeholder="Enter Respiratory Rate Time" name="respiratoryratetime" value="<?php echo $row9["resperatory_rate_time"]; ?>"  style="text-transform: capitalize;" class="span12"  >

                                                 <hr style="margin-bottom: 45px;">
                                                   <label class="control-label" for="basicinput">PMS Check 2</label>
                                                <input type="text" id="basicinput"  placeholder="Enter Parts" name="parts2"  style="text-transform: capitalize;" value="<?php echo $row12["parts"]; ?>" class="span12"  >
                                                  <input type="text" id="basicinput" placeholder="Enter Before" name="before2" value="<?php echo $row12["before2"]; ?>"  style="text-transform: capitalize;" class="span12"  >
                                                    <input type="text" id="basicinput" placeholder="Enter After" name="after2" value="<?php echo $row12["after"]; ?>"  style="text-transform: capitalize;" class="span12"  >
                                                    <hr style="margin-bottom: 68px;">
                                                     <label class="control-label" for="basicinput" style="font-weight: bold;color: black;">Endorsed By</label>
                                                <input type="text" id="basicinput" placeholder="Enter PDRRMO Staff" name="endoby"  value="<?php echo $row13["endoby"]; ?>"  style="text-transform: capitalize;" class="span12"   required>



                                               </div>
                                            </div>
                                              <div class="span1">
                                            </div>

                                     <div class="controls">
                                                <div class="span3">
                                                       <label class="control-label" for="basicinput">Lastname</label>
                                                <input type="text" placeholder="Enter Lastname" name="lnamed"  value="<?php echo $row3['lastname'];?>" style="text-transform: capitalize;" class="span12"  >
                                                  <label class="control-label" for="basicinput">Gender</label>
                                               <select type="text" name="gender" id="basicinput" class="span12" >
                                                         <option  value="<?php echo $row3["gender"] ?>"><?php echo $row3["gender"] ?></option>
                                                     <option value="Male">Male</option>
                                                     <option value="Female">Female</option>

                                                   </select>
                                                    <label class="control-label" for="basicinput">Origin</label>
                                                <input type="text" id="basicinput" value="<?php echo $row3['origin'];?>" placeholder="Enter Origin" name="origin"  style="text-transform: capitalize;" class="span12"  >
                                                   <label class="control-label"  for="basicinput">Note</label>
                                                 <textarea name="note" rows="8" id="note" cols="50" class="span12" placeholder="Enter Note ..."><?php echo $row3['note'];?></textarea>

                                                 <hr style="margin-top: 35px;">
                                                     <label class="control-label" for="basicinput">Medication</label>
                                                <input type="text" id="basicinput" placeholder="Enter Medication" name="medication" value="<?php echo $row5["medication"] ?>" style="text-transform: capitalize;" class="span12"  >
                                                   <label class="control-label" for="basicinput">Past Medical History</label>
                                                <input type="text" id="basicinput" placeholder="Enter Past Medical History" name="pastmedhistory" value="<?php echo $row5["pastmedhistory"] ?>" style="text-transform: capitalize;" class="span12"  >
                                                  <label class="control-label" for="basicinput">Last Meal Taken</label>
                                                <input type="text" id="basicinput" placeholder="Enter Last Meal Taken" name="lastmealtaken" value="<?php echo $row5["lastmealtaken"] ?>" style="text-transform: capitalize;" class="span12"  >
                                                <hr style="">
                                                <label class="control-label" for="basicinput" style="font-weight: bold;color: black;">Found Injuries</label>
                                                <label class="control-label" for="basicinput">Deformities</label>
                                                <input type="text" id="basicinput" placeholder="Enter Deformities Location" name="deformities" value="<?php echo $row10["deformities"]; ?>" style="text-transform: capitalize;" class="span12"  >
                                                  <label class="control-label" for="basicinput">Contusion</label>
                                                <input type="text" id="basicinput" placeholder="Enter Contusion Location" name="contusion" value="<?php echo $row10["contusion"]; ?>"  style="text-transform: capitalize;" class="span12"  >
                                                  <label class="control-label" for="basicinput">Abrassion</label>
                                                <input type="text" id="basicinput" placeholder="Enter Abrasion Location" name="abrassion"  value="<?php echo $row10["abrassion"]; ?>"  style="text-transform: capitalize;" class="span12"  >
                                                  <label class="control-label" for="basicinput">Puncture</label>
                                                <input type="text" id="basicinput" placeholder="Enter Pucnture Location" name="puncture" value="<?php echo $row10["puncture"]; ?>"  style="text-transform: capitalize;" class="span12"  >
                                                 <label class="control-label" for="basicinput">Bleeding/Burn</label>
                                                <input type="text" id="basicinput" placeholder="Enter Bleeding/Burn Location" name="bleedburn" value="<?php echo $row10["bleeding_burn"]; ?>"  style="text-transform: capitalize;" class="span12"  >
                                                <label class="control-label" for="basicinput">Tenderness</label>
                                                <input type="text" id="basicinput" placeholder="Enter Tenderness Location" name="tenderness" value="<?php echo $row10["tenderness"]; ?>"  style="text-transform: capitalize;" class="span12"  >
                                                  <label class="control-label" for="basicinput">Laceration</label>
                                                <input type="text" id="basicinput" placeholder="Enter Laceration Location" name="laceration" value="<?php echo $row10["laceration"]; ?>"  style="text-transform: capitalize;" class="span12"  >
                                                <label class="control-label" for="basicinput">Swelling</label>
                                                <input type="text" id="basicinput" placeholder="Enter Swelling Location" name="swelling" value="<?php echo $row10["swelling"]; ?>"  style="text-transform: capitalize;" class="span12"  >
                                                 <hr >
                                                  <label class="control-label" for="basicinput" style="font-weight: bold;color: black;">Receive By</label>
                                                <input type="text" id="basicinput" placeholder="Enter Physsician/Nurse" name="receiveby" value="<?php echo $row13["receiveby"]; ?>" style="text-transform: capitalize;" class="span12"  >
                                                   <input type="hidden" id="basicinput" placeholder="Enter Physsician/Nurse" name="idto" value="<?php echo $row13["incident_id"]; ?>" style="text-transform: capitalize;" class="span12"  >
                                                <hr>
                                                <button class="btn btn-success" type="submit" name="update_report" style="float: right;">Update Report</button>
                                               </div>


                                               </div>
                                            </div>
                                              <div class="span1">
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
