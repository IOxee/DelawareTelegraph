<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php
			echo "<link rel='stylesheet' type='text/css' href='" . STYLES . "'>";
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

				/**
				 * Main Content
				 */
				echo '<div class="container-fluid">';
					echo '<img src="' . LOGO_POSTS . '" class="rounded mx-auto d-block col-3">';
					foreach ($posts as $post) {
						echo '<div style="display: flex; flex-wrap: nowrap; justify-content: center; flex-direction: row" class="center">';
						echo '<div class="card" style="width: 18rem; margin: 5px;">';
							echo '<img src="' . $post['image'] . '" class="card-img-top" alt="...">';
									echo '<div class="card-body">';
									echo '<h5 class="card-title">' . $post['title'] . '</h5>';
									echo '<p class="card-text max-lines">' . $post['content'] . '</p>';
									echo '<p class="card-text"><i class="fas fa-user mx-2"></i><small class="text-muted">' . $post['author'] . '</small><i class="fas fa-clock mx-2"></i><small class="text-muted">' . $post['time'] . '</small></p>';
									foreach ($post['tags'] as $tag) {
										echo '<span class="badge bg-dark text-white mx-1">' . $tag . '</span>';
									}
									echo '<br/><a href="' . INDEX_URL . '?action=post&id=' . $post['id'] . '" class="btn btn-outline-dark my-2">Ver más</a>';
								echo '</div>';
							echo '</div>';
					}

					echo '</div>';
				echo '</div>';
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