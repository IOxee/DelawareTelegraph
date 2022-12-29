
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bootstrap 5 Simple Admin Dashboard</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">

        <?php
            echo '<link rel="stylesheet" href="' . STYLES_CDN_HEADERS . '">';
            echo '<link rel="stylesheet" href="' . STYLES_ADMIN_DASHBOARD . '">';
        ?>

    </head>
    <body>
        <?php
            defined('MY_CMS') or die('Permission denied');

            include_once NAVBAR_VIEW;
            echo navbar();

            /**
             * Sidebar
             */
            echo '<div class="container-fluid">';
                echo '<div class="row">';
                    echo '<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">';
                        echo '<div class="position-sticky">';
                            echo '<ul class="nav flex-column ml-3" >';
                                echo '<li class="nav-item">';
                                    echo '<form action="' . INDEX_URL .'?action=apanel&dashboard" method="post">';
                                        echo '<button type="submit" class="btn btn-outline-dark border border-grey" id="btn_dashboard">';
                                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>';
                                            echo '<span class="ml-2">Dashboard</span>';
                                        echo '</button>';
                                    echo '</form>';
                                echo '</li>';
                                echo '<li class="nav-item">';
                                    echo '<form action="' . INDEX_URL . '?action=apanel&users" method="post">';
                                        echo '<button type="submit" class="btn btn-outline-dark border border-white"  id="btn_users">';
                                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>';
                                            echo '<span class="ml-2">Usuaris</span>';
                                        echo '</button>';
                                    echo '</form>';
                            echo '</li>';
                            echo '<li class="nav-item">';
                                echo '<form action="' . INDEX_URL . '?action=apanel&posts" method="post">';
                                    echo '<button type="submit" class="btn btn-outline-dark border border-white"  id="btn_posts">';
                                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>';
                                        echo '<span class="ml-2">Publicacions</span>';
                                    echo '</button>';
                                echo '</form>';
                            echo '</li>';
                            echo '<li class="nav-item">';
                                echo '<form action="' . INDEX_URL . '?action=apanel&admins" method="post">';
                                    echo '<button type="submit" class="btn btn-outline-dark border border-white"  id="btn_admins">';
                                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>';
                                        echo '<span class="ml-2">Administradors</span>';
                                    echo '</button>';
                                echo '</form>';
                            echo '</li>';
                            echo '<li class="nav-item">';
                                echo '<form action="' . INDEX_URL .'?action=apanel&integrations" method="post">';
                                    echo '<button type="submit" class="btn btn-outline-dark border border-white"  id="btn_integrations">';
                                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>';
                                        echo '<span class="ml-2">Integracions</span>';
                                    echo '</button>';
                            echo '</li>';

                            echo '<li class="nav-item fixed-bottom">';
                                if (date("Y") == "2022") {
                                    echo '<p class="ml-2 text-dark">© ' . date("Y") . ' - <a href="' . AUTHOR_URL . '" target="_blank">' . PROJECT_AUTHOR .  '</a></p>';
                                } else {
                                    echo '<p class="ml-2 text-dark">© 2022 - ' . date("Y") . ' - <a href="' . AUTHOR_URL . '" target="_blank">' . PROJECT_AUTHOR .  '</a></p>';
                                }
                            echo '</li>';
                        echo '</ul>';
                    echo '</div>';
                echo '</nav>';

                echo '<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">';
                    if (isset($_GET['dashboard'])) {
                        echo '<nav aria-label="breadcrumb">';
                            echo '<ol class="breadcrumb">';
                                echo '<li class="breadcrumb-item">Home</li>';
                                echo '<li class="breadcrumb-item active" aria-current="page">Overview</li>';
                            echo '</ol>';
                        echo '</nav>';


                        echo '<h2>Dashboard</h2>';
                        echo '<p>Aixo es el dashboard aqui podras veure tots el datos de la empresa</p>';
                        echo '<div class="row my-4">';
                            echo '<div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">';
                                echo '<div class="card">';
                                    echo '<h5 class="card-header">Usauris Registrats</h5>';
                                    echo '<div class="card-body">';
                                        echo '<h5 class="card-title">Usuaris Totals: ' . $q_users . '</h5>';
                                        echo '<button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">Veure usuaris</button>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';

                            echo '<div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">';
                                echo '<div class="card">';
                                    echo '<h5 class="card-header">Publicacions Creades</h5>';
                                    echo '<div class="card-body">';
                                        echo '<h5 class="card-title">Publicacions Totales: ' . $q_posts . '</h5>';
                                        echo '<button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">Veure publicacions</button>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';

                            echo '<div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">';
                                echo '<div class="card">';
                                    echo '<h5 class="card-header">Categories Existentes</h5>';
                                    echo '<div class="card-body">';
                                        echo '<h5 class="card-title">Categories Totals: ' . $q_categories . '</h5>';
                                        echo '<button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">Veure categories</button>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';

                            echo '<div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">';
                                echo '<div class="card">';
                                    echo '<h5 class="card-header">Administradors</h5>';
                                    echo '<div class="card-body">';
                                        echo '<h5 class="card-title">Administradors Totals: ' . $q_admins . '</h5>';
                                        echo '<button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">Veure administradors</button>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';

                        echo '<div class="row">';
                            echo '<div class="col-12 col-xl-12 mb-4 mb-lg-0">';
                                echo '<div class="card">';
                                    echo '<h5 class="card-header">Ultimes publicacions</h5>';
                                    echo '<div class="card-body">';
                                        echo '<div class="table-responsive">';
                                            echo '<table class="table">';
                                                echo '<thead>';
                                                echo '<tr>';
                                                    echo '<th scope="col">ID</th>';
                                                    echo '<th scope="col">Titol</th>';
                                                    echo '<th scope="col">Autor</th>';
                                                    echo '<th scope="col">Data</th>';
                                                    echo '<th scope="col">Accions</th>';
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
                                                                echo '<a href="'. INDEX_URL . '?action=post&id=' . $last_posts[$i]['postID'] . '" class="btn btn-sm btn-outline-primary mr-2">Veure</a>';
                                                                echo '<a href="'. INDEX_URL . '?action=post&id=' . $last_posts[$i]['postID'] . '&editpost=true" class="btn btn-sm btn-outline-dark mx-2">Editar</a>';
                                                                echo '<a href="'. INDEX_URL . '?action=deletepost&id=' . $last_posts[$i]['postID'] . '" class="btn btn-sm btn-outline-danger mx-2">Eliminar</a>';
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
                                echo '<li class="breadcrumb-item">Home</li>';
                                echo '<li class="breadcrumb-item active" aria-current="page">Users</li>';
                            echo '</ol>';
                        echo '</nav>';


                        echo '<div class="row">';
                            echo '<div class="col-12 col-xl-12 mb-4 mb-lg-0">';
                                echo '<div class="card">';
                                    echo '<h5 class="card-header">Usuaris registrats</h5>';
                                    echo '<div class="card-body">';
                                        echo '<div class="table-responsive">';
                                            echo '<table class="table">';
                                                echo '<thead>';
                                                echo '<tr>';
                                                    echo '<th scope="col">ID</th>';
                                                    echo '<th scope="col">Nom de usuari</th>';
                                                    echo '<th scope="col">Nom Complet</th>';
                                                    echo '<th scope="col">Mail</th>';
                                                    echo '<th scope="col">Data de neixement</th>';
                                                    echo '<th scope="col">Roles</th>';
                                                    echo '<th scope="col">Accions</th>';
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
                                                                    echo '<a href="'. INDEX_URL . '?action=setuser&id=' . $registered_users[$i]['id'] . '&reporter" class="btn btn-sm btn-outline-primary mx-2">Set Reporter</a>';
                                                                }
                                                                if ($registered_users[$i]['level'] < ADMIN_LEVEL) {
                                                                    echo '<a href="'. INDEX_URL . '?action=setuser&id=' . $registered_users[$i]['id'] . '&admin" class="btn btn-sm btn-outline-dark mx-2">Set Admin</a>';
                                                                }
                                                            echo '</td>';
                                                            echo '<td>';
                                                                echo '<a href="'. INDEX_URL . '?action=profile&id=' . $registered_users[$i]['id'] . '" class="btn btn-sm btn-outline-primary mr-2">Veure</a>';
                                                                echo '<a href="'. INDEX_URL . '?action=profile&id=' . $registered_users[$i]['id'] . '&editprofile=true" class="btn btn-sm btn-outline-dark mx-2">Editar</a>';
                                                                echo '<a href="'. INDEX_URL . '?action=deleteuser&id=' . $registered_users[$i]['id'] . '" class="btn btn-sm btn-outline-danger mx-2">Eliminar</a>';
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
                                echo '<li class="breadcrumb-item">Home</li>';
                                echo '<li class="breadcrumb-item active" aria-current="page">Posts</li>';
                            echo '</ol>';
                        echo '</nav>';

                        echo '<div class="row">';
                            echo '<div class="col-12 col-xl-12 mb-4 mb-lg-0">';
                                echo '<div class="card">';
                                    echo '<h5 class="card-header">Posts</h5>';
                                    echo '<div class="card-body">';
                                        echo '<div class="table-responsive">';
                                            echo '<table class="table">';
                                                echo '<thead>';
                                                echo '<tr>';
                                                    echo '<th scope="col">ID</th>';
                                                    echo '<th scope="col">Titol</th>';
                                                    echo '<th scope="col">Autor</th>';
                                                    echo '<th scope="col">Data</th>';
                                                    echo '<th scope="col">Accions</th>';
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
                                                                echo '<a href="'. INDEX_URL . '?action=post&id=' . $all_posts[$i]['postID'] . '" class="btn btn-sm btn-outline-primary mr-2">Veure</a>';
                                                                echo '<a href="'. INDEX_URL . '?action=pdf&id=' . $all_posts[$i]['postID'] . '" class="btn btn-sm btn-outline-success mx-2">Descarregar</a>';
                                                                echo '<a href="'. INDEX_URL . '?action=post&id=' . $all_posts[$i]['postID'] . '&editpost=true" class="btn btn-sm btn-outline-dark mx-2">Editar</a>';
                                                                echo '<a href="'. INDEX_URL . '?action=deletepost&id=' . $all_posts[$i]['postID'] . '" class="btn btn-sm btn-outline-danger mx-2">Eliminar</a>';
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

                    if (isset($_GET['admins'])) {
                        echo '<nav aria-label="breadcrumb">';
                            echo '<ol class="breadcrumb">';
                                echo '<li class="breadcrumb-item">Home</li>';
                                echo '<li class="breadcrumb-item active" aria-current="page">Administrators</li>';
                            echo '</ol>';
                        echo '</nav>';

                        echo '<div class="row">';
                            echo '<div class="col-12 col-xl-12 mb-4 mb-lg-0">';
                                echo '<div class="card">';
                                    echo '<h5 class="card-header">Administrators</h5>';
                                    echo '<div class="card-body">';
                                        echo '<div class="table-responsive">';
                                            echo '<table class="table">';
                                                echo '<thead>';
                                                echo '<tr>';
                                                    echo '<th scope="col">ID</th>';
                                                    echo '<th scope="col">Username</th>';
                                                    echo '<th scope="col">Nom Complet</th>';
                                                    echo '<th scope="col">Mail</th>';
                                                    echo '<th scope="col">Data de Neixement</th>';
                                                    echo '<th scope="col">Accions</th>';
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
                                                                    echo '<a href="'. INDEX_URL . '?action=profile&id=' . $registered_users[$i]['id'] . '&editprofile=true" class="btn btn-sm btn-outline-dark mx-2">Editar</a>';
                                                                    echo '<a href="'. INDEX_URL . '?action=deleteuser&id=' . $registered_users[$i]['id'] . '" class="btn btn-sm btn-outline-danger mx-2">Eliminar</a>';
                                                                    echo '<a href="'. INDEX_URL . '?action=setuser&id=' . $registered_users[$i]['id'] . '&user" class="btn btn-sm btn-outline-success mx-2">Set User</a>';
                                                                    echo '<a href="'. INDEX_URL . '?action=setuser&id=' . $registered_users[$i]['id'] . '&reporter" class="btn btn-sm btn-outline-danger mx-2">Set Reporter</a>';
                                                                    echo '<a href="'. INDEX_URL . '?action=setuser&id=' . $registered_users[$i]['id'] . '&admin" class="btn btn-sm btn-outline-primary mx-2">Set Admin</a>';
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