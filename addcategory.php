<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 20/01/2019
 * Time: 9:36 AM
 */
  session_start();
  include ("dbconnect.php");
  // check to see if user is logged in. if not, redirect to admin page
  if (!isset($_SESSION['admin'])){
    header("Location:index.php?page=admin");
  }

  // set session to blank if user just entered this page from the admin panel
  if (!isset($_SESSION['addcategory']['name'])){
    $_SESSION['addcategory']['name'] = "";
  }
?>
<h1 class="text-danger">Add New Category</h1><br/>
<form class="login-form" action="index.php?page=confirmcategory" method="post" name="login">
  <div class="form-group">
    <label for="exampleInputEmail1" class="text-danger">Name</label>
    <input class="form-control" type="text" name="name" value="<?php echo $_SESSION['addcategory']['name'] ?>" size="40" maxlength="50" required/>
  </div>
  <div class="form-check">
    <input class="btn btn-login float-right btn-success" type="submit" name="submit" value="Add category">
  </div>
</form>
<p class="float-right pr-1"><a class="btn btn-danger" href="index.php?page=admin">Back to admin panel</a></p>
