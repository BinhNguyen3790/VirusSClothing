<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 20/01/2019
 * Time: 10:13 AM
 */

    session_start();
    // check to see if user is logged in. if not, redirect to admin page
    if (!isset($_SESSION['admin'])){
        header("Location: index.php?page=admin");
    }

    // check to see if user has submitted the add category form
    if (!isset($_POST['submit'])){
        header("Location:index.php?page=admin");
    }

    //set addcategory session
    $_SESSION['addcategory']['name'] = $_POST['name'];

?>

<h1 class="text-danger">Confirm Category Name</h1><br/>
<h3><span class="text-danger">Your Category Name: </span><?php echo $_POST['name']; ?></h3><br/>
<p><a class="btn btn-danger" href="index.php?page=addcategory">Oops, go back</a> <a class="btn btn-success" href="index.php?page=entercategory">Correct, continue</a></p>

