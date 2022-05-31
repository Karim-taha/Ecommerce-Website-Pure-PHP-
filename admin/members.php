<?php 


/*
=======================================
== Manage Memebers :
== You can Add | Edit | Delete members from here. 
=======================================
*/

    session_start();

    $pageTitle = "Members";

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
           }elseif($do == 'Edit'){      // Edit Page  ?>
               
            <h1 class="text-center mt-4">Edit Member</h1>

            <div class="container">
                <div class="row justify-content-center">
                <form class="form-horizontal" action="">
                    <!-- Start username -->
                    <div class="form-group mb-4">
                        <label for="" class="col-sm-2 mb-1 control-label">Username</label>
                        <div class="col-sm-10 col-md-4">
                            <input type="text" name="username" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <!-- End username -->
                    <!-- Start password -->
                    <div class="form-group mb-4">
                        <label for="" class="col-sm-2 mb-1 control-label">Password</label>
                        <div class="col-sm-10 col-md-4">
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                    <!-- End password -->
                    <!-- Start Email -->
                    <div class="form-group mb-4">
                        <label for="" class="col-sm-2 mb-1 control-label">Email</label>
                        <div class="col-sm-10 col-md-4">
                            <input type="Email" name="email" class="form-control">
                        </div>
                    </div>
                    <!-- End Email -->
                    <!-- Start Fullname -->
                    <div class="form-group mb-4">
                        <label for="" class="col-sm-2 mb-1 control-label">Fullname</label>
                        <div class="col-sm-10 col-md-4">
                            <input type="text" name="fullname" class="form-control">
                        </div>
                    </div>
                    <!-- End Fullname -->
                    <!-- Start Submit Button -->
                    <div class="form-group mt-3">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="text" value="Save" class="btn btn-primary">
                        </div>
                    </div>
                    <!-- End Submit Button -->
                </form>
                </div>
            </div>

           <?php }elseif($do == 'Insert'){
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











