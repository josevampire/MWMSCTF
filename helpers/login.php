<?php
	session_start();
	include 'mysqlLogin.php';

	$givenUsername = $_POST["username"];
	$givenPass = $_POST["password"];
	$referingPage = $_GET['pageName'];

	$safeUsername = mysqli_real_escape_string($conn, stripslashes($givenUsername));
	$safePass = mysqli_real_escape_string($conn, stripslashes($givenPass));
	$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$safeUsername' AND password = '$safePass'");
	$count = mysqli_num_rows($result);
	if ($count == 1) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION["signedIn"] = TRUE;
		$_SESSION["username"] = $row["username"];
		if ($row['admin'] == "TRUE") {
			$_SESSION["admin"] = TRUE;
		}
		if ($row['firstLogon'] == "TRUE") {
			$result = mysqli_query($conn, "INSERT INTO scores (user) VALUES ('" . $_SESSION["username"] . "')");
			if ($result) {
				$result = mysqli_query($conn, "UPDATE users SET firstLogon='FALSE' WHERE username='" . $_SESSION["username"] . "'");
			}
		}
	} else {
		$_SESSION["loginFail"] = TRUE;
	}

	$pathBack = '';
	if ($referingPage == 'index' || $referingPage == 'scoreboard' || $referingPage == 'questionStats' || $referingPage == 'userInfo') {
		$pathBack = '../' . $referingPage . '.php';
	} else {
		$pathBack = '../problems/' . $referingPage . '.php';
	}

	header('Location:' . $pathBack);
?>
