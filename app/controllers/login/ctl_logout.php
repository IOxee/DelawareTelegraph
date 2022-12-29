<?php
	defined('MY_CMS') or die('Permission denied');

	function logout() {
		session_destroy();
		header('Location: ' . INDEX_URL);
	}