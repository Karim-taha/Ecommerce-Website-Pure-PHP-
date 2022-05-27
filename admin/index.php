<?php 
    session_start();
    if(isset($_SESSION['username'])){
        header("Location: dashboard.php");
    }
    include "init.php";  // The file that contain all pathes & libraries. 
    include $template . "header.php";
    include 'includes/languages/arabic.php';

    // Check if user data is coming from HTTP REQUEST :
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $username = $_POST['user'];
        $password = $_POST['pass'];
        $hashedPassword = sha1($password);

        // Check if user exists in database :
            $stmt = $conn->prepare("SELECT username, password FROM users WHERE username = ? AND password = ? AND group_id = 1 ;");
            $stmt->execute([$username, $hashedPassword]);
            $count = $stmt->rowCount();

            if($count > 0){
                $_SESSION['username'] = $username;
                exit();
            } else {
                echo "User not exists or you are not admin";
            }
    }




?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="login">
    <h4 class="text-center">Admin Login</h4>
    <input class="form-control" type="text" name="user" placeholder="username" autocomplete="off">
    <input  class="form-control" type="password" name="pass" placeholder="Password" autocomplete="new-password">
    <input  class="btn btn-primary btn-block" type="submit" value="login">
</form>


<?php 
    include $template . "footer.php";
?>