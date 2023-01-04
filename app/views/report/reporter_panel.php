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

                /**
                 * Report Panel
                 */
                echo '<div class="container-fluid my-6">';
                    echo '<div class="row">';
                        echo '<div class="col-12 col-md-3 col-lg-2">';
                            echo '<div class="list-group" id="list-tab" role="tablist">';
                                echo '<a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="home">'.REPORT_PANEL_HOME_BUTTON.'</a>';
                                echo '<a class="list-group-item list-group-item-action disabled" id="list-settings-list" data-bs-toggle="list" href="#list-settings" role="tab" aria-controls="settings">'.REPORT_PANEL_CONFIG_BUTTON.'</a>';
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
                                                            echo '<h5 class="card-title">'.REPORT_PANEL_DASHBOARD_MY_POSTS.'</h5>';
                                                            echo '<p class="card-text">'.REPORT_PANEL_DASHBOARD_MY_POSTS_VISITS.'</p>';
                                                            echo '<a class="btn btn-outline-dark"><i class="far fa-eye mx-2"></i>'.REPORT_PANEL_DASHBOARD_MY_POSTS_VISITS_QUANTITY.'</a>';
                                                        echo '</div>';
                                                    echo '</div>';

                                                    echo '<div class="card my-3">';
                                                        echo '<div class="card-body">';
                                                            echo '<h5 class="card-title">'.REPORT_PANEL_DASHBOARD_LECTORS_TIME.'</h5>';
                                                            echo '<p class="card-text">'.REPORT_PANEL_DASHBOARD_LECTORS_TIME_VISITS.'</p>';
                                                            echo '<a class="btn btn-outline-dark"><i class="fa-solid fa-clock mx-2"></i>'.REPORT_PANEL_DASHBOARD_LECTORS_TIME_VISITS_QUANTITY.'</a>';
                                                        echo '</div>';
                                                    echo '</div>';


                                                    echo '<div class="card my-3">';
                                                        echo '<div class="card-body">';
                                                            echo '<h5 class="card-title">'.REPORT_PANEL_DASHBOARD_CREATE_POST.'</h5>';
                                                            echo '<p class="card-text">'.REPORT_PANEL_DASHBOARD_CREATE_POST_VISITS.'</p>';
                                                            echo '<form action="' . INDEX_URL . '?action=reporter_panel&view&create_post=true" method="POST">';
                                                                echo '<button type="submit" class="btn btn-outline-dark"><i class="fa-solid fa-receipt mx-2"></i>'.REPORT_PANEL_DASHBOARD_CREATE_POST_VISITS_QUANTITY.'</button>';
                                                            echo '</form>';
                                                        echo '</div>';
                                                    echo '</div>';

                                                    echo '<div class="card my-3">';
                                                        echo '<div class="card-body">';
                                                            echo '<h5 class="card-title">'.REPORT_PANEL_DASHBOARD_CREATE_CATEGORY.'</h5>';
                                                            echo '<p class="card-text">'.REPORT_PANEL_DASHBOARD_CREATE_CATEGORY_VISITS.'</p>';
                                                            echo '<form action="' . INDEX_URL . '?action=reporter_panel&view&create_category=true" method="POST">';
                                                                echo '<button type="submit" class="btn btn-outline-dark"><i class="fa-solid fa-folder mx-2"></i>'.REPORT_PANEL_DASHBOARD_CREATE_CATEGORY_VISITS_QUANTITY.'</button>';
                                                            echo '</form>';
                                                        echo '</div>';
                                                    echo '</div>';
                                                echo '</div>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                                // #endregion
                            echo '</div>';



                            if (isset($_GET['create_post']) == true) {
                                echo '<h3 class="text-center">'.REPORT_PANEL_CREATE_POST_TITLE.'</h3>';
                                echo '<form action="' . INDEX_URL . '?action=reporter_panel&create_post" method="POST">';
                                    echo '<div class="mb-3">';
                                        echo '<label for="title" class="form-label">'.REPORT_PANEL_CREATE_POST_NAME.'</label>';
                                        echo '<input type="text" class="form-control" id="title" name="title" placeholder="'.REPORT_PANEL_CREATE_POST_NAME_PLACEHOLDER.'">';
                                    echo '</div>';

                                    echo '<div class="mb-3">';
                                        echo '<label for="tags" class="form-label">'.REPORT_PANEL_CREATE_POST_TAGS.'</label>';
                                        echo '<input type="text" class="form-control" id="tags" name="tags" placeholder="'.REPORT_PANEL_CREATE_POST_TAGS_PLACEHOLDER.'">';
                                    echo '</div>';

                                    echo '<div class="mb-3">';
                                        echo '<label for="category" class="form-label">'.REPORT_PANEL_CREATE_POST_CATEGORY.'</label>';
                                        echo '<select class="form-select" id="category" name="category">';
                                            echo '<option selected>Selecciona una categoria</option>';
                                            foreach ($categories as $category) {
                                                echo '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
                                            }
                                        echo '</select>';
                                    echo '</div>';

                                    echo '<div class="mb-3">';
                                        echo '<label for="content" class="form-label">'.REPORT_PANEL_CREATE_POST_CONTENT.'</label>';
                                        echo '<div class="float-right">';
                                            echo '<small>'.REPORT_PANEL_CREATE_POST_CONTENT_PLACEHOLDER.'</small>';
                                        echo '</div>';
                                        echo '<textarea class="form-control" id="content" name="content" rows="3"></textarea>';
                                    echo '</div>';

                                    echo '<div class="mb-3">';
                                        echo '<label for="image" class="form-label">'.REPORT_PANEL_CREATE_POST_IMG.'</label>';
                                        echo '<input class="form-control" type="text" id="image" name="image" placeholder="'.REPORT_PANEL_CREATE_POST_IMG_PLACEHOLDER.'">';
                                    echo '</div>';

                                    echo '<button type="submit" class="btn btn-outline-dark"><i class="fa-solid fa-receipt mx-2"></i>'.REPORT_PANEL_CREATE_POST_BUTTON.'</button>';
                                echo '</form>';
                            }

                            if (isset($_GET['create_category']) == true) {
                                echo '<h3 class="text-center">'.REPORT_PANEL_CREATE_CATEGORY_TITLE.'</h3>';
                                echo '<form action="' . INDEX_URL . '?action=reporter_panel&create_category" method="POST">';
                                    echo '<div class="mb-3">';
                                        echo '<label for="name" class="form-label">'.REPORT_PANEL_CREATE_CATEGORY_NAME.'</label>';
                                        echo '<input type="text" class="form-control" id="name" name="category_name" placeholder="'.REPORT_PANEL_CREATE_CATEGORY_NAME_PLACEHOLDER.'">';
                                    echo '</div>';

                                    echo '<div class="mb-3">';
                                        echo '<label for="image" class="form-label">'.REPORT_PANEL_CREATE_CATEGORY_IMG.'</label>';
                                        echo '<input class="form-control" type="text" id="image" name="image" placeholder="'.REPORT_PANEL_CREATE_CATEGORY_IMG_PLACEHOLDER.'">';
                                    echo '</div>';

                                    echo '<div class="mb-3">';
                                        echo '<label for="description" class="form-label">'.REPORT_PANEL_CREATE_CATEGORY_DESCRIPTION.'</label>';
                                        echo '<textarea class="form-control" id="description" name="description" rows="3"></textarea>';
                                    echo '</div>';

                                    echo '<button type="submit" class="btn btn-outline-dark"><i class="fa-solid fa-trailer mx-2"></i>'.REPORT_PANEL_CREATE_CATEGORY_BUTTON.'</button>';
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