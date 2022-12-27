<?php
	function mdl_insert_user($username, $fullname, $hashPassword, $mail, $dob) {
		$level = 0;
		$stmt = db_query_prepare(
			'INSERT INTO users (nick, password, fullname, mail, dob) VALUES (?, ?, ?, ?, ?)',
			array($username, $hashPassword, $fullname, $mail, $dob),
			'sssss'
		);

		if ($stmt->affected_rows == 1) {
			$_SESSION['username'] = $username;
			$_SESSION['level'] = $level;

			header('Location: ' . INDEX_URL);
			return true;
		} else {
			return false;
		}
	}