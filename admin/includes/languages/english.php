<?php 

function lang( $phrase ){

    static $lang = array (

        // Dashboard Page ;
        'HOME' => 'Home',
        'CATEGORIES' => 'Catgories',
        'Edit Profile' => 'Edit Profile',
        'Settings' => 'Settings',
        'Log out' => 'Log out',

    );

    return $lang[$phrase];


}











