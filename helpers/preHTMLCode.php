<?php
	session_start();
	if (!isset($_SESSION['signedIn'])) {
		$_SESSION['signedIn'] = FALSE;
	}
	if (!isset($_SESSION['loginFail'])) {
		$_SESSION['loginFail'] = FALSE;
	}
	if (!isset($_SESSION['answerState'])) {
		$_SESSION['answerState'] = 0;
	}
	if (!isset($_SESSION['username'])) {
		$_SESSION['username'] = "";
	}
	if (!isset($_SESSION['admin'])) {
		$_SESSION['admin'] = FALSE;
	}

	include 'mysqlLogin.php';

	$username = $_SESSION['username'];
	$result = mysqli_query($conn, "UPDATE users SET lastSeen = '" . time() . "' WHERE username = '" . $username . "'");

	$result = mysqli_query($conn, "SELECT lockOutUntil FROM scores WHERE user = '$username'");
	$row = mysqli_fetch_assoc($result);
	if ($row['lockOutUntil'] < time()) {
		$result = mysqli_query($conn, "UPDATE scores SET lockOutUntil = '0' WHERE user = '" . $username . "'");
	}

	$result = mysqli_query($conn, "SELECT * FROM settings WHERE name = 'openUntil'");
	$row = mysqli_fetch_assoc($result);
	if ($row['value'] <= time()) {
		$result = mysqli_query($conn, "UPDATE settings SET value = 'FALSE' WHERE name = 'gameInProgress'");
		$result = mysqli_query($conn, "UPDATE settings SET value = '' WHERE name = 'openUntil'");
	}

	$result = mysqli_query($conn, "SELECT * FROM settings WHERE name = 'gameInProgress'");
	$row = mysqli_fetch_assoc($result);
	if ($row['value'] == 'TRUE') {
		$_SESSION["gameInProgress"] = TRUE;
	} else {
		$_SESSION["gameInProgress"] = FALSE;
	}
?>
