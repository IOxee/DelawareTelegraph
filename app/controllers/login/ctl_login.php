<?php
	defined('MY_CMS') or die('Permission denied');

	include_once MDL_DATABASE;
	require MDL_LOGIN;

	function login($username, $password, $login) {
		if (isset($login)) {
			$username = trim($username);
        	$password = trim($password);

			if (empty($username) || empty($password)) {
				echo ERROR_EMPTY_FIELDS;
			}

			$result = mdl_check_user($username, $password);

			foreach ($result as $row) {
				if ($username == $row['nick']) {
					if (password_verify($password, $row['password'])) {
						$_SESSION['username'] = $username;
						$_SESSION['level'] = $row['level'];
						$_SESSION['avatar'] = $row['img'];
						$_SESSION['logged'] = true;
						header('Location: ' . INDEX_URL . '?action=posts');
					} else {
						echo ERROR_PASSWORD_INCORRECT;
						header('Refresh: 1; URL=' . INDEX_URL);
					}
				} else {
					echo ERROR_USER_NOT_FOUND;
					status_toast('Error', ERROR_USER_NOT_FOUND);
					header('Refresh: 1; URL=' . INDEX_URL);
				}
			}
		}
	}