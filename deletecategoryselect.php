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

?>
<h1 class="text-danger ">Delete Category</h1><br/>
<?php
  $delcat_sql = "SELECT * FROM category";
  $delcat_query = mysqli_query($dbc, $delcat_sql);
  $delcat_rs = mysqli_fetch_assoc($delcat_query);
  do{?>
    <ul class="nav justify-content-center">
      <li class="nav-item"
        <p><a class="nav-link" href="index.php?page=deletecategoryconfirm&categoryID=<?php echo $delcat_rs['categoryID']?>"><?php echo $delcat_rs['name']; ?></a></p>
      </li>
    </ul><br/>
  <?php }while($delcat_rs = mysqli_fetch_assoc($delcat_query));
?>
<p class="float-right"><a class="btn btn-danger" href="index.php?page=admin">Back to admin panel</a></p><br/>


