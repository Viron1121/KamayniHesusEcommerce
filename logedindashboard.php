
<?php
include_once("loginprocess.php");
include_once("db-configuration.php");


$result = $mysqli->query("SELECT * FROM users where number = '$number'") or die($mysqli->error);

$row = $result-> fetch_assoc();



?>





<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/indexx.css?v=<?php echo time(); ?>">
    <link rel="icon" href="church.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">



    <title></title>
  </head>
  <body class="body">
  <section id="hero">
      <div class="hero container">
        <div>
          <h1>WELCOME TO<span></span></h1>
          <h1> Kamay ni Hesus <span></span></h1>
          <h1>Website <span></span></h1>
          <a href="#top" type="button" class="cta">Explore More</a>
        </div>
      </div>
    </section>
    <section id="top">
    <div class="top">
      <div class="upper1">
        <div class="top_uli">
          <img src="pictures/logo.png" alt="img">
        </div>
        <h1> <span>K</span>amay Ni Hesus</h1>
      </div>
      <ul>
        <li><a href="logedindashboard.php">HOME</a></li>
        <li><a href="logedinproducts.php">PRODUCTS</a></li>
        <li><a href="#about_us">ABOUT US</a></li>



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
      <div class="choices">
        <ul>
          <li><a href="#facility">Facilities</a></li>
          <li><a href="#souvenir">Souvenir</a></li>
          <li><a href="#schedule">Schedule</a></li>
        </ul>
      </div>
      <div class="midpa">
      <?php

include_once("db-configuration.php");
$result = $mysqli->query("SELECT * FROM products") or die($mysqli->error);
$i = 0;

 ?>


<div class="bot" id="souvenir">
<?php while($i <= 5 && $row = $result-> fetch_assoc()):?>
<div class="images">
<a href="logedincarvehesus.php?prods=<?php echo $row['id'];?>">  <img src="products/<?php echo $row['img']; ?>" alt="img" style="width:100%;">
<div class="image-text"><?php echo $row['product']; ?> <p><?php echo $row['price']; ?></p> </div> </a>
<p style="font-size: 0.8vw; color: #000">Whatever description shpuld be written here please this is not a drill hehe</p>

</div>
<?php $i++; ?>
 <?php

