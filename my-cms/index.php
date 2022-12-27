<?php
	define('MY_CMS', 'CMS');
	require './routes.php';
	require './app/config/db.php';

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

	} elseif (isset($_GET['action']) && $_GET['action'] == 'deletepost' && isset($_GET['id'])) {
		require CTL_POSTS;
		delete_post($_GET['id']);

	} elseif (isset($_GET['action']) && $_GET['action'] == 'apanel') {

	} elseif (isset($_GET['action']) && $_GET['action'] == 'reporter_panel' && isset($_GET['view'])) {
		require CTL_REPORTER;
		reporter_panel();

	} elseif (isset($_GET['action']) && $_GET['action'] == 'reporter_panel' && isset($_GET['create_post'])) {
		require CTL_REPORTER;
		create_post($_POST['title'], $_POST['tags'], $_POST['content'], $_POST['image']);

	} elseif (isset($_GET['action']) && $_GET['action'] == 'reporter_panel' && isset($_GET['create_category'])) {
		require CTL_REPORTER;
		create_category($_POST['category_name'], $_POST['description']);









	} else { //Si no existe GET o POST -> muestra la pagina principal
		require CTL_MAIN;
		start_app();
 	}