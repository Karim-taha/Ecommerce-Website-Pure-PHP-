<?php 

/*
    Create Title function that echo yhe page title :
    // in case the page has var $pageTitle.
*/

function getTitle(){
    global $pageTitle;
    if(isset($pageTitle)){
        echo $pageTitle;
    } else {
        echo "Default";
    }
}

/*
-> Create Home Redirect Function (v.1.0) That accepts parameters such as :
** ErrMsg : Echo the error message.
** Seconds : Seconds before redirecting.
*/

// function redirectHome ($errMsg, $seconds = 3){
//     echo "<div class='alert alert-danger'>$errMsg</div>";
//     echo "<div class='alert alert-info'>You will be redirecting to Home Page after $seconds seconds.</div>";
    
//     header("refresh:$seconds;url=index.php"); // I used (refresh ) instead of (Location) because the redirecting is after time not immediatelt.
//     exit();
// }


/*
-> Update Home Redirect Function (v.2.0) That accepts parameters such as :
** $theMsg : Echo the message.
** url     : The link to redirect to.
** $seconds : Seconds before redirecting.
*/
function redirectHome ($theMsg, $url = null, $seconds = 6){

    if($url === null ){
        $url = 'index.php';
        $link = 'Home Page';
    } else{
        if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== ''){
            $url = $_SERVER['HTTP_REFERER'];
            $link = 'Previous Page';
        }else{
            $url = 'index.php';
            $link = 'Home Page';
        }
 
        // $_SERVER['HTTP_REFERER'] => Referes to the page before the page you stand on now.
    }


    echo $theMsg;
    echo "<div class='alert alert-info'>You will be redirecting to $link after $seconds seconds.</div>";
    
    header("refresh:$seconds;url=$url"); // I used (refresh ) instead of (Location) because the redirecting is after time not immediatelt.
    exit();
}




/*
** Create Check Item function
** $select : checks if the [Example: username - item - category .. ] exists in database or not
** $from   : Database table to select from [Example: users - items - categories .. ]
** $value  : The value of select [Example: Karim - Television - Electronics .. ]
*/

function checkItem($select, $from, $value){
    global $conn;

    $statement = $conn->prepare("SELECT $select FROM $from WHERE $select = ?");
    $statement->execute([$value]);
    $count = $statement->rowCount();
    return $count;
}

/*
** Create a function that counts number or rows of any database schedule i give to the function.
** $itemId -> represent the id of this schedule (Example: user_id from users - cat_id from categories).
** $table  -> represent the table I will count its rows.
*/

function countItems ($itemId, $table){
    global $conn;
    $stmt2 = $conn->prepare("SELECT COUNT($itemId) FROM $table");
    $stmt2->execute();

    return $stmt2->fetchColumn();

}


/*
** Get latest record function
** This function is to get latest items from database [users, items, comments, ...]
** $select : The column I want to selct from table.
** $table  : The table I want to get data from.
** $order  : The DESC ordering.
** $limit  : The limit of records I want to get (default = 5).
*/

function getLatest($select, $table, $order, $limit = 5){
    global $conn;

    $getStmt = $conn->prepare("SELECT $select FROM $table ORDER BY $order DESC LIMIT $limit;");
    $getStmt->execute();
    $rows = $getStmt->fetchAll();
    return $rows;

}