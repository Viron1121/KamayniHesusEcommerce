
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
 input[type="password"]:focus{
border-color: rgba(126, 239, 104, 0.8);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(126, 239, 104, 0.6);

    outline: 0 none;
}
 input[type="file"]:focus{


    outline: 0 none;
}
    #btnaccount:focus{


     outline: none;
    box-shadow: none;
    }

</style>


</head>
<body>
 <?php

      if(isset($_GET['signup'])){
      if ($_GET['signup'] == "usernameExist") {
        $_SESSION['status_message']="Username already exist";
        $_SESSION['status_code']="Failed";
      } else if ($_GET['signup'] == "success") {
        $_SESSION['status_message']="A new Account has been Added!";
        $_SESSION['status_code']="Success";
      }else if ($_GET['signup'] == "error") {
        $_SESSION['status_message']="Something went wrong. Please try again!";
        $_SESSION['status_code']="Failed";
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
  echo  '<li><a href="chat/chat.php"><i class="menu-icon icon-envelope"></i>Chat</a></li>';
  echo '<li><a href="backup.php"><i class="menu-icon icon-circle"></i>Backup </a></li>';
  echo '<li><a href="account.php"><i class="menu-icon icon-user"></i>Account </a></li>';




}


elseif ($user_type == $seller) {
     echo ' <li class="active"><a href="dashboard.php"><i class="menu-icon icon-dashboard"></i>Dashboard</a></li>';
    echo '<li><a href="chat/chat.php"><i class="menu-icon icon-envelope"></i>Chat</a></li>';
    echo '<li><a href="orders.php"><i class="menu-icon icon-file-alt"></i>Orders</a>';
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
                        <section class="form signup">
                        <div class="module">
                            <div class="module-head">
                                <h3>
                                   Account</h3>
                            </div>
                            <div class="module-body">


                 <form  role="form" method="POST"   class="row-fluid" action="chat/php/signup.php" enctype="multipart/form-data" autocomplete="off">
                       <div class="error-text"></div>

                    <div class="control-group">


                        <label class="control-label" for="basicinput">User Type:</label>
                                               <select type="text" name="usertype"  class="span12" >
                                                         <option value="">Select User Type</option>
                                                     <option value="Admin">Admin</option>
                                                     <option value="Seller">Seller</option>


                                                   </select>
                                            <label class="control-label">Firstname</label>
                                            <div class="controls">
                                                <input type="text"  placeholder="Enter Firstname" name="fname" required style="text-transform: capitalize;" class="span12" autocomplete="off">

                                            </div>
                                              <label class="control-label">Lastname</label>
                                             <div class="controls">
                                                <input type="text"  placeholder="Enter lastname" name="lname" required style="text-transform: capitalize;" class="span12" autocomplete="off">

                                            </div>
                                             <label class="control-label">Username</label>
                                               <div class="controls">
                                                <input type="text"  placeholder="Enter Username" name="uname" required  class="span12" autocomplete="off">

                                            </div>
                                             <label class="control-label">Password</label>
                                             <div class="controls">
                                                <input type="password"  placeholder="Enter Password" name="pass" required style="text-transform: capitalize;" class="span12" >

                                            </div>
                                        <label class="control-label">Select Image</label>
                                             <div class="controls">
                                        <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg"class="span12" required style="">
                                            </div>
                                            <hr style="border-top: 1px solid #d5d5d5">

                                                <button class="btn btn-success" type="submit" id="btnaccount" name="submit" style="float: right;">Create Account</button>

                                         </div>
                </form>
                            </div>
                        </div>
                    </section>
                             </div>
                        </div>
                                 <div class="span6" >
                      <div class="content" >
  <div class="module" style="height: 520px;">
                            <div class="module-head">
                               <h3>Users  Account</h3>
                            </div>
                            <div class="module-body">


            <?php

  require_once("include/dbconn.php");


  $result=$mysqli->query("SELECT * from users");
    $black = " ";
    ?>

    <table class="table table-fluid" id="myTable" >
    <thead>
    <tr><th>Fullname</th><th>User Type</th><th>Action</th></tr>
    </thead>
    <tbody>
           <?php while($row=mysqli_fetch_assoc($result)){ ?>
    <tr>
      <td style="text-transform: capitalize;"><?php echo $row['fname'] ?><?php echo $black;?><?php echo $row['lname'] ?></td>

       <td><?php echo $row['usertype'] ?></td>
        <td>
  <a class="btn  btn-rounded btn-sm  delete-button mb-control" data-box="#mb-delete" id="actionbtn_delete"  account_id="<?php echo $row['unique_id'] ?>"><i class="fas fa-trash-alt" ></i></a>
</td>

    </tr>



        <?php }?>

    </tbody>
    </table>


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
            <b class="copyright">&copy; 2022 </b>All rights reserved.
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

<script src="js/delete_account.js">



</script>

</body>
</html>


       <?php

if(isset($_SESSION['status_code'])){?>
 <?php if($_SESSION['status_code']=='Failed'){ ?>
       <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn open" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle" style="color:gray">
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

 <?php }


  unset($_SESSION['status_code']);unset($_SESSION['status_message']);  } ?>
          <div class="message-box  animated fadeIn" data-sound="alert" id="mb-delete">
            <div class="mb-container">
                <div class="mb-middle" style="color:gray">
                    <div class="mb-title">Delete this Account?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to Delete this Account?</p>
                        <p>Click No if you want to retain. Click Yes to completely Delete .</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a  href="" class="btn btn-theme btn-lg " id="delete-link">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
