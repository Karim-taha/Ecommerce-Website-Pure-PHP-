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
           }elseif($do == 'Edit'){      // Edit Page  

            // Check if get user_id from request from the link & check if the user_id is a number
            // and if it is not a number then user_id = 0
            $userId = isset($_GET['user_id']) && is_numeric($_GET['user_id']) ? intval($_GET['user_id']) : 0;

            // Select all data depending on the id above :
            $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ? LIMIT 1;");
            // Excute the query :
            $stmt->execute([$userId]);
            $row = $stmt->fetch();  // Get the data from database as an array to loop on
            $count = $stmt->rowCount();

                // if there is a user with this id is in database show the edit form : 
                if($count > 0){ ?>
                
               
            <h1 class="text-center mt-4">Edit Member</h1>

            <div class="container">
                <div class="row justify-content-center">
                <form class="form-horizontal" action="">
                    <!-- Start username -->
                    <div class="form-group mb-4">
                        <label for="" class="col-sm-2 mb-1 control-label">Username</label>
                        <div class="col-sm-10 col-md-4">
                            <input type="text" name="username" value="<?php echo $row['username']; ?>" class="form-control" autocomplete="off">
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
                            <input type="Email" name="email" value="<?php echo $row['email']; ?>" class="form-control">
                        </div>
                    </div>
                    <!-- End Email -->
                    <!-- Start Fullname -->
                    <div class="form-group mb-4">
                        <label for="" class="col-sm-2 mb-1 control-label">Fullname</label>
                        <div class="col-sm-10 col-md-4">
                            <input type="text" name="fullname" value="<?php echo $row['fullname']; ?>" class="form-control">
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

           <?php
           // if there is no such id show error message : 
           } else {
               echo "There is no such ID";
           }
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











