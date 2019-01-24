<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 21/01/2019
 * Time: 10:21 AM
 */

  session_start();
  include ("dbconnect.php");

  // check to see if user is logged in. if not, redirect to admin page
  if (!isset($_SESSION['admin'])){
    header("Location:index.php");
  }

  $editcat_sql = "UPDATE category SET name='".$_SESSION['editcategory']['name']."' WHERE categoryID=".$_SESSION['editcategory']['categoryID'];
  $editcat_query = mysqli_query($dbc, $editcat_sql);

  unset($_SESSION['editcategory'])

?>

<h1 class="text-danger">Edit Category</h1><br/>
<h3 class="text-danger">Category successfully update</h3><br/>
<p><a class="btn btn-success" href="index.php?page=admin">Return to admin panel</a></p>
