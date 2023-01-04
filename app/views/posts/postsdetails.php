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
			require_once NAVBAR_VIEW;
			echo navbar();

			/**
			 * Main Content
			 */
			$post = [];
			foreach ($posts as $post_content) {
				$post = $post_content;
			}


			echo '<div class="container">';
				echo '<div class="row">';
					echo '<div class="col-12">';
						echo '<a href="' . INDEX_URL . '?action=posts" class="btn btn-outline-dark my-1"><i class="fa-solid fa-arrow-left"></i> '.POST_DETAILS_GO_BACK_POSTS.'</a>';
						if (isset($_SESSION['username'])) {
							if ($_SESSION['username'] == $post['author'] || $_SESSION['level'] == ADMIN_LEVEL) {
								echo '<div class="float-end">';
									echo '<a href="' . INDEX_URL . '?action=post&id=' . $post['id'] . '&editpost=true" class="btn btn-outline-dark my-3"><i class="fa-solid fa-edit"></i> '.POST_DETAILS_EDIT_BUTTON.'</a>';
									echo '<a href="' . INDEX_URL . '?action=deletepost&id=' . $post['id'] . '" class="btn btn-outline-dark my-3 mx-2"><i class="fa-solid fa-trash"></i> '.POST_DETAILS_DELETE_BUTTON.'</a>';
								echo '</div>';
							}
						}
					echo '</div>';
				echo '</div>';

				echo '<div class="row">';
					echo '<div class="col-12">';
						echo '<h1 class="text-center">' . $post['title'] . '</h1>';
						echo '<p class="">' . $post['content'] . '</p>';
						echo '<img src="' . $post['header_image'] . '" alt="Post Image" class="img-fluid mx-auto d-block">';
						echo '<p class="text-end">' . POST_DETAILS_POSTED_BY . $post['author'] . '<br/>'. POST_DETAILS_POSTED_ON . $post['time'] . '</p>';
						foreach ($post['tags'] as $tag) {
							echo '<badge class="badge bg-dark text-white float-end mx-1">' . $tag . '</a></badge>';
						}
						echo '<div class="mb-5"></div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

			if (isset($_GET['editpost']) && $_GET['editpost'] == true) {
				echo '<div class="container" id="editpost">';
					echo '<div class="row">';
						echo '<div class="col-12 border border-dark rounded-2 mt-4">';
							echo '<h2 class="m-1">'.POSTS_DETAILS_EDIT_TITLE.'</h2>';
							echo '<form action="' . INDEX_URL . '?action=editpost&id=' . $post['id'] . '" method="POST" enctype="multipart/form-data">';
								echo '<div class="mb-3">';
									echo '<label for="title" class="form-label mt-4"><b>'.POSTS_DETAILS_EDIT_NAME.'</b></label>';
									echo '<input type="text" class="form-control border border-dark" id="title" name="title" value="' . $post['title'] . '"></input>';
								echo '</div>';
								echo '<div class="mb-3">';
									echo '<label for="content" class="form-label"><b>'.POSTS_DETAILS_EDIT_CONTENT.'</b></label>';
									echo '<textarea class="form-control border border-dark" id="content" name="content" rows="3">' . $post['content'] . '</textarea>';
								echo '</div>';
								echo '<div class="mb-3">';
									echo '<label for="image" class="form-label"><b>'.POSTS_DETAILS_EDIT_IMG.'</b></label>';
									echo '<input class="form-control border border-dark" type="text" id="image" name="image" value="' . $post['header_image'] . '"></input>';
								echo '</div>';
								echo '<div class="mb-3">';
									echo '<label for="tags" class="form-label"><b>'.POSTS_DETAILS_EDIT_TAGS.'</b></label>';
									$tags = implode(',', $post['tags']);
									echo '<input type="text" class="form-control border border-dark" id="tags" name="tags" value="' . $tags . '">';
								echo '</div>';
								echo '<button type="submit" class="btn btn-outline-dark mb-4"><b>'.POSTS_DETAILS_EDIT_BUTTON.'</b></button>';
							echo '</form>';
						echo '</div>';
						echo '<div class="col-12">';
							echo '<a href="' . INDEX_URL . '?action=post&id=' . $post['id'] . '" class="btn btn-outline-dark my-3"><i class="fa-solid fa-arrow-left"></i> '.POSTS_DETAILS_BUTTON_GO_BACK.'</a>';
						echo '</div>';
					echo '</div>';
				echo '</div>';

				echo '<script>var editPost = document.getElementById("editpost");'
				. 'window.scrollTo(100, editPost.scrollHeight);</script>';
			}

			include_once FOOTER_VIEW;
			footer_view();

			echo "<script src='" . SCRIPT_JS . "'></script>";
			include_once SCRIPTS_CDN_BODY;
		?>
	</body>
</html>