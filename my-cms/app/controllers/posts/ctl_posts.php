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