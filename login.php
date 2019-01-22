<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 19/01/2019
 * Time: 7:53 PM
 */?>
<style>
  /*.login-block{*/
    /*background: #DE6262;  !* fallback for old browsers *!*/
    /*background: -webkit-linear-gradient(to bottom, #FFB88C, #DE6262);  !* Chrome 10-25, Safari 5.1-6 *!*/
    /*background: linear-gradient(to bottom, #FFB88C, #DE6262); !* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ *!*/
    /*float:left;*/
    /*width:100%;*/
    /*padding : 50px 0;*/
  /*}*/
  .banner-sec{background:url(https://static.pexels.com/photos/33972/pexels-photo.jpg)  no-repeat left bottom; background-size:cover; min-height:500px; border-radius: 0 10px 10px 0; padding:0;}
  .container{background:#fff; border-radius: 10px; box-shadow:15px 20px 0px rgba(0,0,0,0.1);}
  .carousel-inner{border-radius:0 10px 10px 0;}
  .carousel-caption{text-align:left; left:5%;}
  .login-sec{padding: 50px 30px; position:relative;}
  .login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
  .login-sec .copy-text i{color:#FEB58A;}
  .login-sec .copy-text a{color:#E36262;}
  .login-sec h2{margin-bottom:30px; font-weight:800; font-size:30px; color: #DE6262;}
  .login-sec h2:after{content:" "; width:100px; height:5px; background:#FEB58A; display:block; margin-top:20px; border-radius:3px; margin-left:auto;margin-right:auto}
  .btn-login{background: #DE6262; color:#fff; font-weight:600;}
  .banner-text{width:70%; position:absolute; bottom:40px; padding-left:20px;}
  .banner-text h2{color:#fff; font-weight:600;}
  .banner-text h2:after{content:" "; width:100px; height:5px; background:#FFF; display:block; margin-top:20px; border-radius:3px;}
  .banner-text p{color:#fff;}
</style>
<!------ Include the above in your HEAD tag ---------->

<section class="login-block">
  <div class="container">
    <div class="row">
      <div class="col-md-12 login-sec">
        <h2 class="text-center">Login Now</h2>
        <form class="login-form" action="index.php?page=admin" name="login" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1" class="text-uppercase">Username</label>
            <input type="text" class="form-control" name="username">

          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" class="text-uppercase">Password</label>
            <input type="password" class="form-control" name="password">
          </div>
          <?php if (isset($_POST['login']) && !isset($_SESSION['admin'])){ ?>
            <p><span class="error">Incorrect username or password</span></p> <?php
          } ?>
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input">
              <small>Remember Me</small>
            </label>
            <button type="submit" class="btn btn-login float-right" name="login">Submit</button>
          </div>

        </form>
        <div class="copy-text">Created with <i class="fa fa-heart"></i> by <a href="http://grafreez.com">Grafreez.com</a></div>
      </div>
    </div>
</section>