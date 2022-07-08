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
                    <div class="form-group mb-4">
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
                    <div class="form-group mb-4">
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
                    <div class="form-group mb-4">
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
                    <div class="form-group mb-4">
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
                    <div class="form-group mb-4">
                        <label for="" class="col-sm-2 mb-1 control-label">Status <span style="color: red;">*</span></label>
                        <div class="col-sm-10 col-md-4">
                            <select name="item_status" id="">
                                <option value="1">New</option>
                                <option value="2">Used</option>
                                <option value="3">Very Old</option>
                            </select>
                        </div>
                    </div>
                    <!-- End item status -->

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
