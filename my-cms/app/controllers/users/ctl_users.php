<?php
	defined('MY_CMS') or die('Permission denied');

	include_once MDL_DATABASE;
	require MDL_USER;

	function profile() {
		$stmt = get_users();
		$stmt_social = get_social_media();
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
				'dob' => $row['dob'],
				'mail' => $row['mail'],
				'avatar' => $row['img'],
				'social_media' => $social_media,
				'bio' => $row['bio'],
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
		$stmt_social = get_social_media();

		foreach ($stmt_social as $row_social) {
			if ($row_social['id'] == $id) {
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
				'dob' => $row['dob'],
				'mail' => $row['mail'],
				'avatar' => $row['img'],
				'social_media' => $social_media,
				'bio' => $row['bio'],
			);
		}

		include PROFILE_VIEW;
	}