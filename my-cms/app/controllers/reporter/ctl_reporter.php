<?php
    include_once MDL_DATABASE;
    require MDL_USER;
    require MDL_REPORTERS;
    require_once STATUS_404;


    function reporter_panel() {
        $stmt = get_users();
        $stmt_categories = mdl_get_categories();

        foreach ($stmt as $row) {
            $users[] = array(
                'id' => $row['id'],
                'username' => $row['nick'],
                'fullname' => $row['fullname'],
                'dob' => $row['dob'],
                'mail' => $row['mail'],
                'avatar' => $row['img'],
                'bio' => $row['bio'],
            );
        }

        foreach ($stmt_categories as $row) {
            $categories[] = array(
                'id' => $row['id'],
                'name' => $row['name'],
                'description' => $row['description'],
            );
        }

        include_once REPORTER_VIEW;
    }

    function create_post($title, $tags, $content, $image) {
        $stmt = mdl_create_post($title, $tags, $content, $_SESSION['username'], $image);
        if ($stmt) {
            header('Location: '. INDEX_URL . '?action=posts');
        } else {
            echo 'Error al crear el post';
            status_404();
        }
    }

    function create_category($name, $description) {
        $stmt = mdl_create_category($name, $description);
        if ($stmt) {
            header('Location: '. INDEX_URL . '?action=reporter_panel&view');
        } else {
            echo 'Error al crear la categoria';
            status_404();
        }
    }