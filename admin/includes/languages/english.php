<?php

function lang($phrase)
{

    static $lang = array(

        // Navbar Page :
        'HOME'              => 'Home',
        'CATEGORIES'        => 'Catgories',
        'Items'             => 'Items',
        'Members'           => 'Members',
        'Statistics'        => 'Statistics',
        'Logs'              => 'Logs',
        'Edit Profile'      => 'Edit Profile',
        'Settings'          => 'Settings',
        'Log out'           => 'Log out'

    );

    return $lang[$phrase];
}
