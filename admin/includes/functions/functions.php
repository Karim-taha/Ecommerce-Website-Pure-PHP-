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
-> Create Home Redirect Function That accepts parameters such as :
** ErrMsg : Echo the error message.
** Seconds : Seconds before redirecting.
*/

function redirectHome ($errMsg, $seconds = 3){
    echo "<div class='alert alert-danger'>$errMsg</div>";
    echo "<div class='alert alert-info'>You will be redirecting to Home Page after $seconds seconds.</div>";

    header("refresh:$seconds;url=index.php"); // I used (refresh ) instead of (Location) because the redirecting is after time not immediatelt.
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