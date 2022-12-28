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

                /**
                 * Report Panel
                 */
                echo '<div class="container-fluid my-6">';
                    echo '<div class="row">';
                        echo '<div class="col-12 col-md-3 col-lg-2">';
                            echo '<div class="list-group" id="list-tab" role="tablist">';
                                echo '<a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="home">Inicio</a>';
                                echo '<a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Perfil Publico</a>';
                                echo '<a class="list-group-item list-group-item-action disabled" id="list-settings-list" data-bs-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Ajustes</a>';
                            echo '</div>';
                        echo '</div>';
                        echo '<div class="col-12 col-md-9 col-lg-10">';
                            echo '<div class="tab-content" id="nav-tabContent">';
                                // #region Inicio
                                echo '<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">';
                                    echo '<div class="container-fluid">';
                                        echo '<div class="row">';
                                            echo '<div class="col-12">';
                                                echo '<div class="mx-auto d-flex gap-3">';
                                                    echo '<div class="card my-3">';
                                                        echo '<div class="card-body">';
                                                            echo '<h5 class="card-title">Visitas Globales de tus posts</h5>';
                                                            echo '<p class="card-text">Conoce las visitas que han tenido tus posts en el mes actual</p>';
                                                            echo '<a href="#" class="btn btn-outline-dark">Ver</a>';
                                                        echo '</div>';
                                                    echo '</div>';

                                                    echo '<div class="card my-3">';
                                                        echo '<div class="card-body">';
                                                            echo '<h5 class="card-title">Tiempo de los lectores</h5>';
                                                            echo '<p class="card-text">Conoce el tiempo que han pasado tus lectores en tus posts</p>';
                                                            echo '<a href="#" class="btn btn-outline-dark">Ver</a>';
                                                        echo '</div>';
                                                    echo '</div>';


                                                    echo '<div class="card my-3">';
                                                        echo '<div class="card-body">';
                                                            echo '<h5 class="card-title">Crear Post</h5>';
                                                            echo '<p class="card-text">Crea un nuevo post para tu blog</p>';
                                                            echo '<form action="' . INDEX_URL . '?action=reporter_panel&view&create_post=true" method="POST">';
                                                                echo '<button type="submit" class="btn btn-outline-dark">Crear</button>';
                                                            echo '</form>';
                                                        echo '</div>';
                                                    echo '</div>';

                                                    echo '<div class="card my-3">';
                                                        echo '<div class="card-body">';
                                                            echo '<h5 class="card-title">Crear Categoria</h5>';
                                                            echo '<p class="card-text">Crea una nueva categoria para tu blog</p>';
                                                            echo '<form action="' . INDEX_URL . '?action=reporter_panel&view&create_category=true" method="POST">';
                                                                echo '<button type="submit" class="btn btn-outline-dark">Crear</button>';
                                                            echo '</form>';
                                                        echo '</div>';
                                                    echo '</div>';
                                                echo '</div>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                                // #endregion

                                // #region Perfil Publico
                                echo '<div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">';
                                    echo '<div class="container-fluid">';
                                        echo '<div class="row">';
                                            foreach ($users as $user) {
                                                if ($user['username'] == $_SESSION['username']) {
                                                    echo '<header class="col-12">';
                                                        echo '<h1 class="">' . $user['fullname'] . ' Profile page</h1>';
                                                        echo '<hr>';
                                                    echo '</header>';

                                                    echo '<div class="col-12 col-md-6">';
                                                        if ($user['avatar'] == null) {
                                                            echo '<img src="' . DEFAULT_USER . '" alt="avatar" class="img-fluid" width=128 height=128>';
                                                        } else {
                                                            echo '<img src="' . $user['avatar'] . '" alt="avatar" class="img-fluid" width=128 height=128>';
                                                        }
                                                    echo '</div>';

                                                    echo '<div class="col-12 col-md-6">';
                                                        echo '<h2>Estadisticas</h2>';
                                                        echo '<hr>';
                                                        echo '<p>Posts: 20</p>';
                                                        echo '<p>Comentarios: 3</p>';
                                                        echo '<p>Visitas: 100k</p>';
                                                    echo '</div>';
                                                }
                                            }
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                                // #endregion
                            echo '</div>';



                        if (isset($_GET['create_post']) == true) {
                            echo '<h3 class="text-center">Crear Post</h3>';
                            echo '<form action="' . INDEX_URL . '?action=reporter_panel&create_post" method="POST">';
                                echo '<div class="mb-3">';
                                    echo '<label for="title" class="form-label">Titulo</label>';
                                    echo '<input type="text" class="form-control" id="title" name="title" placeholder="Titulo del post">';
                                echo '</div>';

                                echo '<div class="mb-3">';
                                    echo '<label for="tags" class="form-label">Tags</label>';
                                    echo '<input type="text" class="form-control" id="tags" name="tags" placeholder="Tag1, Tag2, Tag3">';
                                echo '</div>';

                                echo '<div class="mb-3">';
                                    echo '<label for="content" class="form-label">Contenido</label>';
                                    echo '<textarea class="form-control" id="content" name="content" rows="3"></textarea>';
                                echo '</div>';

                                echo '<div class="mb-3">';
                                    echo '<label for="image" class="form-label">Imagen</label>';
                                    echo '<input class="form-control" type="text" id="image" name="image" placeholder="https://i.imgur.com/xxxxx">';
                                echo '</div>';

                                echo '<button type="submit" class="btn btn-outline-dark">Crear</button>';
                            echo '</form>';
                        }

                        if (isset($_GET['create_category']) == true) {
                            echo '<h3 class="text-center">Crear Categoria</h3>';
                            echo '<form action="' . INDEX_URL . '?action=reporter_panel&create_category" method="POST">';
                                echo '<div class="mb-3">';
                                    echo '<label for="name" class="form-label">Nombre</label>';
                                    echo '<input type="text" class="form-control" id="name" name="category_name" placeholder="Nombre de la categoria">';
                                echo '</div>';

                                echo '<div class="mb-3">';
                                    echo '<label for="description" class="form-label">Descripcion</label>';
                                    echo '<textarea class="form-control" id="description" name="description" rows="3"></textarea>';
                                echo '</div>';

                                echo '<button type="submit" class="btn btn-outline-dark">Crear</button>';
                            echo '</form>';
                        }


                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
		?>






		<?php
			echo "<script src='" . SCRIPT_JS . "'></script>";
			include_once SCRIPTS_CDN_BODY;
		?>
	</body>
</html>