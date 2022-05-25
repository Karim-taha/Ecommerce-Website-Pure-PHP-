<?php 
    include "init.php";  // The file that contain all pathes & libraries. 
    include $template . "header.php";
    include 'includes/languages/arabic.php';
?>

<form action="" class="login">
    <h4 class="text-center">Admin Login</h4>
    <input class="form-control" type="text" name="user" placeholder="username" autocomplete="off">
    <input  class="form-control" type="password" name="pass" placeholder="Password" autocomplete="new-password">
    <input  class="btn btn-primary btn-block" type="submit" value="login">
</form>


<?php 
    include $template . "footer.php";
?>