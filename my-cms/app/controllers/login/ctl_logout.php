<?php
	function logout() {
		session_destroy();
		header('Location: ' . INDEX_URL);
	}