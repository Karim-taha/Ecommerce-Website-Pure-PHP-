<?php 

include 'connect.php';
// Templates Directory :
$template = 'includes/templates/';

// CSS Directory :
$css = 'layout/css/';

// JS Directory :
$js = 'layout/js/';

// Language Firectory :
$lang = 'includes/languages/';

// Fontawesome CDN :
$fontawesomeCdn = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css";

include $lang . 'english.php';   // استدعي فايل اللغة ديما الاول قبل ما يستدعي أي صفحة تانية
include $template . "header.php";

// Include navbar in all pages except index.php (login to dashboard)
if(!isset($noNavbarInIndexPage)){
    include $template . "navbar.php";
}










