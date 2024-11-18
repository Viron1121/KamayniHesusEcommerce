<?php include_once("dashboardprocess.php"); ?>

<?php

include_once("db-configuration.php");


$result = $mysqli->query("SELECT * FROM users where number = '$number'") or die($mysqli->error);

$row = $result-> fetch_assoc();

$fullnamee =   $row['fullname'];

?>
<?php
include_once("db-configuration.php");
if (isset($_GET['submit'])) {
$products = $_GET['submit'];
$usercomment     = $_GET['usercomment'];
$review   = mysqli_query($mysqli, "INSERT INTO reviews(fullname,usercomment,productname) VALUES('$fullnamee','$usercomment','$products')");

header("Location:logedinproducts.php?success");
}

 ?>

<?php
// Create database connection using config file
include_once("db-configuration.php");

// If form submitted, collect email and password from form
if (isset($_GET['buy'])) {
    include_once("db-configuration.php");
    $result = $mysqli->query("SELECT * FROM users where fullname = '$fullnamee'") or die($mysqli->error);
    $row = $result-> fetch_assoc();


        $carveface     = $_GET['carveface'];
        $price     = $_GET['price'];
        $quantity     = $_GET['quantity'];
        $number =  $row['number'];
        $fullname =  $row['fullname'];
        $address =  $row['address'];
        $number =  $row['number'];
        $payment     = $_GET['payment'];
        $id =  uniqid();


        $resultcarve   = mysqli_query($mysqli, "INSERT INTO recuerdos(product,price,quantity,number,address,fullname,payment,unique_id) VALUES('$carveface','$price','$quantity','$number','$address','$fullname','$payment','$id')");

              echo'
              <script>
                  alert("The item added on your pending orders");
                window.location.href = "logedinproducts.php";
              </script>';




    }


?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/carvehesus.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  </head>



  <?php include_once("db-configuration.php"); ?>
  <body class="body">

    <?php require_once 'process.php'; ?>

<form action="logedincarvehesus.php" method="post,get" name="form1">
    <div class="top">
      <div class="upper1">
        <h1> <span>K</span>amay Ni Hesus</h1>
      </div>
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
    <div class="mid">
      <table align="center">
        <tr>

          <?php
          include_once("dashboardprocess.php");
          $result = $mysqli->query("SELECT * FROM products where id = '$productss'") or die($mysqli->error);
          $row = $result-> fetch_assoc();
          $product = $row['product'];


           ?>
          <td>

            <div class="productimages">
            <img src="products/<?php echo $row['img']; ?>" alt=""  >
            <input type="hidden" name="carveface" value="<?php echo $row['product']; ?>">

          </div>
          <div class="productdetails">

            <p> <?php echo $row['product'];?></p>
            <br><br>
            <hr color="orange">
            <div class="price" >
            <p> <?php echo $row['price'];?><br>
              <input type="hidden" name="price" value="<?php echo $row['price'];?>"> <br>
              <label for="cod"> Mode of Payment</label><br>
              <input type="radio" name="payment" value="1" checked="true"> Cash on Delivery
              </p>
              <label for="quantity"> Quantity</label><br>
              <input type="number" name="quantity" min="1" max="1000" placeholder="1" style="height: 3vh;
              width: 4vh;">
            </div>
            <button type="submit" name="buy" value="">Buy</button>

                  </div>
                </td>

        </tr>
      </table>
    <div class="mid-details">
      <h5><?php echo $row['description'];?></h5>
    </div>
    </div>



    <div class="feedback">
      <textarea name="usercomment" rows="5" cols="80" placeholder="Insert Comment Here..."></textarea>
      <button type="submit" name="submit" value="<?php echo $row['product']; ?>">Submit</button>


    <?php
    $result = $mysqli->query("SELECT * FROM reviews where productname = '$product' ") or die($mysqli->error);
    ?>
        <table>

          <?php while($row = $result-> fetch_assoc()):?>
          <tr>
            <td><h4> <?php echo $row['fullname'];?>:</h4>
            <h5>  <?php echo $row['usercomment'];?></h5> <br><br>
            <p>  <?php echo $row['date'] ;?></p> <br>
              <hr color="orange"> </td>
          </tr>

           <?php endwhile; ?>
        </table>
</div>
    </form>














<script


 src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
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

  </footer>

</html>
