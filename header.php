<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 19/01/2019
 * Time: 10:07 AM
 */

  include ("dbconnect.php");

  $ct_sql = "SELECT * FROM category";
  $ct_qry = mysqli_query($dbc, $ct_sql);
  $ct_rs = mysqli_fetch_assoc($ct_qry);
?>
<style>

  .has-search .form-control {
    padding-left: 2.375rem;
  }

  .has-search .form-control-feedback {
    position: absolute;
    z-index: 2;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 2.375rem;
    text-align: center;
    pointer-events: none;
    color: #aaa;
  }
</style>
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a href="index.php" class="navbar-brand"><img src="images/logo.png" alt="VirusS Clothing logo"/></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a href="index.php" class="nav-link"><i class="fa fa-home"></i> Home</a>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Category
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php
              do{?>
                <a class="dropdown-item" href="index.php?page=category&categoryID=<?php echo $ct_rs['categoryID']?>"><?php echo $ct_rs['name']?></a>
                <div class="dropdown-divider"></div>
              <?php }while($ct_rs = mysqli_fetch_assoc($ct_qry));
            ?>
          </div>
        </li>
        <li class="nav-item">
          <a href="index.php?page=contact" class="nav-link">Contact</a>
        </li>
        <li class="nav-item">
          <a href="index.php?page=about" class="nav-link">About</a>
        </li>
        <li class="nav-item">
          <a href="index.php?page=admin" class="nav-link">Admin</a>
        </li>
      </ul>
      <form class="form-inline">
        <div class="form-group has-search">
          <span class="fa fa-search form-control-feedback"></span>
          <input type="text" id="myInput" class="form-control" placeholder="Search">
        </div>
      </form>
    </div>
  </nav>
</header>

<script>
  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myList .col-sm").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>