endwhile; ?>


      </div>


    </div>




    </div>
    </section>
    <section id="facility" >
      <div class="upper">
        <h1  data-bs-toggle="modal" data-bs-target="#facilities">FACIL<span>I</span>TIES</h1>
        <div class="modal" id="facilities">
          <div class="modal-dialog" >
          <div class="modal-content">
            <div class="modal-header">
              <h3>KAMAY NI HESUS</h3>
              <button type="button" name="button" class="btn btn-default" data-bs-dismiss="modal"> <img src="pictures/close.png" alt="img"> </button>
            </div>
            <div class="modal-body">
              <p>Kamay ni Hesus is a popular tourist destination in Quezon.
                The church is claimed to be a healing church,
                which means devotees believe that healing prayers come true here in Kamay ni Hesus.</p>
            </div>

          </div>

        </div>
      </div>
    </div>

      <div class="lower">
        <a data-bs-toggle="modal" data-bs-target="#facility1">
        <div class="lower-items" >
          <div class=""> <img src="pictures/noahs.jpg" alt=""> </div>
          <h5>Noah's Ark & Sea of Galilee</h5>
          <p style="font-size: 0.8vw; color: #000">Whatever description shpuld be written here please this is not a drill hehe</p>

        </div>
      </a>
      <div class="modal" id="facility1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <div class="upper_facility">
                <h1>Noah's Ark & Sea of Galilee</h1>
                <button type="button" name="button" data-bs-dismiss="modal"></button>
              </div>
              <div class="lower_facility">
                <img src="pictures/noahs.jpg" alt="">
                <p>Noah's Ark is an ark motivated by a biblical prophet
                  Noah and his hand-made ark. This facility is
                  amous because most of the catholics know the story
                  of Noah. Beside the ark, you can see the Sea of Galilee
                  where you can find a tons of different kind of fish.
                  You can feed them for only 25 php. The Sea of Galilee
                  intentionally put beside the ark as if the ark is going
                  to that sea.</p>
              </div>
            </div>
          </div>
        </div>
      </div>


      <a data-bs-toggle="modal" data-bs-target="#facility2">
      <div class="lower-items" >
        <div class=""> <img src="pictures/gardenofeden.jpg" alt=""> </div>
        <h5>Garden of Eden</h5>
        <p style="font-size: 0.8vw; color: #000">Whatever description shpuld be written here please this is not a drill hehe</p>

      </div>
    </a>
    <div class="modal" id="facility2">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <div class="upper_facility">
              <h1>Garden of Eden</h1>
              <button type="button" name="button" data-bs-dismiss="modal"></button>
            </div>
            <div class="lower_facility">
              <img src="pictures/gardenofeden.jpg" alt="">
              <p>This garden is popular to people who loves photoshoot
                and capture images. Inside the garden, you can find a
                different kind of animal statue (e.g. giraffe, elephant,
                hippoputamus, etc.) You can also play in this garden since
                 it's an open area. There are also playground there for
                 children. This is the best place inside Kamay ni Hesus
                 where you can feel the fresh air and think about life.</p>
            </div>
          </div>
        </div>
      </div>
    </div>


    <a data-bs-toggle="modal" data-bs-target="#facility3">
    <div class="lower-items" >
      <div class=""> <img src="pictures/church.jpg" alt=""> </div>
      <h5>Main Church</h5>
      <p style="font-size: 0.8vw; color: #000">Whatever description shpuld be written here please this is not a drill hehe</p>

    </div>
  </a>
  <div class="modal" id="facility3">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <div class="upper_facility">
            <h1>Main Church</h1>
            <button type="button" name="button" data-bs-dismiss="modal"></button>
          </div>
          <div class="lower_facility">
            <img src="pictures/church.jpg" alt="">
            <p>The main church in Kamay ni Hesus where the priest make mass.
              The church have an extension beside it because there are many
              devotees coming so the chairs inside is not enough. You can have
               our mass schedules in this page.</p>
          </div>
        </div>
      </div>
    </div>
  </div>


  <a data-bs-toggle="modal" data-bs-target="#facility4">
  <div class="lower-items" >
    <div class=""> <img src="pictures/blesschapel.jpg" alt=""> </div>
    <h5>Blessed Sacrament Chapel</h5>
    <p style="font-size: 0.8vw; color: #000">Whatever description shpuld be written here please this is not a drill hehe</p>

  </div>
</a>
<div class="modal" id="facility4">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="upper_facility">
          <h1>Blessed Sacrament Chapel</h1>
          <button type="button" name="button" data-bs-dismiss="modal"></button>
        </div>
        <div class="lower_facility">
          <img src="pictures/blesschapel.jpg" alt="">
          <p>In this facility, you can buy a normal candle or scented candle.
             You can lit it up and have a prayer while the candle is on fire.
              Many devotee believes that whatever wish you made, as long as
              the candle still on fire, your wish will come true. Since many
              devotee pray here, this area is probihited on noises.</p>
        </div>
      </div>
    </div>
  </div>
</div>



<a data-bs-toggle="modal" data-bs-target="#facility5">
<div class="lower-items" >
  <div class=""> <img src="pictures/healingchurch.jpg" alt=""> </div>
  <h5>Healing Church</h5>
  <p style="font-size: 0.8vw; color: #000">Whatever description shpuld be written here please this is not a drill hehe</p>

</div>
</a>
<div class="modal" id="facility5">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-body">
      <div class="upper_facility">
        <h1>Healing Church</h1>
        <button type="button" name="button" data-bs-dismiss="modal"></button>
      </div>
      <div class="lower_facility">
        <img src="pictures/healingchurch.jpg" alt="">
        <p>This healing church is an on-going developing church
          where people with illness, problems and disabilities
           can attend. You can find a rosary designed if you are
            in the highest shrine. The good thing about this facility
             is that the only money used for this facility is came from
              donations from devotees. This facility is still on developing.</p>
      </div>
    </div>
  </div>
