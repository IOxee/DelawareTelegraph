<?php
    defined('MY_CMS') or die('Permission denied');

    include_once MDL_DATABASE;
    require MDL_USER;
    require MDL_REPORTERS;
    require_once STATUS_404;


    function reporter_panel() {
        $stmt = get_users();
        $stmt_categories = mdl_reporter_get_categories();

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

    function create_post($title, $tags, $content, $image, $category) {
        $stmt = mdl_create_post($title, $tags, $content, $_SESSION['username'], $image, $category);
        if ($stmt) {
            header('Location: '. INDEX_URL . '?action=posts');
        } else {
            echo ERROR_TO_CREATE_POST;
            status_404();
        }
    }

    function create_category($name, $description, $image) {
        $stmt = mdl_create_category($name, $description, $image);
        if ($stmt) {
            header('Location: '. INDEX_URL . '?action=reporter_panel&view');
        } else {
            echo ERROR_TO_CREATE_CATEGORY;
            status_404();
        }
    }

    function reporters_profile() {
        // Quiero coger todos los usuarios que tengan un level igual a 5
        $stmt = mdl_get_reporters();
        foreach ($stmt as $row) {
            $reporters[] = array(
                'id' => $row['id'],
                'username' => $row['nick'],
                'fullname' => $row['fullname'],
                'dob' => $row['dob'],
                'mail' => $row['mail'],
                'avatar' => $row['img'],
                'bio' => $row['bio'],
            );
        }

        include_once REPORTERS_PROFILES;
    }