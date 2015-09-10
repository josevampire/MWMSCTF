<?php
	session_start();
	include 'mysqlLogin.php';

	$givenPin = $_POST["betaPin"];
	$referingPage = $_GET['pageName'];

	$safePin = mysqli_real_escape_string($conn, stripslashes($givenPin));

	$result = mysqli_query($conn, "SELECT * FROM settings WHERE value = '$safePin'");
	$count = mysqli_num_rows($result);
	if ($count == 1) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION["signedIn"] = TRUE;
    if ($_SESSION['username'] == '') {
			$_SESSION["username"] = 'Guest';
		}
		$_SESSION["beta"] = TRUE;
	} else {
		$_SESSION["betaFail"] = TRUE;
	}

	$pathBack = '';
	if ($referingPage == 'index' || $referingPage == 'scoreboard' || $referingPage == 'questionStats' || $referingPage == 'userInfo') {
		$pathBack = '../' . $referingPage . '.php';
	} else {
		$pathBack = '../problems/' . $referingPage . '.php';
	}

	header('Location:' . $pathBack);
?>
