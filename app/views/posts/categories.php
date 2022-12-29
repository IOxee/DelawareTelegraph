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
			defined('MY_CMS') or die('Permission denied');

			if (isset($_SESSION['username'])) {
				require_once NAVBAR_VIEW;
				echo navbar();

				/**
				 * Main Content
				 */
				echo '<div class="container-fluid">';
					echo '<img src="' . LOGO_POSTS . '" class="rounded mx-auto d-block col-3">';
					foreach ($categories as $category) {
					echo '<div style="display: flex; flex-wrap: nowrap; justify-content: center; flex-direction: row" class="center">';
						echo '<div class="card" style="width: 18rem; margin: 5px;">';
                            if ($category['image'] != '' || $category['image'] != NULL) {
                                echo '<img src="' . $category['image'] . '" class="card-img-top" alt="...">';
                            } else {
                                echo '<p class="card-img-top text-center mt-3">Imagen no disponible</p>';
                            }
                            echo '<div class="card-body">';
                                echo '<h5 class="card-title">' . $category['name'] . '</h5>';
                                echo '<p class="card-text max-lines" style="height:120px">' . $category['description'] . '</p>';
                                echo '<a href="' . INDEX_URL . '?action=posts_category&id=' . $category['id'] . '" class="btn btn-outline-dark">Veure més</a>';
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