</div>
</div>


<a data-bs-toggle="modal" data-bs-target="#facility6">
<div class="lower-items" >
  <div class=""> <img src="pictures/stairway.jpg" alt=""> </div>
  <h5>300 Steps Stairway</h5>
  <p style="font-size: 0.8vw; color: #000">Whatever description shpuld be written here please this is not a drill hehe</p>

</div>
</a>
<div class="modal" id="facility6">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-body">
      <div class="upper_facility">
        <h1>300 Steps Stairway</h1>
        <button type="button" name="button" data-bs-dismiss="modal"></button>
      </div>
      <div class="lower_facility">
        <img src="pictures/stairway.jpg" alt="">
        <p>This is the most famous facility inside Kamay ni Hesus.
          You can go up there in the shrine. This may be a long journey
           but you can see the life of Jesus Christ as you go through.
           There are resting station in every stop specially made for
           people who have a weak heart. The moment you are on the top,
            you can see the whole municipality of Lucban.</p>
      </div>
    </div>
  </div>
</div>
</div>

      </div>

    </section>





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
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
              <section id="about_us" class="about">
                <div class="one">
                  <h1>About Us</h1>
                  <p>madaming hello world madaming hello world madaming hello world madaming hello world madaming hello world </p>
                </div>
                <div class="two">
                  <h1>Kamay ni Hesus Healing Church</h1>
                  <p> A sacred grounds  and piligrimage site for everyone who wants to to repent,
                   give thanks and pray for healing. Kamay ni Hesus Healing Church is a
                  5-hectare shrine constructed on February 2002 and located at Brgy. Tinamnan, Lucban, Quezon that includes Via Dolorosa Grotto, Healing Church,
                   Noah’s Ark, Sea of Galilie, Holy Family Park, and the Pastoral Center founded by the Healing Priest, Fr. Joey Faller.</p>
                </div>
                <div class="three">
              <a href="#" data-bs-toggle="modal" data-bs-target="#location">   <div class="three-pic"><img src="pictures/Hesus.jpg" alt="">  </div></a>

                  <div class="modal" id="location" >
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content" style="background-color: #D7CDBA;">
                        <div class="modal-header">
                          <button style="float: right; background-color: orange;" type="button" name="button" data-bs-dismiss="modal">Close</button>
                        </div>
                        <div class="modal-body" style="width: ;">
                            <iframe style="height: 40vw; width: 50vw; margin-left: 5%;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3869.591246841839!2d121.57067881536209!3d14.10129019289643!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd539acad2aa6d%3A0xda6e5069650f0133!2sKamay%20Ni%20Hesus%20Healing%20Church!5e0!3m2!1sen!2sph!4v1657847372150!5m2!1sen!2sph" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="three-text">
                  <h4>Location: Brgy. Tinamnan, Lucban Quezon Philippines 4328</h4>
                  <br><br>
                  <h6>Office Hours: Monday – Sunday, 08:00 AM– 05:00 PM</h6>
                  <br>
                  <h6>Cellphone No.: +63-917-541-5364</h6>
                  <br>
                  <h6>Landline: +63-42-540-2206</h6>
                  <br>
              <a href="mailto:info@kamaynihesus.ph" style="text-decoration: none;">   <h6>E-mail:  info@kamaynihesus.ph</h6> </a>

                  </div>
                </div>
              </section>
  </body>

  <footer id="footer">
    <div class="footer">
      <div class="footer1">
      <h4>Kamay ni Hesus</h4>
      <p>A sacred grounds and piligrimage site for everyone who wants to to repent,
        give thanks and pray for healing. Kamay ni Hesus Healing Church is a 5-hectare
        shrine constructed on February 2002 and located at Brgy. Tinamnan, Lucban,
        Quezon that includes Via Dolorosa Grotto, Healing Church, Noah’s Ark, Sea of
        Galilie, Holy Family Park, and the Pastoral Center founded by the Healing Priest,
        Fr. Joey Faller.</p>
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
    <div class="footer4">

    </div>
  </div>

  </footer>
</html>
