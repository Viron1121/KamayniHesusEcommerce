<?php
session_start();
if (isset($_SESSION['number'])) {
  $number = $_SESSION['number'];
}


if (isset($_GET['prods'])) {
$productss = $_GET['prods'];
}
 ?>
