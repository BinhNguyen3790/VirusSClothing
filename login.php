<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 19/01/2019
 * Time: 7:53 PM
 */?>
<h1>Login</h1>
<form action="http://localhost:63342/VirusSClothing/index.php?page=admin" name="login" method="post">
    <p>Username <input type="text" name="username" maxlength=30></p>
    <p>Password <input type="password" name="password" maxlength=30></p>
    <?php
    if (isset($_POST['login']) && isset($_SESSION['admin'])){ ?>
        <p><span class="error">Incorrect username or password</span></p> <?php
    } ?>
    <p><input type="submit" name="login" value="Submit"></p>
</form>