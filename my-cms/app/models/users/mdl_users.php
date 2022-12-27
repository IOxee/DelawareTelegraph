<?php
	defined('MY_CMS') or die('Permission denied');

	function getInfoBBDD(){
		return "info BBDD";
	}

	function get_users() {
		$users = db_query_fetchall("SELECT * FROM users");
		return $users;
	}

	function get_social_media() {
		$social_media = db_query_fetchall("SELECT * FROM social_media");
		return $social_media;
	}

	function update_password($username, $hash) {
		$stmt = db_query_prepare("UPDATE users SET password = ? WHERE nick = ?", array($hash, $username), 'ss');
		return $stmt;
	}

	function update_profile($id, $username, $fullname, $mail, $dob, $img, $bio) {
		$stmt = db_query_prepare("UPDATE users SET fullname = ?, mail = ?, dob = ?, img = ?, bio = ? WHERE id = ? AND nick = ?", array($fullname, $mail, $dob, $img, $bio, $id, $username), 'sssssis');
		return $stmt;
	}

	function update_social_media($id, $username, $linkedin, $github, $twitter, $instagram, $facebook) {
		$stmt = db_query_prepare("UPDATE social_media SET facebook = ?, twitter = ?,  instagram = ?,  linkedin= ?,  github = ? WHERE id = ? AND nick = ?", array($facebook, $twitter, $instagram, $linkedin, $github, $id, $username), 'sssssis');
		return $stmt;
	}