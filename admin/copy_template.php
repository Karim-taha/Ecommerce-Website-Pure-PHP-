<?php 

/*
=====================
== Template Page
=====================
*/

ob_start();

session_start();
$pageTitle = '';

if(isset($_SESSION['username'])) {

    include 'init.php';

    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
    
        if($do == 'Manage'){    // Manage Page

        }elseif ($do == 'Add'){ // Add Page

        }elseif($do == 'Insert'){   // Insert Page

        }elseif($do == 'Edit'){     // Edit Page

        }elseif($do == 'Update'){   // Update Page

        }elseif($do == 'Delete'){   // Delete Page

        }elseif($do == 'Activate'){     // Activate Page

        }

        include $template . "footer.php";  
}else {
    header("Location:index.php");
    exit();
}

ob_end_flush();  // Release the output
