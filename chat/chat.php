<?php
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: ../login.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                        <?php
   $admin = $_SESSION['unique_id'];
              $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '$admin'");
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
                        <img src="php/images/<?php echo $row2['img']; ?>"  class="nav-avatar" />
                            <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                        <li><a href="../profile.php">Your Profile</a></li>

                                <li class="divider"></li>
                                <li><a href="../include/logout.php?logout_id=<?php echo $row2['unique_id']; ?>">Logout</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
                <!-- /.nav-collapse -->

            </div>
        </div>
        <!-- /navbar-inner -->
    </div>



<div class="wrapper" >
        <div class="container">
            <div class="row">
                <div class="span3">
                    <div class="sidebar">
                          <ul class="widget widget-menu unstyled">
                                <?php

if ($user_type == $admin){
    echo ' <li class="active"><a href="../dashboard.php"><i class="menu-icon icon-dashboard"></i>Dashboard</a></li>';
     echo   '<li><a href="../chat/chat.php"><i class="menu-icon icon-envelope"></i>Chat</a></li>';
     echo '<li><a href="../backup.php"><i class="menu-icon icon-circle"></i> Backup </a></li>';
    echo '<li><a href="../account.php"><i class="menu-icon icon-user"></i>Account </a></li>';




}


elseif ($user_type == $seller) {
  echo ' <li class="active"><a href="../dashboard.php"><i class="menu-icon icon-dashboard"></i>Dashboard</a></li>';
 echo '<li><a href="../chat/chat.php"><i class="menu-icon icon-envelope"></i>Chat</a></li>';
 echo '<li><a href="../orders.php"><i class="menu-icon icon-file-alt"></i>Orders</a>';
 echo '<li><a href="canceledorders.php"><i class="menu-icon icon-file-alt"></i>Canceled orders</a></li>';
 echo '<li><a href="../packedorders.php"><i class="menu-icon icon-file-alt"></i>Packed orders</a>';
 echo '<li><a href="../deliveredorders.php"><i class="menu-icon icon-file-alt"></i>Delivered Orders</a>';
 echo '<li><a href="../recuerdosprod.php"><i class="menu-icon icon-file-alt"></i>Products</a></li>';




}





else
{
     echo ' <li><a href="..include/logout.php"><i class="menu-icon icon-signout"></i>Logout</a></li>';
}


                     ?>

                        </ul>
                        <!--/.widget-nav-->

                        <!--/.widget-nav-->

                    </div>
                    <!--/.sidebar-->
                </div>
                <!--/.span3-->
                <div class="span4" >

                      <div class="content" >
                         <section class="users">
                        <div class="module" style="height: 600px;">

                            <div class="module-head">
                                <h3>Chat
                                  </h3>
                            </div>
                            <div class="module-body" >


      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">

      </div>





                            </div>

                        </div>
                        </section>
                             </div>

                        </div>




<?php  if (empty($_GET['user_id'])){?>


                  <div class="span5" >
                      <section class="chat-area">
                      <div class="content" >
                        <div class="module" style="height: 600px;">
                            <div class="module-head" style="height:20px">
                               <header>



        <div class="details" >
          <span ></span>
          <p ></p>
        </div>
      </header>
                               </div>
                            <div class="module-body" >



        </div>
      </div>

                </div>
              </section>
            </div>


                    <!--/.content-->



<?php } else if($_GET['user_id']){ ?>


                    <div class="span5">

                      <div class="content" >
                          <section class="chat-area" >
                        <div class="module" style="height: 600px;">
                            <div class="module-head">
                                  <header>
        <?php
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>

        <img src="php/images/<?php echo $row['img']; ?>" alt="">
        <div class="details">
          <span ><?php echo $row['fname']. " " . $row['lname'] ?></span>
          <p><?php echo $row['status']; ?></p>
        </div>
      </header>
                               </div>
                            <div class="module-body">

   <div class="chat-box">

      </div>
      <form action="#" class="typing-area" style="padding-left: 0;padding-right: 0;">
        <input type="hidden" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>


                  </div>
                </div>
                  </section>
              </div>

             </div>

<?php } ?>




                <!--/.span9-->

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




  <script src="javascript/chat.js"></script>

    <script src="javascript/users.js"></script>

</body>
</html>
