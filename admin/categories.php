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

            $sort = 'ASC';
            $sort_array = ['ASC', 'DESC'];

            if(isset($_GET['sort']) && in_array($_GET['sort'], $sort_array)){

                $sort = $_GET['sort'];
            }

            $stmt2 = $conn->prepare("SELECT * FROM categories ORDER BY cat_ordering $sort");
            $stmt2->execute();
            $cats = $stmt2->fetchall(); ?>

            <h1 class="text-center mt-5 mb-5">Manage Categories</h1>
            <div class="container categories">
            <a class="btn btn-primary mb-2" href="categories.php?do=Add"><i class="fa fa-plus"></i>Add New Category</a>
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Manage Categories
                    <div class="ordering float-end">
                        Choose Ordering : 
                        <a href="?sort=ASC" class="<?php if($sort == 'ASC') {echo 'active'; } ?>"> ASC </a> |
                        <a href="?sort=DESC" class="<?php if($sort == 'DESC') {echo 'active'; } ?>"> DESC </a>
                    </div>
                    </div>
                    
                    <div class="panel-body">
                        <?php 
                            foreach($cats as $cat){
                                echo "<div class='cat'>";
                                echo "<div class='hidden-buttons'>";
                                    echo "<a href='categories.php?do=Edit&cat_id=" . $cat['cat_id'] . "' class='btn btn-xs btn-primary'><i class='fa fa-edit'></i> Edit</a>";
                                    echo "<a href='categories.php?do=Delete&cat_id=" . $cat['cat_id'] . "' class='confirm btn btn-xs btn-danger'><i class='fa fa-close'></i> Delete</a>";
                                echo "</div>";
                                echo "<h3>" . $cat['cat_name'] . "</h3>";
                                echo "<p>"; 
                                if($cat['cat_desc'] == '') {
                                    echo "Description is empty";
                                }else {
                                    echo $cat['cat_desc'];
                                }
                                     echo "</p>";

                                if($cat['cat_visibility'] == 1){
                                    echo "<span>Visibility: <span class='visible'>Visible</span>" . "<br>";
                                }else{
                                    echo "<span>Visibility: <span class='hidden'>Hidden</span>" . "<br>";
                                }

                                if($cat['cat_allow_comment'] == 1){
                                    echo "<span>Allow Comment: <span class='comentingyes'>Yes</span>" . "<br>";
                                }else{
                                    echo "<span>Allow Comment: <span class='comentingno'>No</span>" . "<br>";
                                }

                                if($cat['cat_allow_ads'] == 1){
                                    echo "<span>Allow Ads: <span class='advertisingyes'>Yes</span>" . "<br>";
                                }else{
                                    echo "<span>Allow Ads: <span class='advertisingno'>No</span>" . "<br>";
                                }
                                echo "</div>";
                                echo "<hr>";
                            }
                        ?>
                    </div>
                </div>
            </div>

