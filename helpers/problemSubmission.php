<?php
	session_start();
	include 'mysqlLogin.php';
	$user = $_SESSION['username'];
	$pathBack = '';
	$keyAttempt = mysqli_real_escape_string($conn, stripslashes($_POST["keyAttempt"]));
	$pageName = $_GET["pageName"];
	$problemNum = $_GET["problemNum"];
	$pointValue = $_GET["pointValue"];
	if ($pageName == 'index' || $pageName == 'scoreboard') {
		$pathBack = '../' . $pageName . '.php';
	} else {
		$pathBack = '../problems/' . $pageName . '.php';
	}


	if (!$_SESSION['gameInProgress'] && !$_SESSION['admin'] && !$_SESSION['beta']) {
		header('Location: ../index.php');
	}

	if (!isset($_POST['keyAttempt'])) {
		$_POST['keyAttempt'] = 'youreACheater';
	}

	$result = mysqli_query($conn, "SELECT value FROM settings WHERE name = 'bruteForceTimeRef'");
	$row = mysqli_fetch_assoc($result);
	if ($row['value'] == "" || time() - $row['value'] > 15) {
		$time = time();
		$result = mysqli_query($conn, "UPDATE settings SET value = '$time' WHERE name = 'bruteForceTimeRef'");
		$result = mysqli_query($conn, "UPDATE scores SET attempts = 0");
	}

	$result = mysqli_query($conn, "SELECT attempts FROM scores WHERE user = '$user'");
	$row = mysqli_fetch_assoc($result);
	if ($row['attempts'] >= 5) {
		$lockOutTime = time() + (5 * 60);
		$result = mysqli_query($conn, "UPDATE scores SET lockOutUntil = '$lockOutTime' WHERE user = '$user'");
		$result = mysqli_query($conn, "UPDATE scores SET attempts = '0' WHERE user = '$user'");
	} else {
		$newAttempts = $row['attempts'] + 1;
		$result = mysqli_query($conn, "UPDATE scores SET attempts = $newAttempts WHERE user = '$user'");
	}

	$result = mysqli_query($conn, "SELECT lockOutUntil FROM scores WHERE user = '$user'");
	$row = mysqli_fetch_assoc($result);
	if ($_SESSION['username'] != 'Guest') {
		if ($row['lockOutUntil'] < time()) {
			$result = mysqli_query($conn, "UPDATE scores SET lockOutUntil = '' WHERE user = '$user'");
		} else if ($row['lockOutUntil'] != "") {
			$_SESSION["answerState"] = 30 + $problemNum;
			header('Location:' . $pathBack);
		}
	}

	$keyAttempt = mysqli_real_escape_string($conn, stripslashes($_POST["keyAttempt"]));
	$pageName = $_GET["pageName"];
	$problemNum = $_GET["problemNum"];
	$pointValue = $_GET["pointValue"];

	$result = mysqli_query($conn, "SELECT * FROM questions WHERE category = '$pageName' AND pointValue = '$pointValue'");

	$count = mysqli_num_rows($result);
	if ($count > 1) {
		die("More than one question pulled!");
	} else if ($count < 1) {
		die("No questions selected!");
	}

	$row = mysqli_fetch_assoc($result);
	$key = $row["answer"];
	if ($key == $keyAttempt || $key == strtolower($keyAttempt)) {
		$_SESSION["answerState"] = 20 + $problemNum;
		if (!$_SESSION['beta']) {
			$time = time();
			mysqli_query($conn, "UPDATE scores SET $pageName$pointValue='$time' WHERE user='$user'");
		}
	} else {
		$_SESSION["answerState"] = 10 + $problemNum;
	}

	header('Location:' . $pathBack);
?>
