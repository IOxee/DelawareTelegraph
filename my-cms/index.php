<?php
	define('MY_CMS', 'CMS');
	require './routes.php';
	require './app/config/db.php';
	//require NAVBAR_VIEW;


	session_start();

	if(isset($_GET['action']) && $_GET['action'] == 'register' ) {
		require CTL_REGISTER;
		register($_POST['username'], $_POST['fullname'], $_POST['password'], $_POST['dob'], $_POST['mail'], $_POST['reapeatpassword'], $_POST['register']);

	} elseif (isset($_GET['action']) && $_GET['action'] == 'login') {
		require CTL_LOGIN;
		login($_POST['username'], $_POST['password'], $_POST['login']);

	} elseif (isset($_GET['action']) && $_GET['action'] == 'logout') {
		require CTL_LOGOUT;
		logout();

	} elseif (isset($_GET['action']) && $_GET['action'] == 'changepass') {
		require CTL_USER;
		changepass($_POST['oldpassword'], $_POST['newpassword'], $_POST['repeatnewpassword'], $_POST['changepass']);

	} elseif (isset($_GET['action']) && $_GET['action'] == 'profile') {
		require CTL_USER;
		profile();

	} elseif (isset($_GET['action']) && $_GET['action'] == 'editprofile') {
		require CTL_USER;
		editprofile($_POST['fullname'], $_POST['mail'], $_POST['dob'], $_POST['img'], $_POST['bio'], $_POST['linkedin'], $_POST['github'], $_POST['twitter'], $_POST['instagram'], $_POST['facebook'], $_POST['editprofile']);

	} elseif (isset($_GET['action']) && $_GET['action'] == 'posts' && isset($_SESSION['username'])) {
		require CTL_POSTS;
		ctl_posts();

	} elseif (isset($_GET['action']) && $_GET['action'] == 'post' && isset($_GET['id'])) {
		require CTL_POSTS;
		ctl_posts_by_id($_GET['id']);

	} elseif (isset($_GET['action']) && $_GET['action'] == 'apanel') {










	} else { //Si no existe GET o POST -> muestra la pagina principal
		require CTL_MAIN;
		start_app();
 	}

/*
	elseif (isset($_POST['action']) && $_POST['action'] == 'register') {
		require './app/controllers/login/ctl_register.php';
		die($_POST['username']);

		register($_POST['username'], $_POST['fullname'], $_POST['password'], $_POST['dob'], $_POST['mail'], $_POST['reapeatpassword'], $_POST['register']);

*/