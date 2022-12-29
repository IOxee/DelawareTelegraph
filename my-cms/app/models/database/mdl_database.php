<?php
	defined('MY_CMS') or die('Permission denied');

	function db_connect() {
		$db_conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
		if ($db_conn->connect_error) {
			die("Connection failed: " . $db_conn->connect_error);
		}
		return $db_conn;
	}

	function db_disconnect($db_conn, $stmt) {
		$db_conn->close();
		$stmt->close();
	}

	function db_query_fetch($sql) {
		$db_conn=db_connect();

		$result = $db_conn->query($sql)->fetch_assoc();
		return $result;

		db_disconnect($db_conn, null);
	}

	function db_query_fetchall($sql) {
		$db_conn = db_connect();

		$result = $db_conn->query($sql)->fetch_all(MYSQLI_ASSOC);

		return $result;

		db_disconnect($db_conn, null);
	}

	function db_query_prepare($sql, $data, $type) {
		$db_conn=db_connect();

		$stmt = $db_conn->prepare($sql);
		$stmt->bind_param($type, ...$data);
		$stmt->execute($data);

		return $stmt;

		db_disconnect($db_conn, $stmt);
	}

	function db_affected_rows() {
		$db_conn = db_connect();
		return $db_conn->affected_rows;
	}

	function fetch_assoc($stmt) {
		return $stmt->fetch_assoc();
	}

	function db_query_delete($sql, $data, $type) {
		$db_conn = db_connect();

		$stmt = $db_conn->prepare($sql);
		$stmt->bind_param($type, $data);
		$stmt->execute();

		return $stmt;

		db_disconnect($db_conn, $stmt);
	}

	function update_private($username, $show_mail, $show_dob, $show_fullname, $show_bio, $show_social, $send_notifications) {

		$sql = "UPDATE users SET show_mail = ?, show_dob = ?, show_fullname = ?, show_bio = ?, show_social = ?, send_notifications = ? WHERE nick = ?";
		$data = array($show_mail, $show_dob, $show_fullname, $show_bio, $show_social, $send_notifications, $username);
		$type = "iiiiiis";

		$stmt = db_query_prepare($sql, $data, $type);

		return $stmt;
	}