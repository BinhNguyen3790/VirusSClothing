<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 22/01/2019
 * Time: 2:13 PM
 */

  session_start();
  include ("dbconnect.php");

  if (!isset($_SESSION['admin'])){
    header("Location:index.php");
  }

  $st_sql = "UPDATE stock SET 
    name='".$_SESSION['editstock']['name']."',
    categoryID='".$_SESSION['editstock']['categoryID']."',
    price='".$_SESSION['editstock']['price']."',
    thumbnail='".$_SESSION['editstock']['thumbnail']."',
    bigphoto='".$_SESSION['editstock']['thumbnail']."',
    topline='".$_SESSION['editstock']['topline']."',
    description='".$_SESSION['editstock']['description']."'
    WHERE stockID=".$_SESSION['editstock']['stockID'];
  $st_qry = mysqli_query($dbc, $st_sql);
  unset($_SESSION['editstock']);
?>

<h1 class="text-danger">Edit Stock</h1><br/>
<h3 class="text-danger">stock item successfully updated</h3><br/>
<p><a class="btn btn-success" href="index.php?page=admin">Return to admin panel</a></p>