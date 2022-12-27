<?php
	defined('MY_CMS') or die('Permission denied');

	function mdl_get_posts() {
		$stmt = db_query_fetchall('SELECT * FROM posts');
		return $stmt;
	}

	function mdl_get_posts_by_id($id) {
		//$stmt = db_query_fetchall('SELECT * FROM posts WHERE postID = ?', array($id), 'i');
		// You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '?' at line 1
		$stmt = db_query_prepare('SELECT * FROM posts WHERE postID = ?', array($id), 'i');
		return $stmt;
	}