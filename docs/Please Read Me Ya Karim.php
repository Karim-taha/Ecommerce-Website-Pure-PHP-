<?php 

/*

/*
== Important Videos :

---------------------------
// v19 : Start Creating Members Page : 
Very important video to know how to pass the loged user in other pages by session
---------------------------



// V1 :
- Ecommerce Website.
- Multilanguage.
- Responsive ( Bootstrap ).
- use JQUERY.
- Pure PHP.
- use PDO to connect to DB.


// V2 :
* What I need to do this website :

1- HTML
2- CSS
3- JavaScript
4- JQuery.
5- Bootstrap
6- PHP
7- MYSQL (PDO)


// V3 :

Simple Analysis : تحليل المشروع

// اتعلم ازاي تعمل تحليل للويب سايت من على اليوتيوب او من على يوديمي
Search on Google : How to organize PHP project structure. 


- Pages & Features :
1- setttings
2- Dashboard
3- Statistics
4- log
5- users
6- comments

-----------------------------------------------------------------

// v4 :
Creating project folders & structure

-----------------------------------------------------------------

// v5 : 
Include Important files :

// creating Admin header & footer & including them to Admin index page.

---------------------------------------------------------------

// v6 :

استدعاء المكتبات والأدوات اللي هنشتغل بيها

You will find all libraries and cdn in (docs) folder. 

CSS Files :
1- backend.css : I created it. 
2- bootstrap.css & bootstrap.min.css : put  theme in CSS folder for the project


JS Files:
1- backend.js : I created it.
2- bootstrap.min.js : for bootstrap (Put it in JS folder for the project).
3- jquery-3.6.0.min.js : for JQUERY (Put it in JS folder for the project).

Fontawesome CDN :
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

-----------------------------------------

// v7 : create init.php

هكريت فايل باسم
init.php
هحط جواه كل الباث والمكتبات اللي هستخدمها هحطها جوا متغيرات
وهستخدم المتغيرات دي جوا الويب سايت عشان لو حبيت اغير باث معين او اسم
فايل او فولدر معين اغيره في فايل ال
init.php
بس وبالتالي تتغير في البروجت كله ديناميك

------------------------------------------

// v8 : create & test languages :

جوا فولدر ال
languages
هكريت فايل اسمه 
english.php
arabic.php

وأكتب فيهم الفانكشن اللي فيها اللغة عربي او انجليزي

-------------------------------------------

// v9 : Create database 

Database Name : elzeroecommerce

First table to create : users (8 columns) :
1- user_id int(11) primary key auto increment not null
2- username varchar (255)
3- password varchar(255)
4- email varchar(255)
5- fullname varchar(255)
6- group_id int(11) default = 0     // if admin, group_id = 1  & if some user, group_id = 0
7- trustedseller int(11) default = 0    // if seller is trusted, trustedseller = 1 and wright Trusted Seller for example.
8- regstatus (Register status) int(11) default = 0  // After user sign up he needs to verify his account by email for example.

--------------------------------------------------

// v10 : Connect to database with PDO

--------------------------------------------------

// v11 : Create & design login form page.

--------------------------------------------------

// v12 : Code the login form (part 1)

--------------------------------------------------

// v13 : Code the login form (part 2)

-------------------------------------------------

// v14 : Adding the Bootstrap navigation bar

// Important thing in this video that I do not want the navbar to show in index page (login page)
so I will create an empty var in index page called for example $noNavbarInIndexPage = '';
then I go to init page and include navbar in all pages except index page :
if(!isset($noNavbarInIndexPage)){
    include $template . "navbar.php";
}

-----------------------------------------------

// v15 : Design & customize navbar

-----------------------------------------------

// v16 : Split page into pages with GET

-----------------------------------------------

// v17 : Create Logout page :

session_start();   // Start the session

session_unset();   // Unset the data that the session has to make it empty the same:  $_SESSION = array();

session_destroy();  // Destroy the session

header("Location: index.php");
exit();

// بعمل اكزيت بعد الهيدر عشان ميطلعليش اي 
output error
في حالة كتبت هيدر غلط

// في مقال كويس عن مسح السيشن والكوكيز من موقع 
php
php.net/session_destroy

--------------------------------------------

// v18 : Create Our first function getTitle();

Create function getTitle() in functions.php
// Do not forget to call functions.php in every page or in init.php if you have one and put the 
var $pageTitle beneath it.

// Create Title function that echo yhe page title :
// in case the page has var $pageTitle.
function getTitle(){
    global $pageTitle;
    if(isset($pageTitle)){
        echo $pageTitle;
    } else {
        echo "Default";
    }
}

then create $pageTitle var in every page :
in index.php : $pageTitle = 'Login';     // 
in dashboard.php : $pageTitle = 'Dashboard'; 

then go to header and wright in <title><?php getTitle(); >?</title>

// If you have error (uncaught function ) then you use the function or the var $pageTitle in some page
before calling functions.php or init.php

----------------------------------------------

// v19 : Start Creating Members Page : 

Very important video to know how to pass the loged user in other pages by session

-----------------------------------------------

// v20 : Members page : Design Edit Page :


<input type ="username" autocomplete="off">  // autocomplete prevent browsers from
complete username that entered before.
<input type ="password" autocomplete="new-pass">  // autocomplete prevent browsers from saving passwords

------------------------------------------------

v21 : Members page : Code Edit Page :

------------------------------------------------

v22 : Members Page : Code Update page p1 ( Send form data from Edit Page to Update Page and send them to database): 

------------------------------------------------

v23 : Members Page : Code Update page p2 ( Password Part )

------------------------------------------------

v24 : Members Page : Update Page : Validation (Server) side.

------------------------------------------------

v25 : Members Page : Update Page : Validation (Client) side & Style Errors.

------------------------------------------------

v26 : Members Page : Add Page (Design)

------------------------------------------------

v27 : Members Page : Insert Page (code Part 1) // Handle Errors.

------------------------------------------------

v28 : Members Page : Insert Page (code Part 2) // Insert the new user to database.

------------------------------------------------

v29 : Members Page : Manage Page (Design)

------------------------------------------------

v30 : Members Page : Cdoe Manage Page

------------------------------------------------

v31 : Members Page : Code Delete Page

------------------------------------------------

v32 : Create Home Redirect Dynamic Function :

// It is a function I give her the error message and Time but time is not necessary 
because it has a default value.

function redirectHome ($errMsg, $seconds = 3){
    echo "<div class='alert alert-danger'>$errMsg</div>";
    echo "<div class='alert alert-info'>You will be redirecting to Home Page after $seconds seconds.</div>";

    header("refresh:$seconds;url=index.php"); // I used (refresh ) instead of (Location) because the redirecting is after time not immediatelt.
    exit();
}

To use it : in members page for example in Insert section : 

$ErrMsg = "You can not access this page directly";
redirectHome($ErrMsg);

------------------------------------------------

v33 : Add some Design to Main Table.

------------------------------------------------

v34 : Create Dynamic (Check Item) function :

/*
** Create Check Item function
** $select : checks if the [Example: username - item - category .. ] exists in database or not
** $from   : Database table to select from [Example: users - items - categories .. ]
** $value  : The value of select [Example: Karim - Television - Electronics .. ]
*/

