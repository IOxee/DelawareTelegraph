<?php
    defined('MY_CMS') or die('Permission denied');

    define('PROJECT_AUTHOR', 'Isidre Rosell Gallego');
    define('AUTHOR_URL', 'https://ioxee.github.io/');

    define('WEBSITE_LANG', 'es'); // Can be 'cat', 'es', 'en'
    include_once TRANSLATIONS;


    /**
     * Roles and permissions
     */
    define('ADMIN_LEVEL', 10);
    define('LEVEL_9', 9);
    define('LEVEL_8', 8);
    define('LEVEL_7', 7);
    define('LEVEL_6', 6);
    define('REPORTER_LEVEL', 5);
    define('LEVEL_4', 4);
    define('LEVEL_3', 3);
    define('LEVEL_2', 2);
    define('LEVEL_1', 1);
    define('USER_LEVEL', 0);
    define('BANNED_LEVEL', -1);
    define('PRO_LEVEL', -2);



    /**
     * Privacy settings
     */
    define('SHOW_MAIL', 1);
    define('SHOW_DOB', 0);
    define('SHOW_FULLNAME', 0);
    define('SHOW_BIO', 1);
    define('SHOW_SOCIAL', 1);
    define('SEND_NOTIFICATIONS', 1);

    /**
     * Navbar logo config
     */
    define('LOGO_WIDTH', '');