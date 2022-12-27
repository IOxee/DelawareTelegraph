<?php
	/**
	 * Routes PHP (Main)
	 */
	define('INDEX_URL', "./index.php");
	define('ROUTES_FILE', "./routes.php");

	/**
	 * Routes PHP (Views)
	 */
	define('MAIN_VIEW', './app/views/main_view.php');

	// app
	define('HEADER_VIEW', './app/views/app/header.php');
	define('NAVBAR_VIEW', './app/views/app/navbar.php');
	define('FOOTER_VIEW', './app/views/app/footer.php');
	define('STATUS_404', "./app/views/app/404.php");


	// login
	define('LOGIN_VIEW', './app/views/login/login.php');
	define('REGISTER_VIEW', './app/views/login/register.php');

	// posts
	define('POSTS_VIEW', './app/views/posts/posts.php');
	define('POSTSDETAILS_VIEW', './app/views/posts/postsdetails.php');

	// users
	define('USERDETAILS_VIEW', './app/views/users/userdetails.php');
	define('PROFILE_VIEW', './app/views/users/userprofile.php');
	define('CHANGEPASS_VIEW', './app/views/users/changepass.php');

	// reporter
	define('REPORTER_VIEW', './app/views/report/reporter_panel.php');

	/**
	 * Routes PHP (Controllers)
	 */
	define('CTL_LOGIN', './app/controllers/login/ctl_login.php');
	define('CTL_REGISTER', './app/controllers/login/ctl_register.php');
	define('CTL_MAIN', './app/controllers/ctl_main.php');
	define('CTL_LOGOUT', './app/controllers/login/ctl_logout.php');
	define('CTL_USER', './app/controllers/users/ctl_users.php');
	define('CTL_POSTS', './app/controllers/posts/ctl_posts.php');
	define('CTL_REPORTER', './app/controllers/reporter/ctl_reporter.php');


	/**
	 *  Routes PHP (Models)
	 */
	define('MDL_DATABASE', './app/models/database/mdl_database.php');
	define('MDL_LOGIN', './app/models/login/mdl_login.php');
	define('MDL_REGISTER', './app/models/login/mdl_register.php');
	define('MDL_USER', './app/models/users/mdl_users.php');
	define('MDL_POSTS', './app/models/posts/mdl_posts.php');
	define('MDL_REPORTERS', './app/models/report/mdl_reporter.php');



	/**
	 * Routes IMGs
	 */
	define('LOGO', './app/assets/img/logo.png');
	define('DEFAULT_USER', './app/assets/img/default_user.jpg');
	define('BACKGROUND_CMS', './app/assets/img/background_cms.png');
	define('LOGO_POSTS', './app/assets/img/logo_posts.png');
	define('404_IMG', './app/assets/img/404.png');

	/**
	 * Routes Video
	 */
	define('VIDEO', '');

	/**
	 * Routes CSS
	 */
	define('STYLES', './app/assets/css/styles.css');
	define('STYLES_USERPROFILE', './app/assets/css/userprofile.css');

	/**
	 * Routes JS
	 */
	define('SCRIPT_JS', './app/assets/js/script.js');