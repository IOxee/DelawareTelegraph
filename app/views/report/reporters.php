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
			echo "<link rel='stylesheet' type='text/css' href='" . STYLES . "'>";
			include_once STYLES_CDN_HEADERS;
		?>
		<title>My CMS</title>
	</head>
	<body>
		<?php
			if (isset($_SESSION['username'])) {
				require_once NAVBAR_VIEW;
				echo navbar();

				/**
				 * Main Content
				 */
				echo '<div class="container-fluid">';
					echo '<img src="' . REPORTERS_LOGO . '" class="rounded mx-auto d-block col-3">';
					foreach ($reporters as $reporter) {
					echo '<div style="display: flex; flex-wrap: nowrap; justify-content: center; flex-direction: row" class="center">';
						echo '<div class="card" style="width: 18rem; margin: 5px;">';
                            if ($reporter['avatar'] != null || $reporter['avatar'] != '') {
                                echo '<img src="' . $reporter['avatar'] . '" class="card-img-top" alt="...">';
                            } else {
                                echo '<img src="' . DEFAULT_USER . '" class="card-img-top" alt="...">';
                            }
							echo '<div class="card-body">';
								echo '<h5 class="card-title">' . $reporter['username'] . '</h5>';
								echo '<p class="card-text max-lines">' . $reporter['bio'] . '</p>';
								echo '<p class="card-text"><a href="mailto:' . $reporter['mail'] . '" class="btn btn-sm btn-outline-dark px-4 mb-3"><i class="fas fa-envelope mx-2"></i>Enviar Missatge</a></p>';
                                echo '<form action="' . INDEX_URL . '" method="get">';
                                    echo '<input type="hidden" name="action" value="profile_id">';
                                    echo '<input type="hidden" name="id" value="' . $reporter['id'] . '">';
                                    echo '<button type="submit" class="btn btn-outline-dark">Veure el perfil</button>';
							echo '</div>';
						echo '</div>';
					}
					echo '</div>';
				echo '</div>';
			} else {
				header('Location: ' . INDEX_URL);
			}

			echo "<script src='" . SCRIPT_JS . "'></script>";
			include_once SCRIPTS_CDN_BODY;
		?>
	</body>
</html>