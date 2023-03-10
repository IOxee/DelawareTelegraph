<?php
	defined('MY_CMS') or die('Permission denied');

	include_once MDL_DATABASE;
	require MDL_REGISTER;

    function register($username, $fullname, $password, $dob, $mail, $reapeatpassword, $register) {
		if (isset($register)) {
			$username = trim($username);
			$fullname = trim($fullname);
			$password = trim($password);
			$dob = trim($dob);
			$mail = trim($mail);
			$reapeatpassword = trim($reapeatpassword);

			if ($password == $reapeatpassword) {
				$options = array("cost" => 4);
				$hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);

				$result = mdl_insert_user($username, $fullname, $hashPassword, $mail, $dob);

				if ($result) {
					echo SUCCESS_REGISTER;
				} else {
					echo ERROR_TO_REGISTER;
				}
			} else {
				echo ERROR_PASSWORD_DOSENT_MATCH;
			}
		}
    }