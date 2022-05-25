<?php 

/*

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

*/
