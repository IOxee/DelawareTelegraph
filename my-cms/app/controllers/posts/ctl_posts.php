<?php
	defined('MY_CMS') or die('Permission denied');

	include_once MDL_DATABASE;
	require MDL_POSTS;

	function ctl_posts() {
		$stmt = mdl_get_posts();
		$posts = array();

		foreach ($stmt as $row) {
			$posts[] = array(
				'id' => $row['postID'],
				'title' => $row['postTitle'],
				'content' => $row['postDesc'],
				'time' => $row['postTime'],
				'tags' => $row['postTag'],
				'author' => $row['postAuthor'],
				'header_image' => $row['postHeaderIMG']
			);
		}

		include POSTS_VIEW;
	}

	function ctl_posts_by_id() {
		$stmt = mdl_get_posts_by_id($_GET['id']);
		$posts = array();

		foreach ($stmt as $row) {
			$posts[] = array(
				'id' => $row['postID'],
				'title' => $row['postTitle'],
				'content' => $row['postDesc'],
				'time' => $row['postTime'],
				'tags' => $row['postTag'],
				'author' => $row['postAuthor'],
				'header_image' => $row['postHeaderIMG']
			);
		}

		include POSTSDETAILS_VIEW;
	}