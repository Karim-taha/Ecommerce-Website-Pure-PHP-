<?php 
    session_start();
    if(isset($_SESSION['username'])){
        $pageTitle ='Dashboard';
        include 'init.php';
        echo "Welcome " . $_SESSION['username'];

        include $template . "footer.php";
    } else {
        header("Location: index.php");
        exit();
    }