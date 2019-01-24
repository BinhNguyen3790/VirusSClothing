<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 21/01/2019
 * Time: 4:53 PM
 */

  session_start();

  if(!isset($_SESSION['admin'])){
    header("Location:index.php");
  }

  //Add new stock item to the database
  $enter_sql = "INSERT INTO stock (name, categoryID, price, thumbnail, bigphoto, topline, description) VALUES (
    '".mysqli_real_escape_string($dbc, $_SESSION['addstock']['name'])."', 
    '".mysqli_real_escape_string($dbc, $_SESSION['addstock']['categoryID'])."',
    '".mysqli_real_escape_string($dbc, $_SESSION['addstock']['price'])."',
    '".mysqli_real_escape_string($dbc, $_SESSION['addstock']['thumbnail'])."',
    '".mysqli_real_escape_string($dbc, $_SESSION['addstock']['bigphoto'])."',
    '".mysqli_real_escape_string($dbc, $_SESSION['addstock']['topline'])."',
    '".mysqli_real_escape_string($dbc, $_SESSION['addstock']['description'])."'
    )";
  $enter_qr = mysqli_query($dbc, $enter_sql);

  //Unset the addstock session
  unset($_SESSION['addstock']);

?>

<h1 class="text-danger">Add Stock Item</h1><br/>
<h3 class="text-danger">New stock has been entered</h3><br/>
<p><a class="btn btn-success" href="index.php?page=admin">Return to admin panel</a></p>
