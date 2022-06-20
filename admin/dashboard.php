<?php 
    session_start();
    if(isset($_SESSION['username'])){
        $pageTitle ='Dashboard';
        include 'init.php';
        /* Start Dashboard Page Body */
        ?>
            <div class="container home-stats text-center">
                <h1 class="mt-3 mb-4">Dashboard</h1>
                <div class="row">
                        <div class="col-md-3">
                            <div class="stat st-members">Total Members 
                                <span><?php echo countItems ("user_id", "users"); ?></span>
                                <a href="members.php">See All</a>
                            </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat st-pending">Pending Members <span>20</span>
                        <a href="#">See All</a>
                    </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat st-items">Total Items <span>2000</span>
                        <a href="#">See All</a>
                    </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat st-comments">Total Comments <span>3500</span>
                        <a href="#">See All</a>
                    </div>
                    </div>
                </div>
            </div>

            <div class="container latest">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-users"></i> Latest Registered Users
                            </div>
                            <div class="panel-body">
                                Test
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-tag"></i> Latest Items
                            </div>
                            <div class="panel-body">
                                Test
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        <?php
        /* End Dashboard Page Body */
        include $template . "footer.php";
    } else {
        header("Location: index.php");
        exit();
    }