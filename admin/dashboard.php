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
                        <div class="stat">Total Members <span>50</span></div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat">Pending Members <span>20</span></div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat">Total Items <span>2000</span></div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat">Total Comments <span>3500</span></div>
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