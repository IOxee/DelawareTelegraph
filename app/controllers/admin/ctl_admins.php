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

        if (isset($_GET['categories'])) {
            $all_categories = mdl_get_categories();
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

    function get_files() {
        $dir = FILE_SYSTEM;
        $files = scandir($dir);
        $files = array_diff($files, array('.', '..'));
        $files = array_values($files);
        return $files;
    }

    function get_file($file) {
        $dir = FILE_SYSTEM;
        $file = $dir . $file;
        $file = file_get_contents($file);
        return $file;
    }

    function delete_file($dir, $file) {
        $main_dir = FILE_SYSTEM;
        if ($dir != "main") {
            $dir = $main_dir . $dir . "/";
        } else {
            $dir = $main_dir;
        }

        $file = $dir . $file;
        $stmt = unlink($file);
        if ($stmt) {
            header("Location: " . INDEX_URL . "?action=apanel&integrations&filesystem");
        } else {
            echo "Error al eliminar el archivo";
        }
    }

    function delete_folder($dir, $file) {
        $main_dir = FILE_SYSTEM;
        if ($dir != "main") {
            $dir = $main_dir . $dir . "/";
        } else {
            $dir = $main_dir;
        }

        $file = $dir . $file;
        $stmt = rmdir($file);
        if ($stmt) {
            header("Location: " . INDEX_URL . "?action=apanel&integrations&filesystem");
        } else {
            echo "Error al eliminar el archivo";
        }
    }

    function download_file($dir, $file) {
        $main_dir = FILE_SYSTEM;

        if ($dir != "main") {
            $file = $main_dir . $dir . "/" . $file;
            ob_clean();
            ob_start();
            header('Content-Description: File Transfer');
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename=' . basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            flush();
            readfile($file);
            exit;

        } else {
            $file = $main_dir . $file;
            $fileToDownloadEscaped = str_replace(" ", "&nbsp;", $file);
            ob_clean();
            ob_start();
            header('Content-Description: File Transfer');
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename=' . basename($fileToDownloadEscaped));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($fileToDownloadEscaped));
            flush();
            readfile($fileToDownloadEscaped);
            exit;
        }
    }

    function download_folder($gdir, $file) {
        $main_dir = FILE_SYSTEM;

        if ($gdir != "main") {
            $dir = $main_dir . $gdir . "/";
        } else {
            $dir = $main_dir;
        }
        $file = $dir . $file;

        $zip = new ZipArchive();
        $zip_name = $file . ".zip";
        if ($zip->open($zip_name, ZIPARCHIVE::CREATE)!==TRUE) {
            exit("cannot open <$zip_name>\n");
        }

        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($file),
            RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file) {
            if (!$file->isDir()) {
                $file_path = $file->getRealPath();
                $relative_path = substr($file_path, strlen($file) + 1);
                //$zip->addFile($file_path, $relative_path);

                $zip->addFile($file_path, $file->getFilename());
            }
        }

        $zip->close();

        header('Content-Type: application/zip');
        if ($gdir != "main") {
            header('Content-disposition: attachment; filename=' . $file . ".zip");
        } else {
            header('Content-disposition: attachment; filename=' . $gdir . ".zip");
        }
        header('Content-Length: ' . filesize($zip_name));
        readfile($zip_name);
        unlink($zip_name);
        exit;
    }


    function get_content_type($file) {
        if (strpos($file, '.pdf') !== false) {
            return 'application/pdf';
        } else if (strpos($file, '.txt') !== false) {
            return 'text/plain';
        } else if (strpos($file, '.jpg') !== false) {
            return 'image/jpeg';
        } else if (strpos($file, '.png') !== false) {
            return 'image/png';
        } else if (strpos($file, '.gif') !== false) {
            return 'image/gif';
        } else if (strpos($file, '.mp3') !== false) {
            return 'audio/mpeg';
        } else if (strpos($file, '.mp4') !== false) {
            return 'video/mp4';
        } else if (strpos($file, '.zip') !== false) {
            return 'application/zip';
        } else if (strpos($file, '.rar') !== false) {
            return 'application/x-rar-compressed';
        } else if (strpos($file, '.tar') !== false) {
            return 'application/x-tar';
        } else if (strpos($file, '.gz') !== false) {
            return 'application/gzip';
        } else if (strpos($file, '.7z') !== false) {
            return 'application/x-7z-compressed';
        } else if (strpos($file, '.doc') !== false) {
            return 'application/msword';
        } else if (strpos($file, '.docx') !== false) {
            return 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
        } else if (strpos($file, '.xls') !== false) {
            return 'application/vnd.ms-excel';
        } else if (strpos($file, '.xlsx') !== false) {
            return 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
        } else if (strpos($file, '.ppt') !== false) {
            return 'application/vnd.ms-powerpoint';
        } else if (strpos($file, '.pptx') !== false) {
            return 'application/vnd.openxmlformats-officedocument.presentationml.presentation';
        } else if (strpos($file, '.odt') !== false) {
            return 'application/vnd.oasis.opendocument.text';
        }
    }