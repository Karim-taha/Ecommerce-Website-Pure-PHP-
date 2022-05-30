<?php

session_start();

session_unset();

session_destroy();

header("Location: index.php");
// بعمل اكزيت بعد الهيدر عشان ميطلعليش اي اوت بوت غلط في حالة كتبت هيدر غلط
exit();



