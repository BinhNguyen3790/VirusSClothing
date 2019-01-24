<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 19/01/2019
 * Time: 7:53 PM
 */?>
<section class="login-block">
  <div class="row">
    <div class="col-md-12 login-sec">
      <h2 class="text-center">Login Now</h2>
      <?php if (isset($_POST['login']) && !isset($_SESSION['admin'])){ ?>
        <h3 class="nav justify-content-center text-light p-2 bg-danger">Incorrect username or password</h3><br/>
      <?php } ?>
      <form class="login-form" action="index.php?page=admin" name="login" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1" class="text-uppercase text-danger">Username</label>
          <input type="text" class="form-control" name="username">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1" class="text-uppercase text-danger">Password</label>
          <input type="password" class="form-control" name="password">
        </div>
        <div class="form-check">
          <button type="submit" class="btn btn-login float-right" name="login">Submit</button>
        </div>
      </form>
      <div class="copy-text">Created with <i class="fa fa-heart"></i> by <a href="http://grafreez.com">VirusS</a></div>
    </div>
  </div>
</section>