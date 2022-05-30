<?php 
    session_start();
    if(isset($_SESSION['username'])){
        $pageTitle ='Dashboard';
        include 'init.php';
        print_r($_SESSION);

        include $template . "footer.php";
    } else {
        header("Location: index.php");
        exit();
    }