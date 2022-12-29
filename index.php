<?php
	define('MY_CMS', 'CMS');

	require STATUS_404;
	require './routes.php';
	require './app/config/db.php';
	require './app/config/sh_config.php';

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

	} elseif (isset($_GET['action']) && $_GET['action'] == 'profile_id') {
		require CTL_USER;
		profile_by_id($_GET['id']);

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

	} elseif (isset($_GET['action']) && $_GET['action'] == 'editpost' && isset($_GET['id'])) {
		require CTL_POSTS;
		edit_post($_GET['id'], $_POST['title'], $_POST['content'], $_POST['image'], $_POST['tags']);

	} elseif (isset($_GET['action']) && $_GET['action'] == 'pdf' && isset($_GET['id'])) {
		require CTL_POSTS;
		ctl_posts_by_id_pdf($_GET['id']);


	} elseif (isset($_GET['action']) && $_GET['action'] == 'reporter_panel' && isset($_GET['view'])) {
		require CTL_REPORTER;
		reporter_panel();

	} elseif (isset($_GET['action']) && $_GET['action'] == 'reporter_panel' && isset($_GET['create_post'])) {
		require CTL_REPORTER;
		create_post($_POST['title'], $_POST['tags'], $_POST['content'], $_POST['image'], $_POST['category']);

	} elseif (isset($_GET['action']) && $_GET['action'] == 'reporter_panel' && isset($_GET['create_category'])) {
		require CTL_REPORTER;
		create_category($_POST['category_name'], $_POST['description']);

	} elseif (isset($_GET['action']) && $_GET['action'] == 'reporters_profile') {
		require CTL_REPORTER;
		reporters_profile();

	} elseif (isset($_GET['action']) && $_GET['action'] == 'apanel') {
		require CTL_ADMINS;
		admin_panel();

	} elseif (isset($_GET['action']) && $_GET['action'] == 'setuser') {
		require CTL_ADMINS;
		if (isset($_GET['admin'])) {
			set_user($_GET['id'], ADMIN_LEVEL);
		} elseif (isset($_GET['reporter'])) {
			set_user($_GET['id'], 5);
		} elseif (isset($_GET['user'])) {
			set_user($_GET['id'], 0);
		}

	} elseif (isset($_GET['action']) && $_GET['action'] == 'apanel' && isset($_GET['deleteuser'])) {
		require CTL_ADMINS;
		delete_user($_GET['id']);

	} elseif (isset($_GET['action']) && $_GET['action'] == 'saveprivate') {
		require CTL_USER;
		save_private($_POST['showEmail'], $_POST['showDob'], $_POST['showFullname'], $_POST['showBio'], $_POST['showSocial'], $_POST['sendNotifications']);

	} else { //Si no existe GET o POST -> muestra la pagina principal
		require CTL_MAIN;
		start_app();
 	}