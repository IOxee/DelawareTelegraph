<?php
    defined('MY_CMS') or die('Permission denied');

    require_once MDL_DATABASE;
    require_once MDL_POSTS;
    require_once MDL_REPORTERS;
    require_once MDL_USER;
    require_once MDL_ADMIN;

    function admin_panel() {
        if (isset($_GET['dashboard'])) {
            $q_posts = get_posts_quantity();
            $q_users = get_users_quantity();
            $q_categories = get_categories_quantity();
            $q_admins = get_admins_quantity();

            if ($q_users != 0) { $q_users = $q_users[0]["COUNT(*)"]; }
            if ($q_posts != 0) { $q_posts = $q_posts[0]["COUNT(*)"]; }
            if ($q_categories != 0) { $q_categories = $q_categories[0]["COUNT(*)"]; }
            if ($q_admins != 0) { $q_admins = $q_admins[0]["COUNT(*)"]; }

            $last_posts = get_last_posts();
        }

        if (isset($_GET['users']) || isset($_GET['admins'])) {
            $registered_users = get_registered_users();
        }

        if (isset($_GET['posts'])) {
            $all_posts = get_posts();
        }

        include_once ADMIN_PANEL_VIEW;
    }

    function set_user($id, $level) {
        $stmt_user = mdl_get_user_by_id($id);

        if ($stmt_user[0]['nick'] == $_SESSION['username']) {
            echo "No puedes cambiar tu propio nivel";
            header("Refresh: 1; url=" . INDEX_URL . "?action=apanel&dashboard");
        } else {
            $stmt = mdl_set_user($id, $level);
            if ($stmt) {
                header("Location: " . INDEX_URL . "?action=posts");
            } else {
                echo "Error al cambiar el nivel del usuario";
            }
        }


    }

    function delete_user($id) {
        $stmt = mdl_delete_user($id);
        if ($stmt) {
            header("Location: " . INDEX_URL . "?apanel&dashboard");
        } else {
            echo "Error al eliminar el usuario";
        }
    }