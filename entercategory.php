<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 20/01/2019
 * Time: 9:45 AM
 */

    session_start();
    // check to see if user is logged in. if not, redirect to admin page
    if (!isset($_SESSION['admin'])){
        header("Location: index.php?page=admin");
    }

    // check to see if user has submitted the add category form
    if (!isset($_SESSION['addcategory']['name'])){
        header("Location:index.php?page=admin");
    }

    //enter the new category
    $newcategory_sql = "INSERT INTO category (name) 
      VALUE ('".mysqli_real_escape_string($dbc, $_SESSION['addcategory']['name'])."')";
    $newcategory_query = mysqli_query($dbc, $newcategory_sql);
    unset($_SESSION['addcategory']['name']);

?>
<h1 class="text-danger">Add Category</h1><br/>
<h3 class="text-danger">New category has been entered</h3><br/>
<p><a class="btn btn-success" href="index.php?page=admin">Return to admin panel</a></p>


