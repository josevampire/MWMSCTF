<?php
	session_start();
	if (!isset($_SESSION['signedIn'])) {
		$_SESSION['signedIn'] = false;
	}
	if (!isset($_SESSION['loginFail'])) {
		$_SESSION['loginFail'] = false;
	}
	if (!isset($_SESSION['answerState'])) {
		$_SESSION['answerState'] = 0;
	}
	if (!isset($_SESSION['username'])) {
		$_SESSION['username'] = "";
	}
?>