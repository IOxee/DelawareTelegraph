<?php
	defined('MY_CMS') or die('Permission denied');

	function mdl_insert_user($username, $fullname, $hashPassword, $mail, $dob) {
		$level = USER_LEVEL;
		// INSERT INTO `users` (`id`, `nick`, `password`, `fullname`, `mail`, `dob`, `level`, `img`, `bio`, `show_mail`, `show_dob`, `show_fullname`, `show_bio`, `show_social`, `send_notifications`) VALUES (9, 'admin', '$2y$10$EzWaudFvfh6aD147dExxz.tvSA9Wp8hDYDUYuLUgofB.TJlRFIThC', 'Admin', 'admin@thedailytelegraph.es', '2022-12-09', 10, NULL, 'teste', b'1', b'0', b'0', b'0', b'0', b'0');

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