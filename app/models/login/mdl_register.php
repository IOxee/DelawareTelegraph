<?php
	defined('MY_CMS') or die('Permission denied');

	function mdl_insert_user($username, $fullname, $hashPassword, $mail, $dob) {
		$level = USER_LEVEL;

		$stmt = db_query_prepare(
			'INSERT INTO users (nick, password, fullname, mail, dob) VALUES (?, ?, ?, ?, ?)',
			array($username, $hashPassword, $fullname, $mail, $dob),
			'sssss'
		);

		// $stmt_social = db_query_prepare(
		// 	"INSERT INTO `social_media` (`nick`) VALUES (?)",
		// 	array($username),
		// 	's'
		// );

		if ($stmt->affected_rows == 1) {
			$_SESSION['username'] = $username;
			$_SESSION['level'] = $level;

			header('Location: ' . INDEX_URL . '?action=posts');
			return true;
		} else {
			return false;
		}
	}