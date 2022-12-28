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

		// generate PDF
		// require_once LIBS . 'tcpdf/tcpdf.php';

		// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

	}