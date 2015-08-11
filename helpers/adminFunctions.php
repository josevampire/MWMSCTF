<?php
	include 'mysqlLogin.php';
	if (!isset($_SESSION)) {
		session_start();
	}
	$sql = "SELECT * FROM users WHERE username = '" . $_SESSION['username'] . "'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	if (!$row['admin']) {
		header("Location: ../index.php");
	}

	if (isset($_GET["action"])) {
		switch ($_GET["action"]) {
			case 'switchState':
				$sql = "SELECT * FROM settings WHERE name = 'gameInProgress'";
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc($result);
				if ($row['value'] == 'TRUE') {
					$sql = "UPDATE settings SET value = 'FALSE' WHERE name = 'gameInProgress'";
					$result = mysqli_query($conn, $sql);
				} else {
					$sql = "UPDATE settings SET value = 'TRUE' WHERE name = 'gameInProgress'";
					$result = mysqli_query($conn, $sql);
				}
				header("Location: ../admin.php");
				break;
			default:
				die("Not a valid action");
		}
	}
?>
