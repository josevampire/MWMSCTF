<?php
	session_start();
	$conn = mysqli_connect('localhost', '', '', 'ctf');
	if (!$conn) {
	    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
	}

	$givenUsername = $_POST["username"];
	$givenPass = $_POST["password"];
	$referingPage = $_GET['pageName'];

	$safeUsername = mysql_real_escape_string(stripslashes($givenUsername));
	$safePass = mysql_real_escape_string(stripslashes($givenPass));

	$sql = "SELECT * FROM users WHERE username = '$safeUsername' AND password = '$safePass'";
	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);
	if ($count == 1) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION["signedIn"] = 'TRUE';
		$_SESSION["username"] = $row["username"];
	} else {
		$_SESSION["loginFail"] = TRUE;
	}

	$pathBack = '';
	if ($referingPage == 'index' || $referingPage == 'scoreboard') {
		$pathBack = '../' . $referingPage . '.php';
	} else {
		$pathBack = '../problems/' . $referingPage . '.php';
	}
	
	header('Location:' . $pathBack);
?>