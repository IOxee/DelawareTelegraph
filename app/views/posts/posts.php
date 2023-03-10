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
				echo '<div class="container-fluid mt-3">';
                    if (isset($_GET['action']) && ($_GET['action'] == 'posts_category')) {
                        echo '<a href="' . INDEX_URL . '?action=categories" class="btn btn-outline-dark btn-sm my-2 mx-auto">'.POSTS_GO_BACK_CATEGORIES.'</a>';
                    }
					foreach ($posts as $post) {
					echo '<div style="display: flex; flex-wrap: nowrap; justify-content: center; flex-direction: row" class="center">';
						echo '<div class="card" style="width: 18rem; margin: 5px;">';
							echo '<img src="' . $post['image'] . '" class="card-img-top" alt="...">';
							echo '<div class="card-body">';
								echo '<h5 class="card-title">' . $post['title'] . '</h5>';
								echo '<p class="card-text max-lines">' . $post['content'] . '</p>';
								echo '<p class="card-text">';
                                    echo '<i class="fas fa-user mx-2"></i><small class="text-muted">' . $post['author'] . '</small>';
                                    echo '<i class="fas fa-clock mx-2"></i><small class="text-muted">' . $post['time'] . '</small>';
                                echo '</p>';
								foreach ($post['tags'] as $tag) {
									echo '<span class="badge bg-dark text-white mx-1">' . $tag . '</span>';
								}
								echo '<br/><a href="' . INDEX_URL . '?action=post&id=' . $post['id'] . '" class="btn btn-outline-dark my-2">'.POSTS_VIEW_MORE.'</a>';
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