
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
    if(isset($_POST['backup_database'])){

        $db_name = $_POST['db_name'];
        //ENTER THE RELEVANT INFO BELOW
        $mysqlUserName      = "root";
        $mysqlPassword      = "";
        $mysqlHostName      = "localhost";
        $DbName             = "ecommerce";
        $backup_name        = $db_name;
        $tables             = array("canceledorders", "cart", "delivered", "miamore", "packed", "products", "recuerdos", "reviews","users","user_type");

        //or add 5th parameter(array) of specific tables:    array("mytable1","mytable2","mytable3") for multiple tables
        function Export_Database($host,$user,$pass,$name,  $tables=false,$backup_name)
        {
            $mysqli = new mysqli($host,$user,$pass,$name);
            $mysqli->select_db($name);
            $mysqli->query("SET NAMES 'utf8'");

            $queryTables    = $mysqli->query('SHOW TABLES');
            while($row = $queryTables->fetch_row())
            {
                $target_tables[] = $row[0];
            }
            if($tables !== false)
            {
                $target_tables = array_intersect( $target_tables, $tables);
            }
            foreach($target_tables as $table)
            {
                $result         =   $mysqli->query('SELECT * FROM '.$table);
                $fields_amount  =   $result->field_count;
                $rows_num=$mysqli->affected_rows;
                $res            =   $mysqli->query('SHOW CREATE TABLE '.$table);
                $TableMLine     =   $res->fetch_row();
                $content        = (!isset($content) ?  '' : $content) . "\n\n".$TableMLine[1].";\n\n";

                for ($i = 0, $st_counter = 0; $i < $fields_amount;   $i++, $st_counter=0)
                {
                    while($row = $result->fetch_row())
                    { //when started (and every after 100 command cycle):
                        if ($st_counter%100 == 0 || $st_counter == 0 )
                        {
                                $content .= "\nINSERT INTO ".$table." VALUES";
                        }
                        $content .= "\n(";
                        for($j=0; $j<$fields_amount; $j++)
                        {
                            $row[$j] = str_replace("\n","\\n", addslashes($row[$j]) );
                            if (isset($row[$j]))
                            {
                                $content .= '"'.$row[$j].'"' ;
                            }
                            else
                            {
                                $content .= '""';
                            }
                            if ($j<($fields_amount-1))
                            {
                                    $content.= ',';
                            }
                        }
                        $content .=")";
                        //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
                        if ( (($st_counter+1)%100==0 && $st_counter!=0) || $st_counter+1==$rows_num)
                        {
                            $content .= ";";
                        }
                        else
                        {
                            $content .= ",";
                        }
                        $st_counter=$st_counter+1;
                    }
                } $content .="\n\n\n";
            }
            //$backup_name = $backup_name ? $backup_name : $name."__(".date('H-i-s')."".date('d-m-Y').")__rand".rand(1,11111111).".sql";
            date_default_timezone_set('Asia/Manila');
            $todays_date = date("y-m-d");
            $today = strtotime($todays_date);
            $date = date("Y-m-d", $today);
            $backup_name = $backup_name.".$date.sql";
            header('Content-Type: application/octet-stream');
            header("Content-Transfer-Encoding: Binary");
            header("Content-disposition: attachment; filename=\"".$backup_name."\"");
            $_SESSION['backup_date'] = $date;
            $_SESSION['backup_name'] = $backup_name;
            echo $content; exit;
        }

        Export_Database($mysqlHostName,$mysqlUserName,$mysqlPassword,$DbName,  $tables=false, $db_name );
  }

   ?>


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



                                 <div class="span6" style="margin-left: 20%;">
                      <div class="content" >
  <div class="module" style="height: 520px;">
                            <div class="module-head">
                               <h3>Backup</h3>
                            </div>
                            <div class="module-body">


            <?php

  require_once("include/dbconn.php");



    ?>
      <form class="" action="backup.php" method="POST" style="margin-top: 20%;">
      <h1 style="font-size: 1.5vw; font-family: monospace;">File Name: <input type="text" name="db_name" value="" style="height: 1vw;"> <button style="margin-bottom: 3%; height: 1.8vw; color: white; font-size: 0.6vw; background-color: #717171;" type="submit" name="backup_database">Backup</button> </h1>
        </form>






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
