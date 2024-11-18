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

    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
        rel='stylesheet'>

  <link rel="stylesheet" href="plugins/cropper/css/cropper.min.css">
        <link rel="stylesheet" href="plugins/cropper/css/crop-avatar.css">


    <script
      src="https://use.fontawesome.com/releases/v5.15.2/js/all.js"
      data-auto-a11y="true"
    ></script>
    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <link rel="stylesheet" href="resource/css/animation.min.css">


    <script
      src="https://use.fontawesome.com/releases/v5.15.2/js/all.js"
      data-auto-a11y="true"
    ></script>
     <script src="plugins/cropper/js/cropper.min.js"></script>
        <script src="plugins/cropper/js/crop-avatar.js"></script>

      <link rel="stylesheet" type="text/css"  href="messagebox.css"/>
        <script type="text/javascript" src="js/plugins.js"></script>
      <script type="text/javascript" src="js/actions.js"></script>
      <style type="text/css">html, body {
  /* IE 10-11 didn't like using min-height */
  height: 100%;
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
    #btnupdate:focus{


     outline: none;
    box-shadow: none;
    }

</style>


</head>
<body>

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
                <!--/.span3--><div  id="crop-avatar">



<!-- Cropping modal -->
    <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form class="avatar-form" action="include/crop_picture.php" enctype="multipart/form-data" method="post">
            <div class="modal-header">
              <button class="close" data-dismiss="modal" type="button">&times;</button>
              <h4 class="modal-title" id="avatar-modal-label">Change Avatar</h4>
            </div>
            <div class="modal-body">
              <div class="avatar-body">

                <!-- Upload image and data -->
                <div class="avatar-upload">
                  <input class="avatar-src" name="avatar_src" type="hidden">
                  <input class="avatar-data" name="avatar_data" type="hidden">
                  <label for="avatarInput">Local upload</label>
                  <input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
                </div>

                <!-- Crop and preview -->
                <div class="row">
                  <div class="col-md-12">
                    <div class="avatar-wrapper"></div>
                  </div>

                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
              <button class="btn-success btn btn-theme avatar-save" type="submit">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div><!-- /.modal -->

    <!-- Loading state -->
    <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
  </div>

                                 <div class="span3" >
                      <div class="content" >
  <div class="module" style="height: 355px;">
                            <div class="module-head">
                                <h3 class="panel-title">Profile Picture</h3>
                            </div>
                            <div class="module-body">

                            <center>
         <div class="avatar-view" title="Change the Profile" >
                                               <img data-toggle="modal" data-target="#avatar-modal"  src="chat/php/images/<?php echo $row2['img'] ?>" width="100" class="img-thumbnail" style="padding-top: 0; border-radius: 5px; width: 260px; height: 265px;">
                                            </div>
                                               </center>


   </div>


            </div>


                    <!--/.content-->
                </div>
                <!--/.span9-->
            </div>

              <div class="span6">
                      <div class="content">
                        <div class="module">
                            <div class="module-head">
                                <h3>
                                   Profile Details</h3>
                            </div>
                            <div class="module-body">

<?php





    $admin = $_SESSION['unique_id'];



    $getrecord4 = mysqli_query($mysqli, "SELECT * FROM users WHERE unique_id = '$admin'");
    $row4 = mysqli_fetch_assoc($getrecord4);




?>

                 <form  role="form" method="POST" action="include/update_account.php"  class="row-fluid">

                    <div class="control-group">

                                            <label class="control-label">Firstname</label>
                                            <div class="controls">
                                                <input type="text"  placeholder="Enter Firstname" name="fname"  style="text-transform: capitalize;" class="span12" value="<?php echo $row4['fname'] ?>">

                                            </div>
                                               <label class="control-label">Lastname</label>
                                            <div class="controls">
                                                <input type="text"  placeholder="Enter Firstname" name="lname"  style="text-transform: capitalize;" class="span12" value="<?php echo $row4['lname'] ?>">

                                            </div>

                                             <label class="control-label">Username</label>
                                               <div class="controls">
                                                <input type="text"  placeholder="Enter Username" name="username"  class="span12" value="<?php echo $row4['username'] ?>">

                                            </div>
                                             <label class="control-label">Password</label>
                                             <div class="controls">
                                                <input type="password"  placeholder="Enter Password" name="password"  class="span12">

                                            </div>
                                            <hr style="border-top: 1px solid #d5d5d5">

                                                <button class="btn btn-success" type="submit" id="btnupdate" name="update" style="float: right;">Update Account</button>

                                         </div>










                </form>



                            </div>
                        </div>
                             </div>
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




<script src="js/delete_account.js">



</script>

         <script src="plugins/cropper/js/cropper.min.js"></script>
        <script src="plugins/cropper/js/crop-avatar.js"></script>
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
