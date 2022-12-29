<?php
	defined('MY_CMS') or die('Permission denied');

	include_once MDL_DATABASE;
	require MDL_USER;

	function profile() {
		$stmt = get_users();
		$stmt_social = get_social_media();
		$users = array();
		$social_media = array();

		foreach ($stmt_social as $row_social) {
			if ($row_social['nick'] == $_SESSION['username']) {
				$social_media = array(
					'facebook' => $row_social['facebook'],
					'twitter' => $row_social['twitter'],
					'instagram' => $row_social['instagram'],
					'linkedin' => $row_social['linkedin'],
					'github' => $row_social['github'],
				);
			}
		}

		foreach ($stmt as $row) {
			$users[] = array(
				'id' => $row['id'],
				'username' => $row['nick'],
				'fullname' => $row['fullname'],
				'level' => $row['level'],
				'dob' => $row['dob'],
				'mail' => $row['mail'],
				'avatar' => $row['img'],
				'social_media' => $social_media,
				'bio' => $row['bio'],
				'show_mail' => $row['show_mail'],
				'show_dob' => $row['show_dob'],
				'show_fullname' => $row['show_fullname'],
				'show_bio' => $row['show_bio'],
				'show_social' => $row['show_social'],
				'send_notifications' => $row['send_notifications'],
			);
		}

		include PROFILE_VIEW;
	}

	function changepass($oldpass, $newpass, $newpass2, $changepass) {
		$users = get_users();

		foreach ($users as $row) {
			if ($row['nick'] == $_SESSION['username']) {
				$hash = $row['password'];

				if ($oldpass != "" || $oldpass != NULL) {
					if (password_verify($oldpass, $hash)) {
						if ($newpass == $newpass2) {
							$options = array("cost" => 4);
							$hash = password_hash($newpass, PASSWORD_BCRYPT, $options);
							$stmt = update_password($_SESSION['username'], $hash);

							if ($stmt) {
								$msg = "Contraseña cambiada correctamente";
							} else {
								$msg = "Error al cambiar la contraseña";
							}
						} else {
							$msg = "Las contraseñas no coinciden";

						}
					} else {
						$msg = "La contraseña actual no es correcta";
					}
				} else {
					if ($newpass == $newpass2) {
						$options = array("cost" => 4);
						$hashPassword = password_hash($newpass, PASSWORD_BCRYPT, $options);

						$stmt = update_password($_SESSION['username'], $hashPassword);
						if ($stmt) {
							$msg = "Contraseña cambiada correctamente";
						} else {
							$msg = "Error al cambiar la contraseña";
						}
					} else {
						$msg = "Las contraseñas no coinciden";
					}
				}
			}
		}

		header("Location: " . INDEX_URL . "?action=profile");
	}

	function editprofile($fullname, $mail, $dob, $img, $bio, $linkedin, $github, $twitter, $instagram, $facebook) {
		$users = get_users();

		foreach ($users as $row) {
			if ($row['nick'] == $_SESSION['username']) {
				$id = $row['id'];
				$username = $row['nick'];
			}
		}

		$stmt = update_profile($id, $username, $fullname, $mail, $dob, $img, $bio);
		$stmt_social = update_social_media($id, $username, $linkedin, $github, $twitter, $instagram, $facebook);

		if ($stmt && $stmt_social) {
			$msg = "Perfil actualizado correctamente";
			header("Location: " . INDEX_URL . "?action=profile");
		} else {
			$msg = "Error al actualizar el perfil";
			header('LOCATION: ' . 404);
		}

	}

	function profile_by_id($id) {
		$stmt = get_users_by_id($id);
		$nick = "";
		$stmt_social = get_social_media();
		$users = array();
		$social_media = array();

		foreach ($stmt as $row) {
			if ($row['id'] == $id) {
				$nick = $row['nick'];
			}
		}

		foreach ($stmt_social as $row_social) {
			if ($row_social['nick'] == $nick) {
				$social_media = array(
					'facebook' => $row_social['facebook'],
					'twitter' => $row_social['twitter'],
					'instagram' => $row_social['instagram'],
					'linkedin' => $row_social['linkedin'],
					'github' => $row_social['github'],
				);
			} else {
				$social_media = false;
			}
		}

		foreach ($stmt as $row) {
			$users[] = array(
				'id' => $row['id'],
				'username' => $row['nick'],
				'fullname' => $row['fullname'],
				'level' => $row['level'],
				'dob' => $row['dob'],
				'mail' => $row['mail'],
				'avatar' => $row['img'],
				'social_media' => $social_media,
				'bio' => $row['bio'],
				'show_mail' => $row['show_mail'],
				'show_dob' => $row['show_dob'],
				'show_fullname' => $row['show_fullname'],
				'show_bio' => $row['show_bio'],
				'show_social' => $row['show_social'],
				'send_notifications' => $row['send_notifications'],
			);
		}



		include PROFILE_VIEW;
	}

	function save_private($show_mail, $show_dob, $show_fullname, $show_bio, $show_social, $send_notifications) {

		if ($show_mail == "on") { $show_mail = 1; } else { $show_mail = 0; }
		if ($show_dob == "on") { $show_dob = 1; } else { $show_dob = 0; }
		if ($show_fullname == "on") { $show_fullname = 1; } else { $show_fullname = 0; }
		if ($show_bio == "on") { $show_bio = 1; } else { $show_bio = 0; }
		if ($show_social == "on") { $show_social = 1; } else { $show_social = 0; }
		if ($send_notifications == "on") { $send_notifications = 1; } else { $send_notifications = 0; }

		$stmt = update_private( $_SESSION['username'], $show_mail, $show_dob, $show_fullname, $show_bio, $show_social, $send_notifications);

		if ($stmt) {
			$msg = "Perfil actualizado correctamente";
			header("Location: " . INDEX_URL . "?action=profile");
		} else {
			$msg = "Error al actualizar el perfil";
			header('LOCATION: ' . 404);
		}
	}