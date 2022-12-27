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
						echo '<a href="' . INDEX_URL . '?action=posts" class="btn btn-outline-dark my-1"><i class="fa-solid fa-arrow-left"></i> Tornar</a>';
						if (isset($_SESSION['username'])) {
							if ($_SESSION['username'] == $post['author'] || $_SESSION['level'] == 10) {
								// este grupo de botones tiene que ir a la derecha de la pantalla
								echo '<div class="float-end">';
									echo '<a href="' . INDEX_URL . '?action=editpost&id=' . $post['id'] . '" class="btn btn-outline-dark my-3"><i class="fa-solid fa-edit"></i> Editar</a>';
									echo '<a href="' . INDEX_URL . '?action=deletepost&id=' . $post['id'] . '" class="btn btn-outline-dark my-3 mx-2"><i class="fa-solid fa-trash"></i> Eliminar</a>';
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
						echo '<p class="text-end">Publicat per: ' . $post['author'] . '<br/> Posat en: ' . $post['time'] . '</p>';
						foreach ($post['tags'] as $tag) {
							echo '<badge class="badge bg-dark text-white float-end mx-1">' . $tag . '</a></badge>';
						}
					echo '</div>';
				echo '</div>';
			echo '</div>';

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