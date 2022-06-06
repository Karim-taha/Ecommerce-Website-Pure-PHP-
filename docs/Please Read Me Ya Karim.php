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

First table to create : users (8 coumns) :
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

*/
