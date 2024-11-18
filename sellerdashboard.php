<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/sellerdashboards.css">
    <title></title>
  </head>
  <body>
    <section>

      <div class="tabs">
        <div class="top">
          <div class="pic">
            <h1>Welcome</h1>
            <img src="logo.jpg" alt="">
            <p>Seller Name Dito</p>
          </div>
        </div>
        <ul >
          <li class="tablinks"onclick="opentabs(event, 'option1')" id="defaultOpen"><a href="#" >Dashboard</a></li>
          <li class="tablinks"onclick="opentabs(event, 'option2')"><a href="#" >Customers</a></li>
          <li class="tablinks"onclick="opentabs(event, 'option3')"><a href="#" >Orders</a></li>
          <li class="tablinks"onclick="opentabs(event, 'option4')"><a href="#" >Inventory</a></li>
          <li class="tablinks"onclick="opentabs(event, 'option5')"><a href="#" >Sign out</a></li>

        </ul>
      </div>
    </section>
    <section>
      <div id="option1" class="display">
        <div class="option1">
          <div class="taas">
            Dashboard
            <input id="searchbar" type="text" name="" value="" placeholder="Search here...">
          </div>
          <div class="boxes">
            <button type="button" name="button" onclick="opentabs(event, 'option2')">
              <div class="boxes-text-top">69 <img src="customers.png" alt="img">
              </div>
              <div class="boxes-text-bot">Customers</div>
            </button>

            <button type="button" name="button" onclick="opentabs(event, 'option3')">
              <div class="boxes-text-top">420 <img src="orders.png" alt="img">
              </div>
              <div class="boxes-text-bot">Orders</div>
            </button>

            <button type="button" name="button" onclick="opentabs(event, 'option4')">
              <div class="boxes-text-top">777 <img src="inventory.png" alt="img">
              </div>
              <div class="boxes-text-bot">Inventory</div>
            </button>

            <button type="button" name="button" onclick="opentabs(event, 'option5')">
              <div class="boxes-text-top">143 <img src="settings.png" alt="img">
              </div>
              <div class="boxes-text-bot">Others</div>
            </button>
          </div>
        </div>
      </div>


      <div id="option2" class="display">
        <div class="option2">
          <div class="taas">
            Customers
            <input id="searchbar" type="text" name="" value="" placeholder="Search here...">
          </div>
        </div>
      </div>
      <?php

        include("db-configuration.php");

        $result = $mysqli->query("SELECT * FROM recuerdos") or die($mysqli->error);
        #pre_r($result->fetch_assoc());


        /*function pre_r( $array){
          echo '<pre';
          print_r($array);
          echo '</pre>';
        }*/
      ?>

      <div id="option3" class="display">
        <div class="option3">
          <div class="taas">
            Orders
            <input id="searchbar" type="text" name="" value="" placeholder="Search here...">
          </div>
          <div class="orders-body">
            <table align="center">
              <tr>
                <th>PRODUCT</th>
                <th>QUANTITY</th>
                <th>ADDRESS</th>
                <th>BUYER</th>
                <th>PRICE</th>
              </tr>
              <?php
                while($row = $result-> fetch_assoc()):?>
              <tr>
                <td><?php echo $row['product']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['fullname']; ?></td>
                <td><?php echo $row['price']; ?></td>

              </tr>
            <?php endwhile; ?>


            </table>
          </div>
        </div>
      </div>


      <div id="option4" class="display">
        <div class="option4">
          <div class="taas">
            Inventory
            <input id="searchbar" type="text" name="" value="" placeholder="Search here...">
          </div>
        </div>
      </div>
      <div id="option5" class="display">
        Sign out
      </div>
    </section>




    <script>
function opentabs(evt, cityName) {
  var i, display, tablinks;
  display = document.getElementsByClassName("display");
  for (i = 0; i < display.length; i++) {
    display[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>



<script>
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
  </body>
</html>
