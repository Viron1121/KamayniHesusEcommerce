<?php include_once("dashboardprocess.php"); ?>
<?php
// Create database connection using config file
include_once("db-configuration.php");

// If form submitted, collect email and password from form
if (isset($_GET['buy'])) {

    $number    = $_GET['number'];
    $password = $_GET['password'];


    $correctpassword_query = mysqli_query($mysqli, "select password from users where number='$number'");
    while ($row = $correctpassword_query->fetch_assoc()) {
      $correctpassword = $row['password'];
    }



    // Check If user matched/exist, store user email in session and redirect to sample page-1
    if (password_verify($password,$correctpassword)) {

        $_SESSION["number"] = $number;


      echo "Log in successfully";
      header("Location:logedinproducts.php?signup=success");

    } else {
      echo'
      <script>
          alert("Username or password is not correct");
          window.location.href = "products.php?";
      </script>';
    }
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



<form action="carvehesus.php" method="post,get" name="form1">
    <div class="top">
      <div class="upper1">
        <h1> <span>K</span>amay Ni Hesus</h1>
        <div><button type="button" name="button"><a type="button" name="" data-bs-toggle="modal" data-bs-target="#carvehesus" > LOGIN</a></button></div>
      </div>
      <ul>
        <li><a href="index.php" >HOME</a></li>
        <li><a href="products.php">PRODUCTS</a></li>
        <li><a href="index.php#about_us">ABOUT US</a></li>
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
              <input type="hidden" name="carveface" value="">
          </div>
          <div class="productdetails">
            <p><?php echo $row['product'];?></p>
            <br><br>
            <hr color="orange">
            <div class="price" >
              <p><?php echo $row['price'];?><br>
              <input type="hidden" name="price" value="<?php echo $row['price'];?>"><br>
              <label for="cod"> Mode of Payment</label><br>
              <input type="radio" name="" value="Cash on Delivery" checked="true"> Cash on Delivery</p>
              <label for="quantity"> Quantity</label><br>
              <input type="number"  name="quantity" min="1" max="1000" placeholder="1" style="height: 3vh;
              width: 4vh;">
            </div>
            <button type="button" name="" value="" data-bs-toggle="modal" data-bs-target="#carvehesus" >Buy</button>

          </div>


        <div class="modal" id="carvehesus">
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

          </td>

        </tr>
      </table>

      <div class="mid-details">
        <h5><?php echo $row['description'];?></h5>
      </div>


      </div>


    </div>
    </div>



    <div class="feedback">
      <textarea name="name" rows="5" cols="80"></textarea>
      <button type="button" name="" data-bs-toggle="modal" data-bs-target="#carvehesus" >Submit</button>
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
    <hr style="height: 3px; ">

    <br>
    <div class="footer3">
      <img src="pictures/copyright.png" alt="img"><p>Copyright PuTech<br> 2022</p>
    </div>

  </div>

  </footer>

</html>
