<?php
	session_start();
	if (!isset($_SESSION['signedIn'])) {
		$_SESSION['signedIn'] = false;
	}
?>