<?php 
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
            // Check if get cat_id from request from the link & check if the cat_id is a number
            // and if it is not a number then user_id = 0
            $catId = isset($_GET['cat_id']) && is_numeric($_GET['cat_id']) ? intval($_GET['cat_id']) : 0;
            // Select all data depending on the id above :
            $stmt = $conn->prepare("SELECT * FROM categories WHERE cat_id = ? ;");
            // Excute the query :
            $stmt->execute([$catId]);
            $cat = $stmt->fetch();  // Get the data from database as an array to loop on
            $count = $stmt->rowCount();
                // if there is a user with this id is in database show the edit form : 
                if($count > 0){ ?>
                <h1 class="text-center mt-4">Edit Category</h1>
            <div class="container">
                <div class="row justify-content-center">
                <form class="form-horizontal" action="?do=Update" method="POST">
                <input type="hidden" name="cat_id" value="<?php echo $catId; ?>">
                    <!-- Start category name -->
                    <div class="form-group mb-4">
                        <label for="" class="col-sm-2 mb-1 control-label">Category Name <span style="color: red;">*</span></label>
                        <div class="col-sm-10 col-md-4">
                            <input type="text" name="cat_name" class="form-control" value="<?php echo $cat['cat_name']; ?>" required="required" placeholder="Category Name.">
                        </div>
                    </div>
                    <!-- End category name -->
                    <!-- Start y describtion -->
                    <div class="form-group mb-4">
                        <label for="" class="col-sm-2 mb-1 control-label">Category Describtion </label>
                        <div class="col-sm-10 col-md-4">
                            <input type="text" name="cat_desc" class="form-control" value="<?php echo $cat['cat_desc']; ?>" placeholder="Describe the category">
                        </div>
                    </div>
                    <!-- End category describtion -->
                    <!-- Start ordering field -->
                    <div class="form-group mb-4">
                        <label for="" class="col-sm-2 mb-1 control-label">Ordering </label>
                        <div class="col-sm-10 col-md-4">
                            <input type="text" name="cat_ordering" class="form-control" value="<?php echo $cat['cat_ordering']; ?>" placeholder="Number to Arrange the categories.">
                        </div>
                    </div>
                    <!-- End ordering field -->
                    <!-- Start Visibility -->
                    <div class="form-group mb-4">
                        <label for="" class="col-sm-2 mb-1 control-label">Visibility </label>
                        <div class="col-sm-10 col-md-4">
                            <div>
                                <input id="vis-no" type="radio" name="cat_visibility" value="1" <?php if($cat['cat_visibility'] == 1 ) { echo "checked"; } ?>>
                                <label for="vis-no">Visible</label>
                            </div>
                            <div>
                                <input id="vis-yes" type="radio" name="cat_visibility" value="0" <?php if($cat['cat_visibility'] == 0 ) { echo "checked"; } ?> >
                                <label for="vis-yes">Hidden</label>
                            </div>
                        </div>
                    </div>
                    <!-- End Visibility -->
                    <!-- Start Commenting -->
                    <div class="form-group mb-4">
                        <label for="" class="col-sm-2 mb-1 control-label">Allow Commenting </label>
                        <div class="col-sm-10 col-md-4">
                            <div>
                                <input id="com-no" type="radio" name="cat_allow_comment" value="1" <?php if($cat['cat_allow_comment'] == 1 ) { echo "checked"; } ?> >
                                <label for="com-no">Yes</label>
                            </div>
                            <div>
                                <input id="com-yes" type="radio" name="cat_allow_comment" value="0" <?php if($cat['cat_allow_comment'] == 0 ) { echo "checked"; } ?> >
                                <label for="com-yes">No</label>
                            </div>
                        </div>
                    </div>
                    <!-- End Commenting -->
                    <!-- Start Ads -->
                    <div class="form-group mb-4">
                        <label for="" class="col-sm-2 mb-1 control-label">Allow Ads </label>
                        <div class="col-sm-10 col-md-4">
                            <div>
                                <input id="ads-no" type="radio" name="cat_allow_ads" value="1" <?php if($cat['cat_allow_ads'] == 1 ) { echo "checked"; } ?> >
                                <label for="ads-no">Yes</label>
                            </div>
                            <div>
                                <input id="ads-yes" type="radio" name="cat_allow_ads" value="0" <?php if($cat['cat_allow_ads'] == 0 ) { echo "checked"; } ?> >
                                <label for="ads-yes">No</label>
                            </div>
                        </div>
                    </div>
                    <!-- End Ads -->
                    <!-- Start Submit Button -->
                    <div class="form-group mt-3">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" value="Update Category" class="btn btn-primary">
                        </div>
                    </div>
                    <!-- End Submit Button -->
                </form>
                </div>
            </div>
                </div>
            </div>
           <?php
           // if there is no such id show error message : 
           } else {
            echo "<div class='container'>";
            $theMsg = "<div class='alert alert-danger'>There is no such ID</div>";
            redirectHome($theMsg);
            echo "</div>";

           }
        }elseif($do == 'Update'){   // Update Page
            echo "<h1 class='text-center mt-4'>Edit Category</h1>";
            echo "<div class='container'>";

            if($_SERVER['REQUEST_METHOD'] == "POST"){
                // Get data from the form :
                    $cat_id                 = $_POST['cat_id'];
                    $cat_name               = $_POST['cat_name'];
                    $cat_desc               = $_POST['cat_desc'];
                    $cat_ordering           = $_POST['cat_ordering'];
                    $cat_visibility         = $_POST['cat_visibility'];
                    $cat_allow_comment      = $_POST['cat_allow_comment'];
                    $cat_allow_ads          = $_POST['cat_allow_ads'];

                    // Validate the form : 
                    $formErrors = [];
                    if(empty($cat_name)){
                        $formErrors[] = "Category name can't be empty";
                    }
                    // Loop on Error Array and echo it if there is an error or more.
                    foreach($formErrors as $error){
                        echo "<div class='alert alert-danger'>" . $error . "</div>";
                    }

                    // If no Errors Send data to database :
                    if(empty($formErrors)){

                        $stmt = $conn->prepare("UPDATE 
                                                    categories 
                                                SET cat_name = ? , 
                                                    cat_desc = ? , 
                                                    cat_ordering = ? , 
                                                    cat_visibility = ? , 
                                                    cat_allow_comment = ? , 
                                                    cat_allow_ads = ? 
                                                WHERE 
                                                    cat_id = ? ");
                        $stmt->execute(array($cat_name, $cat_desc , $cat_ordering, $cat_visibility, $cat_allow_comment, $cat_allow_ads, $cat_id));
    
                        // Show success message :
                        $theMsg = "<div class='alert alert-success text-cnter'>Record Updated</div>";
                        redirectHome($theMsg, 'referer');
                    }

            }else{
                $theMsg = "<div class='alert alert-danger text-cnter'>You can not access this page directly</div>";
                redirectHome($theMsg, 'referer');
            }
            echo "</div>";
        }elseif($do == 'Delete'){   // Delete Page
// Check if get cat_id from request from the link & check if the cat_id is a number
            // and if it is not a number then user_id = 0
            $catId = isset($_GET['cat_id']) && is_numeric($_GET['cat_id']) ? intval($_GET['cat_id']) : 0;
            // Select all data depending on the id above :
            $check= checkItem("cat_id", "categories", $catId);
            // if there is a user with this id is in database show the edit form : 
                if($check > 0){ 
                    $stmt = $conn->prepare("DELETE FROM categories WHERE cat_id = ?;");
                    $stmt->execute([$catId]);
                    // Show success message :
                    $theMsg = "<div class='alert alert-success text-cnter'>Record Deleted</div>";
                        redirectHome($theMsg, 'referer');
                        
                    }else{
                    $theMsg = "<div class='alert alert-danger text-cnter'>This id doesn't exist.</div>";
                        redirectHome($theMsg, 'back');
                }
        } elseif($do = 'Activate'){  // Activate Member Page
        // Check if get user_id from request from the link & check if the user_id is a number
            // and if it is not a number then user_id = 0
            $userId = isset($_GET['user_id']) && is_numeric($_GET['user_id']) ? intval($_GET['user_id']) : 0;
            // Select all data depending on the id above :
            // $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ? LIMIT 1;");
            $check= checkItem("user_id", "users", $userId);
            // if there is a user with this id is in database show the edit form : 
                if($check > 0){ 
                    $stmt = $conn->prepare("UPDATE users SET regstatus = 1 WHERE user_id = ?;");
                    $stmt->execute([$userId]);
                    // Show success message :
                    $theMsg = "<div class='alert alert-success text-cnter'>User Activated</div>";
                        redirectHome($theMsg, 'referer');
                        
                    }else{
                    $theMsg = "<div class='alert alert-danger text-cnter'>This id doesn't exist.</div>";
                        redirectHome($theMsg);
                }
        }

        include $template . "footer.php";  
}else {
    header("Location:index.php");
    exit();
}

ob_end_flush();  // Release the output
