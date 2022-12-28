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

	function mdl_delete_post($id) {
		$stmt = db_query_delete('DELETE FROM posts WHERE postID = ?', $id, 'i');
		return $stmt;
	}

	function mdl_edit_post($id, $title, $content, $image, $tags) {
		$stmt = db_query_prepare(
			'UPDATE posts SET postTitle = ?, postDesc = ?, postTag = ?, postHeaderIMG = ? WHERE postID = ?',
			array($title, $content, $tags, $image, $id),
			'ssssi'
		);
		return $stmt;
	}

	function get_posts_quantity() {
		$stmt = db_query_fetchall('SELECT COUNT(*) FROM posts');
		return $stmt;
	}

	function get_last_posts() {
		$stmt = db_query_fetchall('SELECT * FROM posts ORDER BY postID DESC LIMIT 6');
		return $stmt;
	}

	function get_posts() {
		$stmt = db_query_fetchall('SELECT * FROM posts ORDER BY postID DESC');
		return $stmt;
	}