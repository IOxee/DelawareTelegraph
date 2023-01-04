<?php
    defined('MY_CMS') or die('Permission denied');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="My CMS">
        <meta name="author" content=<?php echo PROJECT_AUTHOR ?>>
        <title>My CMS - Manager</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">

        <?php
            echo '<link rel="stylesheet" href="' . STYLES_CDN_HEADERS . '">';
            echo '<link rel="stylesheet" href="' . STYLES_ADMIN_DASHBOARD . '">';
        ?>

    </head>
    <body>
        <?php
            include_once NAVBAR_VIEW;
            echo navbar();

            /**
             * Sidebar
             */
            echo '<div class="container-fluid">';
                echo '<div class="row">';
                    echo '<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">';
                        echo '<div class="position-sticky">';
                            echo '<div class="sidebar-sticky">';
                                echo '<div class="d-flex justify-content-center">';
                                    echo '<img src="" alt="logo" class="img-fluid mb-3" style="width:100px">';
                                echo '</div>';
                                echo '<ul class="nav flex-column ml-3 mt-3 d-flex mx-auto" >';
                                    echo '<li class="nav-item my-2">';
                                        echo '<form action="' . INDEX_URL .'?action=apanel&dashboard" method="post">';
                                            echo '<button type="submit" class="btn btn-outline-dark border border-gray" id="btn_dashboard">';
                                                echo '<span class="ml-2"><i class="fa-solid fa-house mr-2"></i>'.DASHBOARD_BUTTON.'</span>';
                                                echo '';
                                            echo '</button>';
                                        echo '</form>';
                                    echo '</li>';

                                    echo '<li class="nav-item my-2">';
                                        echo '<form action="' . INDEX_URL . '?action=apanel&users" method="post">';
                                            echo '<button type="submit" class="btn btn-outline-dark border border-gray"  id="btn_users">';
                                                echo '<span class="ml-2"><i class="fa-solid fa-user mr-2"></i>'.USERS_BUTTON.'</span>';
                                            echo '</button>';
                                        echo '</form>';
                                    echo '</li>';

                                    echo '<li class="nav-item my-2">';
                                        echo '<form action="' . INDEX_URL . '?action=apanel&posts" method="post">';
                                            echo '<button type="submit" class="btn btn-outline-dark border border-gray"  id="btn_posts">';
                                                echo '<span class="ml-2"><i class="fa-solid fa-file mr-2"></i>'.POSTS_BUTTON.'</span>';
                                            echo '</button>';
                                        echo '</form>';
                                    echo '</li>';

                                    echo '<li class="nav-item my-2">';
                                        echo '<form action="' . INDEX_URL .  '?action=apanel&categories" method="post">';
                                            echo '<button type="submit" class="btn btn-outline-dark border border-gray"  id="btn_categories">';
                                                echo '<span class="ml-2"><i class="fa-solid fa-folder mr-2"></i>'.CATEGORIES_BUTTON.'</span>';
                                            echo '</button>';
                                        echo '</form>';
                                    echo '</li>';

                                    echo '<li class="nav-item my-2">';
                                        echo '<form action="' . INDEX_URL . '?action=apanel&admins" method="post">';
                                            echo '<button type="submit" class="btn btn-outline-dark border border-gray"  id="btn_admins">';
                                                echo '<span class="ml-2"><i class="fa-solid fa-users mr-2"></i>'.ADMINS_BUTTON.'</span>';
                                            echo '</button>';
                                        echo '</form>';
                                    echo '</li>';

                                    echo '<li class="nav-item my-2">';
                                        echo '<form action="' . INDEX_URL .'?action=apanel&integrations" method="post">';
                                            echo '<button type="submit" class="btn btn-outline-dark border border-gray"  id="btn_integrations">';
                                                echo '<span class="ml-2"><i class="fa-solid fa-layer-group mr-2"></i>'.INTEGRATIONS_BUTTON.'</span>';
                                            echo '</button>';
                                    echo '</li>';

                                    echo '<li class="nav-item fixed-bottom">';
                                        if (date("Y") == "2022") {
                                            echo '<p class="ml-2 text-dark text-center">© ' . date("Y") . ' - <a href="' . AUTHOR_URL . '" target="_blank">' . PROJECT_AUTHOR .  '</a></p>';
                                        } else {
                                            echo '<p class="ml-2 text-dark text-center">© 2022 - ' . date("Y") . ' - <a href="' . AUTHOR_URL . '" target="_blank">' . PROJECT_AUTHOR .  '</a></p>';
                                        }
                                    echo '</li>';
                                echo '</ul>';
                            echo '</div>';
                    echo '</div>';
                echo '</nav>';

                echo '<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">';
                    if (isset($_GET['dashboard'])) {
                        echo '<nav aria-label="breadcrumb">';
                            echo '<ol class="breadcrumb">';
                                echo '<li class="breadcrumb-item" href="' . INDEX_URL .'?action=apanel&dashboard">'.BREADCRUMB_HOME.'</li>';
                                echo '<li class="breadcrumb-item active" aria-current="page">'.BREADCRUMB_OVERVIEW.'</li>';
                            echo '</ol>';
                        echo '</nav>';


                        echo '<h2>'.DASHBOARD_TITLE.'</h2>';
                        echo '<p>'.DASHBOARD_DESCRIPTION.'</p>';
                        echo '<div class="row my-4">';
                            echo '<div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">';
                                echo '<div class="card">';
                                    echo '<h5 class="card-header">'.DASHBOARD_USERS_CARD_TITLE.'</h5>';
                                    echo '<div class="card-body">';
                                        echo '<h5 class="card-title">'. DASHBOARD_USERS_CARD_BODY . $q_users . '</h5>';
                                        echo '<a class="btn btn-outline-dark" href="' . INDEX_URL . '?action=apanel&users">'.DASHBOARD_USERS_CARD_BUTTON.'</a>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';

                            echo '<div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">';
                                echo '<div class="card">';
                                    echo '<h5 class="card-header">'.DASHBOARD_POSTS_CARD_TITLE.'</h5>';
                                    echo '<div class="card-body">';
                                        echo '<h5 class="card-title">'. DASHBOARD_POSTS_CARD_BODY . $q_posts . '</h5>';
                                        echo '<a class="btn btn-outline-dark" href="' . INDEX_URL . '?action=apanel&posts">'.DASHBOARD_POSTS_CARD_BUTTON.'</a>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';

                            echo '<div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">';
                                echo '<div class="card">';
                                    echo '<h5 class="card-header">'.DASHBOARD_CATEGORIES_CARD_TITLE.'</h5>';
                                    echo '<div class="card-body">';
                                        echo '<h5 class="card-title">'. DASHBOARD_CATEGORIES_CARD_BODY . $q_categories . '</h5>';
                                        echo '<a class="btn btn-outline-dark" href="' . INDEX_URL . '?action=categories">'.DASHBOARD_CATEGORIES_CARD_BUTTON.'</a>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';

                            echo '<div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">';
                                echo '<div class="card">';
                                    echo '<h5 class="card-header">'.DASHBOARD_ADMINS_CARD_TITLE.'</h5>';
                                    echo '<div class="card-body">';
                                        echo '<h5 class="card-title">' . DASHBOARD_ADMINS_CARD_BODY . $q_admins . '</h5>';
                                        echo '<a class="btn btn-outline-dark" href="' . INDEX_URL . '?action=apanel&admins">'.DASHBOARD_ADMINS_CARD_BUTTON.'</a>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';

                        echo '<div class="row">';
                            echo '<div class="col-12 col-xl-12 mb-4 mb-lg-0">';
                                echo '<div class="card">';
                                    echo '<h5 class="card-header">'.DASHBOARD_CARD_BODY_POSTS.'</h5>';
                                    echo '<div class="card-body">';
                                        echo '<div class="table-responsive">';
                                            echo '<table class="table">';
                                                echo '<thead>';
                                                echo '<tr>';
                                                    echo '<th scope="col">'.DASHBOARD_CARD_BODY_POSTS_ID.'</th>';
                                                    echo '<th scope="col">'.DASHBOARD_CARD_BODY_POSTS_TITLE.'</th>';
                                                    echo '<th scope="col">'.DASHBOARD_CARD_BODY_POSTS_AUTHOR.'</th>';
                                                    echo '<th scope="col">'.DASHBOARD_CARD_BODY_POSTS_DATE.'</th>';
                                                    echo '<th scope="col">'.DASHBOARD_CARD_BODY_POSTS_ACTIONS.'</th>';
                                                echo '</tr>';
                                                echo '</thead>';
                                                echo '<tbody>';
                                                    for ($i = 0; $i < count($last_posts); $i++) {
                                                        echo '<tr>';
                                                            echo '<th scope="row">' . $last_posts[$i]['postID'] . '</th>';
                                                            echo '<td>' . $last_posts[$i]['postTitle'] . '</td>';
                                                            echo '<td>' . $last_posts[$i]['postAuthor'] . '</td>';
                                                            echo '<td>' . $last_posts[$i]['postTime'] . '</td>';
                                                            echo '<td>';
                                                                echo '<a href="'. INDEX_URL . '?action=post&id=' . $last_posts[$i]['postID'] . '" class="btn btn-sm btn-outline-primary mr-2">'.DASHBOARD_CARD_BODY_POSTS_ACTIONS_VIEW.'</a>';
                                                                echo '<a href="'. INDEX_URL . '?action=post&id=' . $last_posts[$i]['postID'] . '&editpost=true" class="btn btn-sm btn-outline-dark mx-2">'.DASHBOARD_CARD_BODY_POSTS_ACTIONS_EDIT.'</a>';
                                                                echo '<a href="'. INDEX_URL . '?action=deletepost&id=' . $last_posts[$i]['postID'] . '" class="btn btn-sm btn-outline-danger mx-2">'.DASHBOARD_CARD_BODY_POSTS_ACTIONS_DELETE.'</a>';
                                                            echo '</td>';
                                                        echo '</tr>';
                                                    }
                                                echo '</tbody>';
                                            echo '</table>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }

                    if (isset($_GET['users'])) {
                        echo '<nav aria-label="breadcrumb">';
                            echo '<ol class="breadcrumb">';
                               echo '<li class="breadcrumb-item" href="' . INDEX_URL .'?action=apanel&dashboard">'.BREADCRUMB_HOME.'</li>';
                                echo '<li class="breadcrumb-item active" aria-current="page">'.USERS_BREADCRUMB.'</li>';
                            echo '</ol>';
                        echo '</nav>';


                        echo '<div class="row">';
                            echo '<div class="col-12 col-xl-12 mb-4 mb-lg-0">';
                                echo '<div class="card">';
                                    echo '<h5 class="card-header">'.USERS_CARD_BODY_TITLE.'</h5>';
                                    echo '<div class="card-body">';
                                        echo '<div class="table-responsive">';
                                            echo '<table class="table">';
                                                echo '<thead>';
                                                echo '<tr>';
                                                    echo '<th scope="col">'.USERS_CARD_BODY_ID.'</th>';
                                                    echo '<th scope="col">'.USERS_CARD_BODY_USERNAME.'</th>';
                                                    echo '<th scope="col">'.USERS_CARD_BODY_NAME.'</th>';
                                                    echo '<th scope="col">'.USERS_CARD_BODY_MAIL.'</th>';
                                                    echo '<th scope="col">'.USERS_CARD_BODY_DOB.'</th>';
                                                    echo '<th scope="col">'.USERS_CARD_BODY_ROLES.'</th>';
                                                    echo '<th scope="col">'.USERS_CARD_BODY_ACTIONS.'</th>';
                                                echo '</tr>';
                                                echo '</thead>';
                                                echo '<tbody>';
                                                    for ($i = 0; $i < count($registered_users); $i++) {
                                                        echo '<tr>';
                                                            echo '<th scope="row">' . $registered_users[$i]['id'] . '</th>';
                                                            echo '<td>' . $registered_users[$i]['nick'] . '</td>';
                                                            echo '<td>' . $registered_users[$i]['fullname'] . '</td>';
                                                            echo '<td>' . $registered_users[$i]['mail'] . '</td>';
                                                            echo '<td>' . $registered_users[$i]['dob'] . '</td>';
                                                            echo '<td>';
                                                                if ($registered_users[$i]['level'] < 5) {
                                                                    echo '<a href="'. INDEX_URL . '?action=setuser&id=' . $registered_users[$i]['id'] . '&reporter" class="btn btn-sm btn-outline-primary mx-2">'.USERS_CARD_BODY_REPORTERS_BUTTONS.'</a>';
                                                                }
                                                                if ($registered_users[$i]['level'] < ADMIN_LEVEL) {
                                                                    echo '<a href="'. INDEX_URL . '?action=setuser&id=' . $registered_users[$i]['id'] . '&admin" class="btn btn-sm btn-outline-dark mx-2">'.USERS_CARD_BODY_ADMINS_BUTTONS.'</a>';
                                                                }
                                                            echo '</td>';
                                                            echo '<td>';
                                                                echo '<a href="'. INDEX_URL . '?action=profile&id=' . $registered_users[$i]['id'] . '" class="btn btn-sm btn-outline-primary mr-2">'.USERS_CARD_BODY_VIEW_BUTTONS.'</a>';
                                                                echo '<a href="'. INDEX_URL . '?action=profile&id=' . $registered_users[$i]['id'] . '&editprofile=true" class="btn btn-sm btn-outline-dark mx-2">'.USERS_CARD_BODY_EDIT_BUTTONS.'</a>';
                                                                echo '<a href="'. INDEX_URL . '?action=deleteuser&id=' . $registered_users[$i]['id'] . '" class="btn btn-sm btn-outline-danger mx-2">'.USERS_CARD_BODY_DELETE_BUTTONS.'</a>';
                                                            echo '</td>';
                                                        echo '</tr>';
                                                    }
                                                echo '</tbody>';
                                            echo '</table>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }

                    if (isset($_GET['posts'])) {
                        echo '<nav aria-label="breadcrumb">';
                            echo '<ol class="breadcrumb">';
                               echo '<li class="breadcrumb-item" href="' . INDEX_URL .'?action=apanel&dashboard">'.BREADCRUMB_HOME.'</li>';
                                echo '<li class="breadcrumb-item active" aria-current="page">'.POSTS_BREADCRUMB.'</li>';
                            echo '</ol>';
                        echo '</nav>';

                        echo '<div class="row">';
                            echo '<div class="col-12 col-xl-12 mb-4 mb-lg-0">';
                                echo '<div class="card">';
                                    echo '<h5 class="card-header">'.POSTS_CARD_TITLE.'</h5>';
                                    echo '<div class="card-body">';
                                        echo '<div class="table-responsive">';
                                            echo '<table class="table">';
                                                echo '<thead>';
                                                echo '<tr>';
                                                    echo '<th scope="col">'.POSTS_CARD_BODY_ID.'</th>';
                                                    echo '<th scope="col">'.POSTS_CARD_BODY_TITLE.'</th>';
                                                    echo '<th scope="col">'.POSTS_CARD_BODY_AUTHOR.'</th>';
                                                    echo '<th scope="col">'.POSTS_CARD_BODY_DATE.'</th>';
                                                    echo '<th scope="col">'.POSTS_CARD_BODY_ACTIONS.'</th>';
                                                echo '</tr>';
                                                echo '</thead>';
                                                echo '<tbody>';
                                                    for ($i = 0; $i < count($all_posts); $i++) {
                                                        echo '<tr>';
                                                            echo '<th scope="row">' . $all_posts[$i]['postID'] . '</th>';
                                                            echo '<td>' . $all_posts[$i]['postTitle'] . '</td>';
                                                            echo '<td>' . $all_posts[$i]['postAuthor'] . '</td>';
                                                            echo '<td>' . $all_posts[$i]['postTime'] . '</td>';
                                                            echo '<td>';
                                                                echo '<a href="'. INDEX_URL . '?action=post&id=' . $all_posts[$i]['postID'] . '" class="btn btn-sm btn-outline-primary mr-2">'.POSTS_CARD_BODY_VIEW_BUTTONS.'</a>';
                                                                echo '<a href="'. INDEX_URL . '?action=pdf&id=' . $all_posts[$i]['postID'] . '" class="btn btn-sm btn-outline-success mx-2">'.POSTS_CARD_BODY_DOWNLOAD_BUTTON.'</a>';
                                                                echo '<a href="'. INDEX_URL . '?action=post&id=' . $all_posts[$i]['postID'] . '&editpost=true" class="btn btn-sm btn-outline-dark mx-2">'.POSTS_CARD_BODY_EDIT_BUTTONS.'</a>';
                                                                echo '<a href="'. INDEX_URL . '?action=deletepost&id=' . $all_posts[$i]['postID'] . '" class="btn btn-sm btn-outline-danger mx-2">'.POSTS_CARD_BODY_DELETE_BUTTONS.'</a>';
                                                            echo '</td>';
                                                        echo '</tr>';
                                                    }
                                                echo '</tbody>';
                                            echo '</table>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }

                    if (isset($_GET['categories'])) {
                        echo '<nav aria-label="breadcrumb">';
                            echo '<ol class="breadcrumb mb-4">';
                               echo '<li class="breadcrumb-item" href="' . INDEX_URL .'?action=apanel&dashboard">'.BREADCRUMB_HOME.'</li>';
                                echo '<li class="breadcrumb-item active" aria-current="page">'.CATEGORIES_BREADCRUMB.'</li>';
                            echo '</ol>';
                        echo '</nav>';

                        echo '<div class="row">';
                            echo '<div class="col-12 col-xl-12 mb-4 mb-lg-0">';
                                echo '<div class="card">';
                                    echo '<h5 class="card-header">'.CATEGORIES_CARD_TITLE.'</h5>';
                                    echo '<div class="card-body">';
                                        echo '<div class="table-responsive">';
                                            echo '<table class="table">';
                                                echo '<thead>';
                                                echo '<tr>';
                                                    echo '<th scope="col">'.CATEGORIES_CARD_BODY_ID.'</th>';
                                                    echo '<th scope="col">'.CATEGORIES_CARD_BODY_NAME.'</th>';
                                                    echo '<th scope="col">'.CATEGORIES_CARD_BODY_DESCRIPTION.'</th>';
                                                    echo '<th scope="col">'.CATEGORIES_CARD_BODY_ACTIONS.'</th>';
                                                echo '</tr>';
                                                echo '</thead>';
                                                echo '<tbody>';
                                                    for ($i = 0; $i < count($all_categories); $i++) {
                                                        echo '<tr>';
                                                            echo '<th scope="row">' . $all_categories[$i]['id'] . '</th>';
                                                            echo '<td>' . $all_categories[$i]['name'] . '</td>';
                                                            echo '<td style="text-align:justify">' . $all_categories[$i]['description'] . '</td>';
                                                            echo '<td>';
                                                                echo '<a href="'. INDEX_URL . '?action=posts_category&id=' . $all_categories[$i]['id'] . '" class="btn btn-sm btn-outline-primary mx-2">'.CATEGORIES_CARD_BODY_VIEW_BUTTONS.'</a>';
                                                                echo '<a href="'. INDEX_URL . '?action=apanel&categories&editcategory&id=' . $all_categories[$i]['id'] . '&editcategory=true" class="btn btn-sm btn-outline-dark mx-2">'.CATEGORIES_CARD_BODY_EDIT_BUTTONS.'</a>';
                                                                echo '<a href="'. INDEX_URL . '?action=posts_delete_category&id=' . $all_categories[$i]['id'] . '" class="btn btn-sm btn-outline-danger mx-2">'.CATEGORIES_CARD_BODY_DELETE_BUTTONS.'</a>';
                                                            echo '</td>';
                                                        echo '</tr>';
                                                    }
                                                echo '</tbody>';
                                            echo '</table>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';

                        if (isset($_GET['editcategory'])) {
                            foreach ($all_categories as $category) {
                                if ($category['id'] == $_GET['id']) {
                                    echo '<div class="row mt-3">';
                                        echo '<div class="col-12 col-xl-12 mb-4 mb-lg-0">';
                                            echo '<div class="card">';
                                                echo '<h5 class="card-header">'.CATEGORIES_CARD_BODY_EDIT_TITLE.'</h5>';
                                                echo '<div class="card-body">';
                                                    echo '<form action="' . INDEX_URL . '?action=posts_category_edit" method="POST" enctype="multipart/form-data">';
                                                        echo '<div class="form-group mt-3">';
                                                            echo '<label for="name">'.CATEGORIES_CARD_BODY_EDIT_NAME.'</label>';
                                                            echo '<input type="text" class="form-control" id="name" name="name" value="' . $category['name'] . '">';
                                                        echo '</div>';
                                                        echo '<div class="form-group mt-3">';
                                                            echo '<label for="image">'.CATEGORIES_CARD_BODY_IMG.'</label>';
                                                            echo '<input type="text" class="form-control" id="image" name="image" value="' . $category['image'] . '">';
                                                        echo '</div>';
                                                        echo '<div class="form-group mt-3">';
                                                            echo '<label for="description">'.CATEGORIES_CARD_BODY_EDIT_DESCRIPTION.'</label>';
                                                            echo '<textarea class="form-control" id="description" name="description" rows="3">' . $category['description'] . '</textarea>';
                                                        echo '</div>';
                                                        echo '<input type="hidden" name="id" value="' . $category['id'] . '">';
                                                        echo '<button type="submit" class="btn btn-outline-dark mt-3" name="editcategory">'.CATEGORIES_CARD_BODY_EDIT_BUTTON.'</button>';
                                                    echo '</form>';
                                                echo '</div>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                }
                            }
                        }
                    }

                    if (isset($_GET['admins'])) {
                        echo '<nav aria-label="breadcrumb">';
                            echo '<ol class="breadcrumb">';
                               echo '<li class="breadcrumb-item" href="' . INDEX_URL .'?action=apanel&dashboard">'.BREADCRUMB_HOME.'</li>';
                                echo '<li class="breadcrumb-item active" aria-current="page">'.ADMINS_BREADCRUMB.'</li>';
                            echo '</ol>';
                        echo '</nav>';

                        echo '<div class="row">';
                            echo '<div class="col-12 col-xl-12 mb-4 mb-lg-0">';
                                echo '<div class="card">';
                                    echo '<h5 class="card-header">'.ADMINS_CARD_TITLE.'</h5>';
                                    echo '<div class="card-body">';
                                        echo '<div class="table-responsive">';
                                            echo '<table class="table">';
                                                echo '<thead>';
                                                echo '<tr>';
                                                    echo '<th scope="col">'.ADMINS_CARD_BODY_ID.'</th>';
                                                    echo '<th scope="col">'.ADMINS_CARD_BODY_USERNAME.'</th>';
                                                    echo '<th scope="col">'.ADMINS_CARD_BODY_FULLNAME.'</th>';
                                                    echo '<th scope="col">'.ADMINS_CARD_BODY_MAIL.'</th>';
                                                    echo '<th scope="col">'.ADMINS_CARD_BODY_DOB.'</th>';
                                                    echo '<th scope="col">'.ADMINS_CARD_BODY_ACTIONS.'</th>';
                                                echo '</tr>';
                                                echo '</thead>';
                                                echo '<tbody>';
                                                    for ($i = 0; $i < count($registered_users); $i++) {
                                                        if ($registered_users[$i]['level'] >= ADMIN_LEVEL) {
                                                            echo '<tr>';
                                                                echo '<th scope="row">' . $registered_users[$i]['id'] . '</th>';
                                                                echo '<td>' . $registered_users[$i]['nick'] . '</td>';
                                                                echo '<td>' . $registered_users[$i]['fullname'] . '</td>';
                                                                echo '<td>' . $registered_users[$i]['mail'] . '</td>';
                                                                echo '<td>' . $registered_users[$i]['dob'] . '</td>';
                                                                echo '<td>';
                                                                    echo '<a href="'. INDEX_URL . '?action=profile&id=' . $registered_users[$i]['id'] . '&editprofile=true" class="btn btn-sm btn-outline-dark mx-2">'.ADMINS_CARD_BODY_EDIT_BUTTONS.'</a>';
                                                                    echo '<a href="'. INDEX_URL . '?action=deleteuser&id=' . $registered_users[$i]['id'] . '" class="btn btn-sm btn-outline-danger mx-2">'.ADMINS_CARD_BODY_DELETE_BUTTONS.'</a>';
                                                                    echo '<a href="'. INDEX_URL . '?action=setuser&id=' . $registered_users[$i]['id'] . '&user" class="btn btn-sm btn-outline-success mx-2">'.ADMINS_CARD_BODY_SET_USER_BUTTONS.'</a>';
                                                                    echo '<a href="'. INDEX_URL . '?action=setuser&id=' . $registered_users[$i]['id'] . '&reporter" class="btn btn-sm btn-outline-danger mx-2">'.ADMINS_CARD_BODY_SET_REPORTER.'</a>';
                                                                    echo '<a href="'. INDEX_URL . '?action=setuser&id=' . $registered_users[$i]['id'] . '&admin" class="btn btn-sm btn-outline-primary mx-2">'.ADMINS_CARD_BODY_SET_ADMIN.'</a>';
                                                                echo '</td>';
                                                            echo '</tr>';
                                                        }
                                                    }
                                                echo '</tbody>';
                                            echo '</table>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';

                    }

                    if (isset($_GET['integrations'])) {
                        echo '<nav aria-label="breadcrumb">';
                            echo '<ol class="breadcrumb mb-4">';
                               echo '<li class="breadcrumb-item" href="' . INDEX_URL .'?action=apanel&dashboard">'.BREADCRUMB_HOME.'</li>';
                                echo '<li class="breadcrumb-item active" aria-current="page">'.INTEGRATIONS_BREADCRUMB.'</li>';
                            echo '</ol>';
                        echo '</nav>';

                        if (isset($_GET['filesystem'])) {
                            echo '<div class="row">';
                                echo '<div class="col-12 col-xl-12 mb-4 mb-lg-0">';
                                    echo '<div class="card">';
                                        echo '<h5 class="card-header">'.FILESYSTEM_CARD_TITLE.'</h5>';
                                        echo '<div class="card-body">';
                                            echo '<div class="table-responsive">';
                                                echo '<table class="table">';
                                                    echo '<thead>';
                                                    echo '<tr>';
                                                        echo '<th scope="col">'.FILESYSTEM_CARD_BODY_ID.'</th>';
                                                        echo '<th scope="col">'.FILESYSTEM_CARD_BODY_NAME.'</th>';
                                                        echo '<th scope="col">'.FILESYSTEM_CARD_BODY_DATE.'</th>';
                                                        echo '<th scope="col">'.FILESYSTEM_CARD_BODY_SIZE.'</th>';
                                                        echo '<th scope="col">'.FILESYSTEM_CARD_BODY_ACTIONS.'</th>';
                                                    echo '</tr>';
                                                    echo '</thead>';
                                                    echo '<tbody>';
                                                        if (isset($_GET['dir'])) {
                                                            if (strpos($_GET['dir'], '..') !== false || strpos($_GET['dir'], '/') !== false || strpos($_GET['dir'], '\\') !== false || strpos($_GET['dir'], '.') !== false) {
                                                                $files = scandir(FILE_SYSTEM);
                                                            } else {
                                                                $files = scandir(FILE_SYSTEM . $_GET['dir']);
                                                            }
                                                        } else {
                                                            $files = scandir(FILE_SYSTEM);
                                                        }
                                                        for ($i = 0; $i < count($files); $i++) {
                                                            if ($files[$i] != '.' && $files[$i] != '..') {
                                                                echo '<tr>';
                                                                    echo '<th scope="row">' . $i . '</th>';
                                                                    echo '<td>' . $files[$i] . '</td>';
                                                                    if (!isset($_GET['dir'])) {
                                                                        echo '<td>' . date("d/m/Y H:i:s", filemtime(FILE_SYSTEM . $files[$i])) . '</td>';
                                                                        echo '<td>' . filesize(FILE_SYSTEM . $files[$i]) . ' KB </td>';
                                                                    } else {
                                                                        echo '<td>' . date("d/m/Y H:i:s", filemtime(FILE_SYSTEM . $_GET['dir'] . '/' . $files[$i])) . '</td>';
                                                                        echo '<td>' . filesize(FILE_SYSTEM . $_GET['dir'] . '/' . $files[$i]) . ' KB </td>';
                                                                    }
                                                                    echo '<td>';
                                                                        if (!isset($_GET['dir'])) {
                                                                            if (filetype(FILE_SYSTEM . $files[$i]) == 'dir') {
                                                                                $files_inside = scandir(FILE_SYSTEM . $files[$i]);
                                                                                if (count($files_inside) > 2) {
                                                                                    echo '<a href="'. INDEX_URL . '?action=apanel&integrations&filesystem&dir=' . $files[$i] . '" class="btn btn-sm btn-outline-primary mx-2">'.FILESYSTEM_CARD_BODY_VIEW_BUTTONS.'</a>';
                                                                                }
                                                                            }
                                                                        } else {
                                                                            if (filetype(FILE_SYSTEM . $_GET['dir'] . '/' . $files[$i]) == 'dir') {
                                                                                $files_inside = scandir(FILE_SYSTEM . $_GET['dir'] . '/' . $files[$i]);
                                                                                if (count($files_inside) > 2) {
                                                                                    echo '<a href="'. INDEX_URL . '?action=apanel&integrations&filesystem&dir=' . $_GET['dir'] . '/' . $files[$i] . '" class="btn btn-sm btn-outline-primary mx-2">'.FILESYSTEM_CARD_BODY_VIEW_BUTTONS.'</a>';
                                                                                }
                                                                            }
                                                                        }

                                                                        if (!is_dir(FILE_SYSTEM . $files[$i])) {
                                                                            if (!isset($_GET['dir'])) {
                                                                                echo '<a href="'. INDEX_URL . '?action=apanel_download&dir=main&file=' . $files[$i] . '" class="btn btn-sm btn-outline-dark mx-2">'.FILESYSTEM_CARD_BODY_DOWNLOAD_BUTTONS.'</a>';
                                                                                echo '<a href="'. INDEX_URL . '?action=apanel_fs_delete&dir=main&file=' . $files[$i] . '" class="btn btn-sm btn-outline-danger mx-2">'.FILESYSTEM_CARD_BODY_DELETE_BUTTONS.'</a>';
                                                                            } else {
                                                                                echo '<a href="'. INDEX_URL . '?action=apanel_download&dir=' . $_GET['dir'] . '&file=' . $files[$i] . '" class="btn btn-sm btn-outline-dark mx-2">'.FILESYSTEM_CARD_BODY_DOWNLOAD_BUTTONS.'</a>';
                                                                                echo '<a href="'. INDEX_URL . '?action=apanel_fs_delete&dir=' . $_GET['dir'] . '&file=' . $files[$i] . '" class="btn btn-sm btn-outline-danger mx-2">'.FILESYSTEM_CARD_BODY_DELETE_BUTTONS.'</a>';
                                                                            }
                                                                        } else {
                                                                            if (!isset($_GET['dir'])) {
                                                                                echo '<a href="'. INDEX_URL . '?action=apanel_fs_delete_folder&dir=main&folder=' . $files[$i] . '" class="btn btn-sm btn-outline-danger mx-2">'.FILESYSTEM_CARD_BODY_DELETE_BUTTONS.'</a>';
                                                                                echo '<a href="'. INDEX_URL . '?action=apanel_fs_download_folder&dir=main&folder=' . $files[$i] . '" class="btn btn-sm btn-outline-dark mx-2">'.FILESYSTEM_CARD_BODY_DOWNLOAD_BUTTONS.'</a>';
                                                                            } else {
                                                                                echo '<a href="'. INDEX_URL . '?action=apanel_fs_delete_folder&dir=' . $_GET['dir'] . '&folder=' . $files[$i] . '" class="btn btn-sm btn-outline-danger mx-2">'.FILESYSTEM_CARD_BODY_DELETE_BUTTONS.'</a>';
                                                                                echo '<a href="'. INDEX_URL . '?action=apanel_fs_download_folder&dir=' . $_GET['dir'] . '&folder=' . $files[$i] . '" class="btn btn-sm btn-outline-dark mx-2">'.FILESYSTEM_CARD_BODY_DOWNLOAD_BUTTONS.'</a>';
                                                                            }
                                                                        }
                                                                    echo '</td>';
                                                                echo '</tr>';
                                                            }
                                                        }
                                                        if (isset($_GET['dir'])) {
                                                            echo '<td colspan="6"><a href="'. INDEX_URL . '?action=apanel&integrations&filesystem" class="btn btn-sm btn-outline-primary mx-2">'.FILESYSTEM_CARD_BODY_GO_BACK_BUTTONS.'</a></td>';
                                                        }
                                                    echo '</tbody>';
                                                echo '</table>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        } else {
                            echo '<div class="row">';
                                echo '<div class="col-12 col-xl-12 mb-4 mb-lg-0">';
                                    echo '<div class="card">';
                                        echo '<h5 class="card-header">'.FILESYSTEM_CARD_TITLE.'</h5>';
                                        echo '<div class="card-body">';
                                            echo '<a href="'. INDEX_URL . '?action=apanel&integrations&filesystem" class="btn btn-sm btn-outline-dark mx-2">'.FILESYSTEM_CARD_BODY_VIEW_ALL.'</a>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        }

                    }
                echo '</div>';
            echo '</div>';


            echo "<script src='" . SCRIPT_JS . "'></script>";
			include_once SCRIPTS_CDN_BODY;
        ?>


        <script>
            const links = document.querySelectorAll("nav a");

            links.forEach(link => {
                link.addEventListener("click", function(e){
                    e.preventDefault();

                    links.forEach(link => link.classList.remove("active"));
                    this.classList.add("active");

                    const page = this.href;
                    fetch(page)
                        .then( response => response.text())
                        .then( html => {
                            const main = document.querySelector("main");
                            main.innerHTML = html;
                        })
                    })

            });
        </script>

    </body>
</html>