<?php
    defined('MY_CMS') or die('Permission denied');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php
			echo "<link rel='stylesheet' type='text/css' href='" . STYLES_USERPROFILE . "'>";
			include_once STYLES_CDN_HEADERS;
		?>
		<title>My CMS</title>
	</head>
	<body>
		<?php
			if (isset($_SESSION['username'])) {
				require_once NAVBAR_VIEW;
				echo navbar();
				$user = array();


				/**
				 * User Profile
				 */
				foreach ($users as $users_content) {
					if (isset($_GET['id'])) {
						if ($users_content['id'] == $_GET['id']) {
							$user = $users_content;
						}
					} else {
						if ($users_content['username'] == $_SESSION['username']) {
							$user = $users_content;
						}
					}
				}

				echo '<div class="container mt-5">';
					echo '<div class="row d-flex" style="justify-content: center;">';
						echo '<div class="col-md-7">';
							echo '<div class="card p-3 py-4">';
								echo '<div class="text-center">';
									if ($user['avatar'] == NULL || $user['avatar'] == '') {
										echo '<img src="' . DEFAULT_USER . '" class="rounded-circle" width="100" height="100" alt="avatar">';
									} else {
										echo '<img src="' . $user['avatar'] . '" class="rounded-circle" width="100" height="100" alt="avatar">';
									}
								echo '</div>';

								echo '<div class="text-center mt-3">';
									if ($user['level'] == 10) {
										echo '<span class="bg-dark text-white p-1 px-4 rounded">Admin</span>';
									} else if ($user['level'] >= 5 && $user['level'] < 10) {
										echo '<span class="bg-dark text-white p-1 px-4 rounded">Editor</span>';
									} else if ($user['level'] >= 0 && $user['level'] < 5) {
										echo '<span class="bg-dark text-white p-1 px-4 rounded">Usuari</span>';
									} else if ($user['level'] == -1) {
										echo '<span class="bg-dark text-white p-1 px-4 rounded">Banned</span>';
									} else if ($user['level'] == -2) {
										echo '<span class="bg-dark text-white p-1 px-4 rounded">Pro</span>';
									}
									echo '<h5 class="mt-2 mb-0">' . $user['username'] . '</h5>';
									if ($user['show_fullname'] == 1) {
										echo '<h5 class="mt-2 mb-0">' . $user['fullname'] . '</h5>';
									}
								echo '</div>';


								if ($user['show_bio'] == 1) {
									echo '<div class="px-4 mt-1">';
										echo '<h4 class="text-center mt-3">Biografia</h4>';
										echo '<p class="fonts text-center">' . $user['bio'] . '</p>';
									echo '</div>';
								}

								if ($user['show_social'] == 1) {
									if ($user['social_media'] != null || $user['social_media'] != '' || $user['social_media'] != false) {
										echo '<ul class="social-list">';
											if ($user['social_media']['facebook'] != NULL || $user['social_media']['facebook'] != '') {
												echo '<li href="'. $user['social_media']['facebook'] .'"><i class="fab fa-facebook-f"></i></li>';
											}
											if ($user['social_media']['twitter'] != NULL || $user['social_media']['twitter'] != '') {
												echo '<li href="'. $user['social_media']['twitter'] .'"><i class="fab fa-twitter"></i></li>';
											}
											if ($user['social_media']['instagram'] != NULL || $user['social_media']['instagram'] != '') {
												echo '<li href="'. $user['social_media']['instagram'] .'"><i class="fab fa-instagram"></i></li>';
											}
											if ($user['social_media']['linkedin'] != NULL || $user['social_media']['linkedin'] != '') {
												echo '<li href="'. $user['social_media']['linkedin'] .'"><i class="fab fa-linkedin-in"></i></li>';
											}
											if ($user['social_media']['github'] != NULL || $user['social_media']['github'] != '') {
												echo '<li href="'. $user['social_media']['github'] .'"><i class="fab fa-github"></i></li>';
											}
										echo '</ul>';
									}
								}

								if ($user['show_mail'] == 1) {
									echo '<div class="text-center mt-3">';
										echo '<a href="mailto:' . $user['mail'] . '" class="btn btn-outline-dark px-4 mb-3"><i class="fas fa-envelope mx-2"></i>Enviar Missatge</a>';
									echo '</div>';
								}

								echo '<div class="buttons text-center">';
									if ($_SESSION['username'] == $user['username']) {
										echo '<a href="' . INDEX_URL . '?action=profile&editprofile=true" class="btn btn-outline-dark px-4">Editar perfil</a>';

										if ($_SESSION['level'] >= 0 ) {
											echo '<form action="index.php?action=profile&changepass=true" method="post">';
												echo '<button class="btn btn-outline-dark px-4 ms-3 mt-2" id="changePassword">Canviar contrasenya</button>';
											echo '</form>';
										}
									}
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';

				if (isset($_GET['changepass']) == true) {
					echo '<div class="container my-3">';
						echo '<div class="row">';
							echo '<div class="col-md-6 mx-auto">';
								echo '<div class="card">';
									echo '<div class="card-body">';
										echo '<h3 class="card-title text-center">Canviar contrasenya</h3>';
										echo '<form action="' . INDEX_URL . '?action=changepass" method="post">';
											echo '<div class="form-group">';
												echo '<label for="oldPassword">Contrasenya actual</label>';
												echo '<input type="password" class="form-control my-2" id="oldPassword" name="oldPassword" placeholder="Contrasenya actual">';
											echo '</div>';
											echo '<div class="form-group">';
												echo '<label for="newPassword">Nova contrasenya</label>';
												echo '<input type="password" class="form-control my-2" id="newPassword" name="newPassword" placeholder="Nova contrasenya" required=true>';
											echo '</div>';
											echo '<div class="form-group">';
												echo '<label for="newPassword2">Repeteix la nova contrasenya</label>';
												echo '<input type="password" class="form-control my-2" id="newPassword2" name="newPassword2" placeholder="Repeteix la nova contrasenya" required=true>';
											echo '</div>';
											echo '<button type="submit" class="btn btn-outline-dark my-2">Canviar contrasenya</button>';
										echo '</form>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				}

				if (isset($_GET['editprofile']) == true) {
					echo '<div class="container my-3">';
						echo '<div class="row">';
							// #region Formulari d'edició de perfil
							echo '<div class="col-md-6 mx-auto">';
								echo '<div class="card">';
									echo '<div class="card-body">';
										echo '<h3 class="card-title text-center">Editar perfil</h3>';
										echo '<form action="' . INDEX_URL . '?action=editprofile" method="post" enctype="multipart/form-data">';
											echo '<h5 class="card-title text-center">Dades del Perfil</h5>';
											echo '<div class="form-group">';
												echo '<label for="name">Nom de usuari</label>';
												echo '<input type="text" class="form-control my-2 border border-dark" id="username" name="username" placeholder="Nickname" value="' . $user['username'] . '" disabled=true>';
											echo '</div>';
											echo '<div class="form-group">';
												echo '<label for="surname">Nom complet</label>';
												echo '<input type="text" class="form-control my-2 border border-dark" id="fullname" name="fullname" placeholder="Nombre completo" value="' . $user['fullname'] . '">';
											echo '</div>';
											echo '<div class="form-group">';
												echo '<label for="email">Correu electrònic</label>';
												echo '<input type="email" class="form-control my-2 border border-dark" id="email" name="mail" placeholder="itexpert@thedailytelegraph.es" value="' . $user['mail'] . '" required=true>';
											echo '</div>';
											echo '<div class="form-group">';
												echo '<label for="birthdate">Data de naixement</label>';
												echo '<input type="date" class="form-control my-2 border border-dark" id="dob" name="dob" value="' . $user['dob'] . '" required=true>';
											echo '</div>';
											echo '<div class="form-group">';
												echo '<label for="profilePicture">Imatge de perfil</label>';
												echo '<input type="text" class="form-control my-2 border border-dark" id="profilePicture" name="img">';
											echo '</div>';
											echo '<div class="form-group">';
												echo '<label for="textareaBio">Biografia</label>';
												echo '<textarea class="form-control my-2 border border-dark" id="textareaBio" name="bio" rows="3">' . $user['bio'] . '</textarea>';
											echo '</div>';


											echo '<br/><h5 class="card-title text-center">Xaxes socials</h5>';
											echo '<div class="form-group">';
												echo '<label for="linkedin">Linkedin</label>';
												echo '<input type="text" class="form-control my-2 border border-dark" id="linkedin" name="linkedin" placeholder="https://www.linkedin.com/" value="' . $user['social_media']['linkedin'] . '">';
											echo '</div>';
											echo '<div class="form-group">';
												echo '<label for="github">GitHub</label>';
												echo '<input type="text" class="form-control my-2 border border-dark" id="github" name="github" placeholder="https://github.com/" value="' . $user['social_media']['github'] . '">';
											echo '</div>';
											echo '<div class="form-group">';
												echo '<label for="twitter">Twitter</label>';
												echo '<input type="text" class="form-control my-2 border border-dark" id="twitter" name="twitter" placeholder="https://twitter.com/" value="' . $user['social_media']['twitter'] . '">';
											echo '</div>';
											echo '<div class="Form-group">';
												echo '<label for="instagram">Instagram</label>';
												echo '<input type="text" class="form-control my-2 border border-dark" id="instagram" name="instagram" placeholder="https://www.instagram.com/" value="' . $user['social_media']['instagram'] . '">';
											echo '</div>';
											echo '<div class="form-group">';
												echo '<label for="facebook">Facebook</label>';
												echo '<input type="text" class="form-control my-2 border border-dark" id="facebook" name="facebook" placeholder="https://www.facebook.com/" value="' . $user['social_media']['facebook'] . '">';
											echo '</div>';
											echo '<br/><button type="submit" class="btn btn-outline-dark mx-auto d-flex justify-content-center">Guardar canvis</button>';
										echo '</form>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
							// #endregion

							// #region Configuració de privacitat
							echo '<div class="col-md-6 mx-auto">';
								echo '<div class="card">';
									echo '<div class="card-body">';
										echo '<h5 class="card-title text-center">Configuració de privacitat</h5>';
										echo '<form action="' . INDEX_URL . '?action=saveprivate" method="POST">';
											echo '<div class="form-group form-switch">';
												echo '<input type="checkbox" class="form-check-input mx-2" role="switch" id="showEmail" name="showEmail" ' . ($user['show_mail'] ? 'checked' : '') . '>';
												echo '<label class="form-check-label text-center" for="showEmail">Mostra el meu correu electrònic al meu perfil</label>';
											echo '</div>';
											echo '<div class="form-group form-switch">';
												echo '<input type="checkbox" class="form-check-input mx-2" role="switch" id="showDob" name="showDob" ' . ($user['show_dob'] ? 'checked' : '') . '>';
												echo '<label class="form-check-label text-center" for="showDob">Mostra la meva data de naixement al meu perfil</label>';
											echo '</div>';
											echo '<div class="form-group form-switch">';
												echo '<input type="checkbox" class="form-check-input mx-2" role="switch" id="showFullname" name="showFullname" ' . ($user['show_fullname'] ? 'checked' : '') . '>';
												echo '<label class="form-check-label text-center" for="showFullname">Mostra el meu nom complet al meu perfil</label>';
											echo '</div>';
											echo '<div class="form-group form-switch">';
												echo '<input type="checkbox" class="form-check-input mx-2" role="switch" id="showBio" name="showBio" ' . ($user['show_bio'] ? 'checked' : '') . '>';
												echo '<label class="form-check-label text-center" for="showBio">Mostra la meva biografia al meu perfil</label>';
											echo '</div>';
											echo '<div class="form-group form-switch">';
												echo '<input type="checkbox" class="form-check-input mx-2" role="switch" id="showSocial" name="showSocial" ' . ($user['show_social'] ? 'checked' : '') . '>';
												echo '<label class="form-check-label text-center" for="showSocial">Mostra les meves xarxes socials al meu perfil</label>';
											echo '</div>';
											echo '<div class="form-group form-switch">';
												echo '<input type="checkbox" class="form-check-input mx-2" role="switch" id="sendNotifications" name="sendNotifications" ' . ($user['send_notifications'] ? 'checked' : '') . '>';
												echo '<label class="form-check-label text-center" for="sendNotifications">Rebre notificacions dels esdeveniments als quals assisteixo</label>';
											echo '</div>';
											echo '<br/><button type="submit" class="btn btn-outline-dark mx-auto d-flex justify-content-center">Guardar canvis</button>';
										echo '</form>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
							// #endregion
						echo '</div>';
					echo '</div>';
				}



			} else {
				header('Location: ' . INDEX_URL);
			}
		?>






		<?php
			echo "<script src='" . SCRIPT_JS . "'></script>";
			include_once SCRIPTS_CDN_BODY;
		?>
	</body>
</html>