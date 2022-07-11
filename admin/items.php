<?php 

/*
=====================
== Item Page
=====================
*/

ob_start();

session_start();
$pageTitle = 'Items';

if(isset($_SESSION['username'])) {

    include 'init.php';

    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
    
        if($do == 'Manage'){    // Manage Page
            echo "Welcome to Item Manage Page";
        }elseif ($do == 'Add'){ // Add Page ?>
            <h1 class="text-center mt-4">Add Item</h1>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-9">
                <form class="form-horizontal" action="?do=Insert" method="POST">
                    <!-- Start item name -->
                    <div class="form-group mb-2">
                        <label for="" class="col-sm-2 mb-1 control-label">Item Name <span style="color: red;">*</span></label>
                        <div class="col-sm-10 col-md-4">
                            <input 
                                type="text" 
                                name="item_name" 
                                class="form-control" 
                                required="required" 
                                placeholder="Item Name.">
                        </div>
                    </div>
                    <!-- End item name -->
                    <!-- Start item description -->
                    <div class="form-group mb-2">
                        <label for="" class="col-sm-2 mb-1 control-label">Item Description <span style="color: red;">*</span></label>
                        <div class="col-sm-10 col-md-4">
                            <input 
                                type="text" 
                                name="item_desc" 
                                class="form-control" 
                                required="required" 
                                placeholder="Item description.">
                        </div>
                    </div>
                    <!-- End item description -->
                    <!-- Start item price -->
                    <div class="form-group mb-2">
                        <label for="" class="col-sm-2 mb-1 control-label">Item Price <span style="color: red;">*</span></label>
                        <div class="col-sm-10 col-md-4">
                            <input 
                                type="text" 
                                name="item_price" 
                                class="form-control" 
                                required="required" 
                                placeholder="Item price.">
                        </div>
                    </div>
                    <!-- End item price -->
                    <!-- Start item country made -->
                    <div class="form-group mb-2">
                        <label for="" class="col-sm-2 mb-1 control-label">Country Made <span style="color: red;">*</span></label>
                        <div class="col-sm-10 col-md-4">
                            <input 
                                type="text" 
                                name="item_country_made" 
                                class="form-control" 
                                required="required" 
                                placeholder="Item country made.">
                        </div>
                    </div>
                    <!-- End item country made -->
                    <!-- Start item status -->
                    <div class="form-group mb-2">
                        <label for="" class="col-sm-2 mb-1 control-label">Status <span style="color: red;">*</span></label>
                        <div class="col-sm-10 col-md-4">
                            <select name="item_status" id="">
                                <option value="0">...</option>
                                <option value="1">New</option>
                                <option value="2">Used</option>
                                <option value="3">Very Old</option>
                            </select>
                        </div>
                    </div>
                    <!-- End item status -->
                    <!-- Start members field -->
                    <div class="form-group mb-2">
                        <label for="" class="col-sm-2 mb-1 control-label">Member <span style="color: red;">*</span></label>
                        <div class="col-sm-10 col-md-4">
                            <select name="user_id" id="">
                                <option value="0">...</option>
                                <?php 
                                    $stmt = $conn->prepare("SELECT * FROM users");
                                    $stmt->execute();
                                    $users = $stmt->fetchAll();
                                    foreach ($users as $user){ 
                                        echo "<option value='" . $user['user_id'] . "'>" . $user['username'] . "</option>";
                                    } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <!-- End members field -->
                    <!-- Start categories field -->
                    <div class="form-group mb-2">
                        <label for="" class="col-sm-2 mb-1 control-label">Category <span style="color: red;">*</span></label>
                        <div class="col-sm-10 col-md-4">
                            <select name="cat_id" id="">
                                <option value="0">...</option>
                                <?php 
                                    $stmt2 = $conn->prepare("SELECT * FROM categories");
                                    $stmt2->execute();
                                    $categories = $stmt2->fetchAll();
                                    foreach ($categories as $category){ 
                                        echo "<option value='" . $category['cat_id'] . "'>" . $category['cat_name'] . "</option>";
                                    } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <!-- End categories field -->

                    <!-- Start Submit Button -->
                    <div class="form-group mt-3 mb-5">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" value="Add Item" class="btn btn-primary">
                        </div>
                    </div>
                    <!-- End Submit Button -->
                </form>
                </div>
                </div>
            </div>
<?php 
        }elseif($do == 'Insert'){   // Insert Page
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                echo "<h1 class='text-center mt-4'>Insert Item</h1>";
                echo "<div class='container'>";
                // Get data from the form :
                    $item_name = $_POST['item_name'];
                    $item_desc = $_POST['item_desc'];
                    $item_price = $_POST['item_price'];
                    $item_country_made = $_POST['item_country_made'];
                    $item_status = $_POST['item_status'];

                    // Validate the form : 
                    $formErrors = [];
                    if(empty($item_name)){
                        $formErrors[] = "Item name can't be empty";
                    } 
                    if(empty($item_desc)){
                        $formErrors[] = "Item Description can't be empty";
                    } 
                    if(empty($item_price)){
                        $formErrors[] = "Price can't be empty";
                    } 
                    if (empty($item_country_made)) {
                        $formErrors[] = "Country Made can't be empty";
                    } 
                    if ($item_status == 0) {
                        $formErrors[] = "You must choose item status";
                    } 
                    // Loop on Error Array and echo it if there is an error or more.
                    foreach($formErrors as $error){
                        echo "<div class='alert alert-danger'>" . $error . "</div>";
                    }

                    
                    // If no form errors :
                    if(empty($formErrors)){

                        $stmt = $conn->prepare("INSERT INTO 
                                                    items (
                                                        item_name, 
                                                        item_desc, 
                                                        item_price, 
                                                        item_country_made, 
                                                        item_status,
                                                        item_add_date 
                                                        ) 
                                                    VALUES (?, ?, ?, ?, ?, now());"); 
                        $stmt->execute(array(
                            $item_name, 
                            $item_desc, 
                            $item_price, 
                            $item_country_made,
                            $item_status
                        ));
                        // Show success message :
                        $theMsg = "<div class='alert alert-success text-cnter'>Item Added Successfully.</div>";
                        redirectHome($theMsg, 'referer');
                            
                    }

            } else{
                echo "<div class='container'>";
                $theMsg = "<div class='alert alert-danger'>You can not access this page directly</div>";
                redirectHome($theMsg);
                echo "</div>";
            }
            echo "</div>";
        }elseif($do == 'Edit'){     // Edit Page

        }elseif($do == 'Update'){   // Update Page

        }elseif($do == 'Delete'){   // Delete Page

        }elseif($do == 'Approve'){     // Activate Page

        }

        include $template . "footer.php";  
}else {
    header("Location:index.php");
    exit();
}

ob_end_flush();  // Release the output
