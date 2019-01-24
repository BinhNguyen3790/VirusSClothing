<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 21/01/2019
 * Time: 9:50 AM
 */

  session_start();
  include ("dbconnect.php");

  // check to see if user is logged in. if not, redirect to admin page
  if (!isset($_SESSION['admin'])){
    header("Location:index.php");
  }
  if (isset($_GET['categoryID'])) {
    $_SESSION['editcategory']['categoryID'] = $_GET['categoryID'];
  }

  if (!isset($_SESSION['editcategory']['name'])) {
    $editcat_sql = "SELECT * FROM category WHERE categoryID=".$_GET['categoryID'];
    $editcat_query = mysqli_query($dbc, $editcat_sql);
    $editcat_rs = mysqli_fetch_assoc($editcat_query);
    $_SESSION['editcategory']['name'] = $editcat_rs['name'];
  }

?>

<h1 class="text-danger">Edit Category</h1><br/>
<form class="login-form" action="index.php?page=editcategoryconfirm" method="post" name="login">
  <div class="form-group">
    <label for="exampleInputEmail1" class="text-danger">Name</label>
    <input class="form-control" type="text" name="name" value="<?php echo $_SESSION['editcategory']['name']; ?>" size="40" maxlength="50" required/>
  </div>
  <div class="form-check">
    <input class="btn btn-login float-right btn-success" type="submit" name="update" value="Update">
  </div>
</form>
<p class="float-right pr-1"><a class="btn btn-danger" href="index.php?page=editcategoryselect">Oops, go back</a></p>
