<?php 

$do = '';
if(isset($_GET['do'])){
    $do = $_GET['do'];
} else {
    $do = "Manage";
}


// If the page is main page

if($do == 'Manage'){
     echo "You are in the Manage page";
     echo "<br>";
     echo "<a href='test.php?do=Add'>Add New Category</a>";
     echo "<br>";
     echo "<a href='test.php?do=Insert'>Insert New Category</a>";
    }elseif($do == 'Add'){
        echo "You are in the Add page";
        echo "<br>";
        echo "<a href='test.php?do=Manage'>Manage Page</a>";
    }elseif($do == 'Insert'){
        echo "You are in the Insert page";
        echo "<br>";
        echo "<a href='test.php?do=Manage'>Manage Page</a>";
 }else{
     echo "There is no page with this name";
 }





