<?php include_once("dashboardprocess.php");



// Create database connection using config file
include_once("db-configuration.php");

// If form submitted, collect email and password from form
if (isset($_GET['login'])) {
    $number    = $_GET['number'];
    $password = $_GET['password'];

    // Check if a user exists with given username & password
    $result = mysqli_query($mysqli, "select 'number', 'password' from users
        where number='$number' and password='$password'");

    // Count the number of user/rows returned by query
    $user_matched = mysqli_num_rows($result);

    // Check If user matched/exist, store user email in session and redirect to sample page-1
    if ($user_matched > 0) {

        $_SESSION["number"] = $number;


      echo "Log in successfully";
      header("Location:logedinproducts.php?signup=success");

    } else {
      $message = "Username or password is not correct";
      echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/productss.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">





    <title></title>
  </head>
  <body class="body">
    <div class="upper1">
      <div class="logo">
        <img src="pictures/logo.png" alt="">
      </div>
      <h1> <span>K</span>amay Ni Hesus</h1>
      <div><button type="button" name="button"><a type="button" name="" data-bs-toggle="modal" data-bs-target="#login" > LOGIN</a></button></div>
    </div>
    <div class="top">
      <ul>
        <li><a href="index.php" >HOME</a></li>
        <li><a href="products.php">PRODUCTS</a></li>

        <li><a href="index.php#about_us">ABOUT US</a></li>



      </ul>
      <form action="products.php" method="post,get" name="form1">
      <div class="modal" id="login">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <div class="modal-upper">
                <button type="button" class="close" data-bs-dismiss="modal">Close</button>
                <img src="pictures/userss.png" alt="User Login">
              </div>
              <div class= "login-box">

                <div class="inputs">


                    <p align="center">E-commerce/Advertising System <br> For The Products Inside Kamay Ni Hesus</p>
                    <input type="text" name="number" value="" placeholder="Username"><br><br>
                    <input type="password" name="password" value="" placeholder="Password"><br><br>
                    <input type="submit" name="login" Value = "Log In" >

                  </form>

                </div>
                <div class="divider">
                  <hr>or<hr>
                </div>
                <div class="reg">

                  <p>Don't have any account? <a href="registration.php">Register</a></p>
                </div>


              </div>

            </div>

            </div>

          </div>

        </div>
    </div>





    <div class="top-pa">

      <div class="searchbar">

        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search...">

      </div>
    </div>







    <div class="mid">
      <div class="allproducts">

        <div class="list">




        </div>

        <?php
        include_once("dashboardprocess.php");
        include_once("db-configuration.php");
        $result = $mysqli->query("SELECT * FROM products") or die($mysqli->error);



         ?>
         <form class="" action="products.php" method="post,get">
        <div class="product_list">
         <table id="myTable" class="table-allproduct">
           <?php
             while($row = $result-> fetch_assoc()):?>
           <tr>

             <td style=""> <a href="carvehesus.php?prods=<?php echo $row['id'];?>"> <img src="products/<?php echo $row['img']; ?>" alt="" > </a></td>
             <td ><?php echo $row['product']; ?> <br> <p><?php echo $row['description'];?></p> </td>
             <td > <?php echo $row['price']; ?> </td>




             <td ><a style="text-decoration: none;" href="carvehesus.php?prods=<?php echo $row['id'];?>">
              <img src="pictures/buys.png" alt="" style="width: 80px; height: auto;"> </a></td>

             </form>



             <?php endwhile; ?>

           </tr>
         </table>
       </div>


      </div>


    </div>

<br>
<br>
<br>


<script>
          var myIndex = 0;
          carousel();

          function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
              x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}
            x[myIndex-1].style.display = "block";
            setTimeout(carousel, 3000); // Change image every 3 seconds
          }
          </script>

          <script>
          function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[1];
          if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
            } else {
              tr[i].style.display = "none";
            }
          }
        }
      }
      </script>



  </body>



  <footer id="footer">
    <div class="footer">
      <div class="footer1">
      <h4>Kamay ni Hesus</h4>
      <p>A paragraph is a series of related sentences developing a central idea, called the topic.
        Try to think about paragraphs in terms of thematic unity: a paragraph is a sentence or a group of
        sentences that supports one central, unified idea. Paragraphs add one idea at a time to your broader argument.</p>
    </div>
    <div class="footer2">
      <h1>KAMAY NI <BR>HESUS</h1>
        <img src="pictures/facebook.png" alt="img">
        <img src="pictures/email.png" alt="img">

    </div>
    <hr style="height: 3px;">

    <br>
    <div class="footer3">
      <img src="pictures/copyright.png" alt="img"><p>Copyright PuTech<br> 2022</p>
    </div>

  </div>
  <script
   src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
  </script>

  </footer>
</html>
