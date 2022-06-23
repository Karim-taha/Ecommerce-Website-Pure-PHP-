<?php 

/*
=====================
== Category Page
=====================
*/

ob_start();

session_start();
$pageTitle = 'Catgories';

if(isset($_SESSION['username'])) {

    include 'init.php';

    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
    
        if($do == 'Manage'){    // Manage Page
            echo "Welcome to Category Manage Page";
        }elseif ($do == 'Add'){ // Add Page  ?>

            <h1 class="text-center mt-4">Add Category</h1>
            <div class="container">
                <div class="row justify-content-center">
                <form class="form-horizontal" action="?do=Insert" method="POST">
                    <!-- Start category name -->
                    <div class="form-group mb-4">
                        <label for="" class="col-sm-2 mb-1 control-label">Category Name <span style="color: red;">*</span></label>
                        <div class="col-sm-10 col-md-4">
                            <input type="text" name="cat_name" class="form-control" autocomplete="off" required="required" placeholder="Category Name.">
                        </div>
                    </div>
                    <!-- End category name -->
                    <!-- Start y describtion -->
                    <div class="form-group mb-4">
                        <label for="" class="col-sm-2 mb-1 control-label">Category Describtion </label>
                        <div class="col-sm-10 col-md-4">
                            <input type="text" name="cat_desc" class="form-control" placeholder="Describe the category">
                        </div>
                    </div>
                    <!-- End category describtion -->
                    <!-- Start ordering field -->
                    <div class="form-group mb-4">
                        <label for="" class="col-sm-2 mb-1 control-label">Ordering </label>
                        <div class="col-sm-10 col-md-4">
                            <input type="text" name="cat_ordering" class="form-control" placeholder="Number to Arrange the categories.">
                        </div>
                    </div>
                    <!-- End ordering field -->
                    <!-- Start Visibility -->
                    <div class="form-group mb-4">
                        <label for="" class="col-sm-2 mb-1 control-label">Visibility </label>
                        <div class="col-sm-10 col-md-4">
                            <div>
                                <input id="vis-yes" type="radio" name="cat_visibility" value="0" checked>
                                <label for="vis-yes">Yes</label>
                            </div>
                            <div>
                                <input id="vis-no" type="radio" name="cat_visibility" value="1">
                                <label for="vis-no">No</label>
                            </div>
                        </div>
                    </div>
                    <!-- End Visibility -->
                    <!-- Start Commenting -->
                    <div class="form-group mb-4">
                        <label for="" class="col-sm-2 mb-1 control-label">Allow Commenting </label>
                        <div class="col-sm-10 col-md-4">
                            <div>
                                <input id="com-yes" type="radio" name="cat_allow_comment" value="0" checked>
                                <label for="com-yes">Yes</label>
                            </div>
                            <div>
                                <input id="com-no" type="radio" name="cat_allow_comment" value="1">
                                <label for="com-no">No</label>
                            </div>
                        </div>
                    </div>
                    <!-- End Commenting -->
                    <!-- Start Ads -->
                    <div class="form-group mb-4">
                        <label for="" class="col-sm-2 mb-1 control-label">Allow Ads </label>
                        <div class="col-sm-10 col-md-4">
                            <div>
                                <input id="ads-yes" type="radio" name="cat_allow_ads" value="0" checked>
                                <label for="ads-yes">Yes</label>
                            </div>
                            <div>
                                <input id="ads-no" type="radio" name="cat_allow_ads" value="1">
                                <label for="ads-no">No</label>
                            </div>
                        </div>
                    </div>
                    <!-- End Ads -->
                    <!-- Start Submit Button -->
                    <div class="form-group mt-3">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" value="Add Category" class="btn btn-primary">
                        </div>
                    </div>
                    <!-- End Submit Button -->
                </form>
                </div>
            </div>
<?php 

        }elseif($do == 'Insert'){   // Insert Page

            if($_SERVER['REQUEST_METHOD'] == "POST"){
                echo "<h1 class='text-center mt-4'>Insert Category</h1>";
                echo "<div class='container'>";
                // Get data from the form :
                    $catName = $_POST['cat_name'];
                    $catDesc = $_POST['cat_desc'];
                    $catOrdering = $_POST['cat_ordering'];
                    $catVisibility = $_POST['cat_visibility'];
                    $catAllowComment = $_POST['cat_allow_comment'];
                    $catAllowAds = $_POST['cat_allow_ads'];


                    // Validate the form : 
                    $formErrors = [];
                    if(empty($catName)){
                        $formErrors[] = "Category Name can't be empty";
                    } 
                    // Loop on Error Array and echo it if there is an error or more.
                    foreach($formErrors as $error){
                        echo "<div class='alert alert-danger'>" . $error . "</div>";
                    }

                    
                    // If no form errors :
                    if(empty($formErrors)){

                        // Check if category alreay exists in database :
                        $check= checkItem("cat_name", "categories", $catName);
    
                        if($check == 1 ){
                            $theMsg = "<div class='alert alert-danger'>Category already exists.</div>";
                            redirectHome($theMsg, 'referer');
                        } else {  // Create the new category :

                                $stmt = $conn->prepare("INSERT INTO categories (cat_name, cat_desc, cat_ordering, cat_visibility, cat_allow_comment, cat_allow_ads) VALUES (?, ?, ?, ?, ?, ?);"); 
                                $stmt->execute(array($catName, $catDesc , $catOrdering, $catVisibility, $catAllowComment, $catAllowAds));
                                // Show success message :
                                $theMsg = "<div class='alert alert-success text-cnter'>Category Added Successfully.</div>";
                                redirectHome($theMsg, 'referer');
                            }
                    }

            } else{
                echo "<div class='container'>";
                $theMsg = "<div class='alert alert-danger'>You can not access this page directly</div>";
                redirectHome($theMsg, 'referer');
                echo "</div>";
            }
            echo "</div>";
        }elseif($do == 'Edit'){     // Edit Page

        }elseif($do == 'Update'){   // Update Page

        }elseif($do == 'Delete'){   // Delete Page

        }

        include $template . "footer.php";  
}else {
    header("Location:index.php");
    exit();
}

ob_end_flush();  // Release the output
