<?php 
    session_start();
    if(isset($_SESSION['username'])){
        $pageTitle ='Dashboard';
        include 'init.php';
        /* Start Dashboard Page Body */

        $latestUsers = 5;  // To count latest registered users.
        $theLatest = getLatest('*', 'users', 'user_id', $latestUsers);  // Latest users array.
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
                        <div class="stat st-pending">Pending Members <span>
                        <?php echo checkItem('regstatus', 'users', 0); ?>
                        </span>
                        <a href="members.php?do=Manage&page=Pending">See All</a>
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
                                <i class="fa fa-users"></i> Latest <?php echo $latestUsers; ?> Registered Users
                            </div>
                            <div class="panel-body">
                                <ul class="list-unstyled latest-users">
                            <?php
                                foreach ($theLatest as $user){
                                    echo '<li>';
                                        echo $user['fullname'];
                                        echo  '<a href="members.php?do=Edit&user_id=' . $user['user_id'] . '">';
                                            echo '<span class="btn btn-success float-end">';
                                                echo '<i class="fa fa-edit"></i>Edit';
                                                if($user['regstatus'] == 0){
                                                    echo "<a href='members.php?do=Activate&user_id=". $user['user_id']. "'class='btn btn-info activate float-end'><i class='fa fa-close'></i> Activate</a>";
                                                }
                                            echo '</span>';
                                        echo '</a>';
                                    echo '</li>';
                                } ?>
                                </ul>
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