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

        if($do == 'Manage'){  // Manage Page
            
            echo "Hello in Manage Page";
            echo "<a href='members.php?do=Add'>Add New Member</a>";
            
        } elseif($do == 'Add'){  // Add Members Page ?>

<h1 class="text-center mt-4">Add Member</h1>

            <div class="container">
                <div class="row justify-content-center">
                <form class="form-horizontal" action="?do=Insert" method="POST">
                    <!-- Start username -->
                    <div class="form-group mb-4">
                        <label for="" class="col-sm-2 mb-1 control-label">Username <span style="color: red;">*</span></label>
                        <div class="col-sm-10 col-md-4">
                            <input type="text" name="username" class="form-control" autocomplete="off" required="required" placeholder="Username to login with.">
                        </div>
                    </div>
                    <!-- End username -->
                    <!-- Start password -->
                    <div class="form-group mb-4">
                        <label for="" class="col-sm-2 mb-1 control-label">Password <span style="color: red;">*</span></label>
                        <div class="col-sm-10 col-md-4">
                            <input type="password" name="password" class="form-control" autocomplete="new-password">
                        </div>
                    </div>
                    <!-- End password -->
                    <!-- Start Email -->
                    <div class="form-group mb-4">
                        <label for="" class="col-sm-2 mb-1 control-label">Email <span style="color: red;">*</span></label>
                        <div class="col-sm-10 col-md-4">
                            <input type="Email" name="email" class="form-control" required="required" placeholder="Email must be valid.">
                        </div>
                    </div>
                    <!-- End Email -->
                    <!-- Start Fullname -->
                    <div class="form-group mb-4">
                        <label for="" class="col-sm-2 mb-1 control-label">Fullname <span style="color: red;">*</span></label>
                        <div class="col-sm-10 col-md-4">
                            <input type="text" name="fullname" class="form-control" required="required" placeholder="The name appears in your profile.">
                        </div>
                    </div>
                    <!-- End Fullname -->
                    <!-- Start Submit Button -->
                    <div class="form-group mt-3">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" value="Add Member" class="btn btn-primary">
                        </div>
                    </div>
                    <!-- End Submit Button -->
                </form>
                </div>
            </div>


           <?php 
           } elseif ($do == 'Insert') {  // Insert Page
           
            echo $_POST['username'] . " " . $_POST['password'] . " " . $_POST['email'] . " " . $_POST['fullname'];

           } elseif($do == 'Edit'){      // Edit Page  

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
                <form class="form-horizontal" action="?do=Update" method="POST">
                    <!-- Start username -->
                    <div class="form-group mb-4">
                        <input type="hidden" name="user_id" value="<?php echo $userId; ?>">
                        <label for="" class="col-sm-2 mb-1 control-label">Username <span style="color: red;">*</span></label>
                        <div class="col-sm-10 col-md-4">
                            <input type="text" name="username" value="<?php echo $row['username']; ?>" class="form-control" autocomplete="off" required="required">
                        </div>
                    </div>
                    <!-- End username -->
                    <!-- Start password -->
                    <div class="form-group mb-4">
                        <label for="" class="col-sm-2 mb-1 control-label">Password</label>
                        <div class="col-sm-10 col-md-4">
                            <input type="hidden" name="oldPassword" value="<?php echo $row['password']; ?>">
                            <input type="password" name="newPassword" class="form-control" autocomplete="new-password" placeholder="Leave blank if you don't want to change it.">
                        </div>
                    </div>
                    <!-- End password -->
                    <!-- Start Email -->
                    <div class="form-group mb-4">
                        <label for="" class="col-sm-2 mb-1 control-label">Email <span style="color: red;">*</span></label>
                        <div class="col-sm-10 col-md-4">
                            <input type="Email" name="email" value="<?php echo $row['email']; ?>" class="form-control" required="required">
                        </div>
                    </div>
                    <!-- End Email -->
                    <!-- Start Fullname -->
                    <div class="form-group mb-4">
                        <label for="" class="col-sm-2 mb-1 control-label">Fullname <span style="color: red;">*</span></label>
                        <div class="col-sm-10 col-md-4">
                            <input type="text" name="fullname" value="<?php echo $row['fullname']; ?>" class="form-control" required="required">
                        </div>
                    </div>
                    <!-- End Fullname -->
                    <!-- Start Submit Button -->
                    <div class="form-group mt-3">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" value="Save" class="btn btn-primary">
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
        } elseif($do == 'Update'){   // Update Page
            echo "<h1 class='text-center mt-4'>Edit Member</h1>";
            echo "<div class='container'>";

            if($_SERVER['REQUEST_METHOD'] == "POST"){
                // Get data from the form :
                    $id = $_POST['user_id'];
                    $username = $_POST['username'];
                    $password = $_POST['newPassword'];
                    $email = $_POST['email'];
                    $fullname = $_POST['fullname'];

                    // Password Trick :
                    // Condition ? true : false;
                    $pass = empty($_POST['newPassword']) ? $_POST['oldPassword'] : sha1($password);

                    // Validate the form : 
                    $formErrors = [];
                    if(empty($username)){
                        $formErrors[] = "<div class='alert alert-danger'>Username can't be empty</div>";
                    } 
                    if(empty($email)){
                        $formErrors[] = "<div class='alert alert-danger'>Email can't be empty</div>";
                    } 
                    if (empty($fullname)) {
                        $formErrors[] = "<div class='alert alert-danger'>Fullname can't be empty</div>";
                    } 
                    // Loop on Error Array and echo it if there is an error or more.
                    foreach($formErrors as $error){
                        echo $error;
                    }

                    // If no Errors Send data to database :
                    if(empty($formErrors)){

                        $stmt = $conn->prepare("UPDATE users SET username = ? , password = ? , email = ? 
                        , fullname = ? 
                        WHERE user_id = ? ");
                        $stmt->execute(array($username, $pass , $email, $fullname, $id));
    
                        // Show success message :
                        echo "<div class='alert alert-success text-cnter'>Record Updated</div>";
                    }

            }else{
                echo "You can not access this page directly";
            }
            echo "</div>";

        } else{
            echo "There is no page with this name";
        }



        include $template . "footer.php";
    } else {
        header("Location: index.php");
        exit();
    }











