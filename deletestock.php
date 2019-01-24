<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 22/01/2019
 * Time: 9:19 AM
 */

  session_start();
  if (!isset($_SESSION['admin'])){
    header("Location:index.php");
  }

  include ("dbconnect.php");

  $del_sql = "DELETE FROM stock WHERE stockID=".$_SESSION['deletestock'];
  $del_qry = mysqli_query($dbc, $del_sql);

  $st_sql = "SELECT stock.thumbnail FROM stock WHERE stock.stockID=".$_GET['stockID'];
  $st_qry = mysqli_query($dbc, $st_sql);
  $st_rs = mysqli_fetch_assoc($st_qry);
//  chmod (DIRECTORY_HERE, 0777);
//  unlink("images/".$st_rs['thumbnail']);

  unset($_SESSION['deletestock']);

?>
<h1 class="text-danger">Stock Item Deleted</h1><br/>
<h3 class="text-danger">Stock item has successfully been delete</h3><br/>
<p><a class="btn btn-success" href="index.php?page=admin">Return to admin panel</a></p>
