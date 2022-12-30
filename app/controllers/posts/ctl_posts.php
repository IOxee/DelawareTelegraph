<?php
	defined('MY_CMS') or die('Permission denied');

	include_once MDL_DATABASE;
	require MDL_POSTS;

	function ctl_posts() {
		$stmt = mdl_get_posts();
		$posts = array();
		$tags = array();

		foreach ($stmt as $row) {
			$tags = explode(',', $row['postTag']);

			$posts[] = array(
				'id' => $row['postID'],
				'title' => $row['postTitle'],
				'content' => $row['postDesc'],
				'time' => $row['postTime'],
				'tags' => $tags,
				'author' => $row['postAuthor'],
				'image' => $row['postHeaderIMG']
			);
		}

		include POSTS_VIEW;
	}

	function ctl_posts_by_id() {
		$stmt = mdl_get_posts_by_id($_GET['id']);
		$posts = array();
		$tags = array();

		foreach ($stmt as $row) {
			$tags = explode(',', $row['postTag']);

			$posts[] = array(
				'id' => $row['postID'],
				'title' => $row['postTitle'],
				'content' => $row['postDesc'],
				'time' => $row['postTime'],
				'tags' => $tags,
				'author' => $row['postAuthor'],
				'header_image' => $row['postHeaderIMG']
			);
		}

		include POSTSDETAILS_VIEW;
	}

	function delete_post($id) {
		$stmt = mdl_delete_post($id);
		if ($stmt) {
			header('Location: '. INDEX_URL . '?action=posts');
		} else {
			echo 'Error al eliminar el post';
			status_404();
		}
	}

	function edit_post($id, $title, $content, $image, $tags) {
		$stmt = mdl_edit_post($id, $title, $content, $image, $tags);
		if ($stmt) {
			header('Location: '. INDEX_URL . '?action=post&id=' . $id . '');
		} else {
			echo 'Error al editar el post';
			status_404();
		}

	}

	function ctl_posts_by_id_pdf($id) {
		$stmt = mdl_get_posts_by_id($id);
		$posts = array();
		$tags = array();

		foreach ($stmt as $row) {
			$tags = explode(',', $row['postTag']);

			$posts[$id] = array(
				'id' => $row['postID'],
				'title' => $row['postTitle'],
				'content' => $row['postDesc'],
				'time' => $row['postTime'],
				'tags' => $tags,
				'author' => $row['postAuthor'],
				'header_image' => $row['postHeaderIMG']
			);
		}

		include_once LIBS . 'tcpdf/tcpdf.php';
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


		$pdf -> SetCreator($posts[$id]['author']);
		$pdf -> SetAuthor($posts[$id]['author']);
		$pdf -> SetTitle('post ' . $id . ' - ' . $posts[$id]['author']);

		$pdf -> SetHeaderData('', 20, 'The Daily Telegraph', 'Data i Hora: ' . $posts[$id]['time'] . ' | Autor: ' . $posts[$id]['author']);

		$pdf -> setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf -> setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		$pdf -> SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf -> SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf -> SetHeaderMargin(PDF_MARGIN_HEADER);

		$pdf -> SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		$pdf -> setImageScale(PDF_IMAGE_SCALE_RATIO);

		$pdf -> SetFont('helvetica', '', 10);

		$pdf -> AddPage();

		$html = '<h1>' . $posts[$id]['title'] . '</h1>';
		$html .= '<p>' . $posts[$id]['content'] . '</p>';
		$html .= '<img src="' . $posts[$id]['header_image'] . '" alt="Post Image" width=auto height=auto>';

		$pdf -> writeHTML($html, true, false, true, false, '');
		$pdf -> lastPage();
		$pdf -> Output('post ' . $id . ' - ' . $posts[$id]['author'] . '.pdf', 'D');
	}

    function categories() {
        $stmt = mdl_get_categories();
        $categories = array();

        foreach ($stmt as $row) {
            $categories[] = array(
                'id' => $row['id'],
                'name' => $row['name'],
                'description' => $row['description'],
                'image' => $row['image']
            );
        }

        include CATEGORIES_VIEW;
    }

    function posts_category($id) {
        $stmt = mdl_get_posts_category($id);
        $posts = array();
        $tags = array();

        foreach ($stmt as $row) {
            if ($row['postCategory'] == $id) {
                $tags = explode(',', $row['postTag']);

                $posts[] = array(
                    'id' => $row['postID'],
                    'title' => $row['postTitle'],
                    'content' => $row['postDesc'],
                    'time' => $row['postTime'],
                    'tags' => $tags,
                    'author' => $row['postAuthor'],
                    'image' => $row['postHeaderIMG']
                );
            }
        }

        include POSTS_VIEW;
    }

    function posts_category_edit($id, $name, $description, $image) {
        $stmt = mdl_edit_category($id, $name, $description, $image);
        if ($stmt) {
            header('Location: '. INDEX_URL . '?action=categories');
        } else {
            echo 'Error al editar la categoria';
            status_404();
        }
    }

    function posts_category_delete($id) {
        $stmt = mdl_delete_category($id);
        if ($stmt) {
            header('Location: '. INDEX_URL . '?action=categories');
        } else {
            echo 'Error al eliminar la categoria';
            status_404();
        }
    }