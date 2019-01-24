<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 21/01/2019
 * Time: 10:15 AM
 */

  session_start();
  include ("dbconnect.php");

  // check to see if user is logged in. if not, redirect to admin page
  if (!isset($_SESSION['admin'])){
    header("Location:index.php");
  }

  $_SESSION['editcategory']['name'] = $_POST['name']

?>

<h1 class="text-danger" xmlns="http://www.w3.org/1999/html">Confirm Edit Category</h1><br/>
<h3><span class="text-danger">Update category name:</span> <?php echo $_SESSION['editcategory']['name']; ?></h3><br/>
<p><a class="btn btn-danger" href="index.php?page=editcategory">Oops, go back</a> <a class="btn btn-success" href="index.php?page=editcategoryupdate">Correct, continue</a> </p>
