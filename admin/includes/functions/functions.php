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


