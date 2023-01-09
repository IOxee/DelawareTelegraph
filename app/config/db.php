<?php
 	defined('MY_CMS') or die('Permission denied');
	define('DB_HOSTING', 'local'); // local or remote
	define('DB_SERVER', 'db4free.net'); // db4free.net or other

	if ( DB_HOSTING == 'local') {
		define('DB_HOST', 'localhost');
		define('DB_NAME', 'my_cms_ioxee_27');
		define('DB_USER', 'root');
		define('DB_PASS', '');
		define('DB_PORT', 3306);
		define('DB_CHARSET', 'utf8mb4');
		define('DB_COLLATE', 'utf8mb4_unicode_ci');

	} else if ( DB_HOSTING == 'remote' && DB_SERVER == 'db4free.net') {
		define('DB_HOST', 'db4free.net');
		define('DB_NAME', 'my_cms_ioxee_27');
		define('DB_USER', 'ioxeeoficial');
		define('DB_PASS', '^E#f5MU7Q3!o');
		define('DB_PORT', 3306);
		define('DB_CHARSET', 'utf8mb4');
		define('DB_COLLATE', 'utf8mb4_unicode_ci');
	}
