<?php
    defined('MY_CMS') or die('Permission denied');

    function footer_view() {
        // el footer tiene que ocupar el 100% del ancho de la página, contener un logo de la empresa y un enlace a la página de posts si esta logeado o no (si no esta logeado, el enlace debe llevar pagina principal) con el copyrights y el project-author
        echo '<footer class="navbar navbar-expand-lg navbar-light bg-light">';
            echo '<div class="container-fluid">';
                echo '<div class="float-left">';
                    echo '<img src="' . LOGO . '" alt="logo" class="img-fluid" width="250">';
                echo '</div>';
                echo '<div class="float-left text-center mr-3">';
                    if (date('Y') == 2022) {
                        echo '<p> &copy; '. date('Y') .' '. PROJECT_AUTHOR .'</p>';
                    } else if (date('Y') > 2022) {
                        echo '<p> &copy; 2022 - '. date('Y') .' '. PROJECT_AUTHOR .'</p>';
                    }
                echo '</div>';
                echo '<div class="float-right">';
                    if (isset($_SESSION['username'])) {
                        echo '<a href="'. INDEX_URL .'?action=posts" class="btn btn-outline-dark"><i class="fa-solid fa-house mx-2">'.FOOTER_BUTTON_GO_BACK.'</i></a>';
                    } else {
                        echo '<a href="'. INDEX_URL .'" class="btn btn-outline-dark"><i class="fa-solid fa-house mx-2">'.FOOTER_BUTTON_GO_BACK.'</i></a>';
                    }
                echo '</div>';
            echo '</div>';
        echo '</footer>';
    }