

<?php

 include_once("dashboardprocess.php"); ?>


<?php
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
        echo "";
    }
}
?>

<?php

include_once("db-configuration.php");


$result = $mysqli->query("SELECT * FROM users where number = '$number'") or die($mysqli->error);

$row = $result-> fetch_assoc();

$fullnamee = $row['fullname'];

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/productss.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>


    <title></title>
  </head>
  <body class="body">
    <div class="upper1">
      <div class="logo">
        <img src="pictures/logo.png" alt="">
      </div>
      <h1> <span>K</span>amay Ni Hesus</h1>

    </div>
    <div class="top">

      <ul>
        <li><a href="logedindashboard.php" >HOME</a></li>
        <li><a href="logedinproducts.php">PRODUCTS</a></li>

        <li><a href="logedindashboard.php#about_us">ABOUT US</a></li>


        <div class="dropdown">
          <button class="dropbtn"> <li style="float: right;"><a href="#"><?php echo $row['fullname']; ?></a></li> </button>
          <div class="dropdown-content">
            <a href="myorders.php">My orders</a>
            <a href="logout.php">Logout</a>

          </div>
        </div>
      </ul>
</div>
      <div class="top-pa">

        <form class="" action="logedinproducts.php" method="post">
        <div class="searchbar">
          <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search...">

        </div>
        </form>
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
         <form class="" action="logedinproducts.php" method="post,get">
         <div class="product_list">

         <table class="table-allproduct" id="myTable">
           <?php
             while($row = $result-> fetch_assoc()):?>
           <tr>
             <td style=""> <a href="logedincarvehesus.php?prods=<?php echo $row['id'];?>"> <img src="products/<?php echo $row['img']; ?>" alt="" > </a>  </td>
             <td >  <?php echo $row['product']; ?> <br> <p><?php echo $row['description'];?></p> </td>
             <td> <?php echo $row['price']; ?> </td>


             <td style="font-family: monospace;"><a style="text-decoration: none;" href="logedinproducts.php?cart=<?php echo $row['id'];?>">
                  <img src="pictures/buys.png" alt="" style="width: 80px; height: auto;"> </a>  </td>

                  <div class="buynow">
                    <td style="font-family: monospace;"><a style="text-decoration: none;" href="logedincarvehesus.php?prods=<?php echo $row['id'];?>">
                         <h4>Buy now</h4> </a>  </td>
                  </div>

             <?php endwhile; ?>
             </form>
           </tr>
         </table>
         </div>
      </div>
    </div>




<br>
<br>
<br>

<?php
include_once("db-configuration.php");

if (isset($_GET['cart'])) {
  $cart = $_GET['cart'];
  $result = $mysqli->query("SELECT * FROM products where id = '$cart'") or die($mysqli->error);
  $row = $result-> fetch_assoc();

  $product =  $row['product'];
  $price =  $row['price'];

  $results   = mysqli_query($mysqli, "INSERT INTO cart(product,price,fullname) VALUES('$product','$price','$fullnamee')");

  echo'
  <script>
      alert("The item has been added to your cart");
    window.location.href = "logedinproducts.php";
  </script>';
} ?>




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

  <script
   src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
  </script>

  <script>
      $(document).ready( function () {
      $('#example1').DataTable( {

          "bLengthChange": false,
          "pageLength": 4
      } );
  } );
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



  </footer>
</html>
