<?php
    function status_404(){
        echo '<img src="../../assets/img/404.png" alt="D\'oh" width="100%" height="100%">';
        if ($_SESSION['username']) {
            echo '<a href="./index.php?action=posts" class="btn btn-outline-dark">'.PAGE_NOT_BUTTON_GO_BACK.'</a>';
        } else {
            echo '<a href="./index.php" class="btn btn-outline-dark">'.PAGE_NOT_BUTTON_GO_BACK.'</a>';
        }
    }

    function status_toast($title, $msg) {
        echo '<div class="toast-container position-static">
                <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <strong class="me-auto">' . $title . '</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">' . $msg . '</div>
                </div>
            </div>';

    }
