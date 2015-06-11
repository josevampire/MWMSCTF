<?php
	$conn = new mysqli('localhost', '', '', 'CTF');
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	session_start();
	if (!isset($_SESSION['signedIn'])) {
		$_SESSION['signedIn'] = false;
	}
	if (!isset($_SESSION['loginFail'])) {
		$_SESSION['loginFail'] = false;
	}
?>