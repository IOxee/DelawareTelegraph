<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php
			echo "<link rel='stylesheet' type='text/css' href='" . STYLES_USERPROFILE . "'>";
			/**
			 * Bootstrap CSS
			 */
			echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">';

			/**
			 * Font Awesome CSS
			 */
			echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer"/>';

			/**
			 * SweetAlert2 CSS
			 */
			echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.15/sweetalert2.css" integrity="sha512-JzSVRb7c802/njMbV97pjo1wuJAE/6v9CvthGTDxiaZij/TFpPQmQPTcdXyUVucsvLtJBT6YwRb5LhVxX3pQHQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />';

			/**
			 * Tempus Dominus CSS
			 */
			echo '<link href="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@master/dist/css/tempus-dominus.css" rel="stylesheet" crossorigin="anonymous">';
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
					if ($users_content['username'] == $_SESSION['username']) {
						$user = $users_content;
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
									echo '<span class="bg-dark text-white p-1 px-4 rounded">Pro</span>';
									echo '<h5 class="mt-2 mb-0">' . $user['fullname'] . '</h5>';
									// echo '<p>NO JOB</p>';
								echo '</div>';

								echo '<div class="px-4 mt-1">';
									echo '<p class="fonts text-center">' . $user['bio'] . '</p>';
								echo '</div>';

								if ($user['social_media'] != NULL || $user['social_media'] != '') {
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

								echo '<div class="buttons text-center">';
									echo '<a href="' . INDEX_URL . '?action=profile&editprofile=true" class="btn btn-outline-dark px-4">Editar perfil</a>';
									if ($_SESSION['level'] > 0) {
										echo '<form action="index.php?action=profile&changepass=true" method="post">';
											echo '<button class="btn btn-outline-dark px-4 ms-3" id="changePassword">Canviar contrasenya</button>';
										echo '</form>';
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
							echo '<div class="col-md-6 mx-auto">';
								echo '<div class="card">';
									echo '<div class="card-body">';
										echo '<h3 class="card-title text-center">Editar perfil</h3>';
										echo '<form action="' . INDEX_URL . '?action=editprofile" method="post" enctype="multipart/form-data">';
											echo '<h5 class="card-title text-center">Dades del Perfil</h5>';
											echo '<div class="form-group">';
												echo '<label for="name">Nombre</label>';
												echo '<input type="text" class="form-control my-2 border border-dark" id="username" name="username" placeholder="Nickname" value="' . $user['username'] . '" disabled=true>';
											echo '</div>';
											echo '<div class="form-group">';
												echo '<label for="surname">Nombre completo</label>';
												echo '<input type="text" class="form-control my-2 border border-dark" id="fullname" name="fullname" placeholder="Nombre completo" value="' . $user['fullname'] . '">';
											echo '</div>';
											echo '<div class="form-group">';
												echo '<label for="email">E-Mail</label>';
												echo '<input type="email" class="form-control my-2 border border-dark" id="email" name="mail" placeholder="mail" value="' . $user['mail'] . '" required=true>';
											echo '</div>';
											echo '<div class="form-group">';
												echo '<label for="birthdate">Fecha de nacimiento</label>';
												echo '<input type="date" class="form-control my-2 border border-dark" id="dob" name="dob" value="' . $user['dob'] . '" required=true>';
											echo '</div>';
											echo '<div class="form-group">';
												echo '<label for="profilePicture">Foto de perfil</label>';
												echo '<input type="text" class="form-control my-2 border border-dark" id="profilePicture" name="img">';
											echo '</div>';
											echo '<div class="form-group">';
												echo '<label for="textareaBio">Biografía</label>';
												echo '<textarea class="form-control my-2 border border-dark" id="textareaBio" name="bio" rows="3">' . $user['bio'] . '</textarea>';
											echo '</div>';


											echo '<br/><h5 class="card-title text-center">Redes sociales</h5>';
											echo '<div class="form-group">';
												echo '<label for="linkedin">Linkedin</label>';
												echo '<input type="text" class="form-control my-2 border border-dark" id="linkedin" name="linkedin" placeholder="Linkedin" value="' . $user['social_media']['linkedin'] . '">';
											echo '</div>';
											echo '<div class="form-group">';
												echo '<label for="github">Github</label>';
												echo '<input type="text" class="form-control my-2 border border-dark" id="github" name="github" placeholder="Github" value="' . $user['social_media']['github'] . '">';
											echo '</div>';
											echo '<div class="form-group">';
												echo '<label for="twitter">Twitter</label>';
												echo '<input type="text" class="form-control my-2 border border-dark" id="twitter" name="twitter" placeholder="Twitter" value="' . $user['social_media']['twitter'] . '">';
											echo '</div>';
											echo '<div class="Form-group">';
												echo '<label for="instagram">Instagram</label>';
												echo '<input type="text" class="form-control my-2 border border-dark" id="instagram" name="instagram" placeholder="Instagram" value="' . $user['social_media']['instagram'] . '">';
											echo '</div>';
											echo '<div class="form-group">';
												echo '<label for="facebook">Facebook</label>';
												echo '<input type="text" class="form-control my-2 border border-dark" id="facebook" name="facebook" placeholder="Facebook" value="' . $user['social_media']['facebook'] . '">';
											echo '</div>';
											echo '<br/><button type="submit" class="btn btn-outline-dark mx-auto d-flex justify-content-center">Guardar cambios</button>';
										echo '</form>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				}
			} else {
				header('Location: ' . INDEX_URL);
			}
		?>






		<?php
			echo "<script src='" . SCRIPT_JS . "'></script>";
			/**
			 * Bootstrap JS
			 */
			echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>';

			/**
			 * Font Awesome JS
			 */
			echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>';

			/**
			 * SweetAlert2 JS
			 */
			echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.15/sweetalert2.min.js" integrity="sha512-Z4QYNSc2DFv8LrhMEyarEP3rBkODBZT90RwUC7dYQYF29V4dfkh+8oYZHt0R6T3/KNv32/u0W6icGWUUk9V0jA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>';

			/**
			 * Popper JS
			 */
			echo '<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" crossorigin="anonymous"></script>';

			/**
			 * Tempus Dominus JS
			 */
			echo '<script src="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@master/dist/js/tempus-dominus.js" crossorigin="anonymous"></script>';
		?>
	</body>
</html>