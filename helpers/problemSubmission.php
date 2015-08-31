<?php
	session_start();
	include 'mysqlLogin.php';

	if (!$_SESSION['gameInProgress'] && !$_SESSION['admin']) {
		header('Location: ../index.php');
	}

	$keyAttempt = mysqli_real_escape_string($conn, stripslashes($_POST["keyAttempt"]));
	$pageName = $_GET["pageName"];
	$problemNum = $_GET["problemNum"];
	$pointValue = $_GET["pointValue"];

	$sql = "SELECT * FROM questions WHERE category = '$pageName' AND pointValue = '$pointValue'";
	$result = mysqli_query($conn, $sql);

	$count = mysqli_num_rows($result);
	if ($count > 1) {
		die("More than one question pulled!");
	} else if ($count < 1) {
		die("No questions selected!");
	}

	$user = $_SESSION['username'];
	$row = mysqli_fetch_assoc($result);
	$key = $row["answer"];
	if ($key == $keyAttempt || $key == strtolower($keyAttempt)) {
		$_SESSION["answerState"] = 20 + $problemNum;
		$sql = "UPDATE scores SET $pageName$pointValue='TRUE' WHERE user='$user'";
		mysqli_query($conn, $sql);
	} else {
		$_SESSION["answerState"] = 10 + $problemNum;
	}

	$pathBack = '';
	if ($pageName == 'index' || $pageName == 'scoreboard') {
		$pathBack = '../' . $pageName . '.php';
	} else {
		$pathBack = '../problems/' . $pageName . '.php';
	}

	header('Location:' . $pathBack);
?>
