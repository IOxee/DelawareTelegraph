<?php
	defined('MY_CMS') or die('Permission denied');

	function mdl_check_user($username, $password) {
		$stmt = db_query_fetchall('SELECT * FROM users');
		return $stmt;
	}