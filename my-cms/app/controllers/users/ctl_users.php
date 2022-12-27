<?php
	defined('MY_CMS') or die('Permission denied');

	require "app/models/users.php";

	function fitxa(){
		$info_bbdd=getInfoBBDD();

		include 'app/views/users/page.php';

		echo view_users_page($info_bbdd);
	}

	function profile() {

	}