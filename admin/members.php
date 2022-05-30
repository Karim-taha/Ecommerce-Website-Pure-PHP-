<?php 


/*
=======================================
== Manage Memebers :
== You can Add | Edit | Delete members from here. 
=======================================
*/

    session_start();
    if(isset($_SESSION['username'])){
        include 'init.php';

        $do = '';
        if(isset($_GET['do'])){
            $do = $_GET['do'];
        } else {
            $do = "Manage";
        }

        if($do == 'Manage'){
            // Manage Page : 
           }elseif($do == 'Edit'){
               // Edit Page

            echo "Welcome to Edit page your id is " . $_GET['user_id'];

           }elseif($do == 'Insert'){
               echo "You are in the Insert page";
               echo "<br>";
               echo "<a href='test.php?do=Manage'>Manage Page</a>";
        }else{
            echo "There is no page with this name";
        }



        include $template . "footer.php";
    } else {
        header("Location: index.php");
        exit();
    }