/*
function checkItem($select, $from, $value){
    global $conn;

    $statement = $conn->prepare("SELECT $select FROM $from WHERE $select = ?");
    $statement->execute([$value]);
    $count = $statement->rowCount();
    return $count;
}

and to use it go to members page in add new user section.

--------------------------------------------

v35 : Update the redirect function : 

--------------------------------------------

v36 : Add the Redirect function to pages.

--------------------------------------------

v37 : Members Page : Add Date

-------------------------------------------

v38 : Members Page : Clean Up

-------------------------------------------

v39 : Dashboard Page : Design Layout

-------------------------------------------

v40 : Create Calculate Items Function :
دي فانكشن بتعد عدد الصفوف اللي في اي جدول انا بديهالها في الداتابيز

/*
** Create a function that counts number or rows of any database schedule i give to the function.
** $itemId -> represent the id of this schedule (Example: user_id from users - cat_id from categories).
** $table  -> represent the table I will count its rows.

// function countItems ($itemId, $table){
//     global $conn;
//     $stmt2 = $conn->prepare("SELECT COUNT($itemId) FROM $table");
//     $stmt2->execute();

//     return $stmt2->fetchColumn();

// }

// To use it in dashboard page as : 
echo countItems ("user_id", "users");

--------------------------------------------

v41 : Dashboard Page : Design and Links

--------------------------------------------

v42 : Members Page : Manage Pending 

--------------------------------------------

v43 : Members Page : Activate Pending Members

--------------------------------------------

v44 : Dashboard Page : Pending Members Count

--------------------------------------------

v45 : Create getLatest() function :

/*
** Get latest record function
** This function is to get latest items from database [users, items, comments, ...]
** $select : The column I want to selct from table.
** $table  : The table I want to get data from.
** $order  : The DESC ordering.
** $limit  : The limit of records I want to get (default = 5).


function getLatest($select, $table, $order, $limit = 5){
    global $conn;

    $getStmt = $conn->prepare("SELECT $select FROM $table ORDER BY $order DESC LIMIT $limit;");
    $getStmt->execute();
    $rows = $getStmt->fetchAll();
    return $rows;

}

----------------------------------------------

v46 : Dashboard Page : Design latest registered users.

----------------------------------------------

v47 : Fix headers sent errors (if exists) :

// Error : headers already sent

ob_start();   // Output Buffering Start
* This built-in function store all the outputs in ram but not headers.
* Output buffering is active output is sent from the script to the browser but stored in the internal buffer (but not the header).  (buffuer : التخزين المؤقت)
* Written in the beginning of the page.

ob_end_flush();  
* Let the output that stored to appear in the browser.
* Written in the end of the page.

-----------------------------------------------

v48 : Categories : Create Database Table.

Table name : categoreis ( 7 columns )

(1) cat_id : TINYINT (11) PRIMARY AUTO INCREMENT 
(2) cat_name : VARCHAR (255)   Index -> UNIQU
(3) cat_desc : TEXT (255)
(4) cat_ordering : INT (11)
(5) cat_visibility : TINYINT (11)         [ default : 0 => hide | 1 => show ]
(6) cat_allow_comment : TINYINT (11)      [ default : 0 => no comment | 1 => yes comment ]
(7) cat_allow_ads     : TINYINT (11)      [ default : 0 => no ads | 1 => yes ads ]

-----------------------------------------------

v49 : Categories : Make Add Category Page

-----------------------------------------------

v50 : Categories : Make Insert Page

-----------------------------------------------

v51 : Categories : Make Manage Page

-----------------------------------------------

v52 : Categories : Design Manage Page

*/
