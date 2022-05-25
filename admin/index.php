<?php 
    include "init.php";  // The file that contain all pathes & libraries. 
    include $template . "header.php";
    include 'includes/languages/arabic.php';
?>

<div>
    <h1>Welcome to Admin Index</h1>
</div>


<?php 
    include $template . "footer.php";

    echo lang('MESSAGE')  . " " . lang('ADMIN');
?>