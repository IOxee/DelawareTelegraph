<?php
	defined('MY_CMS') or die('Permission denied');

	function mdl_get_posts() {
		$stmt = db_query_fetchall('SELECT * FROM posts');
		return $stmt;
	}

	function mdl_get_posts_by_id($id) {
		$stmt = db_query_fetchall('SELECT * FROM posts WHERE postID = ' . $id);
		return $stmt;
	}